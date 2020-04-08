<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Departamentos</title>
</head>
<body>
    <ul>
        @foreach($departamentos as $depa)
            <li><a href="{{ url('vistaCarreras', ['id' => $depa->id]) }}">{{ $depa->nombre_dpto }}</a></li>
        @endforeach
    </ul>

</body>
</html>
