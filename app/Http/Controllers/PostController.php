<?php

namespace App\Http\Controllers;

use App\Models\feedback;
use App\Models\Post;




use Illuminate\Http\Request;

class PostController extends Controller
{
    //
    public function index(){
        // $posts = Post::select(
        //     "posts.id",
        //     "posts.title", 
        //     "posts.description",
        //     "posts.image",
        //     "posts.category_id"
        // )
        // ->where('id', '=', 'user_id') // Correct the comparison here
        // ->get();
    
        // $posts = Post::select(
        //     "posts.id",
        //     "posts.title", 
        //     "posts.description",
        //     "posts.image", 
        //     "category_name"
        // )
        // ->leftJoin("categories", "categories.id", "=", "posts.category_id")
        // ->get();
        // dd($posts);
        $posts = Post::where('user_id','=', auth()->user()->id)->get();
        // $posts =Post::get();
         return view('dashboard', compact('posts'));
        
        // // dd($posts);
        // return view('dashboard', compact('posts'));

    }
    public function create(){
        return view('create');

    }
    public function store(Request $request){
        $request->validate([
            'title'=> 'required',
            'description'=> 'required',
            'category'=> 'required',
            'image'=>'required|mimes:jpeg,jpg,png,gif|max:10000'
        ]);
        // dd($request->all());
        $imagename = time().'.'.$request->image->extension();
        $request->image->move(public_path('post'),$imagename);
        // dd($imagename);
        $post = new Post();
        $post->image = $imagename;
        $post->title= $request->title;
        $post->description = $request->description;
        $post->user_id=auth()->user()->id;
        $post->category_name=$request->category;
        $post->save();
        
        return back()->withSuccess('Blog posted Successful!!');

    }
    public function edit($id){
        $post = Post::where('id',$id)->first();
        return view('postedit',compact('post'));

    }
    public function update(Request $request, $id){
        $request->validate([
            'title'=> 'required',
            'description'=> 'required',
            'category'=> 'required',
            'image'=>'required|mimes:jpeg,jpg,png,gif|max:10000'
        ]);
        $post = Post::where('id',$id)->first();
        
        if(isset($request->image)){
            $imagename = time().'.'.$request->image->extension();
            $request->image->move(public_path('post'),$imagename);
            $post->image = $imagename;

        }

        $post->title= $request->title;
        $post->description = $request->description;
        $post->user_id=auth()->user()->id;
        $post->category_id=$request->category;
        $post->save();
        return back()->withSuccess('Blog Updated Successful!!');



    }
    public function destory($id){
        $post = Post::where('id',$id)->first();
        $post->delete();
        return redirect('dashboard')->withSuccess('Post Deleted Successfully!');


    }
    public function show(){
        $posts = Post::all(); // Use "all()" to retrieve all records
        // dd($posts);
        return view('home', compact('posts'));

    }
    public function save(Request $request){
        
        $request->validate([
            'name' => 'required',
            'email' => 'required',
            'feedback' => 'required'
        ]);
        $feedback = new feedback();
        $feedback ->name = $request-> name;
        $feedback ->email = $request->email;
        $feedback->feedback = $request->feedback;
        $feedback->save();
        // dd($feedback);
        return redirect('/home');

    }
}
