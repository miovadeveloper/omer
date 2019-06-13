<?php

namespace App\Http\Controllers\Admin;

use App\HastaKategorileri;
use App\Hastalar;
use App\Http\Controllers\Controller;
use App\Http\Requests\MassDestroyHastalarRequest;
use App\Http\Requests\StoreHastalarRequest;
use App\Http\Requests\UpdateHastalarRequest;
use App\Takipler;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;

class HastalarController extends Controller
{
    public function index(Request $request)
    {
        if ($request->ajax()) {
            $query = Hastalar::query()->select('*');
            $query->with(['hasta_kategorisi']);
            $table = Datatables::of($query);

            $table->addColumn('placeholder', '&nbsp;');
            $table->addColumn('actions', '&nbsp;');

            $table->editColumn('actions', function ($row) {
                $viewGate      = 'hastalar_show';
                $editGate      = 'hastalar_edit';
                $deleteGate    = 'hastalar_delete';
                $crudRoutePart = 'hastalars';

                return view('partials.datatablesActions', compact(
                    'viewGate',
                    'editGate',
                    'deleteGate',
                    'crudRoutePart',
                    'row'
                ));
            });
            $table->editColumn('hastaKategorileri.hasta_kategorisi', function ($row) {
                return $row->hasta_kategorisi_id ? (is_string($row->hasta_kategorisi) ? $row->hasta_kategorisi : $row->hasta_kategorisi->hastak) : '';
            });
            $table->editColumn('adi_soyadi', function ($row) {
                return $row->adi_soyadi ? $row->adi_soyadi : "";
            });
            $table->editColumn('tc_kimlik_no', function ($row) {
                return $row->tc_kimlik_no ? $row->tc_kimlik_no : "";
            });

            $table->editColumn('telefon_ev', function ($row) {
                return $row->telefon_ev ? $row->telefon_ev : "";
            });
            $table->editColumn('gsm', function ($row) {
                return $row->gsm ? $row->gsm : "";
            });
            $table->rawColumns(['actions', 'placeholder', 'hasta_kategorisi']);

            return $table->make(true);
        }

        return view('admin.hastalars.index');
    }

    public function create()
    {
        abort_unless(\Gate::allows('hastalar_create'), 403);

        $hasta_kategorisis = HastaKategorileri::all()->pluck('hastak', 'id')->prepend(trans('global.pleaseSelect'), '');

        return view('admin.hastalars.create', compact('hasta_kategorisis'));

    }

    public function store(StoreHastalarRequest $request)
    {
        abort_unless(\Gate::allows('hastalar_create'), 403);

        $hastalar = Hastalar::create($request->all());

        return redirect()->route('admin.hastalars.index');
    }

    public function edit(Hastalar $hastalar)
    {
        abort_unless(\Gate::allows('hastalar_edit'), 403);

        $hasta_kategorisis = HastaKategorileri::all()->pluck('hastak', 'id')->prepend(trans('global.pleaseSelect'), '');

        $hastalar->load('hasta_kategorisi');

        return view('admin.hastalars.edit', compact('hasta_kategorisis', 'hastalar'));
    }

    public function update(UpdateHastalarRequest $request, Hastalar $hastalar)
    {
        abort_unless(\Gate::allows('hastalar_edit'), 403);

        $hastalar->update($request->all());

        return redirect()->route('admin.hastalars.index');
    }

    public function show(Hastalar $hastalar)
    {
        abort_unless(\Gate::allows('hastalar_show'), 403);

        $hastalar->load('hasta_kategorisi');


        $takipler =  Takipler::where('hasta_id',$hastalar->id)->get();


        return view('admin.hastalars.show', compact('hastalar','takipler'));
    }

    public function destroy(Hastalar $hastalar)
    {
        abort_unless(\Gate::allows('hastalar_delete'), 403);

        $hastalar->delete();

        return back();
    }

    public function massDestroy(MassDestroyHastalarRequest $request)
    {
        Hastalar::whereIn('id', request('ids'))->delete();

        return response(null, 204);
    }
}
