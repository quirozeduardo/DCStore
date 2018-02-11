@extends('layouts.app')

@section('content')
	<div class="row">
		@include('templates.partials.section_article',['articles'=>$articles,'title'=>'Películas'])
		@include('templates.partials.dots',compact('ndots'))
	</div>
@endsection