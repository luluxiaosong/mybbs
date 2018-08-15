<?php if (!empty($posts)) foreach ($posts as $v): ?>
    <li class="posts_list">
        <div style="margin-bottom: 5px;">
            <a href="<?php echo site_url('user/user_home/' . $v['uid']) ?>" title="<?php echo $v['username']?>" target="_blank"><img alt="<?php echo $v['username'] ?>"src="<?php echo base_url($v['avatar']) ?>" class="img-circle" style="height:46px; width:46px; margin-right: 14px; float: left"/></a>
            <a class="post_title" href="<?php echo site_url('post/show/' . $v['post_id']) ?>" target="_blank" >
                <span style="color: #176890; font-size: 17px;"><?php echo $v['title'] ?></span>
            </a>
            &nbsp;&nbsp;&nbsp;&nbsp;
            <a class="topic_small" href="<?php echo site_url('topic/show/' . $v['topic_id']) ?>" target="_blank"><?php echo $v['topic_name'] ?></a>
            &nbsp;&nbsp;
            <?php if ($v['is_good'] == 1): ?><span class="post_good">精</span>&nbsp;<?php endif ?>
            <?php if ($v['is_top'] == 1): ?><span class="post_top">置顶</span><?php endif ?>

            <div style="float: right">
            </div>
        </div>
        <div class="text-muted" style="font-size: 12px">
            <a href="<?php echo site_url('post/show/' . $v['post_id']) ?>" target="_blank" style="color: #777">
                <?php echo content_part($v['content']) ?></a>
            <div style="float: right">
                <?php echo wordTime($v['reply_last_time']) ?>&nbsp;•&nbsp;
                <span class="glyphicon glyphicon-comment" style="color: #0785d1;"><span style="margin-left: 4px;"><?php echo $v['comments_count'] ?></span></span>
            </div>
        </div>

    </li>
<?php endforeach; ?>

