@extends('layouts.app')

@section('content')
	<div class="row">
		@include('templates.partials.section_article',['articles'=>$movies,'title'=>'Películas'])
		@include('templates.partials.section_article',['articles'=>$movies,'title'=>'Películas'])
	</div>
@endsection