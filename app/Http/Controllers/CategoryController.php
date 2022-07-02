<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\Category;
use App\Http\Requests\StoreCategoryRequest;
use App\Http\Requests\UpdateCategoryRequest;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    // public function __construct(){
    //     $this->middleware('admin');
    // }
    public function index()
    {
        $category =  Category::latest()->get();
       // dd($category);
        return response()->json($category);

    }

    public function addCategory(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'slug' => 'required',
            ]);
       $category = Category::create([
           'name'=>$request->name,
           'slug'=>$request->slug,
       ]);
       return response()->json($category);

    }

    public function updateCategory(Request $request)
    {
        $category = Category::find($request->id);
        $category->name = $request->name;
        $category->slug =  $request->slug;
        $category->save();
        return response()->json($category);

    }

    public function deleteCategory(Request $request)
    {
          $id = $request->category_ids;
          $category =  Category::find($id);
          $category -> posts() -> delete();
          $category -> delete();
          return response()->json(['message'=>'deleted']);

    }

    public function categoryposts($slug){
    $categoryPosts = Category::with('posts')->where('slug', '=', $slug)->get();
    foreach ($categoryPosts as $post) {
       $categoryPosts = $post->posts;
    }
    return response()->json($categoryPosts);
    }
}
