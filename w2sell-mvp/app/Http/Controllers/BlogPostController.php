<?php

namespace App\Http\Controllers;

use App\Http\Requests\BlogPostRequest;
use App\Http\Resources\BlogPostResource;
use App\Models\BlogPost;
use Illuminate\Support\Carbon;

class BlogPostController extends Controller
{
    public function index()
    {
        return BlogPostResource::collection(BlogPost::all());
    }

    public function indexPage()
    {
        $posts = BlogPost::with('blogCategory')->where('published_at', '<=', Carbon::now())->latest('published_at')->whereIsPublished(true)->get();
        $popularPosts = BlogPost::with('blogCategory')->where('published_at', '<=', Carbon::now())->latest('published_at')->whereIsPublished(true)->take(3)->get();
        $categoryNames =$posts
            ->pluck('blogCategory.name','blogCategory.slug')
            ->unique()
            ->toArray();
        return view('agency.blog.index', compact('posts', 'categoryNames', 'popularPosts'));
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
