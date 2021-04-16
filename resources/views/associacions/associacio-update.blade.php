<!DOCTYPE html>
<html lang="ca">
<head>
    @include('structure.head_content')
    <title>Modificar associació</title>
    <script src="{{ asset('js/associacio-update.js') }}"></script>
</head>
<body>
    <main>
        <section class="container rounded p-4 mt-4 mb-4 bg-light">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="/associacions">Associacions</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Modificar associació</li>
                </ol>
            </nav>
            <h1>Modificar associacio: {{$data['nom']}}</h1>
            <hr>
            <form id="nom" action="/associacio/update/{{$data['CIF']}}/nom" method="post">
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
            <form id="adreca" action="/associacio/update/{{$data['CIF']}}/adreca" method="post">
                @csrf
                @method('PUT')
                <div class="mb-3 row">
                    <label for="staticEmail" class="col-sm-2 col-form-label">Adreça</label>
                    <div class="col-sm-10">
                        <div class="input-group">
                            <input type="text" class="form-control" required name="adreca" value="{{$data['adreca']}}" placeholder="{{$data['adreca']}}">
                            <button class="btn btn-success" type="submit">Modificar</button>
                        </div>
                    </div>
                </div>
            </form>
            <hr>
            <form id="nom" action="/associacio/update/{{$data['CIF']}}/poblacio" method="post">
                @csrf
                @method('PUT')
                <div class="mb-3 row">
                    <label for="staticEmail" class="col-sm-2 col-form-label">Població</label>
                    <div class="col-sm-10">
                        <div class="input-group">
                            <input type="text" class="form-control" required name="poblacio" value="{{$data['poblacio']}}" placeholder="{{$data['poblacio']}}">
                            <button class="btn btn-success" type="submit">Modificar</button>
                        </div>
                    </div>
                </div>
            </form>
            <hr>
            <form id="nom" action="/associacio/update/{{$data['CIF']}}/commarca" method="post">
                @csrf
                @method('PUT')
                <div class="mb-3 row">
                    <label for="staticEmail" class="col-sm-2 col-form-label">Commarca</label>
                    <div class="col-sm-10">
                        <div class="input-group">
                            <input type="text" class="form-control" required name="commarca" value="{{$data['commarca']}}" placeholder="{{$data['commarca']}}">
                            <button class="btn btn-success" type="submit">Modificar</button>
                        </div>
                    </div>
                </div>
            </form>
            <hr>
            <form id="nom" action="/associacio/update/{{$data['CIF']}}/declaracio" method="post">
                @csrf
                @method('PUT')
                <div class="mb-3 row">
                    <label for="staticEmail" class="col-sm-2 col-form-label">Declaració</label>
                    <div class="col-sm-10">
                        <div class="input-group">
                            <input type="text" class="form-control" required name="declaracio" value="{{$data['declaracio']}}" placeholder="{{$data['declaracio']}}">
                            <button class="btn btn-success" type="submit">Modificar</button>
                        </div>
                    </div>
                </div>
            </form>
            <hr>
            <form id="nom" action="/associacio/update/{{$data['CIF']}}/tipus" method="post">
                @csrf
                @method('PUT')
                <div class="mb-3 row">
                    <label for="staticEmail" class="col-sm-2 col-form-label">Tipus</label>
                    <div class="col-sm-10">
                        <div class="input-group">
                            <input type="text" class="form-control" required name="tipus" value="{{$data['tipus']}}" placeholder="{{$data['tipus']}}">
                            <button class="btn btn-success" type="submit">Modificar</button>
                        </div>
                    </div>
                </div>
            </form>
            <hr>
            <div class="d-grid gap-2">
                <a class="btn btn-danger" href="/associacions" role="button">Cancel·lar</a>
            </div>
        </section>
    </main>
</body>
</html>