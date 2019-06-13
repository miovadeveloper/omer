<?php

namespace App\Http\Controllers\Admin;

use App\Hastalar;
use App\Http\Controllers\Controller;
use App\Http\Requests\MassDestroyRecetelerRequest;
use App\Http\Requests\StoreRecetelerRequest;
use App\Http\Requests\UpdateRecetelerRequest;
use App\Receteitem;
use App\Receteler;
use App\Takipler;
use App\Ilaclar;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;

class RecetelerController extends Controller
{
    public function index()
    {
        abort_unless(\Gate::allows('receteler_access'), 403);

        $recetelers = Receteler::all();

        return view('admin.recetelers.index', compact('recetelers'));
    }

    public function create()
    {
        abort_unless(\Gate::allows('receteler_create'), 403);

        $takips = Takipler::all()->pluck('takip_tipi', 'id')->prepend(trans('global.pleaseSelect'), '');

        $hastas = Hastalar::all()->pluck('adi_soyadi', 'id')->prepend(trans('global.pleaseSelect'), '');

        return view('admin.recetelers.create', compact('takips', 'hastas'));
    }

    public function store(StoreRecetelerRequest $request)
    {
        abort_unless(\Gate::allows('receteler_create'), 403);

        $receteler = Receteler::create($request->all());

        return redirect()->route('admin.recetelers.edit',$receteler->id);
    }

    public function edit(Receteler $receteler)
    {
        abort_unless(\Gate::allows('receteler_edit'), 403);

        $takips = Takipler::all()->pluck('takip_tipi', 'id')->prepend(trans('global.pleaseSelect'), '');

        $hastas = Hastalar::all()->pluck('adi_soyadi', 'id')->prepend(trans('global.pleaseSelect'), '');

        $receteler->load('takip', 'hasta');

        return view('admin.recetelers.edit', compact('takips', 'hastas', 'receteler'));
        return redirect()->route('admin.recetelers.show',$receteler->id);

    }

    public function update(UpdateRecetelerRequest $request, Receteler $receteler)
    {
        abort_unless(\Gate::allows('receteler_edit'), 403);

        $receteler->update($request->all());

        return redirect()->route('admin.recetelers.show',$receteler->id);
    }

    public function show(Receteler $receteler)
    {
        abort_unless(\Gate::allows('receteler_show'), 403);

        $receteler->load('takip', 'hasta');
        $receteitems = Receteitem::where('receteadi_id',$receteler->id)->get();
        $receteadis = Receteler::all()->pluck('receteadi', 'id')->prepend(trans('global.pleaseSelect'), '');

        $ilacs = Ilaclar::all()->pluck('ilac_adi', 'id')->prepend(trans('global.pleaseSelect'), '');
        return view('admin.recetelers.show', compact('receteler','receteitems','receteadis','ilacs'));
    }

    public function destroy(Receteler $receteler)
    {
        abort_unless(\Gate::allows('receteler_delete'), 403);

        $receteler->delete();

        return back();
    }

    public function massDestroy(MassDestroyRecetelerRequest $request)
    {
        Receteler::whereIn('id', request('ids'))->delete();

        return response(null, 204);
    }
}
