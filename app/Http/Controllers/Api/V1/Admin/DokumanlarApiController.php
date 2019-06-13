<?php

namespace App\Http\Controllers\Api\V1\Admin;

use App\Dokumanlar;
use App\Http\Controllers\Controller;
use App\Http\Requests\StoreDokumanlarRequest;
use App\Http\Requests\UpdateDokumanlarRequest;

class DokumanlarApiController extends Controller
{
    public function index()
    {
        $dokumanlars = Dokumanlar::all();

        return $dokumanlars;
    }

    public function store(StoreDokumanlarRequest $request)
    {
        return Dokumanlar::create($request->all());
    }

    public function update(UpdateDokumanlarRequest $request, Dokumanlar $dokumanlar)
    {
        return $dokumanlar->update($request->all());
    }

    public function show(Dokumanlar $dokumanlar)
    {
        return $dokumanlar;
    }

    public function destroy(Dokumanlar $dokumanlar)
    {
        return $dokumanlar->delete();
    }
}
