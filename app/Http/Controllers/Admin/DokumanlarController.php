<?php

namespace App\Http\Controllers\Admin;

use App\Dokumanlar;
use App\Http\Controllers\Controller;
use App\Http\Controllers\Traits\MediaUploadingTrait;
use App\Http\Requests\MassDestroyDokumanlarRequest;
use App\Http\Requests\StoreDokumanlarRequest;
use App\Http\Requests\UpdateDokumanlarRequest;
use App\Takipler;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;

class DokumanlarController extends Controller
{
    use MediaUploadingTrait;

    public function index()
    {
        abort_unless(\Gate::allows('dokumanlar_access'), 403);

        $dokumanlars = Dokumanlar::all();

        return view('admin.dokumanlars.index', compact('dokumanlars'));
    }

    public function create()
    {
        abort_unless(\Gate::allows('dokumanlar_create'), 403);

        $takips = Takipler::all()->pluck('takip_tipi', 'id')->prepend(trans('global.pleaseSelect'), '');

        return view('admin.dokumanlars.create', compact('takips'));
    }

    public function store(StoreDokumanlarRequest $request)
    {
        abort_unless(\Gate::allows('dokumanlar_create'), 403);

        $dokumanlar = Dokumanlar::create($request->all());

        foreach ($request->input('dosya', []) as $file) {
            $dokumanlar->addMedia(storage_path('tmp/uploads/' . $file))->toMediaCollection('dosya');
        }

        return redirect()->route('admin.dokumanlars.edit',$dokumanlar->id);
    }

    public function edit(Dokumanlar $dokumanlar)
    {
        abort_unless(\Gate::allows('dokumanlar_edit'), 403);

        $takips = Takipler::all()->pluck('takip_tipi', 'id')->prepend(trans('global.pleaseSelect'), '');

        $dokumanlar->load('takip');

        return view('admin.dokumanlars.edit', compact('takips', 'dokumanlar'));
        return redirect()->route('admin.takiplers.show',$dokumanlar->takip_id);

    }

    public function update(UpdateDokumanlarRequest $request, Dokumanlar $dokumanlar)
    {
        abort_unless(\Gate::allows('dokumanlar_edit'), 403);

        $dokumanlar->update($request->all());

        if (count($dokumanlar->dosya) > 0) {
            foreach ($dokumanlar->dosya as $media) {
                if (!in_array($media->file_name, $request->input('dosya', []))) {
                    $media->delete();
                }
            }
        }

        $media = $dokumanlar->dosya->pluck('file_name')->toArray();

        foreach ($request->input('dosya', []) as $file) {
            if (count($media) === 0 || !in_array($file, $media)) {
                $dokumanlar->addMedia(storage_path('tmp/uploads/' . $file))->toMediaCollection('dosya');
            }
        }

        return redirect()->route('admin.takiplers.show',$dokumanlar->takip_id);
    }

    public function show(Dokumanlar $dokumanlar)
    {
        abort_unless(\Gate::allows('dokumanlar_show'), 403);

        $dokumanlar->load('takip');

        return view('admin.dokumanlars.show', compact('dokumanlar'));
    }

    public function destroy(Dokumanlar $dokumanlar)
    {
        abort_unless(\Gate::allows('dokumanlar_delete'), 403);

        $dokumanlar->delete();

        return back();
    }

    public function massDestroy(MassDestroyDokumanlarRequest $request)
    {
        Dokumanlar::whereIn('id', request('ids'))->delete();

        return response(null, 204);
    }
}
