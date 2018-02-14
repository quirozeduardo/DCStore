<div>
	<h5 class="text-danger">Información</h5>
	<p>Calidad: {{ $quality }}</p>
	<p>Formato: {{ $format }}</p>
	<p>Resolición: {{ $resolution }}</p>
	<p>Peso: {{ $size }}</p>
	<p>Lenguaje: {{ $lenguage }}</p>
	<p>Subtitulos: {{ $subtitles }}</p>
</div>
<div>
	<h5 class="text-danger">Ficha tecnica</h5>
	<p>Titulo original: {{ $original_title }}</p>
	<p>Otro titulo: {{ $another_title }}</p>
	<p>Año: {{ $year }}</p>
	<p>Duracion: {{ $duration }}</p>
	<p>Pais: {{ $country }}</p>
	<p>Direccion: {{ $directed }}</p>
	<p>Guion: {{ $screenplay }}</p>
	<p>Musica: {{ $music }}</p>
	<p>Cinematografia: {{ $cinematography }}</p>
	<p>Repart: {{ $starring }}</p>
	<p>Productora: {{ $production_company }}</p>
	<p>Generos:
		@foreach($genders as $gender)
			<a href="{{ url("/peliculas/genero/$gender") }}">{{ $gender }}</a> 
		@endforeach
	</p>
</div>