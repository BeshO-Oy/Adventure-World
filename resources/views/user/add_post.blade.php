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
            border-radius: 30px;
            padding: 10px;
            justify-content: center;
            align-items: center;
            width: 100px;
            margin-left: 10px;
            color: white;
            border: 2px solid white;
        }

        .addpost_btn:hover{
            background-color: black;
            font-color: white;
        }

        .btn_text{
            color: white;
            font-weight: bold;
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


          <form action="{{url('user_post')}}" method="POST" enctype="multipart/form-data">

          @csrf



        <div class="addpost_form">

        <h1>Add a Post</h1>


            <label>Post Title</label>
            <input type="text" name="title" required><br><br>

            <label>Post Description</label>
            <textarea name="description"  required></textarea><br><br>

            <label>Add Image</label>
            <input type="file" name="image" required><br><br>

            <button type="submit" class="addpost_btn">Add Post</button>
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
