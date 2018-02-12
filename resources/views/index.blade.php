<div class="row">
	@include('templates.partials.section_article',['articles'=>$movies,'title'=>'Películas'])
	@include('templates.partials.section_article',['articles'=>$series,'title'=>'Series'])
	@include('templates.partials.section_article',['articles'=>$games,'title'=>'Juegos'])
	@include('templates.partials.section_article',['articles'=>$softwares,'title'=>'Software'])
</div>
