<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\MassDestroyTrimesterikiucRequest;
use App\Http\Requests\StoreTrimesterikiucRequest;
use App\Http\Requests\UpdateTrimesterikiucRequest;
use App\Takipler;
use App\Trimesterikiuc;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;

class TrimesterikiucController extends Controller
{
    public function index()
    {
        abort_unless(\Gate::allows('trimesterikiuc_access'), 403);

        $trimesterikiucs = Trimesterikiuc::all();

        return view('admin.trimesterikiucs.index', compact('trimesterikiucs'));
    }

    public function create()
    {
        abort_unless(\Gate::allows('trimesterikiuc_create'), 403);

        $takips = Takipler::all()->pluck('takip_tipi', 'id')->prepend(trans('global.pleaseSelect'), '');

        return view('admin.trimesterikiucs.create', compact('takips'));
    }

    public function store(StoreTrimesterikiucRequest $request)
    {
        abort_unless(\Gate::allows('trimesterikiuc_create'), 403);

        $trimesterikiuc = Trimesterikiuc::create($request->all());

        return redirect()->route('admin.trimesterikiucs.edit',$trimesterikiuc->id);
    }

    public function edit(Trimesterikiuc $trimesterikiuc)
    {
        abort_unless(\Gate::allows('trimesterikiuc_edit'), 403);

        $takips = Takipler::all()->pluck('takip_tipi', 'id')->prepend(trans('global.pleaseSelect'), '');

        $trimesterikiuc->load('takip');

        return view('admin.trimesterikiucs.edit', compact('takips', 'trimesterikiuc'));
        return redirect()->route('admin.takiplers.show',$trimesterikiuc->takip_id);

    }

    public function update(UpdateTrimesterikiucRequest $request, Trimesterikiuc $trimesterikiuc)
    {
        abort_unless(\Gate::allows('trimesterikiuc_edit'), 403);

        $trimesterikiuc->update($request->all());

        return redirect()->route('admin.takiplers.show',$trimesterikiuc->takip_id);
    }

    public function show(Trimesterikiuc $trimesterikiuc)
    {
        abort_unless(\Gate::allows('trimesterikiuc_show'), 403);

        $trimesterikiuc->load('takip');

        return view('admin.trimesterikiucs.show', compact('trimesterikiuc'));
    }

    public function destroy(Trimesterikiuc $trimesterikiuc)
    {
        abort_unless(\Gate::allows('trimesterikiuc_delete'), 403);

        $trimesterikiuc->delete();

        return back();
    }

    public function massDestroy(MassDestroyTrimesterikiucRequest $request)
    {
        Trimesterikiuc::whereIn('id', request('ids'))->delete();

        return response(null, 204);
    }
}
