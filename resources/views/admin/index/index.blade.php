<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>bootstrap中文后台开发框架 www.bootstrapmb.com</title>

    <link href="{{asset('static/css/style.css')}}" rel="stylesheet">
    <link href="{{asset('static/css/bootstrap.min.css')}}" rel="stylesheet">
    <link href="{{asset('static/css/theme.css')}}" rel="stylesheet">
    <link href="{{asset('static/css/fonts.css')}}" rel="stylesheet">
    <script src="{{asset('static/js/jquery.min.js')}}"></script>
    <script src="{{asset('static/js/bootstrap.js')}}"></script>
    <script src="{{asset('static/js/jquery.cookie.js')}}"></script>
    <script src="{{asset('static/js/framework.js')}}"></script>
    <link href="{{asset('static/css/element-ui.css')}}" rel="stylesheet">
</head>

<body class="theme-blue-gradient pace-done" style="overflow: hidden; ">
<div class="pace  pace-inactive">
    <div class="pace-progress" style="width: 100%;" data-progress-text="100%" data-progress="99">
        <div class="pace-progress-inner"></div>
    </div>
    <div class="pace-activity"></div>
</div>
<div id="ajax-loader" style="background: rgb(255, 255, 255); left: -50%; top: -50%; width: 200%; height: 200%; overflow: hidden; display: none; position: fixed; z-index: 10000; cursor: progress;">
    <img style="position: absolute; top: 0; left: 0; right: 0; bottom: 0; margin: auto;" src="{{asset('static/picture/loader.gif')}}">
