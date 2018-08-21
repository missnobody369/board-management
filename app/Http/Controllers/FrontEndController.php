<?php

namespace App\Http\Controllers;

use App\Post;
use App\Category;
use App\Settings;
use Illuminate\Http\Request;

class FrontEndController extends Controller
{
    public function index() {
        return view('index')
                ->with('title', Settings::first()->site_name)
                ->with('categories', Category::take(5)->get())
                ->with('first_post', Post::orderBy('created_at', 'desc')->first())
                ->with('second_post', Post::orderBy('created_at', 'desc')->skip(1)->take(1)->get()->first())
                ->with('third_post', Post::orderBy('created_at', 'desc')->skip(2)->take(1)->get()->first())
                ->with('Photoshop', Category::find(3))
                ->with('InDesign', Category::find(6))
                ->with('settings', Settings::first());
    }

    public function singlePost($slug) {
        $post = Post::where('slug', $slug)->first();

        return view('single')->with('post', $post)
                             ->with('title', $post->title)
                             ->with('settings', Settings::first())
                             ->with('categories', Category::take(5)->get());
    }
}
