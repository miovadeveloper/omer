<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\MassDestroyUsgRequest;
use App\Http\Requests\StoreUsgRequest;
use App\Http\Requests\UpdateUsgRequest;
use App\Takipler;
use App\Usg;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;

class UsgController extends Controller
{
    public function index()
    {
        abort_unless(\Gate::allows('usg_access'), 403);

        $usgs = Usg::all();

        return view('admin.usgs.index', compact('usgs'));
    }

    public function create()
    {
        abort_unless(\Gate::allows('usg_create'), 403);

        $takips = Takipler::all()->pluck('takip_tipi', 'id')->prepend(trans('global.pleaseSelect'), '');

        return view('admin.usgs.create', compact('takips'));
    }

    public function store(StoreUsgRequest $request)
    {
        abort_unless(\Gate::allows('usg_create'), 403);

        $usg = Usg::create($request->all());

        return redirect()->route('admin.usgs.edit',$usg->id);
    }

    public function edit(Usg $usg)
    {
        abort_unless(\Gate::allows('usg_edit'), 403);

        $takips = Takipler::all()->pluck('takip_tipi', 'id')->prepend(trans('global.pleaseSelect'), '');

        $usg->load('takip');

        return view('admin.usgs.edit', compact('takips', 'usg'));
        return redirect()->route('admin.takiplers.show',$usg->takip_id);

    }

    public function update(UpdateUsgRequest $request, Usg $usg)
    {
        abort_unless(\Gate::allows('usg_edit'), 403);

        $usg->update($request->all());

        return redirect()->route('admin.takiplers.show',$usg->takip_id);
    }

    public function show(Usg $usg)
    {
        abort_unless(\Gate::allows('usg_show'), 403);

        $usg->load('takip');

        return view('admin.usgs.show', compact('usg'));
    }

    public function destroy(Usg $usg)
    {
        abort_unless(\Gate::allows('usg_delete'), 403);

        $usg->delete();

        return back();
    }

    public function massDestroy(MassDestroyUsgRequest $request)
    {
        Usg::whereIn('id', request('ids'))->delete();

        return response(null, 204);
    }
}
