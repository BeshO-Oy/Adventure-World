<?php

namespace App\Http\Controllers;
use App\Models\Post;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Teams;

class AdminController extends Controller
{
    public function post_page(){
        return view('admin.post_page');
    }

    public function add_post(Request $request){

        $user = Auth()->user();
        $post = new Post;

        $user_id = $user->id;
        $name = $user->name;
        $user_type = $user->usertype;

        $post->title = $request->title;
        $post->description = $request->description;
        $post->post_status = 'active';
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

        return redirect()->back()->with('message','Post Added Successfully');
    }

    public function show_post(){
        $post = Post::all();
        return view('admin.show_post', compact('post'));
    }

    public function delete_post($id){
        $post = Post::find($id);
        $post->delete();
        return redirect()->back()->with('message','Post Deleted Successfully');
    }

    public function edit_post($id){
        $post = Post::find($id);

        return view('admin.edit_post', compact('post'));
    }

    public function update_post(Request $request, $id){
        $data = Post::find($id);

        $data->title = $request->title;
        $data->description = $request->description;
        $image = $request->image;
        if($image){
        $imagename = time().'.'.$image->getClientOriginalExtension();
        $request->image->move('postimage',$imagename);
        $data->image = $imagename;
        }

        $data->save();
        return redirect()->back()->with('message','Post Updated Successfully');
    }


    public function approve_post($id){
        $post = Post::find($id);
        if($post->post_status == 'active'){
            return redirect()->back()->with('message','Post Was Already Approved');
        }

        else{
            $post->post_status = 'active';
            $post->save();
            return redirect()->back()->with('message','Post Approved Successfully');
        }
    }

    public function admin_teams(){
        $teams = Teams::all();

        return view('admin.admin_teams' , compact('teams'));
    }

    public function delete_user($id){
        $user = User::find($id);
        $user->delete();
        return redirect()->back()->with('message','User Deleted Successfully');
    }

    public function edit_user($id){
        $user = User::find($id);
        return view('admin.edit_user', compact('user'));
    }

    public function update_user(Request $request, $id){
        $data = User::find($id);

        $data->name = $request->name;
        $data->email = $request->email;

        $image = $request->image;
        if($image){
        $imagename = time().'.'.$image->getClientOriginalExtension();
        $request->image->move('userimage',$imagename);
        $data->image = $imagename;
        }
        $data->save();
        return redirect()->back()->with('message','User Updated Successfully');
    }

    public function add_teams(){
        return view('admin.add_teams');
    }

    public function create_team(Request $request){
        $teams = new Teams;
        $teams->name = $request->name;
        $teams->position = $request->position;

//////////////////////////////Image Upload////////////////////////////////////////
        $image = $request->image;
        if($image){
        $imagename = time().'.'.$image->getClientOriginalExtension();
        $request->image->move('teamimage',$imagename);
        $teams->image = $imagename;
        }

        $teams->save();

        return redirect()->back()->with('message','Team Added Successfully');
    }


    public function delete_teams($id){
        $teams = Teams::find($id);
        $teams->delete();
        return redirect()->back()->with('message','Team Deleted Successfully');
    }

    public function edit_teams($id){
        $teams = Teams::find($id);
        return view('admin.edit_teams', compact('teams'));
    }

    public function update_teams(Request $request, $id){
        $data = Teams::find($id);

        $data->name = $request->name;
        $data->position = $request->position;

        $image = $request->image;
        if($image){
        $imagename = time().'.'.$image->getClientOriginalExtension();
        $request->image->move('teamimage',$imagename);
        $data->image = $imagename;
        }

        $data->save();
        return redirect()->back()->with('message','Team Updated Successfully');
    }


}
?>
