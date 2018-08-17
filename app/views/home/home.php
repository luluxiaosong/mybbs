<!DOCTYPE html>
<html>
<head>
    <meta charset='UTF-8'>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>我的社区</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no"/>
    <?php $this->load->view('home/common/header')?>
</head>
<body>
<!--导航头-->
<?php $this->load->view('home/common/nav')?>

    <div style="margin: auto; padding-bottom: 14px; text-align: center"><span style="font-size: 20px; color: #31708f; margin: 6px;">Welcome ~ ~ ~</span>
        </div>
<!--主框 -->
    <div  style="margin: auto; width: 80%; height: auto; background-color: #FEFEFE; border: #cccccc 1px solid; border-radius: 5px;">
          <!--左侧-->
          <div class="" style="width: 68%; float: left;  margin-bottom: 40px;">
                <h4  style="margin-top: 10px; padding-bottom: 16px; border-bottom: #cccccc 1px solid">&nbsp;&nbsp;&nbsp;&nbsp;最新发布</h4>
                <div class="main">
                    <ul>
                        <?php $this->load->view('home/common/post_list') ?>
                        <!-- 分页  -->
                        <li style="text-align: center">
                                <?php echo $page_link; ?>
                        </li>
                    </ul>
                </div>
          </div>
          <!--右侧            -->
          <div class="" style="width: 32%; float: left; padding-left: 18px; border-left: #e3eeff 1px solid; margin-bottom: 50px;">
            <div style="margin-top: 16px; padding-bottom: 20px; border-bottom: #cccccc solid 1px;">
                <!--话题版块-->
                <div class="topic_list">
                    <h4  style="margin-bottom: 10px; padding-left: 10px;"> 热门话题 </h4>
                    <div>
                        <?php if (!empty($topics)) foreach ($topics as $v): ?>
                            <a title="帖子 <?php echo $v['posts_count'] ?>" href="<?php  echo site_url('topic/show/'.$v['topic_id'])?>" >
                                <div class="topic_box"><img src="<?php echo base_url($v['ico']) ?>">&nbsp;<span><?php echo $v['topic_name'] ?></span>
                                </div>
                            </a>
                        <?php endforeach?>
                    </div>
                    <div style="clear:both;"></div>
                </div>
            </div>
            <!--     热门帖子-->
<!--            <div  style="margin-top: 16px; padding-bottom: 20px; border-bottom: #cccccc dashed 1px;">-->
<!--                <h4 style="margin-bottom: 10px;">热门帖子</h4>-->
<!--            </div>-->
            <div style="margin-top: 16px; padding-bottom: 20px; border-bottom: #cccccc solid 1px;">
                <p style="color: #999">
                    &nbsp;&nbsp;&nbsp; 这是一个新手做的练习项目，尚有许多不足之处，感谢你的光临。
                </p>
            </div>
            <div class="" style="margin-top: 20px;">
                <div>
                    <h4><span class="glyphicon glyphicon-link" style=" font-size: 16px;">  </span> 友情链接</h4>
                    <p style="padding: 10px 10px 10px 20px"><a href="http://discuss.flarum.org.cn/" target="_blank">Flarum
                            中文社区</a></p>
                    <p style="padding: 10px 10px 10px 20px"><a href="http://wenda.wecenter.com/" target="_blank">WeCenter
                            问答社区</a></p>
                    <p style="padding: 10px 10px 10px 20px"><a href="http://www.startbbs.com/index.html" target="_blank">StartBBS轻量社区v2.0.0</a></p>
                </div>
            </div>
        </div>
        <div style="clear: both"></div>
    </div>
</body>
</html>
