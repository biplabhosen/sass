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
  <body class="p-5">
  <table class="table p-5">
  <thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col">Name</th>
      <th scope="col">Email</th>
      <th scope="col">Photo</th>
      <th scope="col">Address</th>
      <th scope="col">Photo</th>
      <th scope="col">Action</th>
    </tr>
  </thead>


  <tbody>
    @foreach ($customers as $customer)
      <tr>
      <th scope="row">{{ $customer-> id }}</th>
      <td>{{ $customer->name }}</td>
      <td>{{ $customer->email }}</td>
      {{-- <td>{{ $customer->photo }}</td> --}}
      <td><img src="{{ asset("storage/photo/customer") }}/{{ $customer->photo }}" width="100" alt="" srcset=""></td>
      <td>{{ $customer->address }}</td>
      <td class="btn btn-group">
        <a class="btn btn-primary" href="{{URL("customer/edit", $customer->id) }}">Edit</a> 
        <form action="{{URL("customer/delete", $customer->id) }}" method="post">
          @csrf
          @method("delete")
          <button onclick="return confirm('Are you sure?')" type="submit" class="btn btn-danger" >Delete</button>
        </form>
      </td>
     </tr>
    @endforeach
    
  </tbody>
</table>
<div>
  {{ $customers->links() }}
</div>
 <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</body>
</html>