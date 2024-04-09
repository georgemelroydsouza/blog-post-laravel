<?php

use App\Models\Post;
use Illuminate\Support\Facades\Route;

// List all posts
Route::get('/', function () {

    $posts = Post::with('category')->with('user')->orderby('created_at', 'DESC')->get();

    return view('posts.index', [
        'posts' => $posts
    ]);
});

// Show
Route::get('/post/{id}', function ($id) {

    $post = Post::findOrFail($id);

    return view('posts.show', [
        'post' => $post
    ]);

});

Route::get('/about', function () {
    return view('about');
});
