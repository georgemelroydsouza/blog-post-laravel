<?php

use App\Models\Post;
use Illuminate\Support\Facades\Route;

// List all posts
Route::get('/', function () {

    $posts = Post::with('category')->with('user')->orderby('created_at', 'DESC')->simplePaginate(3);

    return view('posts.index', [
        'posts' => $posts
    ]);
});

// Display Create Post Form
Route::get('/post/create', function () {

    return view('posts.create');

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
