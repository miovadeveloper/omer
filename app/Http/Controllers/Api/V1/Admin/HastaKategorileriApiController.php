<?php

namespace App\Http\Controllers\Api\V1\Admin;

use App\HastaKategorileri;
use App\Http\Controllers\Controller;
use App\Http\Requests\StoreHastaKategorileriRequest;
use App\Http\Requests\UpdateHastaKategorileriRequest;

class HastaKategorileriApiController extends Controller
{
    public function index()
    {
        $hastaKategorileris = HastaKategorileri::all();

        return $hastaKategorileris;
    }

    public function store(StoreHastaKategorileriRequest $request)
    {
        return HastaKategorileri::create($request->all());
    }

    public function update(UpdateHastaKategorileriRequest $request, HastaKategorileri $hastaKategorileri)
    {
        return $hastaKategorileri->update($request->all());
    }

    public function show(HastaKategorileri $hastaKategorileri)
    {
        return $hastaKategorileri;
    }

    public function destroy(HastaKategorileri $hastaKategorileri)
    {
        return $hastaKategorileri->delete();
    }
}
