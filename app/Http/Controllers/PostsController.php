<?php

namespace App\Http\Controllers;


use Session;
use App\Tag;
use App\Post;
use App\Category;
use Illuminate\Http\Request;

class PostsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // To view all post available and created
        return view ('admin.posts.index')->with('posts', Post::all());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        $categories = Category::all();

        if($categories->count() == 0){
            // Must have a categories before creating post
            Session::flash('info', 'You must have some categories created first in order to proceed.');

            return redirect()->back();
        }
        // Return a particular view create post
        // Passing all categories
        return view('admin.posts.create')->with('categories', $categories)
                                         ->with('tags', Tag::all()); //Location of the file (directory)
        
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // Define on how post being stored
        // Validate data
        $this->validate($request,[
            // Receiving an array of the rules use to validate
            'title' => 'required',
            'featured' => 'required|image',
            'content' => 'required',
            'category_id' => 'required',
            'tags' => 'required'
        ]);

        // dd($request->all());

        $featured = $request->featured;

        $featured_new_name = time().$featured->getClientOriginalName();

        $featured->move('uploads/posts', $featured_new_name);

        $post = Post::create([
            'title' => $request->title,
            'content' => $request->content,
            'featured' => 'uploads/posts/' . $featured_new_name,
            'category_id' => $request->category_id,
            'slug' => str_slug($request->title)// Create new Laravel 5.3 project (slug ver) project ===> create-new-laravel-5-3-project
        ]);

        // Attach tags
        $post->tags()->attach($request->tags);

        Session::flash('success','Post Create Successfully!.');

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

        return view('admin.posts.edit')->with('post', $post)
                                       ->with('categories',Category::all())
                                       ->with('tags', Tag::all());
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
            'title' => 'required',
            'content' => 'required',
            'category_id' => 'required'
        ]);

        // Find the posts
        $post = Post::find($id);

        // Check if user uploaded an image
        if($request->hasFile('featured')){
            // Upload file image
            $featured = $request->featured;
            // Make unique name for the file
            $featured_new_name = time() . $featured->getClientOriginalName();
            // Move file to uploads folder
            $featured->move('uploads/posts', $featured_new_name);
            // Update the fields
            $post->featured = 'uploads/posts/'.$featured_new_name;
        }

        // If request doesnt have a file
        $post->title = $request->title;
        $post->content = $request->content;
        $post->category_id = $request->category_id;

        // Save the posts
        $post->save();

        // Call the tags & attached new tags
        $post->tags()->sync($request->tags);

        Session::flash('success','The Post has been updated successfully!.');

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

        Session::flash('success', 'The post was just trashed.');

        return redirect()->back();
    }


    // Method for retrieving trashed post
    public function trashed() {
        $posts = Post::onlyTrashed()->get();
        
        return view('admin.posts.trashed')->with('posts', $posts);
    }

    // Method for permanently delete post
    public function kill($id) {
        $post = Post::withTrashed()->where('id', $id)->first();

        $post->forceDelete();

        Session::flash('success', 'Post Delete Successfully!.');

        return redirect()->back();
    }

    // Restoring all trashed posts
    public function restore($id){
        $post = Post::withTrashed()->where('id',$id)->first();

        $post->restore();

        Session::flash('success', 'Post has been restored successfully.');

        return redirect()->route('posts');
    }
}
