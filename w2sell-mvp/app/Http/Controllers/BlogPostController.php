<?php

namespace App\Http\Controllers;

use App\Http\Requests\BlogPostRequest;
use App\Http\Resources\BlogPostResource;
use App\Models\BlogPost;

class BlogPostController extends Controller
{
    public function index()
    {
        return BlogPostResource::collection(BlogPost::all());
    }

    public function store(BlogPostRequest $request)
    {
        return new BlogPostResource(BlogPost::create($request->validated()));
    }

    public function show(BlogPost $blogPost)
    {
        return new BlogPostResource($blogPost);
    }

    public function update(BlogPostRequest $request, BlogPost $blogPost)
    {
        $blogPost->update($request->validated());

        return new BlogPostResource($blogPost);
    }

    public function destroy(BlogPost $blogPost)
    {
        $blogPost->delete();

        return response()->json();
    }
}
