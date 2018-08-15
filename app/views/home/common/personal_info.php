<!--我的资料 -->
<?php $this->load->view('home/common/nav'); ?>
<div class="container">
    <div class="row">
        <div class="col-md-1"></div>
        <div class="col-md-8">
            <!--我的资料-->
            <div class="panel panel-default">
                <div class="panel-body">
                    <div class="col-md-2">
                        <img style="height: 80px;" class="img-rounded img-responsive"
                             src="<?php echo base_url($user['avatar']); ?>" alt="admin large avatar">
                    </div>
                    <div class="col-md-6" style="line-height: 24px;">
                        <p> <span style="font-size: 16px;"><?php echo $user['username']; ?></span></p>
<!--                        <p><span style="font-size: 6px;">签名：</span>--><?php //echo $user['signature'] ?><!--</p>-->
                        <p><span style="font-size: 2px;">简介：</span><?php echo $user['introduction'] ?><a href=""></a></p>
                        <p><a  href="<?php echo site_url('personal/set') ?>">修改资料</a>
                        </p>
                    </div>

                </div>
            </div>
            <!--end 我的资料 -->

