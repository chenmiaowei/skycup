<?php 
    $CI->load->model('gallery_model','mgallery');
    $list = $CI->mgallery->get_all(array('cid'=>23),'id,photo,pic,title,position,content');


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
        <h2>照片墙</h2>
        <h3>Our Picture</h3>
        <?php include_once VIEWS . 'inc/menu.php'; ?>


    </div>
    <!-- end 列表页面banner -->

    <!-- start 列表页小标题 -->
    <div class="pc">
    <div class="sub-nav">
            <div class="sub-nav-box"><a href="<?php echo site_url('about'); ?>">关于公司</a></div>
            <div class="sub-nav-box"><a href="<?php echo site_url('his'); ?>">发展历程</a></div>
            <div class="sub-nav-box"><a href="<?php echo site_url('team'); ?>">团队介绍</a></div>
            <div class="sub-nav-box"><a href="<?php echo site_url('photo'); ?>" class="active">照片墙</a></div>
            <div class="sub-nav-box"><a href="<?php echo site_url('invest'); ?>">投资策略</a></div>
        </div>
    </div>
    <!-- start 列表页小标题 -->

    
    <!-- start  团队列表 PC-->
    <div class="photo-list pc" id="carousel">
        <?php
        foreach ($list as $item) {
            ?>
            <div class="slide">
                <p>
                    <a href="javascript:void()0;"> <img alt="Image Caption" src="<?php echo UPLOAD_URL . tag_photo($item['photo']); ?>"/> </a>
                    <span><?php echo $item['title'] ?> </span>
                </p>
            </div>
        <?php
        }
        ?>
        <div class="navigate-left"><i class="fa fa-chevron-left"></i></div>
        <div class="navigate-right"><i class="fa fa-chevron-right"></i></div>
    </div>

    <div class="photo-list-h5 h5">
        <?php
        foreach ($list as $item) {
            ?>
            <div class="slide">
                <p>
                    <a href="javascript:void()0;"> <img alt="Image Caption" src="<?php echo UPLOAD_URL . tag_photo($item['photo']); ?>"/> </a>
                    <span><?php echo $item['title'] ?> </span>
                </p>
            </div>
            <?php
        }
        ?>
    </div>
    <!-- end  团队列表 PC-->

    <!-- start 底部 -->
    <?php include_once VIEWS.'inc/footer.php'; ?>
    <!-- end 底部 -->

<?php
    echo static_file('jQuery-Sliding-Carousel/js/jquery-slidingCarousel.js');
    echo static_file('jQuery-Sliding-Carousel/css/sliding-carousel.css');
    echo static_file('comm.js');
?>
<script>
    $(function () {
        var carousel = $("#carousel").slidingCarousel({
            squeeze: 100
        });
    })
</script>
</body>
</html>