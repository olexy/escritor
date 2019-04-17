<?php

namespace App\Http\Controllers;

use App\Category;
use App\Post;
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

        if($categories->count() == 0)
        {
            Session::flash('info', 'You must have a category to post');

            return redirect()->back();
        }

        return view('admin.posts.create')->with('categories', $categories);
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
            'image_link' => 'required|image'
        ]);

        //  Dd($request->all());

        $image = $request->image_link;
        $image_new_name = time().$image->getClientOriginalName();

        $image->move('uploads/posts', $image_new_name);


        // $post = new Post;

        // $post->title = $request->title;
        // $post->category_id = $request->category_id;
        // $post->content = $request->content;
        // $post->image_link = 'uploads/posts'. $image_new_name;

        // THIS THROWS mass assignment exception

        $post = Post::create([
            'title' =>  $request->title,
            'category_id' =>  $request->category_id,
            'content' => $request->content,
            'image_link' => 'uploads/posts/'. $image_new_name,
            'slug' => str_slug($request->title)
        ]);

        $post->save();

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
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
