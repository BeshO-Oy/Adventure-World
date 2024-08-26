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

            <h1 class="post_title">Edit Menu</h1>

            <form action="{{url('update_menu',$menu->id)}}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="div_center">

            <div>

                <form action="{{url('add_menu')}}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="div_center">

                    <div>
                        <label>Menu Title</label>
                        <input type="text" name="title" value="{{$menu->title}}">
                    </div>

                    <div>
                        <label>Menu Link</label>
                        <input type="text" name="link" value="{{$menu->link}}">
                    </div>

                    <br><br><br>

                    <div>
                        <button class="update_btn">Update</button>
                    </div>
                </div>

                </form>

        </div>

  </body>


</html>
