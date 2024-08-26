<!DOCTYPE html>
<html>
  <head>
    @include('admin.css')

    <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js" integrity="sha512-AA1Bzp5Q0K1KanKKmvN/4d3IRKVlv9PYgwFPvm32nPO6QS8yH1HO7LbgB1pgiOxPtfeg5zEn2ba64MUcqJx6CA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>

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

        .img_deg{
            width: 150px;
            height: 120px;
            margin: 10px;
        }

        .approve_btn{
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
            text-decoration: none;
        }

        .approve_btn:hover{
            background-color: black;
            text-decoration: none;
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

        .add_category_btn{
            padding: 10px;
            background-color: green;
            color: white;
            font-weight: bold;
            border: 2px solid white;
            border-radius: 30px;
            text-align: center;
            width: 150px;
            cursor: pointer;
            font-size: 15px;
            text-decoration: none;
            margin-left: 42%;
        }

        .add_category_btn:hover{
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
        <div class="page-content">

            <div>
                <h1 class="title_show_post">Menu</h1>

                @if(session()->has('message'))
                <div class="alert alert-success">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">x</button>
                    {{ session()->get('message') }}
                </div>
                @endif

                <table class="table_deg">
                    <tr class="th_deg">
                        <th>ID</th>
                        <th>Title</th>
                        <th>Link</th>
                        <th>Delete</th>
                        <th>Edit</th>


                    </tr>

                    @foreach($menu as $menu)
                    <tr>
                    <td>{{$menu->id}}</td>
                    <td>{{$menu->title}}</td>
                    <td>{{$menu->link}}</td>
                    <td><a href="{{url('delete_menu' , $menu->id)}}" class="delete_btn" onclick="confirmation(event)">Delete</a></td>
                    <td><a href="{{url('edit_menu' , $menu->id)}}" class="edit_btn" >Edit</a></td>
                </tr>
                    @endforeach

                </table>
                <br><br>

                <a class="add_category_btn" href="{{url('add_menu')}}">Add Menu</a>
            </div>
        </div>


        <script type="text/javascript">
            function confirmation(e){
                e.preventDefault(); // Prevent the href from redirecting directly
                var urlToRedirect = e.currentTarget.getAttribute('href'); //get the URL to redirect to
                console.log(urlToRedirect);
                swal({
                    title: "Are you sure you want to DELETE this position?",
                    text: "Once deleted it can't be recovered",
                    icon: "warning",
                    buttons: true,
                    dangerMode: true,

                })

                .then((willCancel) => {
                    if (willCancel) {
                        window.location.href = urlToRedirect;
            }
        });
    }
        </script>

  </body>
</html>
