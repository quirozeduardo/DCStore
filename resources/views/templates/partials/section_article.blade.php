<article class="section-article-container col-12">
	<div class="section-article-title-container">
		<h3>{{ $title }}</h3>
	</div>	
	<div class="section-article-articles-container">
		@foreach($articles as $article)
			@include('templates.partials.card_article',[
				'title' => $article->title, 
				'image' => $article->image,
				'url' => $article->id,
				'urlPatern' => $urlPatern,
				])
		@endforeach
	</div>
</article>