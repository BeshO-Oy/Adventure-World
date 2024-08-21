<?php

namespace App\Http\Controllers;
use App\Models\Post;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Teams;
use App\Models\Job_Category;
use App\Models\Job_Position;
use App\Models\Service_Category;
use App\Models\Service;
use Illuminate\Support\Facades\DB;


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

    public function job_category(){
        $category = Job_Category::all();
        return view('admin.job_category' , compact('category'));
    }

    public function delete_category($id){
        $category = Job_Category::find($id);
        $category->delete();
        return redirect()->back()->with('message','Category Deleted Successfully');
    }

    public function add_category(){
        return view('admin.add_category');
    }

    public function create_category(Request $request){
        $category = new Job_Category;
        $category->title = $request->title;
        $category->save();
        return redirect()->back()->with('message','Category Added Successfully');
    }

    public function job_position(){
        $position = Job_Position::all();
        $category = Job_Category::all();


        return view('admin.job_position' , compact('position') , compact('category'));
    }

    public function delete_position($id){
        $position = Job_Position::find($id);
        $position->delete();
        return redirect()->back()->with('message','Position Deleted Successfully');
    }

    public function add_position(){
        $category = Job_Category::all();
        return view('admin.add_position', compact('category'));
    }

    public function edit_position($id){
        $position = Job_Position::find($id);
        $category = Job_Category::all();
        return view('admin.edit_position', compact('position'), compact('category'));
    }

    public function update_position(Request $request, $id){


        $data = Job_Position::find($id);
        $category = Job_Category::all();

        $data->title = $request->title;
        $data->description = $request->description;
        $data->submission_date = $request->submission_date;
        $data->deadline = $request->deadline;
        $data->number_of_vacancies = $request->number_of_vacancies;



        $data->job_category_id = $request ->job_category_id;

        $data->save();
        return redirect()->back()->with('message','Position Updated Successfully')->with('category',$category);

    }


    public function create_position(Request $request){
        $position = new Job_Position;
        $category = Job_Category::all();
        $position->id = $request->id;
        $position->title = $request->title;
        $position->description = $request->description;
        $position->submission_date = $request->submission_date;
        $position->deadline = $request->deadline;
        $position->number_of_vacancies = $request->number_of_vacancies;
        $position->job_category_id = $request->job_category_id;

        $position->save();
        return redirect()->back()->with('message','Position Added Successfully');
    }

    public function service_category(){
        $service_category = Service_Category::all();
        return view('admin.service_category' , compact('service_category'));
    }

    public function delete_service_category($id){
        $service_category = Service_Category::find($id);
        $service_category->delete();
        return redirect()->back()->with('message','Service Category Deleted Successfully');
    }

    public function add_service_category(){
        return view('admin.add_service_category');
    }

    public function create_service_category(Request $request){
        $service_category = new Service_Category;
        $service_category->title = $request->title;
        $service_category->save();
        return redirect()->back()->with('message','Service Category Added Successfully');
    }

    public function edit_service_category($id){
        $service_category = Service_Category::find($id);
        return view('admin.edit_service_category', compact('service_category'));
    }

    public function update_service_category(Request $request, $id){
        $data = Service_Category::find($id);

        $data->title = $request->title;
        $data->save();
        return redirect()->back()->with('message','Service Category Updated Successfully');
    }

    public function service(){
        $service = Service::all();
        $service_category = Service_Category::all();
        return view('admin.service' , compact('service') , compact('service_category'));
    }

    public function delete_service($id){
        $service = Service::find($id);
        $service->delete();
        return redirect()->back()->with('message','Service Deleted Successfully');
    }

    public function add_service(){
        $service_category = Service_Category::all();
        return view('admin.add_service', compact('service_category'));
    }

    public function create_service(Request $request){
        $service = new Service;
        $service->title = $request->title;
        $service->description = $request->description;
        $image = $request->image;
        if($image){
        $imagename = time().'.'.$image->getClientOriginalExtension();
        $request->image->move('serviceimage',$imagename);
        $service->image = $imagename;
        }
        $service->service_category_id = $request->service_category_id;
        $service->save();
        return redirect()->back()->with('message','Service Added Successfully');
    }

    public function edit_service($id){
        $service = Service::find($id);
        $service_category = Service_Category::all();
        return view('admin.edit_service', compact('service'), compact('service_category'));
    }

    public function update_service(Request $request, $id){
        $data = Service::find($id);

        $data->title = $request->title;
        $data->description = $request->description;
        $data->service_category_id = $request->service_category_id;

        $image = $request->image;
        if($image){
        $imagename = time().'.'.$image->getClientOriginalExtension();
        $request->image->move('serviceimage',$imagename);
        $data->image = $imagename;
        }

        $data->save();
        return redirect()->back()->with('message','Service Updated Successfully');
    }










}
?>
