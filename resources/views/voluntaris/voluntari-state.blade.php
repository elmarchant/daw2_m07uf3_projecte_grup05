<!DOCTYPE html>
<html lang="ca">
<head>
    @include('structure.head_content')
    <title>{{$missatge}}</title>
</head>
<body>
    <main>
        <section class="container rounded p-4 mt-4 mb-4 bg-light">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="/voluntaris">Voluntaris</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Información completa</li>
                </ol>
            </nav>
            <h1>{{$missatge}}</h1>
            <hr>
            <a class="btn btn-primary" href="/voluntaris" role="button">Tornar</a>
        </section>
    </main>
</body>
</html>