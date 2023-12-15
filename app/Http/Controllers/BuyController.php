<?php

namespace App\Http\Controllers;

use App\Http\Requests\BuyRequest;
use App\Http\Requests\CartRequest;
use App\Http\Resources\BuyResource;
use App\Models\buy;
use Illuminate\Http\Request;

class BuyController extends Controller
{
    public function store(BuyRequest $request): BuyResource
    {
        $validatedData = $request->validated();

        $buy = Buy::query()->create($validatedData);

        return new BuyResource($buy);
    }
}
