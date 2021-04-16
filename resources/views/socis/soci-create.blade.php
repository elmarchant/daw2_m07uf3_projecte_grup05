<!DOCTYPE html>
<html lang="ca">
<head>
    @include('structure.head_content')
    <title>Afegir associació</title>
</head>
<body>
    <main>
        <section class="container rounded p-4 mt-4 mb-4 bg-light">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="/socis">Socis</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Afegir soci</li>
                </ol>
            </nav>
            <h1>Afegir soci</h1>
            <hr>
            <form id="afegirAssociacio" action="/soci/create/save" method="post">
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
                        <input type="email" maxlength="30" class="form-control" id="correu" name="correu">
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
                <hr>
                <button type="submit" id="submit" class="btn btn-primary">Afegir soci</button>
                <button type="reset" class="btn btn-secondary">Netejar</button>
                <a class="btn btn-danger" href="/socis" role="button">Cancel·lar</a>
            </form>
        </section>
    </main>
</body>
</html>