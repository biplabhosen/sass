<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <title>user</title>

</head>

<body class="col-6 m-auto">
<form action="{{ URL('system/user',$user->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method("PUT")
        <label for="name">Name</label>
        <input value="{{ $user->name }}" class="form-control" id="name" name="name">
        </div>
        <div class="form-group">
            <label for="exampleInputEmail1">Email address</label>
            <input value="{{ $user->email }}" type="email" name="email" class="form-control"
                id="exampleInputEmail1" placeholder="Enter email">
            <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
        </div>
        <div class="form-group">
            <label for="password">Password</label>
            <input class="form-control" id="password" name="password"
                placeholder="Enter password">
        </div>

        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
</body>

</html>
