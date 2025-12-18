<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <title>Customer</title>
  
  </head>
  <body class="col-6 m-auto mt-5">
    <form action="{{ URL("customer/save") }}" method="POST" enctype="multipart/form-data">
      @csrf
    <label for="name">Name</label>
    <input  class="form-control" id="name" name="name" placeholder="Enter name">
    @error("name")
      <small class="text-danger">{{$message}}</small>
    @enderror
  </div>
  <div class="form-group">
    <label for="exampleInputEmail1">Email address</label>
    <input type="email" name="email" class="form-control" id="exampleInputEmail1"  placeholder="Enter email">
    @error("email")
      <small class="text-danger">{{$message}}</small>
    @enderror
  </div>
  <div class="form-group">
    <label for="phone">Phone</label>
    <input  class="form-control" id="phone" name="phone" placeholder="Enter phone">
  </div>
  <div class="form-group">
    <label for="address">Address</label>
    <input  class="form-control" id="address" name="address"  placeholder="Enter address">
  </div>
  <div class="form-group">
    <label for="photo">Photo</label>
    <input type="file" class="form-control" id="photo" name="photo" >
  </div>
  
  <button type="submit" class="btn btn-primary mt-2">Submit</button>
</form>
  </body>
</html>