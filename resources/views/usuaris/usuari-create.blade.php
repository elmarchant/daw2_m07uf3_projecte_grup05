<!DOCTYPE html>
<html lang="ca">
<head>
    @include('structure.head_content')
    <title>Afegir usuari</title>
    <script src="{{ asset('js/usuari-create.js') }}"></script>
</head>
<body>
    <main>
        <section class="container rounded p-4 mt-4 mb-4 bg-light">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="/usuaris">Usuaris</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Afegir usuari</li>
                </ol>
            </nav>
            <h1>Afegir usuari</h1>
            <hr>
            <form id="afegirUsuari" action="/usuari/create/save" method="post">
                @csrf
                @method('POST')
                <div class="mb-3 row">
                    <label for="staticEmail" class="col-sm-2 col-form-label">Nom</label>
                    <div class="col-sm-10">
                        <input type="text" required class="form-control" id="nom" name="nom">
                    </div>
                </div>
                <div class="mb-3 row">
                    <label for="staticEmail" class="col-sm-2 col-form-label">Nom usuari</label>
                    <div class="col-sm-10">
                        <input type="text" required class="form-control" id="nom-usuari" name="nom_usuari">
                    </div>
                </div>
                <div class="mb-3 row">
                    <label for="inputPassword" class="col-sm-2 col-form-label">Contrasenya</label>
                    <div class="col-sm-10">
                        <input type="password" required class="form-control" id="contrasenya" name="contrasenya">
                    </div>
                </div>
                <div class="mb-3 row">
                    <label for="inputPassword" class="col-sm-2 col-form-label">Repeteix contrasenya</label>
                    <div class="col-sm-10">
                        <input type="password" required class="form-control" id="re-contrasenya">
                    </div>
                </div>
                <div class="mb-3 row">
                    <label for="staticEmail" class="col-sm-2 col-form-label">Rol</label>
                    <div class="col-sm-10">
                        <select name="rol" class="form-select" aria-label="Default select example">
                            <option value="false">Usuari</option>
                            <option value="true">Administrador</option>
                          </select>
                    </div>
                </div>
                <hr>
                <button type="submit" id="submit" class="btn btn-primary">Afegir usuari</button>
                <button type="reset" class="btn btn-secondary">Netejar</button>
                <a class="btn btn-danger" href="/usuaris" role="button">Cancel·lar</a>
            </form>
        </section>
    </main>
</body>
</html>