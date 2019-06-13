<?php

namespace App\Http\Controllers\Api\V1\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreLaboratuvarRequest;
use App\Http\Requests\UpdateLaboratuvarRequest;
use App\Laboratuvar;

class LaboratuvarApiController extends Controller
{
    public function index()
    {
        $laboratuvars = Laboratuvar::all();

        return $laboratuvars;
    }

    public function store(StoreLaboratuvarRequest $request)
    {
        return Laboratuvar::create($request->all());
    }

    public function update(UpdateLaboratuvarRequest $request, Laboratuvar $laboratuvar)
    {
        return $laboratuvar->update($request->all());
    }

    public function show(Laboratuvar $laboratuvar)
    {
        return $laboratuvar;
    }

    public function destroy(Laboratuvar $laboratuvar)
    {
        return $laboratuvar->delete();
    }
}
