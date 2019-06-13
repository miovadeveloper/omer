<?php

namespace App\Http\Controllers\Api\V1\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreMuayaneRequest;
use App\Http\Requests\UpdateMuayaneRequest;
use App\Muayane;

class MuayaneApiController extends Controller
{
    public function index()
    {
        $muayanes = Muayane::all();

        return $muayanes;
    }

    public function store(StoreMuayaneRequest $request)
    {
        return Muayane::create($request->all());
    }

    public function update(UpdateMuayaneRequest $request, Muayane $muayane)
    {
        return $muayane->update($request->all());
    }

    public function show(Muayane $muayane)
    {
        return $muayane;
    }

    public function destroy(Muayane $muayane)
    {
        return $muayane->delete();
    }
}
