<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Requests\ProductRequest;
use App\Http\Resources\ProductListResource;
use App\Http\Resources\ProductResource;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $perPage = request('per_page', 10);
        $search = request('search', '');
        $sortField = request('sort_field', 'updated_at');
        $sortDirection = request('sort_direction', 'desc');
    
        $query = Product::query()
            ->where('title', 'like', "%{$search}%")
            ->orderBy($sortField, $sortDirection)
            ->paginate($perPage);
    
        return ProductResource::collection($query);
    }    

    /**
     * Store a newly created resource in storage.
     */
    public function store(ProductRequest $request)
    {
        $data = $request->validated();
        $data['created_by'] = $request->user()->id ?? null;
        $data['updated_by'] = $request->user()->id ?? null;

        /** @var \Illuminate\Http\UploadedFile $image */
        $image = $data['image'] ?? null;
        if ($image) {
            $relativePath = $this->saveImage($image);
            $data['image'] = $relativePath;
            $data['image_mime'] = $image->getClientMimeType();
            $data['image_size'] = $image->getSize();
        }

        $product = Product::create($data);

        return new ProductResource($product);
    }

    private function saveImage(UploadedFile $image)
    {
        $path = 'images/' . Str::random();
    
        if (!Storage::disk('public')->exists($path)) {
            Storage::disk('public')->makeDirectory($path, 0755, true);
        }

        $storedFile = Storage::disk('public')->putFileAs($path, $image, $image->getClientOriginalName());

        if (!$storedFile) {
            throw new \Exception("Unable to save file \"{$image->getClientOriginalName()}\"");
        }

        return $storedFile;
    }
    

    /**
     * Display the specified resource.
     */
    public function show(Product $product)
    {
        return new ProductResource($product);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(ProductRequest $request, Product $product)
    {
        $data = $request->validated();
        $data['updated_by'] = $request->user()->id ?? null;

        /** @var \Illuminate\Http\UploadedFile $image */
        $image = $data['image'] ?? null;
        if ($image) {
            $relativePath = $this->saveImage($image);
            $data['image'] = $relativePath;
            $data['image_mime'] = $image->getClientMimeType();
            $data['image_size'] = $image->getSize();

            // If there is an old image, delete it
            if ($product->image) {
                Storage::disk('public')->delete($product->image);
            }
        }

        $product->update($data);

        return new ProductResource($product);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Product $product)
    {
        // Delete image file if exists
        if ($product->image) {
            Storage::disk('public')->delete($product->image);
        }

        $product->delete();
        return response()->noContent();
    }
}
