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

            <h1 class="post_title">Edit Position</h1>

            <form action="{{url('update_position',$position->id)}}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="div_center">

            <div>

                <form action="{{url('add_position')}}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="div_center">

                    <div>
                        <label>Position Title</label>
                        <input type="text" name="title" value="{{$position->title}}">
                    </div>

                    <div>
                        <label>Position Description</label>
                        <textarea  name="description" >{{$position->description}}</textarea>
                    </div>

                    <div>
                        <label>Submission Date</label>
                        <input type="date" name="submission_date" value="{{$position->submission_date}}">
                    </div>

                    <div>
                        <label>Deadline</label>
                        <input type="date" name="deadline" value="{{$position->deadline}}">
                    </div>

                    <div>
                        <label>Vacancies</label>
                        <input type="text" name="number_of_vacancies" value="{{$position->number_of_vacancies}}">
                    </div>

                    <div>
                        <label>Category</label>
                        <select name="job_category_id">
                            @foreach($category as $category)
                            <option value="{{$category->id}}">{{$category->title}}</option>
                            @endforeach
                        </select>
                    </div>



                    <br><br><br>

                    <div>
                        <button class="update_btn">Update</button>
                    </div>
                </div>

                </form>

        </div>

        @include('admin.footer')
  </body>
</html>
