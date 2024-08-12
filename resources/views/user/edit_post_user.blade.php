<!DOCTYPE html>
<html lang="en">
   <head>
    <base href="/public">
    @include('home.homecss')

    <style>

        .addpost_form{
            text-align: center;
            margin-left: 30%;
            margin-right: 30%;
            padding: 50px;
            border: 7px solid white;
            background-color: #002f35;
            background: auto;
            display: inline-block;

        }

        .addpost_form h1{
            color: white;
            font-size: 30px;
            font-weight: bold;
            margin-bottom: 20px;
        }

        .addpost_form label{
            display: inline-block;
            format: left;
            width: 200px;
            color: white;
            margin-bottom: 10px;
            padding: 10px;
        }

        .addpost_form input[type="text"], .addpost_form textarea{
            width: 50%;
            padding: 10px;
            margin-top: 20px;

        }

        .addpost_form input[type="file"]{
            width: 50%;
            padding: 10px;
            margin-bottom: 20px;
        }

        .addpost_form input[type="submit"]{
            padding: 10px;
            background-color: green;
            color: white;
            border: none;
            cursor: pointer;
        }

        .addpost_btn{
            text-align: center;
            font-weight: bold;
            font-color: white;
            margin-top: 50px;
            background-color: green;
            border-radius: 20px;
            padding: 10px;
            justify-content: center;
            align-items: center;
            width: 100px;
            margin-left: 10px;
        }

        .addpost_btn:hover{
            background-color: black;
            font-color: white;
        }

        .btn_text{
            color: white;
            font-weight: bold;
        }

        .oldimage_deg{
            width: 250px;
            height: 150px;
        }

        .update_btn{
            padding: 10px;
            background-color: green;
            color: white;
            font-weight: bold;
            border: 2px solid white;
            border-radius: 30px;
            text-align: center;
            width: 120px;
            cursor: pointer;

        }

        .update_btn:hover{
            background-color: black;
        }

    </style>
    </head>
   <body>

        @include('sweetalert::alert')
      <!-- header section start -->
      <div class="header_section">
         @include('home.header')
         <!-- banner section start -->
          <br>

          @if(session()->has('message'))
        <div class="alert alert-success">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">x</button>
            {{ session()->get('message') }}
        </div>
        @endif


          <form action="{{url('update_post_user',$post->id)}}" method="POST" enctype="multipart/form-data">

          @csrf



        <div class="addpost_form">

        <h1>Edit Post</h1>


            <label>Post Title</label>
            <input type="text" name="title" value="{{$post->title}}"><br><br>

            <label>Post Description</label>
            <textarea name="description"  required>{{$post->description}}</textarea><br><br>

            <label>Old Image</label>
            <img class="oldimage_deg" src="postimage/{{$post->image}}" width="100px" height="100px"><br><br>

            <label>Add Image</label>
            <input type="file" name="image" required><br><br>

            <button type="submit" class="update_btn">Update Post</button>
        </div>

        </form>

      <!-- footer section start -->
      @include('home.footer')
      <!-- footer section end -->
      <!-- copyright section start -->
      <div class="copyright_section">
         <div class="container">
            <p class="copyright_text">2020 All Rights Reserved. Design by <a href="https://html.design">Free html  Templates</a></p>
         </div>
      </div>
      <!-- copyright section end -->
      <!-- Javascript files-->
      <script src="js/jquery.min.js"></script>
      <script src="js/popper.min.js"></script>
      <script src="js/bootstrap.bundle.min.js"></script>
      <script src="js/jquery-3.0.0.min.js"></script>
      <script src="js/plugin.js"></script>
      <!-- sidebar -->
      <script src="js/jquery.mCustomScrollbar.concat.min.js"></script>
      <script src="js/custom.js"></script>
      <!-- javascript -->
      <script src="js/owl.carousel.js"></script>
      <script src="https:cdnjs.cloudflare.com/ajax/libs/fancybox/2.1.5/jquery.fancybox.min.js"></script>
   </body>
</html>
