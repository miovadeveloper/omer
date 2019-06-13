<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\MassDestroyIlaclarRequest;
use App\Http\Requests\StoreIlaclarRequest;
use App\Http\Requests\UpdateIlaclarRequest;
use App\Ilaclar;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;

class IlaclarController extends Controller
{
    public function index()
    {
        abort_unless(\Gate::allows('ilaclar_access'), 403);

        $ilaclars = Ilaclar::all();

        return view('admin.ilaclars.index', compact('ilaclars'));
    }

    public function create()
    {
        abort_unless(\Gate::allows('ilaclar_create'), 403);

        return view('admin.ilaclars.create');
    }

    public function store(StoreIlaclarRequest $request)
    {
        abort_unless(\Gate::allows('ilaclar_create'), 403);

        $ilaclar = Ilaclar::create($request->all());

        return redirect()->route('admin.ilaclars.index');
    }

    public function edit(Ilaclar $ilaclar)
    {
        abort_unless(\Gate::allows('ilaclar_edit'), 403);

        return view('admin.ilaclars.edit', compact('ilaclar'));
    }

    public function update(UpdateIlaclarRequest $request, Ilaclar $ilaclar)
    {
        abort_unless(\Gate::allows('ilaclar_edit'), 403);

        $ilaclar->update($request->all());

        return redirect()->route('admin.ilaclars.index');
    }

    public function show(Ilaclar $ilaclar)
    {
        abort_unless(\Gate::allows('ilaclar_show'), 403);

        return view('admin.ilaclars.show', compact('ilaclar'));
    }

    public function destroy(Ilaclar $ilaclar)
    {
        abort_unless(\Gate::allows('ilaclar_delete'), 403);

        $ilaclar->delete();

        return back();
    }

    public function massDestroy(MassDestroyIlaclarRequest $request)
    {
        Ilaclar::whereIn('id', request('ids'))->delete();

        return response(null, 204);
    }
}
