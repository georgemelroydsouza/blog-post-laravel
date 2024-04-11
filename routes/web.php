<?php

use App\Models\Category;
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

    // fetch all categories and pass it to the view
    $categories = Category::select('id', 'name')
                            ->orderby('name', 'ASC')
                            ->get()
                            ->toArray();

    return view('posts.create', [
        'categories' => $categories
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
