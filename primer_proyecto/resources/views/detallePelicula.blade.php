@extends('layout.app')
@section('title', "Detalle de película: $id")
@section('body')
  <?php $pelicula = null ?>
  @foreach($peliculas as $idp => $peli)
    @if ($idp == $id)
      <?php $pelicula = $peli['title'] ?>
    @endif
  @endforeach
  @if ($pelicula == null)
    <p><?php echo "No existe" ?></p>
  @else
    <p>{{$pelicula}}</p>
  @endif
@endsection
