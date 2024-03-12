@extends('template.layout')
@section('title', 'Visualizza libro')


@section('content')

@section('addBook')
<a href="/libro/create" class="btn btn-primary mt-4">Aggiungi libro</a>

@if($libros)
<table class="table">
  <thead>
    <tr>
      <th scope="col">N°</th>
      <th scope="col">Titolo</th>
      <th scope="col">Pagine</th>
      <th scope="col">Anno di pubblicazione</th>
      <th scope="col">Nome autore</th>
    </tr>
  </thead>
  <tbody>
    @foreach($libros as $libro )
    <tr>
      <th scope="row">{{ $loop->iteration }}</th>
      <td>{{ $libro->title }}</td>
      <td>{{ $libro->pages }}</td>
      <td>{{ $libro->year }}</td>
      <td>{{ $libro->name }}</td>
      <td><a href="/libro/update"><i class="text-info bi bi-info-square"></i></a></td>
      <td><a href="/libro/{{$libro->id}}/destroy"><i class="text-danger bi bi-trash"></i></a></td>
    </tr>
    @endforeach
  </tbody>
</table>
@else
<p>Nessun libro trovato.</p>
@endif

@endsection
