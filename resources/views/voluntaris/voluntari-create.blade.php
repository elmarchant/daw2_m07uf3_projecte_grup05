<!DOCTYPE html>
<html lang="ca">
<head>
    @include('structure.head_content')
    <title>Afegir voluntari</title>
</head>
<body>
    <main>
        <section class="container rounded p-4 mt-4 mb-4 bg-light">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="/voluntaris">voluntaris</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Afegir voluntari</li>
                </ol>
            </nav>
            <h1>Afegir voluntari</h1>
            <hr>
            <form id="afegirAsvoluntariacio" action="/voluntari/create/save" method="post">
                @csrf
                @method('POST')
                <div class="mb-3 row">
                    <label for="staticEmail" class="col-sm-2 col-form-label">NIF</label>
                    <div class="col-sm-10">
                        <input type="text" maxlength="9" required class="form-control" id="nif" name="nif">
                    </div>
                </div>
                <div class="mb-3 row">
                    <label for="staticEmail" class="col-sm-2 col-form-label">Nom</label>
                    <div class="col-sm-10">
                        <input type="text" maxlength="30" required class="form-control" id="nom" name="nom">
                    </div>
                </div>
                <div class="mb-3 row">
                    <label for="staticEmail" class="col-sm-2 col-form-label">Cognoms</label>
                    <div class="col-sm-10">
                        <input type="text" maxlength="30" required class="form-control" id="cognom" name="cognom">
                    </div>
                </div>
                <div class="mb-3 row">
                    <label for="staticEmail" class="col-sm-2 col-form-label">Correu</label>
                    <div class="col-sm-10">
                        <input type="email" maxlength="100" class="form-control" id="correu" name="correu">
                    </div>
                </div>
                <div class="mb-3 row">
                    <label for="staticEmail" class="col-sm-2 col-form-label">Mòbil</label>
                    <div class="col-sm-10">
                        <input type="tel" maxlength="9" class="form-control" id="mobil" name="mobil">
                    </div>
                </div>
                <div class="mb-3 row">
                    <label for="staticEmail" class="col-sm-2 col-form-label">Telèfono Fixa</label>
                    <div class="col-sm-10">
                        <input type="tel" maxlength="9" class="form-control" id="tel_fixa" name="tel_fixa">
                    </div>
                </div>
                <div class="mb-3 row">
                    <label for="staticEmail" class="col-sm-2 col-form-label">Adreça</label>
                    <div class="col-sm-10">
                        <input type="text" maxlength="100" class="form-control" id="adreca" name="adreca">
                    </div>
                </div>
                <div class="mb-3 row">
                    <label for="staticEmail" class="col-sm-2 col-form-label">Població</label>
                    <div class="col-sm-10">
                        <input type="text" maxlength="20" class="form-control" id="poblacio" name="poblacio">
                    </div>
                </div>
                <div class="mb-3 row">
                    <label for="staticEmail" class="col-sm-2 col-form-label">Commarca</label>
                    <div class="col-sm-10">
                        <input type="text" maxlength="20" class="form-control" id="commarca" name="commarca">
                    </div>
                </div>
                <div class="mb-3 row">
                    <label for="staticEmail" class="col-sm-2 col-form-label">Data d'ingrés</label>
                    <div class="col-sm-10">
                        <input type="date" required class="form-control" id="data_ingres" name="data_ingres">
                    </div>
                </div>
                <div class="mb-3 row">
                    <label for="staticEmail" class="col-sm-2 col-form-label">Associació</label>
                    <div class="col-sm-10">
                        <select name="cif" required class="form-select" aria-label="Default select example">
                            <option value="">---</option>
                            @foreach ($associacions as $associacio)
                                <option value="{{$associacio['cif']}}">{{$associacio['nom']}}</option> 
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="mb-3 row">
                    <label for="staticEmail" class="col-sm-2 col-form-label">Professió</label>
                    <div class="col-sm-10">
                        <input type="text" maxlength="30" class="form-control" id="professio" name="professio">
                    </div>
                </div>
                <div class="mb-3 row">
                    <label for="staticEmail" class="col-sm-2 col-form-label">Hores de treball</label>
                    <div class="col-sm-10">
                        <input type="number" min="0" class="form-control" id="hores" name="hores">
                    </div>
                </div>
                <div class="mb-3 row">
                    <label for="staticEmail" class="col-sm-2 col-form-label">Data de naiximent</label>
                    <div class="col-sm-10">
                        <input type="date" required class="form-control" id="edat" name="edat">
                    </div>
                </div>
                <hr>
                <button type="submit" id="submit" class="btn btn-primary">Afegir voluntari</button>
                <button type="reset" class="btn btn-secondary">Netejar</button>
                <a class="btn btn-danger" href="/voluntaris" role="button">Cancel·lar</a>
            </form>
        </section>
    </main>
</body>
</html>