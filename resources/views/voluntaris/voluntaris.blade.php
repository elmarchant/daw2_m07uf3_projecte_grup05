<!DOCTYPE html>
<html lang="ca">
<head>
    @include('structure.head_content')
    <title>voluntaris</title>
    <script src="{{ asset('js/treballador-remove.js') }}"></script>
</head>
<body>
    <main>
        @include('structure.navBar')
        <section class="container rounded p-4 mt-4 mb-4 bg-light">
            <h1>voluntaris</h1>
            <hr>
            <table class="table">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>NIF</th>
                        <th>Nom</th>
                        <th>Cognom</th>
                        <th>Edat</th>
                        <th>Accions</th>
                    </tr>
                </thead>
                <tbody>
                    @php
                        $number = 1;
                    @endphp
                    @foreach ($voluntaris as $voluntari)
                    <tr>
                        <th>{{$number}}</th>
                        <td>{{$voluntari['nif']}}</td>
                        <td>{{$voluntari['nom']}}</td>
                        <td>{{$voluntari['cognom']}}</td>
                        <td>{{$voluntari['edat']}}</td>
                        <td>
                            <div class="dropdown">
                                <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenu2" data-bs-toggle="dropdown" aria-expanded="false">
                                    Accions
                                </button>
                                <ul class="dropdown-menu" aria-labelledby="dropdownMenu2">
                                    <li><a class="dropdown-item" href="/voluntari/info/{{$voluntari['nif']}}" type="button">Informació completa</a></li>
                                    <li><a class="dropdown-item" href="/voluntari/update/{{$voluntari['nif']}}" type="button">Modificar</a></li>
                                    <li><button type="submit" form="{{$voluntari['nif']}}" class="dropdown-item">Eliminar</button></li>
                                </ul>
                            </div>
                            <form style="display: none;" id="{{$voluntari['nif']}}" class="remove-form" action="/voluntari/remove" method="POST">
                                @csrf
                                @method('DELETE')
                                <input type="hidden" name="nif" value="{{$voluntari['nif']}}">
                            </form>
                        </td>
                        @php
                            $number++;
                        @endphp
                    </tr> 
                    @endforeach
                </tbody>
            </table>
            <hr>
            <div class="d-grid gap-2">
                <a class="btn btn-primary" href="/voluntari/create" role="button">Afegir voluntari</a>
            </div>
        </section>
    </main>
</body>
</html>