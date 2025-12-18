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
  <body class="col-6 m-auto">
    <form action="{{ URL("customer/update", $customer->id) }}" method="POST" enctype="multipart/form-data">
      @csrf
    <label for="name">Name</label>
    <input value="{{ $customer->name }}"  class="form-control" id="name" name="name">
  </div>
  <div class="form-group">
    <label for="exampleInputEmail1">Email address</label>
    <input value="{{ $customer->email }}" type="email" name="email" class="form-control" id="exampleInputEmail1"  placeholder="Enter email">
    <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
  </div>
  <div class="form-group">
    <label for="phone">Phone</label>
    <input value="{{ $customer->phone }}"  class="form-control" id="phone" name="phone" placeholder="Enter phone">
  </div>
  <div class="form-group">
    <label for="address">Address</label>
    <input value="{{ $customer->address }}"  class="form-control" id="address" name="address"  placeholder="Enter address">
  </div>
  
  <div class="form-group form-check">
    <input type="checkbox" class="form-check-input" id="exampleCheck1">
    <label class="form-check-label" for="exampleCheck1">Check me out</label>
  </div>
  <button type="submit" class="btn btn-primary">Submit</button>
</form>
  </body>
</html>