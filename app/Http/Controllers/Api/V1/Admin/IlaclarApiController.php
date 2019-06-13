<?php

namespace App\Http\Controllers\Api\V1\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreIlaclarRequest;
use App\Http\Requests\UpdateIlaclarRequest;
use App\Ilaclar;

class IlaclarApiController extends Controller
{
    public function index()
    {
        $ilaclars = Ilaclar::all();

        return $ilaclars;
    }

    public function store(StoreIlaclarRequest $request)
    {
        return Ilaclar::create($request->all());
    }

    public function update(UpdateIlaclarRequest $request, Ilaclar $ilaclar)
    {
        return $ilaclar->update($request->all());
    }

    public function show(Ilaclar $ilaclar)
    {
        return $ilaclar;
    }

    public function destroy(Ilaclar $ilaclar)
    {
        return $ilaclar->delete();
    }
}
