<?php 
    $CI->load->model('columnpic_model','mcolumnpic');
    $bannerit = $CI->mcolumnpic->get_one(array('cid'=>21,'audit'=>1,'ctype'=>2),'id,photo');

    $CI->load->model('article_model','marticle');
    $nlist = $CI->marticle->get_all(array('cid'=>22,'audit'=>1),'id,photo,title,introduction,titlef,timeline');    
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
        <a href="index.html" class="logo"></a>
        <div class="icon-nav"></div>
    </div>
    <div class="h5-nav-box">
        <?php include_once VIEWS.'inc/moblienav.php'; ?>
    </div>
</div>

    <!-- start 列表页面banner -->
    <div class="ban his-ban" data-img="<?php if(!empty($bannerit)){echo UPLOAD_URL.tag_photo($bannerit['photo']);}else{ echo static_file('img/ban-1.jpg'); } ?>">
        <h2>投资策略</h2>
        <h3>Investment Strategy</h3>
        <?php include_once VIEWS . 'inc/menu.php'; ?>


    </div>
    <!-- end 列表页面banner -->

    <!-- start 列表页小标题 -->
    <div class="pc">
        <div class="sub-nav">
            <div class="sub-nav-box"><a href="<?php echo site_url('about'); ?>">关于公司</a></div>
            <div class="sub-nav-box"><a href="<?php echo site_url('his'); ?>">发展历程</a></div>
            <div class="sub-nav-box"><a href="<?php echo site_url('team'); ?>">团队介绍</a></div>
            <div class="sub-nav-box"><a href="<?php echo site_url('invest'); ?>" class="active">投资策略</a></div>
        </div>
    </div>
    <!-- start 列表页小标题 -->

    <!-- start 投资策略 -->
    <div class="invest-list">
        <div class="invest-feature">
            <h4>我们对未来趋势的判断</h4>
            <div class="invest-feature-img">
                <img src="<?php echo static_file('img/invest-1.jpg'); ?>" class="pc">
                <img src="<?php echo static_file('img/invest-5.jpg'); ?>" class="h5">
            </div>
        </div>
        <div class="invest-pro">
            <div class="invest-circle">
                <div class="invest-circle-img"></div>
            </div>
            <div class="invest-pro-img">
                <img src="<?php echo static_file('img/invest-2.jpg'); ?>" class="pc">
                <img src="<?php echo static_file('img/invest-6.jpg'); ?>" class="h5">
            </div>
        </div>
        <div class="invest-strat">
            <div class="invest-circle">
                <div class="invest-circle-img"></div>
            </div>
            <h4>顺势而为的投资策略</h4>
            <h5>供给侧改革双引擎</h5>
            <div class="invest-strat-list f-cb">
            <?php foreach ($nlist as $k => $v): ?>
                <a class="fl invest-start-text" href="<?php echo site_url('details/'.$v['id']); ?>">
                    <p class="title"><?php echo $v['title'] ?></p>
                    <p class="sub-title"><?php echo $v['titlef'] ?></p>
                    <div class="dis"><?php echo $v['introduction'] ?></div>
                </a>
                <!-- 480*490 -->
                <div class="fl invest-start-img" style="background: url(<?php if($v['photo']){ echo UPLOAD_URL.tag_photo($v['photo']);  }else{ echo static_file('img/invest-3.jpg');  } ?>) no-repeat center;"></div>
            <?php endforeach ?>
                <!-- <a class="fl invest-start-text" href="">
                    <p class="title">传统产业转型升级</p>
                    <p class="sub-title">TMT</p>
                    <div class="dis">以“特色小镇”、产业园区为标杆的新型基础设施将促进区域经济发展和产业调整升级</div>
                </a>

                <div class="fl invest-start-img" style="background: url(<?php //echo static_file('img/invest-3.jpg'); ?>) no-repeat center;"></div> -->
            </div>
        </div>
        <div class="invest-basic">
            <div class="invest-circle">
                <div class="invest-circle-img"></div>
            </div>
            <h4>新型基础设施建设</h4>
            <h5>以“特色小镇”、产业园区为标杆的新型基础设施将促进区域经济发展和产业调整升级</h5>
            <img src="<?php echo static_file('img/invest-8.jpg'); ?>" alt="" width="100%">
        </div>
    </div>
    <!-- end 投资策略 -->

    <!-- start 底部 -->
    <?php include_once VIEWS.'inc/footer.php'; ?>
    <!-- end 底部 -->
<?php
    echo static_file('jQuery.js');
    echo static_file('comm.js');
?>
</body>
</html>