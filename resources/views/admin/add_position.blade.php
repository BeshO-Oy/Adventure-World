<!DOCTYPE html>
<html>
  <head>
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

      .addpost_form{
        background-color: #43464b;
        color: white;
        margin-top: 60px;
        margin-left: 15%;
        margin-right: 20px;
        border-radius: 20px;
        width: 70%;
        border: 2px solid white;
      }

      .btn_deg{
        padding: 10px;
        background-color: green;
        color: white;
        font-weight: bold;
        border: 2px solid white;
        border-radius: 30px;
        text-align: center;
        width: 90px;
        cursor: pointer;
        font-size: 15px;


      }

        .btn_deg:hover{
            background-color: black;
            text-decoration: none;
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

        <!-- Page Content  -->
        <div class="page-content">

        @if(session()->has('message'))
        <div class="alert alert-success">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">x</button>
            {{ session()->get('message') }}
        </div>
        @endif
        <div class="addpost_form">
            <h1 class="post_title">Add Position</h1>

            <div>

                <form action="{{url('create_position')}}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="div_center">


                    <div>
                        <label>Position Title</label>
                        <input type="text" name="title" placeholder="Enter title">
                    </div>

                    <div>
                        <label>Position Description</label>
                        <textarea name="description" placeholder="Enter description"></textarea>
                    </div>

                    <div>
                        <label>Submission Date</label>
                        <input type="date" name="submission_date">
                    </div>

                    <div>
                        <label>Deadline</label>
                        <input type="date" name="deadline">
                    </div>

                    <div>
                        <label>Number of Vacancies</label>
                        <input type="number" name="number_of_vacancies" placeholder="Enter number of vacancies">
                    </div>

                    <div>
                        <label>Category</label>
                        <select name="job_category_id">
                            @foreach($category as $category)
                            <option value="{{$category->id}}">{{$category->title}}</option>
                            @endforeach
                        </select>
                    </div>

                    <br><br>
                    <div>
                        <button type="submit" name="btn" class="btn_deg">Create</button>
                    </div>
                </div>

                </form>

            </div>
            </div>


        </div>
        @include('admin.footer')
  </body>
</html>
