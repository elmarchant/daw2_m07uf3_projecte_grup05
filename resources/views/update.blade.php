<!DOCTYPE html>
<html lang="ca">
<head>
    @include('structure.head_content')
    <title>Modificar dades</title>
    <script src="{{ asset('js/update.js') }}"></script>
</head>
<body>
    <main>
        <section class="container rounded p-4 mt-4 mb-4 bg-light">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="/inici">Inici</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Modificar dades</li>
                </ol>
            </nav>
            <h1>Modificar dades</h1>
            <hr>
            <form id="nom" action="/self/update/{{$data['id']}}/nom" method="post">
                @csrf
                @method('PUT')
                <div class="mb-3 row">
                    <label for="staticEmail" class="col-sm-2 col-form-label">Nom</label>
                    <div class="col-sm-10">
                        <div class="input-group">
                            <input type="text" class="form-control" maxlength="30" required name="nom" value="{{$data['nom']}}" placeholder="{{$data['nom']}}">
                            <button class="btn btn-success" type="submit">Modificar</button>
                        </div>
                    </div>
                </div>
            </form>
            <hr>
            <form id="nom_usuari" action="/self/update/{{$data['id']}}/nom_usuari" method="post">
                @csrf
                @method('PUT')
                <div class="mb-3 row">
                    <label for="staticEmail" class="col-sm-2 col-form-label">Nom usuari</label>
                    <div class="col-sm-10">
                        <div class="input-group">
                            <input type="text" class="form-control" maxlength="20" required name="nom_usuari" value="{{$data['nom_usuari']}}" placeholder="{{$data['nom_usuari']}}">
                            <button class="btn btn-success" type="submit">Modificar</button>
                        </div>
                    </div>
                </div>
            </form>
            <hr>
            <form id="contrasenya" action="/self/update/{{$data['id']}}/contrasenya" method="post">
                @csrf
                @method('PUT')
                <div class="mb-3 row">
                    <label for="inputPassword" class="col-sm-2 col-form-label">Nova contrasenya</label>
                    <div class="col-sm-10">
                        <input type="password" required class="form-control" name="contrasenya">
                    </div>
                </div>
                <div class="mb-3 row">
                    <label for="inputPassword" class="col-sm-2 col-form-label">Repeteix contrasenya</label>
                    <div class="col-sm-10">
                        <input type="password" required class="form-control" name="re-contrasenya">
                    </div>
                </div>
                <button type="submit" id="submit" class="btn btn-success">Canviar contrasenya</button>
                <button type="reset" class="btn btn-secondary">Netejar</button>
            </form>
            <hr>
            <div class="d-grid gap-2">
                <a class="btn btn-danger" href="/inici" role="button">Cancel·lar</a>
            </div>
        </section>
    </main>
</body>
</html>