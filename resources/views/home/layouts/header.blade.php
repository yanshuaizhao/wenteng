<div class="head wow slideInDown">
    <div class="w1200">
        <div class="logo">
            <a href="#">
                <img src="/static/images/logo.png" alt="" />
            </a>
        </div>
        <div class="nav">
            <ul>
                <li>
                    <h2 class="h2tit">
                        <a href="#" class="current">首页</a>
                    </h2>
                </li>
                @foreach($topNav[0] as $k=>$v)
                    <li>
                        <h2 class="h2tit">
                            <a href="{{$v['link']}}">{{$v['title']}}</a>
                        </h2>
                        @if(isset($topNav[$v['id']]))
                            <dl>
                                @foreach($topNav[$v['id']] as $k2=>$v2)
                                    <dd>
                                        <a href="{{$v2['link']}}">{{$v2['title']}}</a>
                                    </dd>
                                @endforeach
                            </dl>
                        @endif
                    </li>
                @endforeach
            </ul>
        </div>
        <div class="tel">
            400-658-2018
        </div>
        <div class="login">
            <a href="#">登陆</a>
            <a href="#">注册</a>
        </div>
    </div>
</div>
