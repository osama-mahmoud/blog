<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function register(Request $request)
    {
        $this->validate($request, [
            'name' => 'required|min:3',
            'email' => 'required|email|unique:users',
            'password' => 'required|min:6',
          //  'is_admin' => 'required',
        ]);
        $filename = '';
        if($request->hasFile('user_img')){
           $filename = time().'.'.$request->user_img->getClientOriginalExtension();
           $request->user_img->move(public_path('image'),$filename);
        }
        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'is_admin' => $request->is_admin,
            'user_img'=> $filename,
            'password' => bcrypt($request->password),
        ]);

        $token = $user->createToken('programingVh')->accessToken;

        return response()->json(['token' => $token], 200);
    }

    /**
     * Handles Login Request
     *
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function login(Request $request)
    {
        $credentials = [
            'email' => $request->email,
            'password' => $request->password
        ];

        if (auth()->attempt($credentials)) {
            $token = auth()->user()->createToken('TutsForWeb')->accessToken;
            return response()->json(['token' => $token], 200);
        } else {
            return response()->json(['error' => 'Incorrect email address or password, please try again'], 401);
        }
    }

    /**
     * Returns Authenticated User Details
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function details()
    {
        return response()->json(['user' => auth()->user()], 200);
    }

    public function allusers()
    {
        $users =  User::latest()->get();
        // dd($category);
         return response()->json($users);
    }

    public function updateUser(Request $request){
        $user = User::find($request->id);
        //  $filename = $user->user_img;
        // if($request->hasFile('user_img')){
        //    $filename = time().'.'.$request->user_img->getClientOriginalExtension();
        //    $request->user_img->move(public_path('image'),$filename);
        // }
      //  $user->name = $request->name;
      //  $user->email =  $request->email;
      //  $user->password =  bcrypt($request->password);
        $user->is_admin = $request->is_admin;
     //   $user->user_img = $filename != '' ? $filename : $user->user_img;
        $user->save();
        return response()->json($user);
    }

    public function deleteUser(Request $request){
        $id = $request->user_ids;
      //  DB::table('posts')->whereIn('id',$ids)->delete();
        $user =  User::find($id);
        $user->posts()->delete();
        $user->comments()->delete();
        $user -> delete();
        return response()->json(['message'=>'deleted']);
     }

     public function addUser(Request $request)
    {
        $this->validate($request, [
            'name' => 'required|min:3',
            'email' => 'required|email|unique:users',
            'password' => 'required|min:6',
            'is_admin' => 'required',
        ]);
        $filename = '';
        if($request->hasFile('user_img')){
           $filename = time().'.'.$request->user_img->getClientOriginalExtension();
           $request->user_img->move(public_path('image'),$filename);
        }
        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'is_admin' => $request->is_admin,
            'user_img'=> $filename,
            'password' => bcrypt($request->password),
        ]);

        $token = auth()->user()->createToken('TutsForWeb')->accessToken;

        return response()->json(['token' => $token], 200);
       // return response()->json($user);
    }
}
