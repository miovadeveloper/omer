<?php

namespace App\Http\Controllers\Api\V1\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreTakiplerRequest;
use App\Http\Requests\UpdateTakiplerRequest;
use App\Takipler;

class TakiplerApiController extends Controller
{
    public function index()
    {
        $takiplers = Takipler::all();

        return $takiplers;
    }

    public function store(StoreTakiplerRequest $request)
    {
        return Takipler::create($request->all());
    }

    public function update(UpdateTakiplerRequest $request, Takipler $takipler)
    {
        return $takipler->update($request->all());
    }

    public function show(Takipler $takipler)
    {
        return $takipler;
    }

    public function destroy(Takipler $takipler)
    {
        return $takipler->delete();
    }
}
