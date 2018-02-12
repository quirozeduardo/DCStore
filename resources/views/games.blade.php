<div class="row">
	@include('templates.partials.section_article',[
		'articles'=>$articles,
		'title'=>'Juegos',
		'urlPatern' => url('/peliculas'),
		])
</div>
<div>
	@include('templates.partials.pagination',['npages' => $npages])
</div>