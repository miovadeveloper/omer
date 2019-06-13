<?php

namespace App\Http\Controllers\Api\V1\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreTrimesterikiucRequest;
use App\Http\Requests\UpdateTrimesterikiucRequest;
use App\Trimesterikiuc;

class TrimesterikiucApiController extends Controller
{
    public function index()
    {
        $trimesterikiucs = Trimesterikiuc::all();

        return $trimesterikiucs;
    }

    public function store(StoreTrimesterikiucRequest $request)
    {
        return Trimesterikiuc::create($request->all());
    }

    public function update(UpdateTrimesterikiucRequest $request, Trimesterikiuc $trimesterikiuc)
    {
        return $trimesterikiuc->update($request->all());
    }

    public function show(Trimesterikiuc $trimesterikiuc)
    {
        return $trimesterikiuc;
    }

    public function destroy(Trimesterikiuc $trimesterikiuc)
    {
        return $trimesterikiuc->delete();
    }
}
