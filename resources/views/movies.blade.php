@extends('layouts.app')

@section('content')
	@foreach($articles as $article)
		@include('templates.partials.card_article',compact('article'))
	@endforeach
@endsection