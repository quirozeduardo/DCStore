<div class="slider-container container-fluid">
    <div class="bxslider">
        @foreach($articles as $article)
            <div>
                @include('templates.partials.card_article',[
                'title' => $article->id,
                'image' => $article->image,
                'url' => $article->id,
                'urlPatern' => url('/peliculas'),
                ])
            </div>
        @endforeach
        
    </div>
</div>