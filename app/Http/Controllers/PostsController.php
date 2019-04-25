<?php

namespace App\Http\Controllers;

use App\Category;
use App\Post;
use App\Tag;
Use Session;

use Illuminate\Http\Request;
use App\Http\Requests\Posts\CreatePostsRequest;

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
    public function store(CreatePostsRequest $request)
    {
        $image = $request->image_link->store('posts');

        $post = Post::create([
            'title' =>  $request->title,
            'category_id' =>  $request->category_id,
            'description' =>  $request->description,
            'content' => $request->content,
            'image_link' => 'storage/'. $image,
            'published_at' => $request->published_at,
            'slug' => str_slug($request->title)
        ]);

        $post->tags()->attach($request->tags);

        Session()->flash('success', 'Post created successfully!');

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
            'description' => 'required',
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
        $post->description = $request->description;
        $post->content = $request->content;
        $post->published_at = $request->published_at;
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
        $post = Post::withTrashed()->where('id', $id)->firstOrFail();

        if($post->trashed()){
            $post->forceDelete();
        } else {
            $post->delete();
        }

        Session::flash('success', 'Post deleted successfully');

        return redirect()->back();
    }

    public function trashed()
    {
        // $posts = Post::onlyTrashed()->get();
        // //Dd($post);

        // return view('admin.posts.trash')->withPosts($posts);

        $trashed = Post::withTrashed()->get();

        return view('admin.posts.index')->withPosts($trashed);
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
