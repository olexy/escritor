<?php

namespace App\Http\Controllers;

use App\Category;
use App\Post;
use App\Tag;
Use Session;

use Illuminate\Http\Request;

class PostsController extends Controller
{
   
    public function index()
    {
        return view('admin.posts.index')->with('posts', Post::all());
    }


    public function create()
    {
        
        $categories = Category::all();
        $tags = Tag::all();

        if($categories->count() == 0)
        {
            Session::flash('info', 'You must have a category to post');

            return redirect()->back();
        }

        return view('admin.posts.create')->with('categories', $categories)
                                        ->with('tags', $tags);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
       
        $this->validate($request, [
            'title' => 'required|max:255',
            'category_id' => 'required',
            'content' => 'required',
            'image_link' => 'required|image',
            'tags' => 'required'
        ]);

        //  Dd($request->all());

        $image = $request->image_link;
        $image_new_name = time().$image->getClientOriginalName();

        $image->move('uploads/posts', $image_new_name);


        // $post = new Post;

        // This one below works without setting mass assignment exception

        // $post->title = $request->title;
        // $post->category_id = $request->category_id;
        // $post->content = $request->content;
        // $post->image_link = 'uploads/posts'. $image_new_name;

        // This one below mass assignment exception

        $post = Post::create([
            'title' =>  $request->title,
            'category_id' =>  $request->category_id,
            'content' => $request->content,
            'image_link' => 'uploads/posts/'. $image_new_name,
            'slug' => str_slug($request->title)
        ]);

        $post->tags()->attach($request->tags);

        Session::flash('success', 'Post created successfully!');

        return redirect()->back();


    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $post = Post::find($id);

        $categories = Category::all();
        $tags = Tag::all();

        return view('admin.posts.edit')->with('post', $post)                     ->with('categories', $categories)
                            ->with('tags', $tags);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'title' => 'required|max:255',
            'category_id' => 'required',
            'content' => 'required',
            'tags' => 'required'
        ]);

        $post = Post::find($id);

        // Dd($post);

        if($request->hasFile('image_link'))
        {
            $image = $request->image_link;
            $image_new_name = time().$image->getClientOriginalName();
            $image->move('uploads/posts', $image_new_name);

            $post->image_link = 'uploads/posts/'. $image_new_name;
        }  
        
        $post->title = $request->title;
        $post->category_id = $request->category_id;
        $post->content = $request->content;
        $post->slug = str_slug($request->title);

        $post->update();

        $post->tags()->sync($request->tags);;

        Session::flash('success', 'Post updated successfully!');

        return redirect()->route('posts');      
       
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $post = Post::find($id);
        $post->delete();

        Session::flash('success', 'Post successfully trashed!');

        return redirect()->back();
    }

    public function trashed()
    {
        $posts = Post::onlyTrashed()->get();
        //Dd($post);

        return view('admin.posts.trash')->with('posts', $posts);
    }

    public function restore($id)
    {
        $post = Post::withTrashed()->where('id', $id)->first();
        $post->restore();

        Session::flash('success', 'Post successfully restored');
      
        return redirect()->route('posts'); 
    }

    public function permDelete($id)
    {
        $post = Post::withTrashed()->where('id', $id)->first();
        //Dd($post);
        $post->forceDelete();
        
        Session::flash('success', 'Post permanently deleted');

        return redirect()->back();
       
    }
}
