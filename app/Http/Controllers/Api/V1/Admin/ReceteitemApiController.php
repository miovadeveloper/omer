<?php

namespace App\Http\Controllers\Api\V1\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreReceteitemRequest;
use App\Http\Requests\UpdateReceteitemRequest;
use App\Receteitem;

class ReceteitemApiController extends Controller
{
    public function index()
    {
        $receteitems = Receteitem::all();

        return $receteitems;
    }

    public function store(StoreReceteitemRequest $request)
    {
        return Receteitem::create($request->all());
    }

    public function update(UpdateReceteitemRequest $request, Receteitem $receteitem)
    {
        return $receteitem->update($request->all());
    }

    public function show(Receteitem $receteitem)
    {
        return $receteitem;
    }

    public function destroy(Receteitem $receteitem)
    {
        return $receteitem->delete();
    }
}
