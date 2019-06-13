<?php

namespace App\Http\Controllers\Api\V1\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreUsgRequest;
use App\Http\Requests\UpdateUsgRequest;
use App\Usg;

class UsgApiController extends Controller
{
    public function index()
    {
        $usgs = Usg::all();

        return $usgs;
    }

    public function store(StoreUsgRequest $request)
    {
        return Usg::create($request->all());
    }

    public function update(UpdateUsgRequest $request, Usg $usg)
    {
        return $usg->update($request->all());
    }

    public function show(Usg $usg)
    {
        return $usg;
    }

    public function destroy(Usg $usg)
    {
        return $usg->delete();
    }
}
