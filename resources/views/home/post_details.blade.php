<!DOCTYPE html>
<html lang="en">
   <head>
        <base href="/public">

    @include('home.homecss')

    <style>
        .head_deg{
            text-align: center;
            font-size: 30px;
            font-weight: bold;
            color: white;
            margin-top: 50px;
        }

        .desc_deg{
            text-align: center;
            font-size: 20px;
            color: white;
            margin-top: 50px;
        }

        .services_img{
            width: 300px;
            height: 200px;
            margin-left: 40%;

        }

        .postby_deg{
            text-align: center;

            font-size: 20px;
            color: white;
            font-weight: bold;
            margin-top: 100px;
        }

        .status_deg{
            text-align: center;
            font-size: 15px;
            color: yellow;
            margin-top: 50px;
        }

        .postdetails_body{
            border: 2px solid white;
            background-color: #002f35;
            margin-top: 50px;
            margin-bottom: 50px;
            margin-left: 50px;
            margin-right: 50px;
            padding: 50px;
        }
    </style>
    </head>
   <body>
      <!-- header section start -->
      <div class="header_section">
         @include('home.header')
         <!-- banner section start -->

        <div class="postdetails_body">
         <p class="head_deg">{{$post->title}}</p>
         <br>

         <p class="status_deg">Status: {{$post->post_status}}</p>
         <br><br><br>

         <p class="desc_deg">{{$post->description}}</p>
        <br><br><br>

         <img src="postimage/{{$post->image}}" class="services_img">
        <br><br><br><br><br><br>

        <p class="postby_deg">Posted by {{$post->name}}</p>

    </div>

    <div class="btn_main"  ><a href="{{url('/dashboard')}}">Go Back</a></div>


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
