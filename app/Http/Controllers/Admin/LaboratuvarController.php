<?php

namespace App\Http\Controllers\Admin;

use     App\Http\Controllers\Controller;
use App\Http\Controllers\Traits\MediaUploadingTrait;
use App\Http\Requests\MassDestroyLaboratuvarRequest;
use App\Http\Requests\StoreLaboratuvarRequest;
use App\Http\Requests\UpdateLaboratuvarRequest;
use App\Laboratuvar;
use App\Takipler;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;

class LaboratuvarController extends Controller
{
    use MediaUploadingTrait;

    public function index()
    {
        abort_unless(\Gate::allows('laboratuvar_access'), 403);

        $laboratuvars = Laboratuvar::all();

        return view('admin.laboratuvars.index', compact('laboratuvars'));
    }

    public function create()
    {
        abort_unless(\Gate::allows('laboratuvar_create'), 403);

        $takips = Takipler::all()->pluck('takip_tipi', 'id')->prepend(trans('global.pleaseSelect'), '');

        return view('admin.laboratuvars.create', compact('takips'));
    }

    public function store(StoreLaboratuvarRequest $request)
    {
        abort_unless(\Gate::allows('laboratuvar_create'), 403);

        $laboratuvar = Laboratuvar::create($request->all());

        foreach ($request->input('laboratuvar_dosya', []) as $file) {
            $laboratuvar->addMedia(storage_path('tmp/uploads/' . $file))->toMediaCollection('laboratuvar_dosya');
        }

        return redirect()->route('admin.laboratuvars.edit',$laboratuvar->id);

    }

    public function edit(Laboratuvar $laboratuvar)
    {
        abort_unless(\Gate::allows('laboratuvar_edit'), 403);

        $takips = Takipler::all()->pluck('takip_tipi', 'id')->prepend(trans('global.pleaseSelect'), '');

        $laboratuvar->load('takip');

        return view('admin.laboratuvars.edit', compact('takips', 'laboratuvar'));
        return redirect()->route('admin.takiplers.show',$laboratuvar->takip_id);

    }

    public function update(UpdateLaboratuvarRequest $request, Laboratuvar $laboratuvar)
    {
        abort_unless(\Gate::allows('laboratuvar_edit'), 403);

        $laboratuvar->update($request->all());

        if (count($laboratuvar->laboratuvar_dosya) > 0) {
            foreach ($laboratuvar->laboratuvar_dosya as $media) {
                if (!in_array($media->file_name, $request->input('laboratuvar_dosya', []))) {
                    $media->delete();
                }
            }
        }

        $media = $laboratuvar->laboratuvar_dosya->pluck('file_name')->toArray();

        foreach ($request->input('laboratuvar_dosya', []) as $file) {
            if (count($media) === 0 || !in_array($file, $media)) {
                $laboratuvar->addMedia(storage_path('tmp/uploads/' . $file))->toMediaCollection('laboratuvar_dosya');
            }
        }

        return redirect()->route('admin.takiplers.show',$laboratuvar->takip_id);

    }

    public function show(Laboratuvar $laboratuvar)
    {
        abort_unless(\Gate::allows('laboratuvar_show'), 403);

        $laboratuvar->load('takip');

        return view('admin.laboratuvars.show', compact('laboratuvar'));
    }

    public function destroy(Laboratuvar $laboratuvar)
    {
        abort_unless(\Gate::allows('laboratuvar_delete'), 403);

        $laboratuvar->delete();

        return back();
    }

    public function massDestroy(MassDestroyLaboratuvarRequest $request)
    {
        Laboratuvar::whereIn('id', request('ids'))->delete();

        return response(null, 204);
    }
}
