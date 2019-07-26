{{-- @foreach ($peliculas as $peli)
  {{ $peli }} <br>
@endforeach --}}

@forelse($peliculas as $peli)
  {{ $peli['title'] }}
  @if ($peli['rating'] >= 8.0)
    <p><?php echo '(Recomendada)' ?></p>
    <br>
  @else
  <br>
  @endif
@empty
  <p><?php echo "No hay películas"; ?></p>
@endforelse
