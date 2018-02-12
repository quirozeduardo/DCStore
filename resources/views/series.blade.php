<div class="row">
	@include('templates.partials.section_article',[
		'articles'=>$articles,
		'title'=>'Series',
		'urlPatern' => url('/series'),
		])
</div>
<div>
	@include('templates.partials.pagination',['npages' => $npages])
</div>