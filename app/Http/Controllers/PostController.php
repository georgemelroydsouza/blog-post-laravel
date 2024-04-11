<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\Category;
use Illuminate\Http\Request;

class PostController extends Controller
{
    public function index()
    {
        $posts = Post::with('category')
                        ->with('user')
                        ->orderby('created_at', 'DESC')
                        ->simplePaginate(3);

        return view('posts.index', [
            'posts' => $posts
        ]);
    }

    public function create()
    {
        $categories = Category::select('id', 'name')
                        ->orderby('name', 'ASC')
                        ->get()
                        ->toArray();

        return view('posts.create', [
            'categories' => $categories
        ]);
    }

    public function show(Post $Post)
    {
        return view('posts.show', [
            'post' => $Post
        ]);
    }

    public function store()
    {
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
    }

    public function edit(Post $Post)
    {
        // fetch all categories and pass it to the view
        $categories = Category::select('id', 'name')
                                ->orderby('name', 'ASC')
                                ->get()
                                ->toArray();

        return view('posts.edit', [
            'categories' => $categories,
            'post' => $Post
        ]);
    }

    public function update(Post $Post)
    {
        // validate
        request()->validate([
            'title' => ['required', 'min:3'],
            'description' => ['required', 'min:5']
        ]);

        // authorize
        // save
        $Post->update([
            'category_id' => request('category_id'),
            'title' => request('title'),
            'description' => request('description')
        ]);

        return redirect('/posts/' . $Post->id);
    }

    public function destroy(Post $Post)
    {
        $Post->delete();

        return redirect('/');
    }
}
