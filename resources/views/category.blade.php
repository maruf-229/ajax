<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Category</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.5.1.min.js" integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0=" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js" integrity="sha384-q2kxQ16AaE6UbzuKqyBE9/u/KzioAlnx2maXQHiDX9d4/zp8Ok3f+M7DPm+Ib6IU" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.min.js" integrity="sha384-pQQkAEnwaBkjpqZ8RU1fF1AKtTcHJwFl3pblpTlHXybJjHpMYo79HY3hIi4NKxyj" crossorigin="anonymous"></script>

</head>

<body>
<section style="padding-top: 60px;">
    <div class="container">
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
                                <th>Description</th>

                            </tr>
                            </thead>
                            <tbody>
                            @foreach ($categories as $category)
                                <tr>
                                    <td>{{$category->name}}</td>
                                    <td>{{$category->description}}</td>
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
                <form action="" id="categoryForm">
                    @csrf
                    <div class="form-group">
                        <label for="name">Name</label>
                        <input type="text" class="form-control" id="name" />
                    </div>
                    <div class="form-group">
                        <label for="description">Description</label>
                        <textarea name="description" id="description" cols="30" rows="10" class="form-control"></textarea>
                    </div>
                    <div class="form-group">
                        <label for="image">Image</label>
                        <input type="file" class="form-control" name="image" id="image">
                    </div>
                    <br>
                    <button type="submit" class="btn btn-primary">Add</button>
                </form>
            </div>

        </div>
    </div>
</div>
<script>
    $(document).ready(function (){
        $("#categoryForm").on('submit',function(e){
            e.preventDefault();
            var name = $("#name").val();
            var description = $("#description").val();
            var image = $("#image").val();
            var _token=$("input[name=_token]").val();

            $.ajax({
                url:"{{route('category.store')}}",
                type:"POST",
                data:{
                    name:name,
                    description:description,
                    image:image,
                    _token:_token,
                },
                success: function(response){
                    if(response){
                        $("categoryTable tbody").prepend('<tr><td>'+response.name+'</td><td>'+response.description+'</td><td>'+response.image+'</td></tr>')
                        $("#categoryForm")[0].reset();
                        $('#categoryModal').modal('hide');
                        alert("Data Saved")
                        location.reload();
                    }
                }
            });
        });
    });
</script>
</body>

</html>
