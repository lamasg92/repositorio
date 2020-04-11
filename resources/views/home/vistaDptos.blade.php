@extends('layouts.home')

@section('content')
    
    <ul>
        @foreach($departamentos as $depa)
            <li><a href="{{ url('vistaCar', ['id' => $depa->id]) }}">{{ $depa->nombre_dpto }}</a></li>
        @endforeach
    </ul>

@endsection