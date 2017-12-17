@extends('home.layouts.base')
@section('title', '文腾翻译-翻译领域-详细')

@section('banner')
	<div class="banner">
		<img src="/static/images/1.jpg" alt="" />
	</div>
@endsection

@section('content')

	<div class="main">
		{!! $articleInfo['content'] !!}
	</div>

@endsection


@section('js')
@endsection

