@extends('home.layouts.base')
@section('title', "文腾翻译-翻译语种")

@section('banner')
	<div class="banner"><img src="/static/images/channel1.jpg" alt="" /></div>
@endsection

@section('content')

<div class="main">
	<div class="height10"></div>
	<div class="titlemodel2">
		<h2 class="h2tit">
			翻译语种
		</h2>
		<div class="desc"></div>
	</div>
	<div class="section_6">
		<div class="descwords">
			<p>
				文腾翻译目前能够支持100多种世界主要语言的互译。
			</p>
			<p>
				服务语种全，多稀有的语种我们都能翻译；人才层次多，能够提供最实惠的价格；译者素质高，无论大小语种我们都能找到最专业的翻译人才。
			</p>
		</div>
		<div class="link"></div>
	</div>
	<div class="yzlist">
		<ul>

			@foreach($langList as $k=>$v)
				@if( ($k+1) % 5 == 0)
					<li class="noright">
				@else
					<li>
				@endif
				<div class="box">

					<div class="zzbox">
						<a href="/lang/{{ $v['id'] }}.html">
							<span class="tit">
								{{ $v['title'] }}
							</span>
							<span class="pri">
								每字 ¥ <strong>{{ $v['money'] }}</strong> 起
							</span>
						</a>
					</div>

					<div class="smallbx">
						<div class="name">
							{{ $v['title'] }}
						</div>
						<div class="imgbx">
							<img src="{{ $v['img'] }}" alt="" />
						</div>
						<div class="desc">
							{!! $v['desc'] !!}
						</div>
					</div>
				</div>
			</li>
			@endforeach
		</ul>
		<div class="clear"></div>
		<div class="deb">
			<span>
				其他100余种地区性小语种价格及译者安排
			</span>
			<a href="#">详询客服</a>
		</div>
	</div>


</div>

@endsection


@section('js')
@endsection
