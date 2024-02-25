<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Bootstrap demo</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
</head>

<body>
    <div class="container mx-auto col-lg-10 my-5">
        <form class="row g-3" method="POST" action="{{ route('employees.update', ['id' => $employee->id]) }}">
            @csrf
            @method('PUT')

            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <div class="col-md-6">
                <label for="inputFirstName" class="form-label">First Name</label>
                <input type="text" name="first_name" class="form-control" id="inputFirstName" value="{{ $employee->first_name }}" autofocus>
            </div>

            <div class="col-md-6">
                <label for="inputLastName" class="form-label">Last Name</label>
                <input type="text" name="last_name" class="form-control" value="{{ $employee->last_name }}" id="inputLastName">
            </div>

            <div class="col-12">
                <button type="submit" class="btn btn-primary">Update Employee</button>
            </div>
        </form>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous">
    </script>
</body>

</html>
