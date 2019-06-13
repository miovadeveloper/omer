<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\MassDestroyTrimesterbirRequest;
use App\Http\Requests\StoreTrimesterbirRequest;
use App\Http\Requests\UpdateTrimesterbirRequest;
use App\Takipler;
use App\Trimesterbir;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;

class TrimesterbirController extends Controller
{
    public function index()
    {
        abort_unless(\Gate::allows('trimesterbir_access'), 403);

        $trimesterbirs = Trimesterbir::all();

        return view('admin.trimesterbirs.index', compact('trimesterbirs'));
    }

    public function create()
    {
        abort_unless(\Gate::allows('trimesterbir_create'), 403);

        $takips = Takipler::all()->pluck('takip_tipi', 'id')->prepend(trans('global.pleaseSelect'), '');

        return view('admin.trimesterbirs.create', compact('takips'));
    }

    public function store(StoreTrimesterbirRequest $request)
    {
        abort_unless(\Gate::allows('trimesterbir_create'), 403);

        $trimesterbir = Trimesterbir::create($request->all());

        return redirect()->route('admin.trimesterbirs.edit',$trimesterbir->id);
    }

    public function edit(Trimesterbir $trimesterbir)
    {
        abort_unless(\Gate::allows('trimesterbir_edit'), 403);

        $takips = Takipler::all()->pluck('takip_tipi', 'id')->prepend(trans('global.pleaseSelect'), '');

        $trimesterbir->load('takip');

        return view('admin.trimesterbirs.edit', compact('takips', 'trimesterbir'));
        return redirect()->route('admin.takiplers.show',$trimesterbir->takip_id);

    }

    public function update(UpdateTrimesterbirRequest $request, Trimesterbir $trimesterbir)
    {
        abort_unless(\Gate::allows('trimesterbir_edit'), 403);

        $trimesterbir->update($request->all());

        return redirect()->route('admin.takiplers.show',$trimesterbir->takip_id);
    }

    public function show(Trimesterbir $trimesterbir)
    {
        abort_unless(\Gate::allows('trimesterbir_show'), 403);

        $trimesterbir->load('takip');

        return view('admin.trimesterbirs.show', compact('trimesterbir'));
    }

    public function destroy(Trimesterbir $trimesterbir)
    {
        abort_unless(\Gate::allows('trimesterbir_delete'), 403);

        $trimesterbir->delete();

        return back();
    }

    public function massDestroy(MassDestroyTrimesterbirRequest $request)
    {
        Trimesterbir::whereIn('id', request('ids'))->delete();

        return response(null, 204);
    }
}
