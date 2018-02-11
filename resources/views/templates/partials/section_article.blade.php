
<article class="section-article col-12">
	<div class="section-article-title-container">
		<h3>{{ $title }}</h3>
	</div>	
	<div class="section-article-articles-container">
		@foreach($articles as $article)
			@include('templates.partials.card_article',compact('article'))
		@endforeach
	</div>
</article>