@extends('templates.layout')

@section('title', $title)
@section('content')

<a href="/products/products"><i class="bi bi-arrow-left"></i></a>
@component('components.createP.form')@endcomponent

@endsection