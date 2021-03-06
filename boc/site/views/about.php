<?php 
    $CI->load->model('article_model','marticle');
    $zzlist = $CI->marticle->get_all(array('cid'=>18,'audit'=>1),'id,photo,title,introduction,content,shortint');

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
        <h2><?php echo tag_columns(2); ?></h2>
        <h3>About Us</h3>
        <div class="loader"></div>
        <?php include_once VIEWS . 'inc/menu.php'; ?>

    </div>
    <!-- end 列表页面banner -->

    <!-- start 列表页小标题 -->
    <div class="pc">
        <div class="sub-nav">
            <div class="sub-nav-box"><a href="<?php echo site_url('about'); ?>" class="active">关于公司</a></div>
            <div class="sub-nav-box"><a href="<?php echo site_url('his'); ?>">发展历程</a></div>
            <div class="sub-nav-box"><a href="<?php echo site_url('team'); ?>">团队介绍</a></div>
            <div class="sub-nav-box"><a href="<?php echo site_url('invest'); ?>">投资策略</a></div>
        </div>
    </div>
    <!-- start 列表页小标题 -->

    <!-- 关于我们页面 -->
    <div class="about-us-text">
        <div class="about-us-text-cont"><?php echo tag_single(17); ?></div>
    </div>

    <div class="about-list-text">
        <h4>专注行业</h4>
        <!-- 以下的文字与下面列表的一致 -->
        <p>天壹资本专注于投资TMT、文化体育、医疗健康等领域的成长期优秀企业。</p>
    </div>
    
    <!-- start  行业列表 -->
    <div class="about-list">
    <?php foreach ($zzlist as $k => $v): ?>
        <div class="about-box f-cb">
            <a class="about-box-text fl f-cb">
                <div class="about-num fl"><?php $s=$k+1; echo strlen($s)<2?'0'.$s:$s ?>.</div>
                <div class="about-msg fl">
                    <div class="about-exp">
                        <h5><?php echo $v['title'] ?></h5>
                        <p class="short"><?php echo $v['shortint'] ?></p>
                        <div class="long"><?php echo $v['content'] ?></div>
                    </div>
                </div>
            </a>
            <!-- 980*480 -->
            <div class="about-box-img fr" style="background: url(<?php echo UPLOAD_URL.tag_photo($v['photo']); ?>) no-repeat center; background-size: cover;"></div>
        </div>        
    <?php endforeach ?>
        
    </div>
    <!-- end  行业列表 -->

    <!-- 理念 -->
    <div class="about-idea">
        <p>倡导至专、至纯、至精的理念，秉承稳中进取、与时俱进、坚持专业、恪守底线的原则，天壹资本致力于整合 资本与产业资源，与优秀的企业家一同推动产业发展、创造产业价值。</p>
        <div class="about-box">
            <div class="about-link">
                <a href="<?php echo site_url('invest'); ?>" class="about-link-left"><span>了解我们的投资策略</span><span class="icon-row-right"></span></a>
            </div>
            <div class="about-link">
                <a href="<?php echo site_url('team'); ?>" class="about-link-right"><span>了解我们的投资团队</span><span class="icon-row-right"></span></a>
            </div>
        </div>
    </div>

    <!-- start 底部 -->
    <?php include_once VIEWS.'inc/footer.php'; ?>
    <!-- end 底部 -->
<?php
    echo static_file('jQuery.js');
    echo static_file('comm.js');
?>
</body>
</html>