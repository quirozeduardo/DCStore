<div class="row">
	@include('templates.partials.section_article',['articles'=>$articles,'title'=>'Películas'])
</div>
<div>
	@include('templates.partials.pagination',['npages' => $npages])
</div>