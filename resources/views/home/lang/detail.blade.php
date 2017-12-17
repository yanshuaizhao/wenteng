@extends('home.layouts.base')
@section('title', "语种 - $langInfo[title] ")

@section('banner')
  <div class="banner"><img src="/static/images/1.jpg" alt="" /></div>
@endsection

@section('content')

<div class="main">
  {!! $langInfo['content'] !!}
</div>

@endsection

@section('js')
@endsection

