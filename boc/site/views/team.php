<?php
$CI->load->model('gallery_model', 'mgallery');
$list = $CI->mgallery->get_all(array('cid' => 20, 'audit' => 1), 'id,photo,pic,title,position,content');

$CI->load->model('columnpic_model', 'mcolumnpic');
$bannerit = $CI->mcolumnpic->get_one(array('cid' => 21, 'audit' => 1, 'ctype' => 2), 'id,photo');
?>
<!DOCTYPE html>
<html>
<head>
    <?php include_once VIEWS . 'inc/head.php'; ?>

</head>

<body>
<div class="pc">
    <!-- start 头部 -->
    <?php include_once VIEWS . 'inc/top.php'; ?>
    <!-- end 头部 -->
</div>

<div class="h5">
    <div class="h5-header">
        <a href="<?php echo site_url(''); ?>" class="logo"></a>
        <div class="icon-nav"></div>
    </div>
    <div class="h5-nav-box">
        <?php include_once VIEWS . 'inc/moblienav.php'; ?>
    </div>
</div>

<!-- start 列表页面banner -->
<div class="ban his-ban" data-img="<?php if (!empty($bannerit)) {
    echo UPLOAD_URL . tag_photo($bannerit['photo']);
} else {
    echo static_file('img/ban-1.jpg');
} ?>">
    <h2><?php echo tag_columns(9); ?></h2>
    <h3>Our Team</h3>
    <?php include_once VIEWS . 'inc/menu.php'; ?>


</div>
<!-- end 列表页面banner -->

<!-- start 列表页小标题 -->
<div class="pc">
    <div class="sub-nav">
        <div class="sub-nav-box"><a href="<?php echo site_url('about'); ?>">关于公司</a></div>
        <div class="sub-nav-box"><a href="<?php echo site_url('his'); ?>">发展历程</a></div>
        <div class="sub-nav-box"><a href="<?php echo site_url('team'); ?>" class="active">团队介绍</a></div>
        <div class="sub-nav-box"><a href="<?php echo site_url('invest'); ?>">投资策略</a></div>
    </div>
</div>
<!-- start 列表页小标题 -->


<!-- start  团队列表 PC-->
<div class="team-list f-cb pc">
    <!-- 480*510 -->
    <!-- 四个人循环后有特殊处理 -->

    <?php foreach ($list as $k => $v): ?>
        <a href="<?php echo site_url('teamDetails/' . $v['id']); ?>" class="team-box fl"
           style="background: url(<?php echo UPLOAD_URL . tag_photo($v['photo']); ?>) no-repeat center; background-size: cover;">
            <span class="team-name"><?php echo $v['title'] ?></span>
        </a>
        <?php if ($k > 2) {
            break;
        } endforeach ?>

    <div class="team-text fl" style="height: <?php if (count($list) < 7) { ?> 510px <?php } ?>">
        <div class="team-text-content">
            <div class="title"><?php echo tag_single(19, 'title'); ?></div>
            <div class="dis"><?php echo tag_single(19); ?></div>
            <div class="icon f-cb">
                <a class="icon-tel fl" href="<?php echo site_url('contact'); ?>"></a>
                <a href="mailto:info@skycuscapital.com" class="icon-mail fl"></a>
            </div>
        </div>
    </div>
    <?php foreach ($list as $k => $v): ?>
        <?php if ($k < 4) {
            continue;
        } ?>
        <a href="<?php echo site_url('teamDetails/' . $v['id']); ?>" class="team-box fl"
           style="background: url(<?php echo UPLOAD_URL . tag_photo($v['photo']); ?>) no-repeat center; background-size: cover;">
            <span class="team-name"><?php echo $v['title'] ?></span>
        </a>
    <?php endforeach ?>

</div>
<!-- end  团队列表 PC-->

<!-- start  团队列表 H5-->
<div class="team-list f-cb h5">
    <!-- 480*510 -->
    <!-- 四个人循环后有特殊处理 -->
    <?php foreach ($list as $k => $v): ?>
        <a href="<?php echo site_url('teamDetails/' . $v['id']); ?>" class="team-box fl"
           style="background: url(<?php echo UPLOAD_URL . tag_photo($v['photo']); ?>) no-repeat center; background-size: cover;">
            <p class="name"><?php echo $v['title'] ?></p>
            <p class="title"><?php echo $v['position'] ?></p>
        </a>
        <?php if ($k >= 3) {
            break;
        } endforeach ?>
    <div class="team-text fl">
        <div class="team-text-content">
            <div class="title"><?php echo tag_single(19, 'title'); ?></div>
            <div class="dis"><?php echo tag_single(19); ?></div>
            <div class="icon f-cb">
                <a class="icon-tel fl" href="<?php echo site_url('contact'); ?>"></a>
                <a href="mailto:info@skycuscapital.com" class="icon-mail fl"></a>
            </div>
        </div>
    </div>
    <?php foreach ($list as $k => $v): ?>
        <?php if ($k > 3) { ?>
            <a href="<?php echo site_url('teamDetails/' . $v['id']); ?>" class="team-box fl"
               style="background: url(<?php echo UPLOAD_URL . tag_photo($v['photo']); ?>) no-repeat center; background-size: cover;">
                <p class="name"><?php echo $v['title'] ?></p>
                <p class="title"><?php echo $v['position'] ?></p>
            </a>
        <?php } endforeach ?>

</div>
<!-- start  团队列表 H5-->


<!-- start 底部 -->
<?php include_once VIEWS . 'inc/footer.php'; ?>
<!-- end 底部 -->

<?php
echo static_file('jQuery.js');
echo static_file('comm.js');
?>
</body>
</html>