<!DOCTYPE html>
<html lang="ca">
<head>
    @include('structure.head_content')
    <title>Afegir usuari</title>
    <script src="{{ asset('js/usuari-update.js') }}"></script>
</head>
<body>
    <main>
        <section class="container rounded p-4 mt-4 mb-4 bg-light">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="/usuaris">Usuaris</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Modificar usuari</li>
                </ol>
            </nav>
            <h1>Modificar usuari: {{$data['nom_usuari']}}</h1>
            <hr>
            <form id="nom" action="/usuari/update/{{$data['id']}}/nom" method="post">
                @csrf
                @method('PUT')
                <div class="mb-3 row">
                    <label for="staticEmail" class="col-sm-2 col-form-label">Nom</label>
                    <div class="col-sm-10">
                        <div class="input-group">
                            <input type="text" class="form-control" required name="nom" value="{{$data['nom']}}" placeholder="{{$data['nom']}}">
                            <button class="btn btn-success" type="submit">Modificar</button>
                        </div>
                    </div>
                </div>
            </form>
            <hr>
            <form id="nom-usuari" action="/usuari/update/{{$data['id']}}/nomUsuari" method="post">
                @csrf
                @method('PUT')
                <div class="mb-3 row">
                    <label for="staticEmail" class="col-sm-2 col-form-label">Nom usuari</label>
                    <div class="col-sm-10">
                        <div class="input-group">
                            <input type="text" class="form-control" required name="nom_usuari" value="{{$data['nom_usuari']}}" placeholder="{{$data['nom_usuari']}}" aria-label="Recipient's username" aria-describedby="button-addon2">
                            <button class="btn btn-success" type="submit">Modificar</button>
                        </div>
                    </div>
                </div>
            </form>
            <hr>
            <form id="contrasenya" action="/usuari/update/{{$data['id']}}/contrasenya" method="post">
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
            <form id="rol" action="/usuari/update/{{$data['id']}}/rol" method="post">
                @csrf
                @method('PUT')
                <div class="mb-3 row">
                    <label for="staticEmail" class="col-sm-2 col-form-label">Rol</label>
                    <div class="col-sm-10">
                        <div class="input-group">
                            <select class="form-select" name="rol" id="inputGroupSelect04" aria-label="Example select with button addon">
                                @if ($data['administrador'] == '1')
                                    <option value="false">Usuari</option>
                                    <option selected value="true">Administrador</option>                                
                                @else
                                    <option selected value="false">Usuari</option>
                                    <option value="true">Administrador</option>
                                @endif
                            </select>
                            <button class="btn btn-success" type="submit">Guardar</button>
                        </div>
                    </div>
                </div>
            </form>
        </section>
    </main>
</body>
</html>