<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;
use App\Http\Controllers\HomeController;
use App\Models\Post;
use Illuminate\Support\Facades\Route;
use RealRashid\SweetAlert\Facades\Alert;


class UserController extends Controller
{
    public function add_post(){
        return view('user.add_post');
    }

    public function user_post(Request $request){
        $user = Auth()->user();
        $post = new Post;

        $user_id = $user->id;
        $name = $user->name;
        $user_type = $user->usertype;

        $post->title = $request->title;
        $post->description = $request->description;
        $post->post_status = 'pending';
        $post->user_id =   $user_id;
        $post->name = $name;
        $post->user_type = $user_type;

//////////////////////////////Image Upload////////////////////////////////////////
        $image = $request->image;
        if($image){
        $imagename = time().'.'.$image->getClientOriginalExtension();
        $request->image->move('postimage',$imagename);
        $post->image = $imagename;
        }


        $post->save();

        Alert::success('Success', 'You added the post successfully,
         Wait for admin approval!');

        return redirect()->back();

    }

    public function myposts_user(){
        $user = Auth()->user();
        $user_id = $user->id;
        $post = Post::where('user_id',$user_id)->get();

        return view('user.myposts_user',compact('post'));
    }

    public function delete_post_user($id){
        $post = Post::find($id);
        $post->delete();

        return redirect()->back()->with('message','Post deleted successfully');
    }

    public function edit_post_user($id){
        $post = Post::find($id);

        return view('user.edit_post_user',compact('post'));
    }

    public function update_post_user(Request $request, $id){
        $data = Post::find($id);

        $data->title = $request->title;
        $data->description = $request->description;
        $image = $request->image;
        $data->post_status = 'pending';
        if($image){
        $imagename = time().'.'.$image->getClientOriginalExtension();
        $request->image->move('postimage',$imagename);
        $data->image = $imagename;
        }

        $data->save();

        return redirect()->back()->with('message','Post updated successfully, waiting for admin approval');
    }

    public function aboutpage(){
        return view('user.aboutpage');
    }

    public function goto_about(){
        return view('home.goto_about');
    }

    public function subscribe(){
        Alert::success('Success', 'You have subscribed successfully!');
        return redirect()->back();
    }
}
