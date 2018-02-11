
<article class="col-12">
	<div class="section-article-title-container">
		<h3>{{ $title }}</h3>
	</div>	
	<div class="section-article-articles-container">
		@foreach($articles as $article)
			@include('templates.partials.card_article',['title' => 'Titulo', 'image' => $article->image])
		@endforeach
	</div>
</article>