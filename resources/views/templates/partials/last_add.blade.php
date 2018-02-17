<div class="widget-container container-fluid">
	<div class="list-group">
	  <a href="#" class="list-group-item list-group-item-action active">
	    Ultimas Agregadas
	  </a>
	   @foreach($articles as $article)
            <a href="{{ url("peliculas/$article->id") }}" class="list-group-item list-group-item-action" title="{{ $article->title }}">{{ $article->title }}</a>
        @endforeach
	</div>
</div>