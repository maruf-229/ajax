<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Category</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BmbxuPwQa2lc/FVzBcNJ7UAyJxM6wuqIj61tLrc4wSX0szH/Ev+nYRRuWlolflfl" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.6.0/dist/umd/popper.min.js" integrity="sha384-KsvD1yqQ1/1+IA7gi3P0tyJcT3vR+NdBTt13hSJ2lnve8agRGXTTyNaBYmCR/Nwi" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/js/bootstrap.min.js" integrity="sha384-nsg8ua9HAw1y0W1btsyWgBklPnCUAFLuTMS2G72MMONqmOymq585AcH49TLBQObG" crossorigin="anonymous"></script>
</head>
<body>
<section style="padding-top: 60px;">
    <div class="container">
        <h3 align="center">Upload Image in Laravel using Ajax</h3>
        <br />
        <div class="alert" id="message" style="display: none"></div>
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card header">
                        Category <a href="#" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#categoryModal">Add category</a>
                    </div>
                    <div class="card-body">
                        <table id="categoryTable" class="table">
                            <thead>
                            <tr>
                                <th>Name</th>
                                <th>email</th>
                                <th>phone</th>
                                <th>Image</th>

                            </tr>
                            </thead>
                            <tbody>
                            @foreach ($categories as $category)
                                <tr>
                                    <td>{{$category->name}}</td>
                                    <td>{{$category->email}}</td>
                                    <td>{{$category->phone}}</td>
{{--                                    <td><h1>{{ $category->image }}</h1></td>--}}
                                    <td><img src="{{ asset('images'.$category->image) }}" alt="Image" width="50px"> </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>

                    </div>
                </div>
            </div>
        </div>
    </div>

</section>
<!-- Button trigger modal -->


<!-- Modal -->
<div class="modal fade" id="categoryModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Add Category</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form id="categoryForm" enctype="multipart/form-data">
                    <div class="form-group">
                        <label for="name">Name</label>
                        <input type="text" class="form-control" id="name" name="name">
                    </div>
                    <div class="form-group">
                        <label for="description">Email</label>
                        <input type="email" class="form-control" id="email" name="email">
                    </div>
                    <div class="form-group">
                        <label for="description">Phone</label>
                        <input type="number" class="form-control" id="phone" name="phone">
                    </div>
                    <div class="form-group">
                        <label for="image">Image</label>
                        <input type="file"  class="form-control " name="image" id="image">
                    </div>
                    <br>
                    <button type="submit" class="btn btn-primary">Add</button>
                </form>
            </div>

        </div>
    </div>
</div>
<script type="text/javascript">
    $(document).ready(function (){
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        $('#categoryForm').on('submit',function (e){
            e.preventDefault();
            let name = $("input[name=name]").val();
            let email = $("#email").val();
            let phone = $("#phone").val();
            let image = $("#image").val();
            let _token=$("input[name=_token]").val();


            $.ajax({
                url:"{{route('category.store')}}",
                method:"POST",
                data:new FormData(this),
                dataType:'JSON',
                contentType: false,
                cache: false,
                processData: false,
                success: function(response){
                    console.log(response)
                    // alert(name+' '+email+' '+phone+' '+image);

                    alert("Data inserted successfully");
                    $('#categoryTable tbody').append('<tr><td>'+name+'</td><td>'+email+'</td><td>'+phone+'</td><td>'+image+'</td></tr>');
                    $('#categoryModal').modal('toggle');
                    $('#categoryForm')[0].reset();
                },
                error: function (error){
                    console.log(error)
                    alert("Data Insertion Failed");
                }
            });
        });
    });
</script>
</body>

</html>
