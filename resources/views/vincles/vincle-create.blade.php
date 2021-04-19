<!DOCTYPE html>
<html lang="ca">
<head>
    @include('structure.head_content')
    <title>Vincular</title>
</head>
<body>
    <main>
        <section class="container rounded p-4 mt-4 mb-4 bg-light">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="/vincles">vincles</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Vincular</li>
                </ol>
            </nav>
            <h1>Vincular</h1>
            <hr>
            <form id="vincular" action="/vincle/create/save" method="post">
                @csrf
                @method('POST')
                <div class="mb-3 row">
                    <label for="staticEmail" class="col-sm-2 col-form-label">Associació</label>
                    <div class="col-sm-10">
                        <select name="cif" required class="form-select" aria-label="Default select example">
                            <option value="">---</option>
                            @foreach ($associacions as $associacio)
                                <option value="{{$associacio['cif']}}">{{$associacio['associacio']}}</option> 
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="mb-3 row">
                    <label for="staticEmail" class="col-sm-2 col-form-label">Soci</label>
                    <div class="col-sm-10">
                        <select name="nif" required class="form-select" aria-label="Default select example">
                            <option value="">---</option>
                            @foreach ($socis as $soci)
                                <option value="{{$soci['nif']}}">{{$soci['soci']}}</option> 
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="mb-3 row">
                    <label for="staticEmail" class="col-sm-2 col-form-label">Data d'associació</label>
                    <div class="col-sm-10">
                        <input type="date" required class="form-control" id="data_associacio" name="data_associacio">
                    </div>
                </div>
                <div class="mb-3 row">
                    <label for="staticEmail" class="col-sm-2 col-form-label">Quota del soci</label>
                    <div class="col-sm-10">
                        <input type="number" min="0" required class="form-control" id="quota" name="quota">
                    </div>
                </div>
                <hr>
                <button type="submit" id="submit" class="btn btn-primary">Vincular</button>
                <button type="reset" class="btn btn-secondary">Netejar</button>
                <a class="btn btn-danger" href="/vincles" role="button">Cancel·lar</a>
            </form>
        </section>
    </main>
</body>
</html>