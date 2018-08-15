<!DOCTYPE html><html>
<head>
    <meta charset='UTF-8'>
    <title>登录 - X-社区</title>
    <?php $this->load->view('home/common/header');?>
</head>
<body>
<?php $this->load->view('home/common/nav');?>
    <div class="container">
        <div class="row">
          <div class="col-md-3"></div>
            <div class="col-md-6">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h3 class="panel-title">登录</h3>
                    </div>
                    <div class="panel-body">
					<form accept-charset="UTF-8" action="<?php echo site_url('user/login');?>" class="form-horizontal" id="new_user" method="post" novalidate="novalidate">
					<input type="hidden" name="stb_csrf_token" value="e4198dfcf1d4b99b47b0828a5f7f8f35">
					<div class="form-group">
						<label class="col-md-2 control-label" for="user_nickname">用户名</label>
						<div class="col-md-6">
						<input class="form-control" id="user_nickname" name="username" size="50" type="text" value=""/><span class="help-block red"></span>
						</div>
					</div>
					<div class="form-group">
						<label class="col-md-2 control-label" for="user_password">密码</label>
						<div class="col-md-6">
						<input class="form-control" id="user_password" name="password" size="50" type="password" value=""/>
						<span class="help-block red"></span>
						</div>
					</div>
										<div class="form-group">
						<label class="col-md-2 control-label" for="captcha_code">验证码</label>
						<div class="col-md-3">
						<input class="form-control" id="captcha_code" name="captcha_code" size="50" type="text" />
						<span class="help-block red"></span>
						</div>
						<div class="col-md-4">
						<a href="javascript:reloadcode();" title="更换验证码"><img src="<?php echo site_url('vcode')?>" name="checkCodeImg" id="checkCodeImg" /></a>&nbsp;&nbsp;<a href="javascript:reloadcode();">换一张</a>
						</div>
					</div>
<script language="javascript">
    //刷新验证图片
    function reloadcode() {
        var verify = document.getElementById('checkCodeImg');
        verify.setAttribute('src', '<?php echo site_url('vcode/index?').'/'?>' + Math.random());
    }

</script>
										<div class='form-group'>
						<div class="col-md-offset-2 col-md-9">
							<button type="submit" name="commit" class="btn btn-primary">登入</button>
							<a href="http://localhost/startbb/index.php/user/findpwd" class="btn btn-default" role="button">找回密码</a>
						</div>
					</div>

					</form>
                    </div>
                </div>
            </div><!-- /.col-md-8 -->
        </div><!-- /.row -->
    </div><!-- /.container -->
<footer class="small">
	<div class="container">
	</div>
</footer>
</html>
