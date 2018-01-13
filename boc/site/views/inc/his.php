<?php 
    $CI->load->model('article_model','marticle');
    $list = $CI->marticle->get_all(array('cid'=>8,'audit'=>1),'id,photo,title,content');

    $CI->load->model('columnpic_model','mcolumnpic');
    $bannerit = $CI->mcolumnpic->get_one(array('cid'=>21,'audit'=>1,'ctype'=>2),'id,photo');    
?>
<!DOCTYPE html>
<html>
<head>
<?php include_once VIEWS.'inc/head.php'; ?>

</head>

<body>
<div class="pc">
    <!-- start 头部 -->
    <?php include_once VIEWS.'inc/top.php'; ?>
    <!-- end 头部 -->
</div>

<div class="h5">
    <div class="h5-header">
        <a href="<?php echo site_url(''); ?>" class="logo"></a>
        <div class="icon-nav"></div>
    </div>
    <div class="h5-nav-box">
        <?php include_once VIEWS.'inc/moblienav.php'; ?>
    </div>
</div>

    <!-- start 列表页面banner -->
    <div class="ban his-ban" data-img="<?php if(!empty($bannerit)){echo UPLOAD_URL.tag_photo($bannerit['photo']);}else{ echo static_file('img/ban-1.jpg'); } ?>">
        <h2><?php echo tag_columns(8); ?></h2>
        <h3>Our History</h3>
        <?php include_once VIEWS . 'inc/menu.php'; ?>


    </div>
    <!-- end 列表页面banner -->

    <!-- start 列表页小标题 -->
    <div class="pc">
        <div class="sub-nav">
            <div class="sub-nav-box"><a href="<?php echo site_url('about'); ?>">关于公司</a></div>
            <div class="sub-nav-box"><a href="<?php echo site_url('his'); ?>" class="active">发展历程</a></div>
            <div class="sub-nav-box"><a href="<?php echo site_url('team'); ?>">团队介绍</a></div>
            <div class="sub-nav-box"><a href="<?php echo site_url('invest'); ?>">投资策略</a></div>
        </div>
    </div>
    <!-- start 列表页小标题 -->

    
    <!-- start  历史列表 -->
    <div class="his-list">
    <?php foreach ($list as $k => $v): ?>
        <div class="his-box f-cb">
            <!-- 左右互换，class注意 -->
            <div class="img-box <?php if(($k%2)==0) { echo'fl'; }else{ echo 'fr';} ?>">
                <!-- 760*488 -->
                <div class="img-cont" style="background: url(<?php echo UPLOAD_URL.tag_photo($v['photo']); ?>) no-repeat center;background-size: cover;"></div>
            </div>
            <div class="his-line-box <?php if(($k%2)==0) { echo'fl'; }else{ echo 'fr';} ?>">
                <div class="his-line"></div>
            </div>
            <div class="his-text-box <?php if(($k%2)==0) { echo'fr'; }else{ echo 'fl';} ?>">
                <div class="his-text">
                    <h4><?php echo $v['title'] ?></h4>
                    <div><?php echo $v['content'] ?></div>
                </div>
            </div>
        </div>
    <?php endforeach ?>
    </div>
    <!-- end  历史列表 -->


    <!-- start 底部 -->
    <?php include_once VIEWS.'inc/footer.php'; ?>
    <!-- end 底部 -->

<?php
    echo static_file('jQuery.js');
    echo static_file('comm.js');
?>
</body>
</html>