<?php

namespace App\Http\Controllers\Api\V1\Admin;

use App\Hastalar;
use App\Http\Controllers\Controller;
use App\Http\Requests\StoreHastalarRequest;
use App\Http\Requests\UpdateHastalarRequest;

class HastalarApiController extends Controller
{
    public function index()
    {
        $hastalars = Hastalar::all();

        return $hastalars;
    }

    public function store(StoreHastalarRequest $request)
    {
        return Hastalar::create($request->all());
    }

    public function update(UpdateHastalarRequest $request, Hastalar $hastalar)
    {
        return $hastalar->update($request->all());
    }

    public function show(Hastalar $hastalar)
    {
        return $hastalar;
    }

    public function destroy(Hastalar $hastalar)
    {
        return $hastalar->delete();
    }
}
