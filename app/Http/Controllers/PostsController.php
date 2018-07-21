<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Post;
use Auth;
//use DB;(if you want to use sql query)

class PostsController extends Controller
{
     /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth',['except' => ['index', 'show'] ]);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        //$posts = Post::orderBy('title','desc')->get();
        //$posts = Post::orderBy('title','desc')->take(2)->get();
        $posts = Post::orderBy('created_at','desc')->paginate(10);
        return view('posts.index')->with('posts',$posts);
        //$posts =DB::select('SELECT * FROM posts'); "this by using db"
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('posts.create');
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
            'body'  => 'required',
            'cover_image' => 'image|nullable|max:1999'
        ]);
       
        if($request->hasFile('cover_image')){
            // get file name with extention
            $filenameWithExt = $request->file('cover_image')->getClientOriginalName();
            //get just file name
            $filename = pathinfo($filenameWithExt,PATHINFO_FILENAME);
            //get just ext
            $extension = $request->file('cover_image')->getClientOriginalExtension();
            //filename to store
            $fileNameToStore = $filename.'_'.time().'.' .$extension;
            //upload image>
            $path = $request->file('cover_image')->storeAs('public/cover_images',$fileNameToStore);
            } else {
            $fileNameToStore = 'noimage.jpg';
        }

       //create post
        $post = new post;
        $post->title = $request->input('title');
        $post->body = $request->input('body');
        $post->user_id = auth()->user()->id;
        $post->cover_image=$fileNameToStore;
        $post->save();


        return redirect('/posts')->with('success','Post Created');
    }

    /**
     * Display the specified resource.h
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
        $post = post::find($id);
        return view('posts.show')->with('post',$post);

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $post = post::find($id);
        
        // check for correct user 
        
        if(Auth::user()->id !==$post->user_id){
            return redirect('/posts')->with('error','Unauthorized page');
        }

        return view('posts.edit')->with('post',$post);
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
            'body'  => 'required'
        ]);
        if($request->hasFile('cover_image')){
            // get file name with extention
            $filenameWithExt = $request->file('cover_image')->getClientOriginalName();
            //get just file name
            $filename = pathinfo($filenameWithExt,PATHINFO_FILENAME);
            //get just ext
            $extension = $request->file('cover_image')->getClientOriginalExtension();
            //filename to store
            $fileNameToStore = $filename.'_'.time().'.' .$extension;
            //upload image>
            $path = $request->file('cover_image')->storeAs('public/cover_images',$fileNameToStore);
            } 
       //create post
        $post = post::find($id);
        $post->title = $request->input('title');
        $post->body = $request->input('body');
        if($request->hasFile('cover_image')){
            $post->cover_image = $fileNameToStore;
        }
        $post->save();


        return redirect('/posts')->with('success','Post updated');
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

        if(Auth::user()->id !==$post->user_id){
            return redirect('/posts')->with('error','Unauthorized page');
        }
        if($post->cover_image != 'noimage.jpg'){
         //delete image
            Storage::delete('public/cover_images/'.$post->cover_image);
        }
        $post->delete();
        return redirect('/posts')->with('success','Post deleted');

    }
}
