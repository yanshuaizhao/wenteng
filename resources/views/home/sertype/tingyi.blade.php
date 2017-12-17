@extends('home.layouts.base')
@section('title', '文腾翻译-服务类型-听译')

@section('banner')
	<div class="banner">
		<img src="/static/images/channel1.jpg" alt="" />
	</div>

@endsection

@section('content')


	<div class="main">
		<div class="section_2 mb58">
			<h2 class="titlemodel wow  ">
				影音听译

			</h2>
			<div class="desc2 wow  ">
				文腾翻译有自己的听译团队，致力于提供专业的字幕翻译、会议录音听译、影视听译、字幕制作、母语配音等影音听译服务，而且整个流程都由我们自己把控，质量有保证，价格更实惠。目前团队能够听译英语、法语、俄语、韩语、日语等20多种语言，并能够完成从听译到字幕制作，及母语配音（配音由专业配音工作室完成）的全流程工作，周听译量超过1000分钟，合作客户超过100家。
			</div>
			<div class="list">
				<ul class="listmodel3">

					@foreach($list as $k=>$v)
						<li class="li{{$k+1}} wow">
							<div class="bigbox">
								<a class="box">
							<span class="title">
								{{$v['title']}}
							</span>
									<span class="imgbox"></span>
									<span class="desc">{!! $v['desc'] !!}	</span>
								</a>
								<a href="/field/{{ $v['id'] }}.html" class="zz">
									<i></i>
								</a>
							</div>
						</li>
					@endforeach

				</ul>
			</div>
			<div class="hright26"></div>
			<div class="zxfw2">
			<span class="emmodel">
				其他类型文件请联系客服人员
			</span>
				<a href="#" class="modela">在线顾问</a>
			</div>
			<div class="height16"></div>
			<div class="title44">
				服务流程
			</div>
			<div class="height29"></div>
			<div class="liuchengmodel">
				<div class="model">
					<div class="list1">
						<span class="s1">
							确认需求
						</span>
						<img src="/static/images/right.png" alt="">
						<span class="s1">
							预付定金
						</span>
						<img src="/static/images/right.png" alt="">
						<span class="s2">
							文本听译
						</span>
						<img src="/static/images/right.png" alt="">
						<span class="s2">
							字幕制作
						</span>
						<img src="/static/images/right.png" alt="">
						<span class="s2">
							母语配音
						</span>
						<img src="/static/images/right.png" alt="">
						<span class="s1">
							视频合成
						</span>
						<img src="/static/images/right.png" alt="">
						<span class="s1">
							支付尾款
						</span>

					</div>
					<div class="bj2"></div>
					<div class="list2">
						<p>
							文腾专员
						</p>
						<p>
							文腾专员
						</p>
						<p>
							母语播音员
						</p>
					</div>
				</div>
			</div>


			<div class="clear"></div>
		</div>
		<div class="graybjbox">
			<div class="height40"></div>
			<div class="title44">
				行业对比
			</div>
			<div class="db">
				<div class="tt">
					<span class="s1">
						一般公司
					</span>
					<span class="s2">
						文腾翻译
					</span>
				</div>
				<div class="listmodel" style="position: relative;left: -13px;">
					<div class="leftbox" style="width: 403px;">
						<p>
							用户需先向公司说明需求，公司再按照自己意愿
						</p>
						<p>
							展示多名译员供客户筛选，最终敲定人选
						</p>
					</div>
					<div class="middle" style="position: relative;
					top: -12px;">
						流程
					</div>
					<div class="rightbox" style="width: 375px;">
						<p>
							用户根据需求，直接从海量译员库里挑选适合自己译员，
						</p>
						<p>
							再向公司确认最终人选
						</p>
					</div>
				</div>
				<div class="listmodel" style="position: relative;left:17px;">
					<div class="leftbox" style="width: 393px;">
						<p>
							公司自主报价，用户不了解译员实际报价，公司赚取差价
						</p>
					</div>
					<div class="middle">
						收费
					</div>
					<div class="rightbox" style="width: 425px;">
						<p>
							展示为译员实际收费，公司收取30%服务费，如不实可获赔偿
						</p>
					</div>
				</div>
				<div class="listmodel" style="position: relative;left: 27px;">
					<div class="leftbox" style="width: 280px;">
						<p>
							流程繁琐、不透明、选人不贴心、成本高
						</p>
					</div>
					<div class="middle">
						整体
					</div>
					<div class="rightbox" style="width: 333px;">
						<p>
							高效、透明、选最贴近需求的人选、成本可控
						</p>
					</div>
				</div>
			</div>
			<div class="height32b"></div>
			<div class="height43"></div>
			<div class="title44">
				服务价格
			</div>
			<div class="height23"></div>
			<div class="tableboxmodel2">
				<table border="0" cellspacing="0" cellpadding="0">
					<caption>
						音视频听译配音（单位：元/分钟）
					</caption>
					<tr>
						<td width="331" class="tel">
							项目
						</td>
						<td width="331">
							英语
						</td>
						<td width="331">
							日德法德韩西语
						</td>
						<td width="331">
							小语种
						</td>
					</tr>
					<tr>
						<td class="tel">
							听写
						</td>
						<td>
						<span class="s1">
							50
						</span>
							<span class="s2">
							市场价
						</span>
						</td>
						<td>
							80
						</td>
						<td>
							议定
						</td>
					</tr>
					<tr>
						<td class="tel">
							听写
						</td>
						<td>
						<span class="s1">
							50
						</span>
							<span class="s2">
							市场价
						</span>
						</td>
						<td>
							80
						</td>
						<td>
							议定
						</td>
					</tr>
					<tr>
						<td class="tel">
							听写
						</td>
						<td>
						<span class="s1">
							50
						</span>
							<span class="s2">
							市场价
						</span>
						</td>
						<td>
							80
						</td>
						<td>
							议定
						</td>
					</tr>
					<tr>
						<td class="tel">
							听写
						</td>
						<td>
							100起
						</td>
						<td>
							80
						</td>
						<td>
							议定
						</td>
					</tr>
					<tr>
						<td class="tel">
							听写
						</td>
						<td>
							100起
						</td>
						<td>
							80
						</td>
						<td>
							议定
						</td>
					</tr>
				</table>
				<div class="descboxmodel">
					<p>
						说明
					</p>
					<p>
						1、以上价格1、以上价格1、以上价格1、以上价格1、以上价格1、以上价格
					</p>
					<p>
						2、1、以上价格1、以上价格1、以上价格1、以上价格1、以上价格
					</p>
				</div>
			</div>
			<div class="height21"></div>
			<div class="linkmodel">
				<a href="#" class="modela2">立即获取报价</a>
			</div>
			<div class="height25"></div>
			<div class="title44">
				合作客户
			</div>
			<div class="height15"></div>
			<div class="companylist">
				<ul>
					<li>
						<a href="#">
							<img src="/static/images/co1.png" alt="" />
						</a>
					</li>
					<li>
						<a href="#">
							<img src="/static/images/co1.png" alt="" />
						</a>
					</li>
					<li>
						<a href="#">
							<img src="/static/images/co1.png" alt="" />
						</a>
					</li>
					<li>
						<a href="#">
							<img src="/static/images/co1.png" alt="" />
						</a>
					</li>
					<li class="noright">
						<a href="#">
							<img src="/static/images/co1.png" alt="" />
						</a>
					</li>
					<li>
						<a href="#">
							<img src="/static/images/co1.png" alt="" />
						</a>
					</li>
					<li>
						<a href="#">
							<img src="/static/images/co1.png" alt="" />
						</a>
					</li>
					<li>
						<a href="#">
							<img src="/static/images/co1.png" alt="" />
						</a>
					</li>
					<li>
						<a href="#">
							<img src="/static/images/co1.png" alt="" />
						</a>
					</li>
					<li class="noright">
						<a href="#">
							<img src="/static/images/co1.png" alt="" />
						</a>
					</li>
				</ul>
				<div class="clear"></div>
			</div>
			<div class="height58"></div>
		</div>

	</div>


@endsection

@section('js')
@endsection