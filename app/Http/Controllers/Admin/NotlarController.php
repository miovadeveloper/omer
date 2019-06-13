<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\MassDestroyNotlarRequest;
use App\Http\Requests\StoreNotlarRequest;
use App\Http\Requests\UpdateNotlarRequest;
use App\Notlar;
use App\Takipler;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;

class NotlarController extends Controller
{
    public function index()
    {
        abort_unless(\Gate::allows('notlar_access'), 403);

        $notlars = Notlar::all();

        return view('admin.notlars.index', compact('notlars'));
    }

    public function create()
    {
        abort_unless(\Gate::allows('notlar_create'), 403);

        $takips = Takipler::all()->pluck('takip_tipi', 'id')->prepend(trans('global.pleaseSelect'), '');

        return view('admin.notlars.create', compact('takips'));
    }

    public function store(StoreNotlarRequest $request)
    {
        abort_unless(\Gate::allows('notlar_create'), 403);

        $notlar = Notlar::create($request->all());

        return redirect()->route('admin.notlars.edit',$notlar->id);
    }

    public function edit(Notlar $notlar)
    {
        abort_unless(\Gate::allows('notlar_edit'), 403);

        $takips = Takipler::all()->pluck('takip_tipi', 'id')->prepend(trans('global.pleaseSelect'), '');

        $notlar->load('takip');

        return view('admin.notlars.edit', compact('takips', 'notlar'));
        return redirect()->route('admin.takiplers.show',$notlar->takip_id);

    }

    public function update(UpdateNotlarRequest $request, Notlar $notlar)
    {
        abort_unless(\Gate::allows('notlar_edit'), 403);

        $notlar->update($request->all());

        return redirect()->route('admin.takiplers.show',$notlar->takip_id);
    }

    public function show(Notlar $notlar)
    {
        abort_unless(\Gate::allows('notlar_show'), 403);

        $notlar->load('takip');

        return view('admin.notlars.show', compact('notlar'));
    }

    public function destroy(Notlar $notlar)
    {
        abort_unless(\Gate::allows('notlar_delete'), 403);

        $notlar->delete();

        return back();
    }

    public function massDestroy(MassDestroyNotlarRequest $request)
    {
        Notlar::whereIn('id', request('ids'))->delete();

        return response(null, 204);
    }
}
