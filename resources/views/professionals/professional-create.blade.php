<!DOCTYPE html>
<html lang="ca">
<head>
    @include('structure.head_content')
    <title>Afegir professional</title>
</head>
<body>
    <main>
        <section class="container rounded p-4 mt-4 mb-4 bg-light">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="/professionals">Professionals</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Afegir professional</li>
                </ol>
            </nav>
            <h1>Afegir professional</h1>
            <hr>
            <form id="afegirAsprofessionalacio" action="/professional/create/save" method="post">
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
                    <label for="staticEmail" class="col-sm-2 col-form-label">Càrrec</label>
                    <div class="col-sm-10">
                        <input type="text" maxlength="30" class="form-control" id="carrec" name="carrec">
                    </div>
                </div>
                <div class="mb-3 row">
                    <label for="staticEmail" class="col-sm-2 col-form-label">Descompte de l'IRPF (%)</label>
                    <div class="col-sm-10">
                        <input type="number" min="0" max="100" class="form-control" id="desc_irpf" name="desc_irpf">
                    </div>
                </div>
                <div class="mb-3 row">
                    <label for="staticEmail" class="col-sm-2 col-form-label">Seguretat Social</label>
                    <div class="col-sm-10">
                        <input type="number" min=0 step=".01" class="form-control" id="quantitat_seguretat_social" name="quantitat_seguretat_social">
                    </div>
                </div>
                <hr>
                <button type="submit" id="submit" class="btn btn-primary">Afegir professional</button>
                <button type="reset" class="btn btn-secondary">Netejar</button>
                <a class="btn btn-danger" href="/professionals" role="button">Cancel·lar</a>
            </form>
        </section>
    </main>
</body>
</html>