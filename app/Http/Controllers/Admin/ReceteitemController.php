<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\MassDestroyReceteitemRequest;
use App\Http\Requests\StoreReceteitemRequest;
use App\Http\Requests\UpdateReceteitemRequest;
use App\Ilaclar;
use App\Receteitem;
use App\Receteler;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;

class ReceteitemController extends Controller
{
    public function index()
    {
        abort_unless(\Gate::allows('receteitem_access'), 403);

        $receteitems = Receteitem::all();

        return view('admin.receteitems.index', compact('receteitems'));
    }

    public function create()
    {
        abort_unless(\Gate::allows('receteitem_create'), 403);

        $receteadis = Receteler::all()->pluck('receteadi', 'id')->prepend(trans('global.pleaseSelect'), '');

        $ilacs = Ilaclar::all()->pluck('ilac_adi', 'id')->prepend(trans('global.pleaseSelect'), '');

        return view('admin.receteitems.create', compact('receteadis', 'ilacs'));
        return redirect()->route('admin.recetelers.show',$receteadis->receteadi_id);

    }

    public function store(StoreReceteitemRequest $request)
    {
        abort_unless(\Gate::allows('receteitem_create'), 403);

        $receteitem = Receteitem::create($request->all());

        return redirect()->route('admin.recetelers.show',$receteitem->receteadi_id);
    }

    public function edit(Receteitem $receteitem)
    {
        abort_unless(\Gate::allows('receteitem_edit'), 403);

        $receteadis = Receteler::all()->pluck('receteadi', 'id')->prepend(trans('global.pleaseSelect'), '');

        $ilacs = Ilaclar::all()->pluck('ilac_adi', 'id')->prepend(trans('global.pleaseSelect'), '');

        $receteitem->load('receteadi', 'ilac');

        return view('admin.receteitems.edit', compact('receteadis', 'ilacs', 'receteitem'));
    }

    public function update(UpdateReceteitemRequest $request, Receteitem $receteitem)
    {
        abort_unless(\Gate::allows('receteitem_edit'), 403);

        $receteitem->update($request->all());

        return redirect()->route('admin.receteitems.index');
    }

    public function show(Receteitem $receteitem)
    {
        abort_unless(\Gate::allows('receteitem_show'), 403);

        $receteitem->load('receteadi', 'ilac');

        return view('admin.receteitems.show', compact('receteitem'));
    }

    public function destroy(Receteitem $receteitem)
    {
        abort_unless(\Gate::allows('receteitem_delete'), 403);

        $receteitem->delete();

        return back();
    }

    public function massDestroy(MassDestroyReceteitemRequest $request)
    {
        Receteitem::whereIn('id', request('ids'))->delete();

        return response(null, 204);
    }
}
