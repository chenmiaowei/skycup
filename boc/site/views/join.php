<?php 

    $CI->load->model('columnpic_model','mcolumnpic');
    $bannerit = $CI->mcolumnpic->get_one(array('cid'=>21,'audit'=>1,'ctype'=>6),'id,photo');
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

<div class="join">


    <!-- start 列表页面banner -->
    <div class="ban join-ban" data-img="<?php if(!empty($bannerit)){echo UPLOAD_URL.tag_photo($bannerit['photo']);}else{ echo static_file('img/ban-2.jpg'); } ?>">
        <h2>我们欢迎志同道合的你一同前行</h2>
        <h3>如果有兴趣加入天壹资本，请将简历发送至hr@skycuscapital.com</h3>
    </div>
    <!-- end 列表页面banner -->

    <!-- start 列表页小标题 -->
    <div class="pc">
        <div class="sub-nav">
            <div class="sub-nav-box"><a href="<?php echo site_url('contact'); ?>">联系我们</a></div>
            <div class="sub-nav-box"><a href="<?php echo site_url('join'); ?>" class="active">加入我们</a></div>
        </div>
        <div style="height: 120px;"></div>
    </div>
    <!-- start 列表页小标题 -->


    <!-- start 底部 -->
    <?php include_once VIEWS.'inc/footer.php'; ?>
    <!-- end 底部 -->

</div>

<?php
    echo static_file('jQuery.js');
    echo static_file('comm.js');
?>
</body>
</html>