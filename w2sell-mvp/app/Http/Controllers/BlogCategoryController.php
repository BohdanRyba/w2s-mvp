<?php

namespace App\Http\Controllers;

use App\Http\Requests\BlogCategoryRequest;
use App\Http\Resources\BlogCategoryResource;
use App\Models\BlogCategory;

class BlogCategoryController extends Controller
{
    public function index()
    {
        return BlogCategoryResource::collection(BlogCategory::all());
    }

    public function store(BlogCategoryRequest $request)
    {
        return new BlogCategoryResource(BlogCategory::create($request->validated()));
    }

    public function show(BlogCategory $blogCategory)
    {
        return new BlogCategoryResource($blogCategory);
    }

    public function update(BlogCategoryRequest $request, BlogCategory $blogCategory)
    {
        $blogCategory->update($request->validated());

        return new BlogCategoryResource($blogCategory);
    }

    public function destroy(BlogCategory $blogCategory)
    {
        $blogCategory->delete();

        return response()->json();
    }
}
