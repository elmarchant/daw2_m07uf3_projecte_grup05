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
                <h1 class="text-center">Coordinadora Catalana d'ONGs</h1>
                <hr>
                <form>
                    <div class="form-group mb-3">
                        <label for="exampleInputEmail1">Nom d'usuari</label>
                        <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
                    </div>
                    <div class="form-group mb-3">
                        <label for="exampleInputPassword1">Contrasenya</label>
                        <input type="password" class="form-control" id="exampleInputPassword1">
                    </div>
                    <div class="form-group form-check mb-3">
                        <input type="checkbox" class="form-check-input" id="exampleCheck1">
                        <label class="form-check-label" for="exampleCheck1">Check me out</label>
                    </div>
                    <button type="submit" class="btn btn-primary">Iniciar sessió</button>
                </form>
            </div>
        </div>
    </div>
</body>
</html>