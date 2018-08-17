<!DOCTYPE html>
<html>
<head>
    <meta charset='UTF-8'>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo $topic['topic_name'] ?>--Mybbs</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no"/>
    <?php $this->load->view('home/common/header') ?>
</head>
<script>

    //登陆状态
    var username ="<?php echo @$_SESSION['username']?>";
    // 跳转发布 检测登陆
    function edit(){
        if(username==''){
            alert('请登陆');
            return;
        }else{
            window.location.href = "<?php echo site_url('post/post_edit')?>";
        }
    }

</script>
<style>
    .topic_selected{
        background-color: #c0e7ff;
    }
    .view_optioned{
        border-bottom: 2px solid #080808;
        color: #080808;
    }
</style>
<body>
<!--导航头-->
<?php $this->load->view('home/common/nav'); ?>
    <!--主框 -->
    <div  style="margin: auto; width: 80%; background-color: #FEFEFE; border: #cccccc 1px solid; border-radius: 5px;">
        <!--左侧-->
        <div class="" style="width: 68%; float: left;  margin-bottom: 40px;">

            <div class="main">
                <div class="" style="padding:10px;">
                    <img style="height: 50px; width: 60px; border-radius: 6px" src="<?php echo base_url($topic['ico']) ?>"/>&nbsp;&nbsp;&nbsp;&nbsp;<span style="font-size: 20px;"><?php echo $topic['topic_name']; ?></span>
                    <?php if(!empty($_SESSION['uid'])):?> <a class="post_add_btn" href="<?php echo site_url('post/post_edit/'.$topic['topic_id'])?>"> + 发布</a><?php endif ?>
                    <p style="font-size: 10px; padding: 8px 0px 6px 0px;"><?php echo $topic['content'] ?> </p>
                </div>
<!--                根据条件浏览-->
                <div class="topic_option">
                    &nbsp;&nbsp;&nbsp;&nbsp;
                    <a href="<?php echo site_url().'/topic/show/'.$topic['topic_id'].'?option=new'?>" id="new" class="<?php if($option == 'new') echo 'view_optioned'?>">最新</a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                    <a href='<?php echo site_url().'/topic/show/'.$topic['topic_id'].'?option=good'?>' id="good" class="<?php if($option == 'good') echo 'view_optioned'?>">精品</a>
                </div>
            <ul style="background-color: #FEFEFE">
                <?php $this->load->view('home/common/post_list') ?>
                <!-- 分页  -->
                <li">
                        <?php echo $page_link;?>
                </li>
            </ul>
        </div>
        </div>
        <!--右侧-->
        <div class="" style="width: 32%; float: left; padding-left: 8px; border-left: #e3eeff 1px solid; margin-bottom: 40px; ">
            <div  style="margin-top: 16px; padding-bottom: 20px; border-bottom: #cccccc dashed 1px;">
                <!--话题版块-->
                <div class="topic_list">
                    <h4  style="margin-bottom: 10px; padding-left: 10px;">热门话题</h4>
                    <div>
                        <?php if (!empty($topics)) foreach ($topics as $v): ?>
                            <a href="<?php  echo site_url('/topic/show/'.$v['topic_id']) ?>" >
                                <div class="topic_box <?php if($topic['topic_id'] == $v['topic_id']) echo 'topic_selected'?>" ><img src="<?php echo base_url($v['ico']) ?>" >&nbsp;<span><?php echo $v['topic_name'] ?></span>
                                </div>
                            </a>
                        <?php endforeach?>
                    </div>
                    <script>

                    </script>
                    <div style="clear:both;"></div>
                </div>
            </div>

<!--     热门帖子-->
<!--             <div  style="margin-top: 16px; padding-bottom: 20px; border-bottom: #cccccc dashed 1px;">-->
<!--                 <h4 style="margin-bottom: 10px;">热门帖子</h4>-->
<!--             </div>-->

            <div  style="margin-top: 16px; padding-bottom: 20px; border-bottom: #cccccc dashed 1px;">
<!--                <h4 style="margin-bottom: 10px;">关于我们</h4>-->
                <p style="color: #999">
                    &nbsp;&nbsp;&nbsp; 这是一个分享创作乐趣、探索有趣生活的社区，欢迎你的加入。
                </p>
            </div>
            <div class="" style="margin-top: 20px;">
                <div >
                    <h4 ><span class="glyphicon glyphicon-link" style=" font-size: 16px;">  </span> 友情链接</h4>
                    <p style="padding: 10px 10px 10px 20px"> <a href="http://discuss.flarum.org.cn/" target="_blank">Flarum 中文社区</a></p>
                    <p style="padding: 10px 10px 10px 20px"> <a href="http://wenda.wecenter.com/" target="_blank">WeCenter 问答社区</a></p>
                    <p style="padding: 10px 10px 10px 20px"> <a href="http://www.startbbs.com/index.html" target="_blank">StartBBS轻量社区v2.0.0</a></p>
                </div>
            </div>
    </div>
        <div style="clear: both"></div>
    </div>
</body>
</html>
