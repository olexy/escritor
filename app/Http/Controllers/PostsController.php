<?php

namespace App\Http\Controllers;

use App\Category;
use App\Post;
use App\Tag;
Use Session;

use Illuminate\Http\Request;
use App\Http\Requests\Posts\CreatePostsRequest;
use App\Http\Requests\Posts\UpdatePostRequest;


class PostsController extends Controller
{
    // public function _construct()
    // {
    //     $this->middleware('verifyCategoriesCount')->only(['create', 'store']);
    // }
   
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
            'slug' => str_slug($request->title),
            'user_id' => auth()->user()->id
        ]);

        if($request->tags){
            $post->tags()->attach($request->tags);
        }        

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
    public function edit(Post $post)
    {
        // $post = Post::find($id);

        $categories = Category::all();
        $tags = Tag::all();

        return view('admin.posts.create')
                    ->with('post', $post)                     
                    ->with('categories', $categories)
                    ->with('tags', $tags);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdatePostRequest $request, $id)
    {
        $post = Post::find($id);

        if($request->hasFile('image_link'))
        {
            $image = $request->image_link->store('posts');
            $post->deleteImage();
            $post->image_link = 'storage/'. $image;
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

        return redirect()->route('posts.index');      
       
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
            $post->deleteImage();
            $post->forceDelete();
        } else {
            $post->delete();
        }

        Session::flash('success', 'Post deleted successfully');

        return redirect()->back();
    }

    public function trashed()
    {
        $trashed = Post::onlyTrashed()->get();

        return view('admin.posts.index')->withPosts($trashed);
    }

    public function restore($id)
    {
        $post = Post::onlyTrashed()->where('id', $id)->firstOrFail();

        $post->restore();

        Session::flash('success', 'Post successfully restored');
      
        return redirect()->route('posts.index'); 
    }

    
}