</div>
<div id="theme-wrapper">
    <header class="navbar" id="header-navbar">
        <div class="container" style="padding-right: 0px;">
            <a class="navbar-brand" id="logo" href="#">后台管理系统</a>
            <div class="clearfix">
                <div class="nav-no-collapse navbar-left pull-left hidden-sm hidden-xs">
                    <ul class="nav navbar-nav pull-left">
                        <li>
                            <a id="make-small-nav">
                                <div class="ftdms-aside-toggler">
                                    <span class="ftdms-toggler-bar"></span>
                                    <span class="ftdms-toggler-bar"></span>
                                    <span class="ftdms-toggler-bar"></span>
                                </div>
                            </a>
                        </li>
                    </ul>
                </div>
                <div class="nav-no-collapse pull-right" id="header-nav">
                    <ul class="nav navbar-nav pull-right">
                        <li class="dropdown profile-dropdown">
                            <a class="dropdown" href="#" data-toggle="dropdown">
                                <!-- <img class="img-qrcode img-qrcode-46" src="images/ftsucai.png" alt="用户头像" /> -->
                                <span class="hidden-xs">当前用户：bootstrap中文&nbsp;&nbsp;&nbsp;&nbsp;角色：管理员</span></a>
                            <ul class="dropdown-menu pull-right">
                                <li>
                                    <a class="submenuitem" href="pages_profile.html" data-id="rofile" data-index="100"><i class="ft ftsucai-58"></i>个人信息</a>
                                </li>
                                <li>
                                    <a class="submenuitem" href="pages_edit_pwd.html" data-id="linkpwd" data-index="101"><i class="ft ftsucai-edit-2"></i>修改密码</a>
                                </li>
                                <li>
                                    <a href="javascript:void(0);" @click="exit"><i class="ft ftsucai-exit2"></i>安全退出</a>
                                </li>
                            </ul>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </header>
    <div class="container" id="page-wrapper">
        <div class="row">
            <div id="nav-col">
                <section class="col-left-nano" id="col-left">
                    <div class="col-left-nano-content" id="col-left-inner">
                        <div class="collapse navbar-collapse navbar-ex1-collapse" id="sidebar-nav">
                            <ul class="nav nav-pills nav-stacked">
                                @foreach(config('adminmenu') as $item)
                                <li>
                                    <a class="dropdown-toggle" href="{{url($item['index'])}}" data-id="{{$item['id']}}">
                                        <i class="ft {{$item['icon']}}"></i>
                                        <span>{{$item['name']}}</span>
                                        <i class="ft ftsucai-139 drop-icon"></i>
                                    </a>
                                    @if(isset($item['submenu']) && $item['submenu'])
                                        <ul class="submenu">
                                        @foreach($item['submenu'] as $it)
                                            <li>
                                                <a class="submenuitem" href="{{url($it['index'])}}" data-id="{{$it['id']}}" data-index="1">{{$it['name']}}</a>
                                            </li>
                                        @endforeach
                                        </ul>
                                    @endif
                                </li>
                                @endforeach
                            </ul>
                        </div>
                    </div>
                </section>
            </div>
            <div id="content-wrapper">
                <div class="content-tabs" style="height:44px;border-bottom:2px solid #f0f0f0;">
                    <button class="roll-nav roll-left tabLeft">
                        <i class="ft ftsucai-backward2"></i>
                    </button>
                    <nav class="page-tabs menuTabs">
                        <div class="page-tabs-content" style="margin-left: 0px;">
                            <a class="menuTab active" href="javascript:;" data-id="home.html">欢迎首页</a></div>
                    </nav>
                    <button class="roll-nav roll-right tabRight">
                        <i class="ft ftsucai-forward3"></i>
                    </button>
                    <div class="btn-group roll-nav roll-right">
                        <button class="dropdown tabClose" data-toggle="dropdown">页签操作
                            <i class="ft caret" style="padding-top: 3px;"></i>
                        </button>
                        <ul class="dropdown-menu dropdown-menu-right">
                            <li>
                                <a class="tabReload" href="javascript:void(0);"><i class="ft ftsucai-spinner3"></i>刷新当前页面</a></li>
                            <li>
                                <a class="tabCloseCurrent" href="javascript:void(0);"><i class="ft ftsucai-close-3"></i>关闭当前页面</a></li>
                            <li>
                                <a class="tabCloseAll" href="javascript:void(0);"><i class="ft ftsucai-77"></i>关闭全部页面</a></li>
                            <li>
                                <a class="tabCloseOther" href="javascript:void(0);"><i class="ft ftsucai-120"></i>除此之外全关</a></li>
                        </ul>
                    </div>
                </div>
                <div class="content-iframe" style="background-color: #f9f9f9;">
                    <div class="mainContent" id="content-main" style="margin: 0px; padding: 0px; height: 1050px;">
                        <iframe name="main_iframe" width="100%" height="100%" class="main_iframe" id="default" src="{{url('/admin/home')}}" frameborder="0" data-id="home.html"></iframe>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<div id="loadingPage" style="display: none;">
    <div class="loading-shade"></div>
    <div class="loading-content" onclick="$.loading(false)">数据加载中，请稍后…</div>
</div>
<script src="{{asset('static/js/index.js')}}"></script>
<script src="{{asset('static/js/indextab.js')}}"></script>
<script src="{{asset('static/js/pace.min.js')}}"></script>
<script type="text/javascript" src="{{asset('static/js/vue.js')}}"></script>
<script type="text/javascript" src="{{asset('static/js/element-ui.js')}}"></script>
<script>
    const app = new Vue({
        el: '#header-nav',
        data: {},
        methods:{
            exit(){
                this.$confirm('确定退出登录吗', '提示', {
                    confirmButtonText: '确定',
                    cancelButtonText: '取消',
                    type: 'warning'
                }).then(() => {
                    let that = this;
                    $.ajaxSetup({
                        headers: {
                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                        },
                    });
                    $.post('{{url('/admin/logout')}}',{},function(res){
                        if(res.code == 200){
                            that.$message({
                                message: '操作成功',
                                type: 'success'
                            })
                            setTimeout(function(){
                                location.href = "{{url('/admin/login')}}";
                            }, 1500)
                        }else{
                            that.$message({
                                message: res.msg,
                                type: 'error',
                                showClose: true
                            })
                        }
                    },'json')
                }).catch(() => {});
            },
        }
    })
</script>
</body>

</html>
