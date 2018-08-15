<!DOCTYPE html>
<html>
<head>  <meta charset='UTF-8'>
    <title>注册新用户--小白社区</title>
    <?php $this->load->view('home/common/header');?>
</head>
<body>
<?php $this->load->view('home/common/nav')?>
    <div class="container">
        <div class="row">
            <div class="col-md-2"></div>
            <div class="col-md-8">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h3 class="panel-title">注册用户</h3>
                    </div>
<script >
	//刷新验证图片
	function reloadcode() {
	 var check_CodeImg =document.getElementById('checkCodeImg');
	 check_CodeImg.setAttribute('src', '<?php echo site_url('vcode/index?');?>'+Math.random());
	}
    //ajax检测用户名是否可用
	function check_username(){
		$.get(
			   "<?php echo site_url('user/check_name')?>",
			   {name: $("#user_nickname").val()},
			   function(data){
			        	$("#username_check").html(data);
			   }
		);
	}
</script>
                    <div class="panel-body">
                    <form accept-charset="UTF-8" action="<?php echo site_url('user/register')?>" onsubmit="return validate_form(this)"  class="form-horizontal" id="new_user" method="post" novalidate="novalidate">
					<input type="hidden" name="stb_csrf_token" value="8a8d1fd367f311412d64bd4cfabbed33">
					<div class="form-group">
						<label class="col-sm-2 control-label" for="user_nickname">用户名</label>
						<div class="col-sm-5">
						<input class="form-control" id="user_nickname" name="username" type="text" value="" /><span id='username_check' class="help-block red"></span>
						</div>
						<a style="cursor:pointer" href="javascript:check_username();"><span>检测是否可用?</span></a>
					</div>
					<div class="form-group">     
						<label class="col-sm-2 control-label" for="user_email">电子邮件</label>
						<div class="col-sm-5">
						<input class="form-control" id="user_email" name="email" size="50" type="email" value="" />
						<span class="help-block red"></span>
						</div>
					</div>
					<div class="form-group">
						<label class="col-sm-2 control-label" for="user_password">密码</label>
						<div class="col-sm-5">
						<input class="form-control" id="user_password" name="password" type="password" value="" />
						<span class="help-block red"></span>
						</div>
					</div>
					<div class="form-group">
						<label class="col-sm-2 control-label" for="user_password_confirmation">密码确认</label>
						<div class="col-sm-5">
						<input class="form-control" id="user_password_confirmation" name="password_confirm" type="password" value="" /><span class="help-block red"></span>
						</div>
					</div>
					<div class="form-group">
					  <label class="col-sm-2 control-label" for="captcha_code">验证码</label>
						<div class="col-sm-3">
						<input class="form-control" id="captcha_code" name="captcha_code" size="50" type="text" value="" />
						<span class="help-block red"></span>
						</div>
						<div class="col-sm-4">
						<a href="javascript:reloadcode();" title="更换验证码"><img src="<?php echo site_url('vcode')?>" name="checkCodeImg" id="checkCodeImg" border="0" /></a> <a href="javascript:reloadcode();">换一张</a>
						</div>
					</div>
					
										<div class='form-group'>
						<div class="col-sm-offset-2 col-sm-9">
							<button type="submit" name="commit" class="btn btn-primary">注册</button>
							
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
</body>
</html>