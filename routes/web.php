<?php

use App\Models\Post;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {

    $posts = Post::orderby('created_at', 'DESC')->get();

    return view('home', [
        'posts' => $posts
    ]);
});

Route::get('/post/{id}', function ($id) {

    $post = Post::find($id);

    if (! $post) {
        abort(404);
    }

    return view('post', [
        'post' => $post
    ]);

});

Route::get('/about', function () {
    return view('about');
});
