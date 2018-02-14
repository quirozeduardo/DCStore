<div class="show-movie-container">
  <h2 class="text-center" >{{$title}}</h2>
  <div>
  	<img class="mx-auto d-block" src="{{$image}}" alt="{{$title}}">
  </div>
  <div class="text-center">
  	{{-- Informacion --}}
    {{-- Trailer --}}
    {!! $contentSection !!}
  </div>
  <div class="text-center">
    <h5 class="text-danger">Capturas: </h5>
    @foreach($photos as $photo)
      <img class="mx-auto d-block" src="{{$photo}}" alt="{{$title}}">
    @endforeach
  </div>
  <div>
    {{-- Links --}}
  </div>
</div>