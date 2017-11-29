@extends('home.layouts.base')
@section('title', '文腾翻译')

@section('banner')
<div class="banner">
	<img src="/static/images/1.jpg" alt="" />
</div>
@endsection

@section('content')

	<div class="main">
		{!! $homeInfo['content'] !!}
	</div>

@endsection

@section('js')

@endsection