<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use App\Models\Post;


class HomeController extends Controller
{
    public function index()
    {
        if(Auth::id()){

            $post = Post::where('post_status','=','active')->get();
            $usertype = Auth()->user()->usertype;

            if($usertype == 'user'){
                return view('user.userhome', compact('post'));
            }
            else if($usertype == 'admin'){
                return view('admin.adminhome');
            }
            else{
                return redirect()->back();
            }
        }
    }



    public function dashboard(){
        $post = Post::where('post_status','=','active')->get();

        return view('home.dashboard', compact('post'));
    }

    public function post(){
        return view('post');
    }

    public function post_details($id){
        $post = Post::find($id);
        return view('home.post_details', compact('post'));
    }




}
