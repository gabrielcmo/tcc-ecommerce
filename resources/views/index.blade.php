@extends('layouts.app')

@section('content')
    <h1>Página inicial</h1>

    @if (isset($products))
        {{dd($products, $categories)}}
    @endif
@endsection