<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;
use App\Models\Category;
use App\Models\User;
use App\Models\Setting;
use App\Models\Comment;
use Auth;

class AdminController extends Controller
{
    public function __construct(){
        $this->middleware('admin');
    }
    public function getPosts(){
        $posts = Post::with('category')->get();
        return response()->json($posts);
    }
    public function addPost(Request $request){
            $request->validate([
            'title' => 'required',
            'slug' => 'required',
            'body' => 'required',
            'category' => 'required',
            'image' => 'required',
            ],
        [
            'category.required' => 'The category field is required.',
            'body.required' => 'The description field is required.'
        ]);

        $filename = '';
       if($request->hasFile('image')){
          $filename = time().'.'.$request->image->getClientOriginalExtension();
          $request->image->move(public_path('image'),$filename);
       }
       $post = Post::create([
           'title'=>$request->title,
           'slug'=>$request->slug,
           'body'=>$request->body,
           'category_id'=>$request->category,
           'user_id'=>Auth::id(),
           'image'=>$filename,
       ]);
       return response()->json($post);
   }
   public function deletePosts(Request $request){
    $id = $request->posts_ids;
  //  DB::table('posts')->whereIn('id',$ids)->delete();
    $post =  Post::find($id);
    $post -> comments() -> delete();
    $post -> delete();
    return response()->json(['message'=>'deleted']);
 }
 public function updatePost(Request $request){
    $post = Post::find($request->id);
     $filename = $post->image;
    if($request->hasFile('image')){
       $filename = time().'.'.$request->image->getClientOriginalExtension();
       $request->image->move(public_path('image'),$filename);
    }

    $post->title = $request->title;
    $post->slug =  $request->slug;
    $post->body =  $request->body;
    $post->category_id = $request->category;
    $post->image = $filename != '' ? $filename : $post->image;
    $post->save();
    return response()->json($post);
}

public function getCategories(){
    $categories  = Category::all();
    return response()->json($categories);
}

public function getStatistics(){
    $categories  = Category::count();
    $posts  =      Post::count();
    $users  =      User::count();
    $comments  =      Comment::count();

    return response()->json([
        'users' => $users,
        'categories' => $categories,
        'posts' => $posts,
        'comments' => $comments
    ]);
}

public function settings(Request $request){
     $settings = Setting::find($request->id);
     $filename = $settings->image;
    if($request->hasFile('image')){
       $filename = time().'.'.$request->image->getClientOriginalExtension();
       $request->image->move(public_path('image'),$filename);
    }

    $settings->site_name = $request->site_name;
    $settings->contact_email =  $request->contact_email;
    $settings->address =  $request->address;
    $settings->phone_number = $request->phone_number;
    $settings->image = $filename != '' ? $filename : $settings->image;
    $settings->save();
    return response()->json($settings);
}


}
