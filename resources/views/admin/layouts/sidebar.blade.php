<aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
        <!-- Sidebar user panel -->

        <!-- sidebar menu: : style can be found in sidebar.less -->
        <ul class="sidebar-menu" data-widget="tree">
            <li class="@if(Request::path()=='/admin/index') active @endif treeview">
                <a href="#">
                    <i class="fa fa-dashboard"></i> <span>Dashboard</span>
                    <span class="pull-right-container">
                            <i class="fa fa-angle-left pull-right"></i>
                    </span>
                </a>
                <ul class="treeview-menu">
                    <li @if(Request::path()=='/admin/index') class="active" @endif><a href="/admin/index"><i class="fa fa-circle-o"></i> 系统首页</a></li>
                </ul>
            </li>

            <li class="treeview @if( in_array(Request::path(), ['admin/lang/index', 'admin/article/index'])) active @endif">
                <a href="#">
                    <i class="fa fa-th"></i>
                    <span>内容管理</span>
                    <span class="pull-right-container">
                            <i class="fa fa-angle-left pull-right"></i>
                    </span>
                </a>
                <ul class="treeview-menu">
                    <li @if(Request::path()=='admin/lang/index') class="active" @endif><a href="/admin/lang/index"><i class="fa fa-circle-o"></i> 翻译语种</a></li>
                    <li @if(Request::path()=='admin/article/index') class="active" @endif><a href="/admin/article/index"><i class="fa fa-circle-o"></i> 文章管理</a></li>
                </ul>
            </li>

            <li class="treeview">
                <a href="#">
                    <i class="fa fa-th"></i>
                    <span>用户管理</span>
                    <span class="pull-right-container">
                            <i class="fa fa-angle-left pull-right"></i>
                        </span>
                </a>
                <ul class="treeview-menu">
                    <li><a href="#"><i class="fa fa-circle-o"></i> 用户列表</a></li>
                    <li><a href="#"><i class="fa fa-circle-o"></i> 订单列表</a></li>
                </ul>
            </li>



            <li class="treeview @if( in_array(mb_substr(Request::path(), 0, 10), ['admin/conf', 'admin/nav/'])) active @endif">
                <a href="#">
                    <i class="fa fa-th"></i>
                    <span>站点设置</span>
                    <span class="pull-right-container">
                            <i class="fa fa-angle-left pull-right"></i>
                    </span>
                </a>
                <ul class="treeview-menu">
                    <li @if(Request::path()=='admin/conf/index') class="active" @endif>
                        <a href="/admin/conf/index">
                            <i class="fa fa-circle-o"></i> 公共配置
                        </a>
                    </li>
                    <li @if(Request::path()=='admin/nav/index') class="active" @endif>
                        <a href="/admin/nav/index">
                            <i class="fa fa-circle-o"></i> 菜单管理
                        </a>
                    </li>
                </ul>
            </li>


            <li class="treeview @if( in_array(Request::path(), ['admin/adm_permissions/index', 'admin/adm_roles/index', 'admin/adm_users/index'])) active @endif">
                <a href="#">
                    <i class="fa fa-th"></i>
                    <span>系统管理</span>
                    <span class="pull-right-container">
                            <i class="fa fa-angle-left pull-right"></i>
                    </span>
                </a>
                <ul class="treeview-menu">
                    <li><a href=""><i class="fa fa-circle-o"></i> 菜单管理</a></li>
                    <li @if(Request::path()=='admin/adm_permissions/index') class="active" @endif><a href="/admin/adm_permissions/index"><i class="fa fa-circle-o"></i> 权限管理</a></li>
                    <li @if(Request::path()=='admin/adm_roles/index') class="active" @endif><a href="/admin/adm_roles/index"><i class="fa fa-circle-o"></i> 角色管理</a></li>
                    <li @if(Request::path()=='admin/adm_users/index') class="active" @endif><a href="/admin/adm_users/index"><i class="fa fa-circle-o"></i> 账号管理</a></li>
                </ul>
            </li>

        </ul>
    </section>
    <!-- /.sidebar -->
</aside>