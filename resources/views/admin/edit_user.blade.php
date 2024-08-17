<!DOCTYPE html>
<html>
  <head>
  <base href="/public">
    @include('admin.css')

    <style type="text/css">
      .post_title{
        font-size: 30px;
        font-weight: bold;
        text-align: center;
        padding: 30px;
        color: white;
        margin-top: 20px;
        margin-left: 20px;
      }

      .div_center{
        text-align: center;
        padding: 30px;
      }

      label
      {
        display: inline-block;
        /*  make all label start from the same position */
        format: left;
        width: 200px;
      }

      .update_btn{
        padding: 10px;
        background-color: green;
        color: white;
        border: 2px solid white;
        border-radius: 30px;
        text-align: center;
        width: 90px;
        cursor: pointer;
        font-size: 15px;
        font-weight: bold;
      }

        .update_btn:hover{
            background-color: black;
            color: white;
        }

        .edituser_form{
        background-color: #43464b;
        color: white;
        margin-top: 60px;
        margin-left: 15%;
        margin-right: 20px;
        border-radius: 20px;
        width: 70%;
        border: 2px solid white;
      }

      .oldimage_deg{
            width: 250px;
            height: 150px;
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
        @if(session()->has('message'))
        <div class="alert alert-success">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">x</button>
            {{ session()->get('message') }}
        </div>
        @endif

        <div class="edituser_form">
            <h1 class="post_title">Edit User</h1>

            <form action="{{url('update_user',$user->id)}}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="div_center">

            <div>

                    <div class="div_center">


                    <div>
                        <label>Name</label>
                        <input type="text" name="name" value="{{$user->name}}">
                    </div>


                    <div>
                        <label>Email</label>
                        <input type="text" name="email" value="{{$user->email}}">
                    </div>

                    <div>
                        <label>Old Image</label>
                        <img class="oldimage_deg" src="userimage/{{$user->image}}"><br><br>
                    </div>
                    <div>
                        <label>New Image (Optional)</label>
                        <input type="file" name="image"><br><br>
                    </div>

                    <br><br><br>

                    <div>
                        <button class="update_btn">Update</button>
                    </div>
                </div>

                </form>

        </div>
        </div>

        @include('admin.footer')
  </body>
</html>
