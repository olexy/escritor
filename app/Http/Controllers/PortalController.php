<?php

namespace App\Http\Controllers;

use App\Category;
use App\Post;
use App\Tag;


use Illuminate\Http\Request;

class PortalController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $search = request()->query('search');

        if($search)
        {
            $posts = Post::where('title', 'LIKE', "%{$search}%")->paginate(4);

        } else {
            $posts = Post::paginate(6);
        }
    
        $latest_post = Post::all()->last();

        $categories_7 = Category::orderBy('id', 'desc')->take(7)->get();

        return view('welcome')
                    ->with('posts', $posts)
                    ->with('categories', Category::all())
                    ->with('tags', Tag::all())
                    ->with('categories_7', $categories_7)
                    ->with('latest_post', $latest_post);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function detailedPage(Post $post)
    {
        $categories_7 = Category::orderBy('id', 'desc')->take(7)->get();
        
        return view('portal.show')
                ->with('post', $post)
                ->with('categories_7', $categories_7)
                ->with('categories', Category::all());
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function categoryPosts(Category $category)
    {
        $categories_7 = Category::orderBy('id', 'desc')->take(7)->get();

        $post = $category->posts()->paginate(4);

        return view('portal.category')
                ->with('categories_7', $categories_7)
                ->with('posts', $post)
                ->with('category', $category)
                ->with('categories', Category::all());
    }

    public function tagPosts(Tag $tag)
    {
        $categories_7 = Category::orderBy('id', 'desc')->take(7)->get();

        $post = $tag->posts()->paginate(4);

        return view('portal.tag')
                ->with('categories_7', $categories_7)
                ->with('posts', $post)
                ->with('tag', $tag)
                ->with('categories', Category::all());
    }

    
}
