<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;
use App\Category;
use App\Tag;
use App\User;
use DB;
use App\Http\Requests\Posts\UpdatePostRequest;

class PostsController extends Controller
{


    public function __construct()
    {
        $this->middleware('verifyCategoriesCount')->only(['create', 'store']);
    }


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user_role= auth()->user()->role;
        if($user_role === 'admin'){
            return view('posts.index')->with('posts', Post::orderBy('created_at', 'desc')->paginate(5))->with('users', User::all());
        }elseif($user_role === 'writer'){
            $user_id = auth()->user()->id;
            $posts = Post::orderBy('created_at', 'desc')->where('user_id', $user_id)->paginate(5);
            return view('posts.index')->with('posts', $posts);
        }
        //return view('posts.index')->with('posts', Post::all());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('posts.create')->with('categories', Category::all())->with('tags', Tag::all());
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
            'title' => 'required',
            'description' => 'required',
            'location' => 'required',
            'image' => 'image|nullable|mimes:jpeg,png,jpg,gif,svg|max:1999',
            'category' => 'required'
        ]);

        //Handle file upload
        if($request->hasFile('cover_image')){
            //Get file name with the extension
            $filenameWithExt = $request->file('cover_image')->getClientOriginalName();
            //Get just filename
            $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
            //Get just extension
            $extension = $request->file('cover_image')->getClientOriginalExtension();
            //Filename to store
            $fileNameToStore = $filename.'_'.time().'.'.$extension;
            //Upload image
            $path = $request->file('cover_image')->storeAs('public/cover_images', $fileNameToStore);
        }else{
            $fileNameToStore = 'noimage.jpg';
        }

        $user_id = auth()->user()->id;
        //Create Post
        $post = new Post;
        $post->title = $request->input('title');
        $post->description = $request->input('description');
        $post->location = $request->input('location');
        $post->image = $fileNameToStore;
        $post->user_id = $user_id;
        $post->price = $request->input('price');
        $post->category_id = $request->category;
        $post->save();

        if($request->tags){
            $post->tags()->attach($request->tags);
        }

        return redirect('/posts')->with('success', 'Post created successfully.');
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
        return view('posts.create')->with('post', $post)->with('categories', Category::all())->with('tags', Tag::all());
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdatePostRequest $request, Post $post)
    {
        
        //check if new image
        if($request->hasFile('cover_image')){
            //Get file name with the extension
            $filenameWithExt = $request->file('cover_image')->getClientOriginalName();
            //Get just filename
            $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
            //Get just extension
            $extension = $request->file('cover_image')->getClientOriginalExtension();
            //Filename to store
            $fileNameToStore = $filename.'_'.time().'.'.$extension;
            //Upload image
            $path = $request->file('cover_image')->storeAs('public/cover_images', $fileNameToStore);
            //delete old one
            //Storage::delete('public/cover_images/'.$post->image);
            $post->deleteImage();
        }
        
        if($request->tags){
            $post->tags()->sync($request->tags);
        }

        //update attributes
        //$post = Post::find($id);
        $post->title = $request->input('title');
        $post->description = $request->input('description');
        $post->location = $request->input('location');
        if($request->hasFile('cover_image')){
            $post->image = $fileNameToStore;
        }
        $post->price = $request->input('price');
        $post->category_id = $request->category;
        $post->save();
        //flash message
        session()->flash('success', 'Post updated successfully.');
        //redirect
        return redirect(route('posts.index'));
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
            if($post->image != 'noimage.jpg'){
                //Storage::delete('public/cover_images/'.$post->image);
                $post->deleteImage();
            }
            $post->forceDelete();
            session()->flash('success', 'Post deleted successfully.');
        }else{
            $post->delete();
            session()->flash('success', 'Post trashed successfully.');
        }


        return redirect(route('posts.index'));
    }

    /**
     * Display a list of all trashed posts
     *
     * 
     * @return \Illuminate\Http\Response
     */
    public function trashed(){

        
        $trashed = Post::onlyTrashed()->orderBy('created_at', 'desc')->paginate(5);

        $user_role= auth()->user()->role;
        if($user_role === 'admin'){
            return view('posts.index')->with('posts', $trashed)->with('users', User::all());
        }elseif($user_role === 'writer'){
            $user_id = auth()->user()->id;
            $trash = Post::onlyTrashed()->where('user_id', $user_id)->paginate(5);
            return view('posts.index')->with('posts', $trash);
        }




        //return view('posts.index')->with('posts', $trashed)->with('users', User::all());
    }


    public function restore($id){

        $post = Post::withTrashed()->where('id', $id)->firstOrFail();
        $post->restore();

        session()->flash('success', 'Post restored successfully.');

        return redirect()->back();

    }
}
