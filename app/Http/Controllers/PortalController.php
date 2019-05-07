<?php

namespace App\Http\Controllers;

use App\Category;
use App\Post;
use App\Tag;


use Illuminate\Http\Request;

class PortalController extends Controller
{
    public function index()
    {
           
        $latest_post = Post::publatest()->latest()->first();

        $breaking_posts = Post::published()->where('category_id', 11)->orderBy('id', 'desc')->take(2)->get();

        $categories_7 = Category::orderBy('id', 'desc')->take(7)->get();

        return view('welcome')
                ->with('posts', Post::searched()->orderBy('published_at', 'desc')->paginate(6))
                ->with('categories', Category::all())
                ->with('tags', Tag::all())
                ->with('categories_7', $categories_7)
                ->with('latest_post', $latest_post)
                ->with('breaking_posts', $breaking_posts);
    }


    public function detailedPage(Post $post)
    {
        $categories_7 = Category::orderBy('id', 'desc')->take(7)->get();
        
        return view('portal.show')
                ->with('post', $post)
                ->with('categories_7', $categories_7)
                ->with('categories', Category::all());
    }


    public function categoryPosts(Category $category)
    {
        $categories_7 = Category::orderBy('id', 'desc')->take(7)->get();

        // $post = $category->posts()->paginate(4);

        return view('portal.category')
                ->with('categories_7', $categories_7)
                ->with('posts', $category->posts()->searched()->paginate(4))
                ->with('category', $category)
                ->with('categories', Category::all());
    }

    public function tagPosts(Tag $tag)
    {
        $categories_7 = Category::orderBy('id', 'desc')->take(7)->get();

        $post = $tag->posts()->searched()->paginate(4);

        return view('portal.tag')
                ->with('categories_7', $categories_7)
                ->with('posts', $post)
                ->with('tag', $tag)
                ->with('categories', Category::all());
    }

    
}
