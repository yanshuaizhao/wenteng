@extends('home.layouts.base')
@section('title', '文腾翻译-笔译')

@section('banner')
	<div class="banner">
		<img src="/static/images/channel1.jpg" alt="" />
	</div>
@endsection

@section('content')

<div class="main">
	{!! $pageInfo['content'] !!}
</div>

@endsection



@section('js')
@endsection