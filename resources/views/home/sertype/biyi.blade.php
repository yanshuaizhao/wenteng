@extends('home.layouts.base')
@section('title', '文腾翻译-服务类型-笔译')

@section('banner')
	<div class="banner">
		<img src="/static/images/channel1.jpg" alt="" />
	</div>

@endsection

@section('content')

	<div class="main">
		<div class="section_2">
			<h2 class="titlemodel wow  ">
				笔译服务

			</h2>
			<div class="desc2 wow  ">
				文档翻译是文腾翻译的优势服务项目。凭着精细化的服务流程，我们做出了行业顶级的质量。近三年“博鳌亚洲论坛年会”的全部文稿翻译工作全都由文腾翻译承担，文腾翻译文字翻译的质量获得了委托方的高度评价。另外，我们与清华大学出版社在内的各大出版社长期合作，翻译专著书籍近百本，这都是文腾翻译在文档翻译方面深厚实力的体现。
			</div>
			<div class="list">
				<ul class="listmodel1">
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
					{{--<li class="li2 wow  ">
						<div class="bigbox">
							<a class="box">
							<span class="title">
								经济贸易
							</span>
								<span class="imgbox"></span>
								<span class="desc">
								已建立庞大专业的术语库，<br />保证翻译质量达到专业水准
							</span>
							</a>
							<a href="#" class="zz">
								<i></i>
							</a>
						</div>
					</li>
					<li class="li3 wow  ">
						<div class="bigbox">
							<a class="box">
							<span class="title">
								机械电子
							</span>
								<span class="imgbox"></span>
								<span class="desc">
								一对一的定制解决方案，<br />确保翻译及时性与准确性
							</span>
							</a>
							<a href="#" class="zz">
								<i></i>
							</a>
						</div>
					</li>
					<li class="li4 wow  ">
						<div class="bigbox">
							<a class="box">
							<span class="title">
								生物医学
							</span>
								<span class="imgbox"></span>
								<span class="desc">
								为广大医疗企业，<br />大学及医学科研机构<br />提供出色翻译服务
							</span>
							</a>
							<a href="#" class="zz">
								<i></i>
							</a>
						</div>
					</li>
					<li class="li5 wow  ">
						<div class="bigbox">
							<a class="box">
							<span class="title">
								能源矿产
							</span>
								<span class="imgbox"></span>
								<span class="desc">
								丰富的行业实践经验，为众多<br />知名企业提供专业翻译服务
							</span>
							</a>
							<a href="#" class="zz">
								<i></i>
							</a>
						</div>
					</li>
					<li class="li6 wow  ">
						<div class="bigbox">
							<a class="box">
							<span class="title">
								IT科技
							</span>
								<span class="imgbox"></span>
								<span class="desc">
								资深科技译员和外籍译员的<br />协同校对，严谨规范翻译流程
							</span>
							</a>
							<a href="#" class="zz">
								<i></i>
							</a>
						</div>
					</li>
					<li class="li7 wow  ">
						<div class="bigbox">
							<a class="box">
							<span class="title">
								建筑工程
							</span>
								<span class="imgbox"></span>
								<span class="desc">
								专业的翻译服务团队，快速<br />精准地完成客户的委托项目
							</span>
							</a>
							<a href="#" class="zz">
								<i></i>
							</a>
						</div>
					</li>
					<li class="li8 wow  ">
						<div class="bigbox">
							<a class="box">
							<span class="title">
								人文艺术
							</span>
								<span class="imgbox"></span>
								<span class="desc">
								译员经过严格的语言测试，<br />具备高级翻译资质，<br />实现母语级翻译水准
							</span>
							</a>
							<a href="#" class="zz">
								<i></i>
							</a>
						</div>
					</li>--}}
				</ul>
			</div>
			<div class="zxfw">
				<a href="#">立即咨询</a>
			</div>
			<div class="clear"></div>
		</div>
	</div>


@endsection

@section('js')
@endsection