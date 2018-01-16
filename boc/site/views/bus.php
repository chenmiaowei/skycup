<?php 
    $CI->load->model('article_model','marticle');
    $list = $CI->marticle->get_all(array('cid'=>3,'audit'=>1),'id,photo,title,introduction,content');

    $CI->load->model('columnpic_model','mcolumnpic');
    $bannerit = $CI->mcolumnpic->get_one(array('cid'=>21,'audit'=>1,'ctype'=>3),'id,photo'); 
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
    <div class="ban bus-ban" data-img="<?php if(!empty($bannerit)){echo UPLOAD_URL.tag_photo($bannerit['photo']);}else{ echo static_file('img/ban-1.jpg'); } ?>">
        <h2><?php echo tag_columns(3); ?></h2>
        <h3>Our Bussiness</h3>
        <?php include_once VIEWS . 'inc/menu.php'; ?>


    </div>
    <!-- end 列表页面banner -->

    <!-- start 天壹业务 -->
    <div class="bus-list">
    <?php foreach ($list as $k => $v): ?>
        <div class="bus-box f-cb">
            <!-- 960*490 -->
            <!-- 注意：fl 和 fr的判断 -->
            <div class="bus-img <?php if(($k%2)==0) { echo'fl'; }else{ echo 'fr';} ?>" style="background: url(<?php echo UPLOAD_URL.tag_photo($v['photo']); ?>) no-repeat center; background-size: cover;"></div>
            <div class="bus-text <?php if(($k%2)==0) { echo'fr'; }else{ echo 'fl';} ?>">
                <h2><?php echo $v['title'] ?></h2>
                <div class="bus-dis"><?php echo $v['content'] ?></div>
            </div>
        </div>
        <?php endforeach ?>
        
    </div>
    <!-- end 天壹业务 -->


    <!-- start 底部 -->
    <?php include_once VIEWS.'inc/footer.php'; ?>
    <!-- end 底部 -->

<?php
    echo static_file('jQuery.js');
    echo static_file('comm.js');
?>
</body>
</html>