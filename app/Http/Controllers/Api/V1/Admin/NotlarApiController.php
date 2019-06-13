<?php

namespace App\Http\Controllers\Api\V1\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreNotlarRequest;
use App\Http\Requests\UpdateNotlarRequest;
use App\Notlar;

class NotlarApiController extends Controller
{
    public function index()
    {
        $notlars = Notlar::all();

        return $notlars;
    }

    public function store(StoreNotlarRequest $request)
    {
        return Notlar::create($request->all());
    }

    public function update(UpdateNotlarRequest $request, Notlar $notlar)
    {
        return $notlar->update($request->all());
    }

    public function show(Notlar $notlar)
    {
        return $notlar;
    }

    public function destroy(Notlar $notlar)
    {
        return $notlar->delete();
    }
}
