<style>

    .poster{
        border: 2px solid blue;


    }

    .services_img{
        width: 2000px;
        height: 200px;
    }

    .addpost_btn{
        text-align: center;
        font-weight: bold;
        font-color: white;
        font-size: 17px;
        margin-top: 50px;
        background-color: green;
        border-radius: 30px;
        padding-left: 40px;
        padding-right: 40px;
        justify-content: center;
        align-items: center;
        width: 200px;
        height: 50px;
        margin-left: 45%;

    }

    .addpost_btn:hover{
        background-color: black;
        font-color: white;
    }

    .btn_txt{
        color: white;
        font-weight: bold;


    }




</style>

<div class="services_section layout_padding">
         <div class="container">
            <h1 class="services_taital">Blog Posts</h1>
            <p class="services_text">Dive into a collection of insightful articles. Discover our latest content, and don't forget to share your thoughts through new posts! </p>
            <div class="services_section_2">
               <div class="row">

               @foreach($post as $post)
                  <div class="col-md-4">

                     <div><img src="postimage/{{$post->image}}" class="services_img"></div>
                     <div><p>Posted by {{$post->name}}</p></div>
                     <div class="btn_main"><a href="{{url('post_details',$post->id)}}">{{$post->title}}</a></div>

                  </div>

                  @endforeach
               </div>

                <br><br>

               <button class="addpost_btn"><a href="{{url('add_post')}}"><div class="btn_txt">Create Post</div></a></div>



            </div>
         </div>
      </div>
