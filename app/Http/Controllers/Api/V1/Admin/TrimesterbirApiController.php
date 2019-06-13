<?php

namespace App\Http\Controllers\Api\V1\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreTrimesterbirRequest;
use App\Http\Requests\UpdateTrimesterbirRequest;
use App\Trimesterbir;

class TrimesterbirApiController extends Controller
{
    public function index()
    {
        $trimesterbirs = Trimesterbir::all();

        return $trimesterbirs;
    }

    public function store(StoreTrimesterbirRequest $request)
    {
        return Trimesterbir::create($request->all());
    }

    public function update(UpdateTrimesterbirRequest $request, Trimesterbir $trimesterbir)
    {
        return $trimesterbir->update($request->all());
    }

    public function show(Trimesterbir $trimesterbir)
    {
        return $trimesterbir;
    }

    public function destroy(Trimesterbir $trimesterbir)
    {
        return $trimesterbir->delete();
    }
}
