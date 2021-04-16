<!DOCTYPE html>
<html lang="ca">
<head>
    @include('structure.head_content')
    <title>Afegir associació</title>
    <script src="{{ asset('js/associacio-create.js') }}"></script>
</head>
<body>
    <main>
        <section class="container rounded p-4 mt-4 mb-4 bg-light">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="/associacions">Associacions</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Afegir associació</li>
                </ol>
            </nav>
            <h1>Afegir associació</h1>
            <hr>
            <form id="afegirAssociacio" action="/associacio/create/save" method="post">
                @csrf
                @method('POST')
                <div class="mb-3 row">
                    <label for="staticEmail" class="col-sm-2 col-form-label">CIF</label>
                    <div class="col-sm-10">
                        <input type="text" required class="form-control" id="cif" name="cif">
                    </div>
                </div>
                <div class="mb-3 row">
                    <label for="staticEmail" class="col-sm-2 col-form-label">Nom</label>
                    <div class="col-sm-10">
                        <input type="text" required class="form-control" id="nom" name="nom">
                    </div>
                </div>
                <div class="mb-3 row">
                    <label for="staticEmail" class="col-sm-2 col-form-label">Adreça</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" id="adreca" name="adreca">
                    </div>
                </div>
                <div class="mb-3 row">
                    <label for="staticEmail" class="col-sm-2 col-form-label">Població</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" id="poblacio" name="poblacio">
                    </div>
                </div>
                <div class="mb-3 row">
                    <label for="staticEmail" class="col-sm-2 col-form-label">Commarca</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" id="commarca" name="commarca">
                    </div>
                </div>
                <div class="mb-3 row">
                    <label for="staticEmail" class="col-sm-2 col-form-label">Declaració</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" id="declaracio" name="declaracio">
                    </div>
                </div>
                <div class="mb-3 row">
                    <label for="staticEmail" class="col-sm-2 col-form-label">Tipus</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" id="tipus" name="tipus">
                    </div>
                </div>
                <hr>
                <button type="submit" id="submit" class="btn btn-primary">Afegir associació</button>
                <button type="reset" class="btn btn-secondary">Netejar</button>
                <a class="btn btn-danger" href="/associacions" role="button">Cancel·lar</a>
            </form>
        </section>
    </main>
</body>
</html>