<!DOCTYPE html>
<html lang="ca">
<head>
    @include('structure.head_content')
    <title>Modificar voluntari</title>
</head>
<body>
    <main>
        <section class="container rounded p-4 mt-4 mb-4 bg-light">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="/voluntaris">voluntaris</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Modificar voluntari</li>
                </ol>
            </nav>
            <h1>Modificar voluntari: {{$data['nom']}}</h1>
            <hr>
            <form id="nom" action="/voluntari/update/{{$data['NIF']}}/treballador/nom" method="post">
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
            <form id="cognom" action="/voluntari/update/{{$data['NIF']}}/treballador/cognom" method="post">
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
            <form id="correu" action="/voluntari/update/{{$data['NIF']}}/treballador/correu" method="post">
                @csrf
                @method('PUT')
                <div class="mb-3 row">
                    <label for="staticEmail" class="col-sm-2 col-form-label">Correu</label>
                    <div class="col-sm-10">
                        <div class="input-group">
                            <input type="email" class="form-control" maxlength="30" required name="correu" value="{{$data['correu']}}" placeholder="{{$data['correu']}}">
                            <button class="btn btn-success" type="submit">Modificar</button>
                        </div>
                    </div>
                </div>
            </form>
            <hr>
            <form id="mobil" action="/voluntari/update/{{$data['NIF']}}/treballador/mobil" method="post">
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
            <form id="tel_fixa" action="/voluntari/update/{{$data['NIF']}}/treballador/tel_fixa" method="post">
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
            <form id="adreca" action="/voluntari/update/{{$data['NIF']}}/treballador/adreca" method="post">
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
            <form id="poblacio" action="/voluntari/update/{{$data['NIF']}}/treballador/poblacio" method="post">
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
            <form id="commarca" action="/voluntari/update/{{$data['NIF']}}/treballador/commarca" method="post">
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
            <form id="commarca" action="/voluntari/update/{{$data['NIF']}}/treballador/cif" method="post">
                @csrf
                @method('PUT')
                <div class="mb-3 row">
                    <label for="staticEmail" class="col-sm-2 col-form-label">Associació</label>
                    <div class="col-sm-10">
                        <div class="input-group">
                            <div class="col-sm-10">
                                <select name="cif" class="form-select" aria-label="Default select example">
                                    <option value="">---</option>
                                    @foreach ($associacions as $associacio)
                                        @if ($associacio['cif'] == $data['CIF'])
                                            <option selected value="{{$associacio['cif']}}">{{$associacio['nom']}}</option>
                                        @else
                                            <option value="{{$associacio['cif']}}">{{$associacio['nom']}}</option>
                                        @endif
                                    @endforeach
                                  </select>
                            </div>
                            <button class="btn btn-success" type="submit">Modificar</button>
                        </div>
                    </div>
                </div>
            </form>
            <hr>
            <form id="data_ingres" action="/voluntari/update/{{$data['NIF']}}/treballador/data_ingres" method="post">
                @csrf
                @method('PUT')
                <div class="mb-3 row">
                    <label for="staticEmail" class="col-sm-2 col-form-label">Data d'ingrés</label>
                    <div class="col-sm-10">
                        <div class="input-group">
                            <input type="date" class="form-control" required name="data_ingres" value="{{$data['data_ingres']}}" placeholder="{{$data['data_ingres']}}">
                            <button class="btn btn-success" type="submit">Modificar</button>
                        </div>
                    </div>
                </div>
            </form>
            <hr>
            <form id="professio" action="/voluntari/update/{{$data['NIF']}}/voluntari/professio" method="post">
                @csrf
                @method('PUT')
                <div class="mb-3 row">
                    <label for="staticEmail" class="col-sm-2 col-form-label">Professió</label>
                    <div class="col-sm-10">
                        <div class="input-group">
                            <input type="text" class="form-control" maxlength="30" required name="professio" value="{{$data['professio']}}" placeholder="{{$data['professio']}}">
                            <button class="btn btn-success" type="submit">Modificar</button>
                        </div>
                    </div>
                </div>
            </form>
            <hr>
            <form id="hores" action="/voluntari/update/{{$data['NIF']}}/voluntari/hores" method="post">
                @csrf
                @method('PUT')
                <div class="mb-3 row">
                    <label for="staticEmail" class="col-sm-2 col-form-label">Hores</label>
                    <div class="col-sm-10">
                        <div class="input-group">
                            <input type="number" class="form-control" min="0" required name="hores" value="{{$data['hores']}}" placeholder="{{$data['hores']}}">
                            <button class="btn btn-success" type="submit">Modificar</button>
                        </div>
                    </div>
                </div>
            </form>
            <hr>
            <form id="edat" action="/voluntari/update/{{$data['NIF']}}/voluntari/edat" method="post">
                @csrf
                @method('PUT')
                <div class="mb-3 row">
                    <label for="staticEmail" class="col-sm-2 col-form-label">Edat</label>
                    <div class="col-sm-10">
                        <div class="input-group">
                            <input type="date" class="form-control" min="0" required name="edat" value="{{$data['edat']}}" placeholder="{{$data['edat']}}">
                            <button class="btn btn-success" type="submit">Modificar</button>
                        </div>
                    </div>
                </div>
            </form>
            <hr>
            <div class="d-grid gap-2">
                <a class="btn btn-danger" href="/voluntaris" role="button">Cancel·lar</a>
            </div>
        </section>
    </main>
</body>
</html>