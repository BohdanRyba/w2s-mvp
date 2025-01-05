<?php

namespace App\Http\Controllers\Agency;

use App\Http\Controllers\Controller;
use App\Models\BlogPost;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;

class HomepageController extends Controller
{
    public function index(Request $request)
    {
        $posts = BlogPost::with('blogCategory')->where('published_at', '<=', Carbon::now())->latest('published_at')->whereIsPublished(true)->take(4)->get();

        return view('agency.index', compact('posts'));
    }
}
