<!DOCTYPE html>
<html lang="ca">
<head>
    @include('structure.head_content')
    <title>Modificar soci</title>
</head>
<body>
    <main>
        <section class="container rounded p-4 mt-4 mb-4 bg-light">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="/socis">socis</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Modificar soci</li>
                </ol>
            </nav>
            <h1>Modificar soci: {{$data['nom']}}</h1>
            <hr>
            <form id="nom" action="/soci/update/{{$data['NIF']}}/nom" method="post">
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
            <form id="cognom" action="/soci/update/{{$data['NIF']}}/cognom" method="post">
                @csrf
                @method('PUT')
                <div class="mb-3 row">
                    <label for="staticEmail" class="col-sm-2 col-form-label">Cognom</label>
                    <div class="col-sm-10">
                        <div class="input-group">
                            <input type="text" class="form-control" maxlength="30" required name="cognom" value="{{$data['cognom']}}" placeholder="{{$data['cognom']}}">
                            <button class="btn btn-success" type="submit">Modificar</button>
                        </div>
                    </div>
                </div>
            </form>
            <hr>
            <form id="correu" action="/soci/update/{{$data['NIF']}}/correu" method="post">
                @csrf
                @method('PUT')
                <div class="mb-3 row">
                    <label for="staticEmail" class="col-sm-2 col-form-label">Correu</label>
                    <div class="col-sm-10">
                        <div class="input-group">
                            <input type="email" class="form-control" maxlength="100" required name="correu" value="{{$data['correu']}}" placeholder="{{$data['correu']}}">
                            <button class="btn btn-success" type="submit">Modificar</button>
                        </div>
                    </div>
                </div>
            </form>
            <hr>
            <form id="mobil" action="/soci/update/{{$data['NIF']}}/mobil" method="post">
                @csrf
                @method('PUT')
                <div class="mb-3 row">
                    <label for="staticEmail" class="col-sm-2 col-form-label">Mòbil</label>
                    <div class="col-sm-10">
                        <div class="input-group">
                            <input type="tel" class="form-control" maxlength="9" required name="mobil" value="{{$data['mobil']}}" placeholder="{{$data['mobil']}}">
                            <button class="btn btn-success" type="submit">Modificar</button>
                        </div>
                    </div>
                </div>
            </form>
            <hr>
            <form id="tel_fixa" action="/soci/update/{{$data['NIF']}}/tel_fixa" method="post">
                @csrf
                @method('PUT')
                <div class="mb-3 row">
                    <label for="staticEmail" class="col-sm-2 col-form-label">Nom</label>
                    <div class="col-sm-10">
                        <div class="input-group">
                            <input type="tel" class="form-control" maxlength="9" required name="tel_fixa" value="{{$data['tel_fixa']}}" placeholder="{{$data['tel_fixa']}}">
                            <button class="btn btn-success" type="submit">Modificar</button>
                        </div>
                    </div>
                </div>
            </form>
            <hr>
            <form id="adreca" action="/soci/update/{{$data['NIF']}}/adreca" method="post">
                @csrf
                @method('PUT')
                <div class="mb-3 row">
                    <label for="staticEmail" class="col-sm-2 col-form-label">Adreça</label>
                    <div class="col-sm-10">
                        <div class="input-group">
                            <input type="text" class="form-control" maxlength="100" required name="adreca" value="{{$data['adreca']}}" placeholder="{{$data['adreca']}}">
                            <button class="btn btn-success" type="submit">Modificar</button>
                        </div>
                    </div>
                </div>
            </form>
            <hr>
            <form id="nom" action="/soci/update/{{$data['NIF']}}/poblacio" method="post">
                @csrf
                @method('PUT')
                <div class="mb-3 row">
                    <label for="staticEmail" class="col-sm-2 col-form-label">Població</label>
                    <div class="col-sm-10">
                        <div class="input-group">
                            <input type="text" class="form-control" maxlength="20" required name="poblacio" value="{{$data['poblacio']}}" placeholder="{{$data['poblacio']}}">
                            <button class="btn btn-success" type="submit">Modificar</button>
                        </div>
                    </div>
                </div>
            </form>
            <hr>
            <form id="nom" action="/soci/update/{{$data['NIF']}}/commarca" method="post">
                @csrf
                @method('PUT')
                <div class="mb-3 row">
                    <label for="staticEmail" class="col-sm-2 col-form-label">Commarca</label>
                    <div class="col-sm-10">
                        <div class="input-group">
                            <input type="text" class="form-control" maxlength="20" required name="commarca" value="{{$data['commarca']}}" placeholder="{{$data['commarca']}}">
                            <button class="btn btn-success" type="submit">Modificar</button>
                        </div>
                    </div>
                </div>
            </form>
            <hr>
            <div class="d-grid gap-2">
                <a class="btn btn-danger" href="/socis" role="button">Cancel·lar</a>
            </div>
        </section>
    </main>
</body>
</html>