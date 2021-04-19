<!DOCTYPE html>
<html lang="ca">
<head>
    @include('structure.head_content')
    <title>vincles</title>
    <script src="{{ asset('js/vincle-remove.js') }}"></script>
</head>
<body>
    <main>
        @include('structure.navBar')
        <section class="container rounded p-4 mt-4 mb-4 bg-light">
            <h1>vincles</h1>
            <hr>
            <table class="table">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Associació</th>
                        <th>Soci</th>
                        <th>Data de vinculació</th>
                        <th>Quota(mensual) del soci</th>
                        <th>Accions</th>
                    </tr>
                </thead>
                <tbody>
                    @php
                        $number = 1;
                    @endphp
                    @foreach ($vincles as $vincle)
                    <tr>
                        <th>{{$number}}</th>
                        <td>{{$vincle['associacio']}}</td>
                        <td>{{$vincle['soci']}}</td>
                        <td>{{$vincle['data_associacio']}}</td>
                        <td>{{$vincle['quota']}}</td>
                        <td>
                            <div class="dropdown">
                                <button type="submit" form="{{$vincle['id']}}" class="btn btn-secondary">Desvincular</button>
                                <form style="display: none;" id="{{$vincle['id']}}" class="remove-form" action="/vincle/remove" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <input type="hidden" name="id" value="{{$vincle['id']}}">
                                </form>
                            </div>
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
                <a class="btn btn-primary" href="/vincle/create" role="button">Vincular</a>
            </div>
        </section>
    </main>
</body>
</html>