<!DOCTYPE html>
<html lang="zh">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
    <title>登录页面 - 后台管理系统模板</title>

    <meta name="keywords" content="后台模板,后台管理系统,HTML模板">
    <meta name="description" content="基于Bootstrap的后台管理系统模板">
    <meta name="author" content="www.bootstrapmb.com">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link href="{{asset('static/css/bootstrap.min.css')}}" rel="stylesheet">
    <link href="{{asset('static/css/fonts.css')}}" rel="stylesheet">
    <link href="{{asset('static/css/style.css')}}" rel="stylesheet">
    <link href="{{asset('static/css/element-ui.css')}}" rel="stylesheet">
    <style>
        .loginpage {
            position: relative;
        }
        .login {
            display: flex !important;
            min-height: 100vh;
            align-items: center !important;
            justify-content: center !important;
        }
        .login-center {
            background: #fff;
            min-width: 38rem;
            padding: 2em 3em;
            border-radius: 10px;
            margin: 2em 0;
        }
        .login-header {
            margin-bottom: 2rem !important;
        }
        .login-center .has-feedback.feedback-left .form-control {
            padding-left: 38px;
            padding-right: 12px;
        }
        .login-center .has-feedback.feedback-left .form-control-feedback {
            left: 0;
            right: auto;
            width: 38px;
            height: 38px;
            line-height: 38px;
            z-index: 4;
            color: #dcdcdc;
        }
        .login-center .has-feedback.feedback-left.row .form-control-feedback {
            left: 15px;
        }
    </style>
</head>

<body>
<div class="loginpage" id="loginForm">
    <div class="login">
        <div class="login-center">
            <div class="login-header text-center">
                <a href="index.html"> <img src="{{asset('static/picture/admin_logo.png')}}"> </a>
            </div>
            <form action="#" method="post">
                <div class="form-group has-feedback feedback-left">
                    <input type="text" placeholder="请输入您的用户名" class="form-control" v-model="account">
                    <span class="ftsucai-65 form-control-feedback" aria-hidden="true"></span>
                </div>
                <div class="form-group has-feedback feedback-left">
                    <input type="password" placeholder="请输入密码" class="form-control" v-model="password">
                    <span class="ftsucai-216 form-control-feedback" aria-hidden="true"></span>
                </div>
                <div class="form-group has-feedback feedback-left row">
                    <div class="col-xs-7">
                        <input type="text" name="captcha" class="form-control" placeholder="验证码" v-model="verify">
                        <span class="ftsucai-mao form-control-feedback" aria-hidden="true"></span>
                    </div>
                    <div class="col-xs-5">
                        <img :src="verify_url" class="pull-right" id="captcha" style="cursor: pointer;" @click="refreshVerify" title="点击刷新" alt="captcha">
                    </div>
                </div>
                <div class="form-group">
                    <button class="btn btn-block btn-primary" type="button" @click="login">立即登录</button>
                </div>
            </form>
            <hr>
        </div>
    </div>
</div>
<script type="text/javascript" src="{{asset('static/js/jquery.min.js')}}"></script>
<script type="text/javascript" src="{{asset('static/js/bootstrap.js')}}"></script>
<script type="text/javascript" src="{{asset('static/js/vue.js')}}"></script>
<script type="text/javascript" src="{{asset('static/js/element-ui.js')}}"></script>
<script>
    const app = new Vue({
        el: '#loginForm',
        data: {
            account: '',
            password: '',
            verify: '',
            verify_url: "{{captcha_src('default')}}"
        },
        methods:{
            refreshVerify(){
                this.verify_url = this.verify_url+'?d='+Math.random()
            },
            login(){
                if(!$.trim(this.account)){
                    this.$message({
                        message: '请输入用户名',
                        type: 'warning',
                        showClose: true,
                    })
                    return false;
                }
                if(!$.trim(this.password)){
                    this.$message({
                        message: '请输入密码',
                        type: 'warning',
                        showClose: true,
                    })
                    return false;
                }
                if(!$.trim(this.verify)){
                    this.$message({
                        message: '请输入验证码',
                        type: 'warning',
                        showClose: true,
                    })
                    return false;
                }
                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                });
                let {account, password, verify} = this;
                let that = this
                $.post('/admin/login',{account, password, verify},function(res){
                    if(res.code != 200){
                        that.$message({
                            message: res.msg,
                            type: 'error',
                            showClose: true
                        })
                        that.refreshVerify();
                    }else{
                        location.href = '{{url('/')}}';
                    }
                },'json');
            },
        }
    })
</script>
</body>
</html>
