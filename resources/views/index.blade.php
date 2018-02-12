<div class="row">
	@include('templates.partials.section_article',[
		'articles'=>$movies,
		'title'=>'Películas',
		'urlPatern' => url('/peliculas'),
		])
	@include('templates.partials.section_article',[
		'articles'=>$series,
		'title'=>'Series',
		'urlPatern' => url('/series'),
		])
	@include('templates.partials.section_article',[
		'articles'=>$games,
		'title'=>'Juegos',
		'urlPatern' => url('/juegos'),
		])
	@include('templates.partials.section_article',[
		'articles'=>$softwares,
		'title'=>'Software',
		'urlPatern' => url('/software'),
		])
</div>
