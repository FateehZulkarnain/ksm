<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <title>Document</title>
</head>

<body>
    <div class="container">
        <div class="row">
            <div class="col">
                <h1>{{ $name }}'s Todos</h1>
                {{-- <button class="btn btn-outline-primary">Create New</button> --}}

                <div class="card">
                    <div class="card-body">
                        @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif
                        <form action="/todos" method="post">
                            @csrf
                            <div class="form-group">
                                <label for="Name"></label>
                                <input type="text" name="name" class="form-control" placeholder="Todo name">
                                </div>

                            <button class="btn btn-success float-end mt-4" type="submit"> Submit </button>
                            <a href='/todos' class="btn btn-primary mt-4" type="submit"> Back </a>
                        </form>


                    </div>
                </div>

                {{-- <div class="card mt-5">
                    <div class="row text-white">
                        <div class="col bg-primary">Ini Col 4</div>
                        <div class="col bg-success">Ini Col 4</div>
                        <div class="col bg-warning">Ini Col 4</div>
                        <div class="col bg-danger">Ini Col 4</div>
                    </div>
                </div> --}}
            </div>
        </div>
    </div>
</body>

</html>
