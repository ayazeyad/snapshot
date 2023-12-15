<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProductSearchRequest;
use App\Http\Resources\ProductResource;
use App\Models\Product;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\AnonymousResourceCollection;

class ProductController extends Controller
{
    public function getProductsByCategory(Request $request, $category): JsonResponse|AnonymousResourceCollection
    {
        $allowedCategories = ['Cameras', 'Lenses', 'cleaners', 'Mikes', 'accessories'];
        if (!in_array($category, $allowedCategories)) {
            return response()->json(['error' => 'Invalid category'], 400);
        }

        $products = Product::query()->where('category', $category)->get();

        return ProductResource::collection($products);
    }

    public function search(ProductSearchRequest $request): AnonymousResourceCollection
    {
        $query = $request->input('query');

        $products = Product::query()->where('name', 'like', "%$query%")
            ->orWhere('description', 'like', "%$query%")
            ->get();

        return ProductResource::collection($products);
    }

}
