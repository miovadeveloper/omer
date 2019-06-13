<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\MassDestroyMuayaneRequest;
use App\Http\Requests\StoreMuayaneRequest;
use App\Http\Requests\UpdateMuayaneRequest;
use App\Muayane;
use App\Takipler;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;

class MuayaneController extends Controller
{
    public function index(Request $request)
    {
        if ($request->ajax()) {
            $query = Muayane::query()->select('*');

            $table = Datatables::of($query);

            $table->addColumn('placeholder', '&nbsp;');
            $table->addColumn('actions', '&nbsp;');

            $table->editColumn('actions', function ($row) {
                $viewGate      = 'muayane_show';
                $editGate      = 'muayane_edit';
                $deleteGate    = 'muayane_delete';
                $crudRoutePart = 'muayanes';

                return view('partials.datatablesActions', compact(
                    'viewGate',
                    'editGate',
                    'deleteGate',
                    'crudRoutePart',
                    'row'
                ));
            });

            $table->editColumn('randevu_tipi', function ($row) {
                return $row->randevu_tipi ? Muayane::RANDEVU_TIPI_SELECT[$row->randevu_tipi] : '';
            });
            $table->editColumn('sikayet', function ($row) {
                return $row->sikayet ? $row->sikayet : "";
            });
            $table->editColumn('oyku', function ($row) {
                return $row->oyku ? $row->oyku : "";
            });
            $table->editColumn('tani', function ($row) {
                return $row->tani ? $row->tani : "";
            });
            $table->editColumn('istenilen_tetkikler', function ($row) {
                return $row->istenilen_tetkikler ? $row->istenilen_tetkikler : "";
            });
            $table->editColumn('tedavi', function ($row) {
                return $row->tedavi ? $row->tedavi : "";
            });
            $table->editColumn('sonuc', function ($row) {
                return $row->sonuc ? $row->sonuc : "";
            });
            $table->rawColumns(['actions', 'placeholder']);

            return $table->make(true);
        }

        return view('admin.muayanes.index');
    }

    public function create()
    {
        abort_unless(\Gate::allows('muayane_create'), 403);

        $takips = Takipler::all()->pluck('takip_tipi', 'id')->prepend(trans('global.pleaseSelect'), '');

        return view('admin.muayanes.create', compact('takips'));
    }

    public function store(StoreMuayaneRequest $request)
    {
        abort_unless(\Gate::allows('muayane_create'), 403);

        $muayane = Muayane::create($request->all());

        return redirect()->route('admin.muayanes.edit',$muayane->id);
    }

    public function edit(Muayane $muayane)
    {
        abort_unless(\Gate::allows('muayane_edit'), 403);

        $takips = Takipler::all()->pluck('takip_tipi', 'id')->prepend(trans('global.pleaseSelect'), '');

        $muayane->load('takip');

        return view('admin.muayanes.edit', compact('takips', 'muayane'));
        return redirect()->route('admin.takiplers.show',$muayane->takip_id);

    }

    public function update(UpdateMuayaneRequest $request, Muayane $muayane)
    {
        abort_unless(\Gate::allows('muayane_edit'), 403);

        $muayane->update($request->all());

        return redirect()->route('admin.takiplers.show',$muayane->takip_id);
    }

    public function show(Muayane $muayane)
    {
        abort_unless(\Gate::allows('muayane_show'), 403);

        $muayane->load('takip');

        return view('admin.muayanes.show', compact('muayane'));
    }

    public function destroy(Muayane $muayane)
    {
        abort_unless(\Gate::allows('muayane_delete'), 403);

        $muayane->delete();

        return back();
    }

    public function massDestroy(MassDestroyMuayaneRequest $request)
    {
        Muayane::whereIn('id', request('ids'))->delete();

        return response(null, 204);
    }
}
