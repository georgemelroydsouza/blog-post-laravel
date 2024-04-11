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
Route::get('/posts/create', function () {

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
Route::get('/posts/{id}', function ($id) {

    $post = Post::findOrFail($id);

    return view('posts.show', [
        'post' => $post
    ]);

});

// Store
Route::post('/posts', function () {
    // validate
    request()->validate([
        'title' => ['required', 'min:3'],
        'description' => ['required', 'min:5']
    ]);

    // authorize

    // save
    Post::create([
        'category_id' => request('category_id'),
        'title' => request('title'),
        'description' => request('description'),
        'user_id' => 1
    ]);

    return redirect('/');

});

// Edit
Route::get('/posts/{id}/edit', function ($id) {

    // fetch all categories and pass it to the view
    $categories = Category::select('id', 'name')
                            ->orderby('name', 'ASC')
                            ->get()
                            ->toArray();

    $post = Post::findOrFail($id);

    return view('posts.edit', [
        'categories' => $categories,
        'post' => $post
    ]);

});

// Update
Route::patch('/posts/{id}', function ($id) {

    // validate
    request()->validate([
        'title' => ['required', 'min:3'],
        'description' => ['required', 'min:5']
    ]);

    // authorize

    // save
    Post::findOrFail($id)->update([
        'category_id' => request('category_id'),
        'title' => request('title'),
        'description' => request('description')
    ]);

    return redirect('/posts/' . $id);
});

// Destroy

Route::get('/about', function () {
    return view('about');
});
