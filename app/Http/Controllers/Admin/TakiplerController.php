<?php

namespace App\Http\Controllers\Admin;

use App\Ameliyatlar;
use App\Dokumanlar;
use App\Hastalar;
use App\Http\Controllers\Controller;
use App\Http\Requests\MassDestroyTakiplerRequest;
use App\Http\Requests\StoreTakiplerRequest;
use App\Http\Requests\UpdateTakiplerRequest;
use App\Laboratuvar;
use App\Muayane;
use App\Notlar;
use App\Receteler;
use App\Takipler;
use App\Trimesterbir;
use App\Trimesterikiuc;
use App\Usg;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;

class TakiplerController extends Controller
{
    public function index(Request $request)
    {
        if ($request->ajax()) {
            $query = Takipler::query()->select('*');
            $query->with(['hasta']);
            $table = Datatables::of($query);

            $table->addColumn('placeholder', '&nbsp;');
            $table->addColumn('actions', '&nbsp;');

            $table->editColumn('actions', function ($row) {
                $viewGate      = 'takipler_show';
                $editGate      = 'takipler_edit';
                $deleteGate    = 'takipler_delete';
                $crudRoutePart = 'takiplers';

                return view('partials.datatablesActions', compact(
                    'viewGate',
                    'editGate',
                    'deleteGate',
                    'crudRoutePart',
                    'row'
                ));
            });
            $table->editColumn('takip_tipi', function ($row) {
                return $row->takip_tipi ? Takipler::TAKIP_TIPI_SELECT[$row->takip_tipi] : '';
            });
            $table->editColumn('hastalar.hasta', function ($row) {
                return $row->hasta_id ? (is_string($row->hasta) ? $row->hasta : $row->hasta->adi_soyadi) : '';
            });

            $table->rawColumns(['actions', 'placeholder', 'hasta']);

            return $table->make(true);
        }

        return view('admin.takiplers.index');
    }

    public function create()
    {
        abort_unless(\Gate::allows('takipler_create'), 403);

        $hastas = Hastalar::all()->pluck('adi_soyadi', 'id')->prepend(trans('global.pleaseSelect'), '');

        return view('admin.takiplers.create', compact('hastas'));
    }

    public function store(StoreTakiplerRequest $request)
    {
        abort_unless(\Gate::allows('takipler_create'), 403);

        $takipler = Takipler::create($request->all());

        return redirect()->route('admin.takiplers.show',$takipler->id);


    }

    public function edit(Takipler $takipler)
    {
        abort_unless(\Gate::allows('takipler_edit'), 403);

        $hastas = Hastalar::all()->pluck('adi_soyadi', 'id')->prepend(trans('global.pleaseSelect'), '');

        $takipler->load('hasta');

        return view('admin.takiplers.edit', compact('hastas', 'takipler'));
    }

    public function update(UpdateTakiplerRequest $request, Takipler $takipler)
    {
        abort_unless(\Gate::allows('takipler_edit'), 403);

        $takipler->update($request->all());

        return redirect()->route('admin.takiplers.show',$takipler->id);
    }

    public function show(Takipler $takipler)
    {
        abort_unless(\Gate::allows('takipler_show'), 403);
        $hastas = Hastalar::all()->pluck('adi_soyadi', 'id')->prepend(trans('global.pleaseSelect'), '');

        $takipler->load('hasta');

        $muayanes =  Muayane::where('takip_id',$takipler->id)->get();
        $usgs =  Usg::where('takip_id',$takipler->id)->get();
        $laboratuvars = Laboratuvar::where('takip_id',$takipler->id)->get();
        $ameliyatlars = Ameliyatlar::where('takip_id',$takipler->id)->get();
        $trimesterbirs = Trimesterbir::where('takip_id',$takipler->id)->get();
        $trimesterikiucs = Trimesterikiuc::where('takip_id',$takipler->id)->get();
        $notlars = Notlar::where('takip_id',$takipler->id)->get();
        $dokumanlars = Dokumanlar::where('takip_id',$takipler->id)->get();
        $recetelers = Receteler::where('takip_id',$takipler->id)->get();

        return view('admin.takiplers.show', compact('takipler','hastas','muayanes','usgs','laboratuvars','ameliyatlars','trimesterbirs','trimesterikiucs','notlars','dokumanlars','recetelers'));
    }

    public function destroy(Takipler $takipler)
    {
        abort_unless(\Gate::allows('takipler_delete'), 403);

        $takipler->delete();

        //return back();
        return redirect()->route('admin.hastalars.show',$takipler->hasta_id);
    }

    public function massDestroy(MassDestroyTakiplerRequest $request)
    {
        Takipler::whereIn('id', request('ids'))->delete();

        return response(null, 204);
    }
}
