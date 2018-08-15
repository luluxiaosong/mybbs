<!DOCTYPE html>
<html>
<head>
    <meta charset='UTF-8'>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>话题列表--我的社区</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no"/>
    <?php $this->load->view('home/common/header')?>
</head>
<body>
<!--导航头-->
<?php $this->load->view('home/common/nav')?>
<div class="container">
    <div class="row">
        <div class="col-md-offset-1 col-md-9">
            <div class="panel panel-body">
<?php foreach( $topics as $v ) :?>
                <a title="帖子 <?php echo $v['posts_count'] ?>" href="<?php echo site_url('topic/show/'.$v['topic_id'])?>" style="float: left; width: 180px; padding: 8px ; margin: 8px; border: 1px #c0e7ff solid">
                    <img src="<?php echo base_url($v['ico'])?>" style="width: 60px; height: 60px; border-radius: 6px; float: left; margin-right: 8px; "/>
                    <div style="display: inline-block; padding-top: 6px;">
                        <span style="font-size: 17px;"> <?php echo $v['topic_name'] ?></span>
                    </div>
                </a>
<?php endforeach; ?>
                <div class="clearfix"></div>
        </div>
    </div>
</div>
</body>
</html>
