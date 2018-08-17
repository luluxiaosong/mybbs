<!DOCTYPE html>
<html>
<head>
    <meta charset='UTF-8'>
    <title>注册新用户--社区</title>
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

                    <div class="panel-body">
                    <form accept-charset="UTF-8" action="<?php echo site_url('user/register')?>"  class="form-horizontal" id="new_user" method="post" novalidate="novalidate">
					<input type="hidden" name="stb_csrf_token" value="8a8d1fd367f311412d64bd4cfabbed33">
					<div class="form-group">
						<label class="col-sm-2 control-label" for="username">用户名</label>
						<div class="col-sm-5">
						<input class="form-control" id="username" name="username" type="text" value="<?php if(!empty($username)) echo $username?>" placeholder="英文、中文，3~7位" />
                        <span  class="username_error red"><?php if(!empty($username_error)) echo $username_error?> </span>
						</div>
					</div>
					<div class="form-group">     
						<label class="col-sm-2 control-label" for="email">电子邮件</label>
						<div class="col-sm-5">
						<input class="form-control" id="email" name="email" size="50" type="email" value="<?php if(!empty($email)) echo $email?>" />
						<span class="email_error red"><?php if(!empty($email_error)) echo $email_error?> </span>
						</div>
					</div>
					<div class="form-group">
						<label class="col-sm-2 control-label" for="password">密码</label>
						<div class="col-sm-5">
						<input class="form-control" id="password" name="password" type="password" value="<?php if(!empty($password)) echo $password?>" />
						<span class="password_error red"></span>
						</div>
					</div>
					<div class="form-group">
						<label class="col-sm-2 control-label" for="user_password_confirmation">密码确认</label>
						<div class="col-sm-5">
						<input class="form-control" id="password_confirm" name="password_confirm" type="password" value="<?php if(!empty($password_confirm)) echo $password_confirm?>" />
                        <span class="password_confirm_error red"><?php if(!empty($password_confirm)) echo $password_confirm?> </span>
						</div>
					</div>
					<div class="form-group">
					  <label class="col-sm-2 control-label" for="captcha_code">验证码</label>
						<div class="col-sm-3">
						<input class="form-control" id="captcha_code" name="captcha_code" size="50" type="text" value="" />
						<span class="captcha_code_error red"><?php if(!empty($email_error)) echo $email_error?> </span>
						</div>
						<div class="col-md-4">
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

<style>
    .success_note{
        color: #00CC00;
    }
    .error{
        color: red;
    }
</style>

<script >
    //刷新验证图片
    function reloadcode() {
        var check_CodeImg =document.getElementById('checkCodeImg');
        check_CodeImg.setAttribute('src', '<?php echo site_url('vcode/index?');?>'+Math.random());
    }
    //格式验证
    $(function () {
        $("form").submit(function () {
            var username = $("#username").val();
            var email = $("#email").val();
            var password = $("#password");
            var password_confirm = $("#password_confirm");
            if(username == ""){
                $(".username_error").text('请填写用户名');
                $(".username_error").css('color','red')

            }else{
                $(".username_error").text("OK");
                $(".username_error").css('color','#3c763d')
            }
            if(email == ""){
                $(".email_error").text("请填写电子邮箱");
             }
            return false;

        })

    })

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

    //鼠标从
</script>

</body>
</html>