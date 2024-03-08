@extends('templates.layout')

@section('title', $title)
@section('content')

    @component('components.viewP.card')
        @slot('products', $products);
    @endcomponent

    @component('components.viewP.otherSection')@endcomponent

@endsection