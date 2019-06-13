<?php

namespace App\Http\Controllers\Api\V1\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreRecetelerRequest;
use App\Http\Requests\UpdateRecetelerRequest;
use App\Receteler;

class RecetelerApiController extends Controller
{
    public function index()
    {
        $recetelers = Receteler::all();

        return $recetelers;
    }

    public function store(StoreRecetelerRequest $request)
    {
        return Receteler::create($request->all());
    }

    public function update(UpdateRecetelerRequest $request, Receteler $receteler)
    {
        return $receteler->update($request->all());
    }

    public function show(Receteler $receteler)
    {
        return $receteler;
    }

    public function destroy(Receteler $receteler)
    {
        return $receteler->delete();
    }
}
