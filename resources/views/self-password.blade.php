<!DOCTYPE html>
<html lang="ca">
<head>
    @include('structure.head_content')
    <title>Iniciar sessió</title>
    <style>
        .h-100vh{
            position: relative;
            height: 100vh;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="row h-100vh justify-content-center align-items-center">
            <div class="col-10 p-4 col-md-8 col-lg-6">
                <h1 class="text-center">Canviar contrasenya</h1>
                <hr>
                <form action="/self/update/password" method="POST">
                    @csrf
                    @method('PUT')
                    <div class="form-group mb-3">
                        <label for="exampleInputEmail1">Nova contrasenya</label>
                        <input required type="password" name="contrasenya" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
                    </div>
                    <div class="form-group mb-3">
                        <label for="exampleInputPassword1">Repeteix contrasenya</label>
                        <input required type="password" name="re-contrasenya" class="form-control" id="exampleInputPassword1">
                    </div>
                    <button type="submit" class="btn btn-primary">Canviar contrasenya</button>
                </form>
            </div>
        </div>
    </div>
</body>
</html>