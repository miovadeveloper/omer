<?php

namespace App\Http\Controllers\Admin;

use App\Ameliyatlar;
use App\Http\Controllers\Controller;
use App\Http\Requests\MassDestroyAmeliyatlarRequest;
use App\Http\Requests\StoreAmeliyatlarRequest;
use App\Http\Requests\UpdateAmeliyatlarRequest;
use App\Takipler;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;

class AmeliyatlarController extends Controller
{
    public function index()
    {
        abort_unless(\Gate::allows('ameliyatlar_access'), 403);

        $ameliyatlars = Ameliyatlar::all();

        return view('admin.ameliyatlars.index', compact('ameliyatlars'));
    }

    public function create()
    {
        abort_unless(\Gate::allows('ameliyatlar_create'), 403);

        $takips = Takipler::all()->pluck('takip_tipi', 'id')->prepend(trans('global.pleaseSelect'), '');

        return view('admin.ameliyatlars.create', compact('takips'));
    }

    public function store(StoreAmeliyatlarRequest $request)
    {
        abort_unless(\Gate::allows('ameliyatlar_create'), 403);

        $ameliyatlar = Ameliyatlar::create($request->all());

        return redirect()->route('admin.ameliyatlars.edit',$ameliyatlar->id);
    }

    public function edit(Ameliyatlar $ameliyatlar)
    {
        abort_unless(\Gate::allows('ameliyatlar_edit'), 403);

        $takips = Takipler::all()->pluck('takip_tipi', 'id')->prepend(trans('global.pleaseSelect'), '');

        $ameliyatlar->load('takip');

        return view('admin.ameliyatlars.edit', compact('takips', 'ameliyatlar'));
        return redirect()->route('admin.takiplers.show',$ameliyatlar->takip_id);

    }

    public function update(UpdateAmeliyatlarRequest $request, Ameliyatlar $ameliyatlar)
    {
        abort_unless(\Gate::allows('ameliyatlar_edit'), 403);

        $ameliyatlar->update($request->all());

        return redirect()->route('admin.takiplers.show',$ameliyatlar->takip_id);
    }

    public function show(Ameliyatlar $ameliyatlar)
    {
        abort_unless(\Gate::allows('ameliyatlar_show'), 403);

        $ameliyatlar->load('takip');

        return view('admin.ameliyatlars.show', compact('ameliyatlar'));
    }

    public function destroy(Ameliyatlar $ameliyatlar)
    {
        abort_unless(\Gate::allows('ameliyatlar_delete'), 403);

        $ameliyatlar->delete();

        return back();
    }

    public function massDestroy(MassDestroyAmeliyatlarRequest $request)
    {
        Ameliyatlar::whereIn('id', request('ids'))->delete();

        return response(null, 204);
    }
}
