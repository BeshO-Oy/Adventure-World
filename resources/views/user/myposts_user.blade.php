<!DOCTYPE html>
<html lang="en">

    <style>

        .post_deg{
            margin: 20px;
            padding: 20px;
            border: 2px solid white;
            border-radius: 10px;
            background-color: #002f35;
            text-align: center;
            background-size: contain;
            width: 70%;
            margin-left: 15%;
        }

        .post_title{
            font-size: 30px;
            font-weight: bold;
            color: white;
        }

        .post_desc{
            font-size: 20px;
        }

        .image_deg{
            width: 300px;
            height: 200px;
        }

        .post_st{
            font-size: 15px;
            color: yellow;
        }

        .delete_btn{
            background-color: red;
            color: white;
            border: 2px solid white;
            padding: 10px;
            border-radius: 15px;
            margin-top: 10px;
            font-weight: bold;
        }

        .delete_btn:hover{
            background-color: black;

        }
    </style>


    <head>
    @include('home.homecss')
    </head>


   <body>
      <!-- header section start -->
      <div class="header_section">
         @include('home.header')

         @if(session()->has('message'))
                <div class="alert alert-danger">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">x</button>
                    {{ session()->get('message') }}
                </div>
        @endif


        @foreach($post as $post)

        <div class="post_deg">

            <h2 class="post_title">{{$post->title}}</h2>
            <p class="post_st">{{$post->post_status}}</p>
            <p class="post_desc">{{$post->description}}</p>
            <img src="/postimage/{{$post->image}}" class="image_deg"><br><br><br>
            <a href="{{url('edit_post_user' , $post->id)}}" class="btn btn-primary">Edit</a>
            <a onclick="return confirm('are you sure?')" href="{{url('delete_post_user' , $post->id)}}" class="btn btn-danger" >Delete</a>

        </div>
        @endforeach

         <!-- banner section end -->


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
