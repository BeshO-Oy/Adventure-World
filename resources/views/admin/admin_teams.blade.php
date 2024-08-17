<!DOCTYPE html>
<html>
  <head>
    @include('admin.css')

    <style>
        .title_show_post{
            text-align: center;
            color: white;
            padding: 30px;
            font-size: 30px;
            font-weight: bold;
        }

        .table_deg{
            border: 1px solid white;
            border-collapse: collapse;
            width: 90%;
            color: white;
            font-size: 20px;
            text-align: center;
            margin-left: 80px;

        }

        .th_deg{
            background-color: #343a40;
            color: white;
        }

        .delete_btn{
            padding: 10px;
            background-color: red;            ;
            color: white;
            font-weight: bold;
            border: 2px solid white;
            border-radius: 30px;
            text-align: center;
            width: 90px;
            cursor: pointer;
            font-size: 15px;
            text-decoration: none;
        }

        .delete_btn:hover{
            background-color: black;
            text-decoration: none;
            color: white;
        }

        .edit_btn{
            padding: 10px;
            background-color: grey;
            color: white;
            font-weight: bold;
            border: 2px solid white;
            border-radius: 30px;
            text-align: center;
            width: 90px;
            cursor: pointer;
            font-size: 15px;
            text-decoration: none;
        }

        .edit_btn:hover{
            background-color: black;
            text-decoration: none;
            color: white;
        }

        .img_deg{
            width: 200px;
            height: 120px;
            margin: 10px;
            border: 2px solid white;
        }
    </style>
  </head>
  <body>

    @include('admin.header')

    <div class="d-flex align-items-stretch">
      <!-- Sidebar Navigation-->
      @include('admin.sidebar')
      <!-- Sidebar Navigation end-->

      <div class="page-content">

<div>
    <h1 class="title_show_post">All Users</h1>

    @if(session()->has('message'))
    <div class="alert alert-success">
        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">x</button>
        {{ session()->get('message') }}
    </div>
    @endif


    <table class="table_deg">
        <tr class="th_deg">
            <th>ID</th>
            <th>Name</th>
            <th>email</th>
            <th>Image</th>
            <th>Delete</th>
            <th>Edit</th>
        </tr>

        @foreach($user as $user)
        <tr>
            <td>{{$user->id}}</td>
            <td>{{$user->name}}</td>
            <td>{{$user->email}}</td>
            <td><img src="userimage/{{$user->image}}" alt="Image" class="img_deg"></td>
            <td><a href="{{url('delete_user' , $user->id)}}" class="delete_btn" onclick="confirmation(event)">Delete</a></td>
            <td><a href="{{url('edit_user' , $user->id)}}" class="edit_btn">Edit</a></td>
        </tr>
        @endforeach

    </table>
</div>
</div>


        @include('admin.footer')
  </body>
</html>
