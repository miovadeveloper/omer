<?php

namespace App\Http\Controllers\Admin;

use App\HastaKategorileri;
use App\Http\Controllers\Controller;
use App\Http\Requests\MassDestroyHastaKategorileriRequest;
use App\Http\Requests\StoreHastaKategorileriRequest;
use App\Http\Requests\UpdateHastaKategorileriRequest;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;

class HastaKategorileriController extends Controller
{
    public function index()
    {
        abort_unless(\Gate::allows('hasta_kategorileri_access'), 403);

        $hastaKategorileris = HastaKategorileri::all();

        return view('admin.hastaKategorileris.index', compact('hastaKategorileris'));
    }

    public function create()
    {
        abort_unless(\Gate::allows('hasta_kategorileri_create'), 403);

        return view('admin.hastaKategorileris.create');
    }

    public function store(StoreHastaKategorileriRequest $request)
    {
        abort_unless(\Gate::allows('hasta_kategorileri_create'), 403);

        $hastaKategorileri = HastaKategorileri::create($request->all());

        return redirect()->route('admin.hasta-kategorileris.index');
    }

    public function edit(HastaKategorileri $hastaKategorileri)
    {
        abort_unless(\Gate::allows('hasta_kategorileri_edit'), 403);

        return view('admin.hastaKategorileris.edit', compact('hastaKategorileri'));
    }

    public function update(UpdateHastaKategorileriRequest $request, HastaKategorileri $hastaKategorileri)
    {
        abort_unless(\Gate::allows('hasta_kategorileri_edit'), 403);

        $hastaKategorileri->update($request->all());

        return redirect()->route('admin.hasta-kategorileris.index');
    }

    public function show(HastaKategorileri $hastaKategorileri)
    {
        abort_unless(\Gate::allows('hasta_kategorileri_show'), 403);

        return view('admin.hastaKategorileris.show', compact('hastaKategorileri'));
    }

    public function destroy(HastaKategorileri $hastaKategorileri)
    {
        abort_unless(\Gate::allows('hasta_kategorileri_delete'), 403);

        $hastaKategorileri->delete();

        return back();
    }

    public function massDestroy(MassDestroyHastaKategorileriRequest $request)
    {
        HastaKategorileri::whereIn('id', request('ids'))->delete();

        return response(null, 204);
    }
}
