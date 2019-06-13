<?php

namespace App\Http\Controllers\Api\V1\Admin;

use App\Ameliyatlar;
use App\Http\Controllers\Controller;
use App\Http\Requests\StoreAmeliyatlarRequest;
use App\Http\Requests\UpdateAmeliyatlarRequest;

class AmeliyatlarApiController extends Controller
{
    public function index()
    {
        $ameliyatlars = Ameliyatlar::all();

        return $ameliyatlars;
    }

    public function store(StoreAmeliyatlarRequest $request)
    {
        return Ameliyatlar::create($request->all());
    }

    public function update(UpdateAmeliyatlarRequest $request, Ameliyatlar $ameliyatlar)
    {
        return $ameliyatlar->update($request->all());
    }

    public function show(Ameliyatlar $ameliyatlar)
    {
        return $ameliyatlar;
    }

    public function destroy(Ameliyatlar $ameliyatlar)
    {
        return $ameliyatlar->delete();
    }
}
