<?php
$CI->load->model('columnpic_model', 'mcolumnpic');
$bannerlist = $CI->mcolumnpic->get_all(array('cid' => 13, 'audit' => 1), 'id,photo,title,title_en,links,video');

$gslist = $CI->mcolumnpic->get_list(5, 0, false, array('cid' => 14, 'audit' => 1), 'links,photo,title,introduction');

$CI->load->model('article_model', 'marticle');
$nlist = $CI->marticle->get_list(10, 0, false, array('cid' => 5, 'audit' => 1, 'flag' => 1), 'id,photo,title,introduction,content,timeline');

$CI->load->model('article_model', 'marticle');
$ywlist = $CI->marticle->get_list(3, 0, false, array('cid' => 3, 'audit' => 1, 'flag' => 1), 'id,pic,title');

$CI->load->model('article_model', 'marticle');
$tzlist = $CI->marticle->get_list(5, 0, false, array('cid' => 4, 'audit' => 1, 'flag' => 1, 'ctype' => 1), 'id,pic,title,introduction');

?>
<!DOCTYPE html>
<html>
<head>
    <?php include_once VIEWS . 'inc/head.php'; ?>

</head>

<body>
<div class="index-bg"></div>
<div class="pc">
    <!-- start 头部 -->
    <?php include_once VIEWS . 'inc/top.php'; ?>
    <!-- start 头部 -->
    <!-- star banner -->
    <div class="banner">
        <ul>
            <!-- 注意，判断第一个是否是视频 图片大小1920*1120-->
            <?php foreach ($bannerlist as $k => $v): ?>
                <li <?php if ($v['video']) { ?> class="video" <?php } ?>
                        data-img="<?php echo UPLOAD_URL . tag_photo($v['photo']); ?>">
                    <?php if ($v['video']) { ?>
                        <span class="gray-bg"></span>
                        <video class="video-sign h-f" id="i-ban-video" loop="" preload="load" muted="muted"
                               src="<?php echo UPLOAD_URL . tag_photo($v['video']); ?>"></video>
                    <?php } ?>
                    <div class="cent-cont">
                        <p class="ch"><?php echo $v['title'] ?></p>
<!--                        <p class="en">--><?php //echo $v['title_en'] ?><!--</p>-->
<!--                        <a href="--><?php //echo $v['links'] ?><!--" class="link">See more</a>-->
                    </div>
                </li>
            <?php endforeach ?>


        </ul>
        <div class="btns">
            <div class="nums">01</div>
            <div class="line">
                <i></i>
            </div>
            <!-- 注意top的值不同 -->
            <?php foreach ($bannerlist as $k => $v): ?>
                <div class="circle <?php if ($k == 0) {
                    echo 'active';
                } ?>" style="top: 310px;"></div>
            <?php endforeach ?>

        </div>
        <div class="loader"></div>
        <div class="other-btns f-cb">
            <div class="fl other-btns-a">
                <a href="javascript:void(0);">
                    <span class="img"></span>
                    <span>公司概况</span>
                </a>
                <div class="sub-menu">
                    <a href="<?php echo site_url('about'); ?>"><i class="fa fa-building"></i><span>关于我们</span></a>
                    <a href="<?php echo site_url('his'); ?>"><i class="fa fa-calendar"></i><span>发展历程</span></a>
                    <a href="<?php echo site_url('invest'); ?>"><i class="fa fa-bitcoin"></i><span>投资策略</span></a>
                </div>
            </div>
            <div class="fl other-btns-a">
                <a href="<?php echo site_url('bus'); ?>">
                    <span class="img img2"></span>
                    <span>天壹业务</span>
                </a>
            </div>
            <div class="fl other-btns-a">
                <a href="<?php echo site_url('pro?type=1'); ?>">
                    <span class="img img3"></span>
                    <span>投资组合与投资者</span>
                </a>
            </div>
            <div class="fl other-btns-a">
                <a href="<?php echo site_url('new?type=3'); ?>">
                    <span class="img"></span>
                    <span>天壹动态</span>
                </a>
            </div>
            <div class="fl other-btns-a">
                <a href="<?php echo site_url('team'); ?>">
                    <span class="img img2"></span>
                    <span>天壹团队</span>
                </a>
                <div class="sub-menu">
                    <a href="<?php echo site_url('team'); ?>"><i class="fa fa-group"></i><span>团队介绍</span></a>
                    <a href=""><i class="fa fa-picture-o"></i><span>照片墙</span></a>
                </div>
            </div>
            <div class="fl">
                <a href="<?php echo site_url('contact'); ?>">
                    <span class="img img3"></span>
                    <span>联系我们</span>
                </a>
            </div>
        </div>
    </div>
    <!-- end banner -->

    <!-- start about -->
    <!-- <div class="about project-silder f-cb">
        <div class="imgList fl">
            <ul>
            <?php foreach ($gslist as $k => $v): ?>
                <li data-img="<?php echo UPLOAD_URL . tag_photo($v['photo']); ?>"></li>
            <?php endforeach ?>
            </ul>
            <div class="loader"></div>
        </div>
        <div class="about-right fl">
            <div class="about-top">
                <div class="msg-list">
                <?php foreach ($gslist as $k => $v): ?>
                    <div class="msg-box">
                        <h2><?php echo $v['title'] ?></h2>
                        <p><?php echo $v['introduction'] ?></p>
                    </div>
                <?php endforeach ?>
                </div>
                <div class="silder format-arrow">
                    <div class="arrow-box">
                        <div class="arrow-one">
                            <i class="iconfont ty-arrowll-copy arrow-next"></i>
                        </div>
                        <div class="arrow-one arrow-pre-one">
                            <i class="iconfont ty-arrowll-copy arrow-pre"></i>
                        </div>
                        <svg version="1.1" viewBox="0 0 260 260">
                            <circle cx="130" cy="130" r="120"></circle>
                        </svg>
                    </div>          
                </div>
            </div>
            <div class="about-bottom">
            <?php foreach ($gslist as $k => $v): ?>
                <div class="icon-box f-cb">
                    <div class="icon-list f-cb fl">
                        <span class="fl selected"></span>
                        <span class="fl"></span>
                        <span class="fl"></span>
                    </div>
                    <div class="link-list fl">
                        <a href="<?php echo $v['links'] ?>">See more</a>
                    </div>
                </div>
            <?php endforeach ?>
            </div>
        </div>
    </div> -->
    <div class="about-new f-cb">
        <div class="imgList fl">
            <ul>
                <li style="background: url(<?php echo UPLOAD_URL . tag_photo($gslist[0]['photo']); ?>) no-repeat center; background-size: cover;"></li>
            </ul>
        </div>
        <div class="about-right fl">
            <h2><?php echo $gslist[0]['title'] ?></h2>
            <div class="line"></div>
            <div class="dis"><?php echo $gslist[0]['introduction'] ?></div>
            <div class="about-new-aline">
                <a href="<?php echo site_url('about'); ?>" class="aline">了解详情</span>
                    <a class="icon-row-right-box" href="<?php echo site_url('about'); ?>">
                        <div class="icon-row-right"></div>
                    </a>
            </div>
        </div>
    </div>
    <!-- end about -->


    <!-- start bus -->
    <div class="bus project-silder">
        <div class="bus-col">
            <h2>天壹业务</h2>
            <div class="line"></div>
            <a href="<?php echo site_url('bus'); ?>">
                私募股权投资
            </a>
        </div>
        <!-- 注意format-1命名 -->
        <?php foreach ($ywlist as $k => $v): ?>
            <div class="silder silder-format">
                <div class="slide-img">
                    <div class="slide-img-effect">
                        <!-- 480*245 -->
                        <div class="img-container"
                             style="background-image: url(<?php echo UPLOAD_URL . tag_photo($v['pic']); ?>);"></div>
                        <h3><?php echo $v['title'] ?></h3>
                        <a href="<?php echo site_url('bus'); ?>" class="hover-link">
                            <span class="hover-link-icon scaleAni"></span>
                            <i></i>
                        </a>
                    </div>
                </div>
            </div>
        <?php endforeach ?>

        <div class="silder format-arrow">
            <div class="arrow-box">
                <div class="arrow-one">
                    <i class="iconfont ty-arrowll-copy arrow-next"></i>
                </div>
                <div class="arrow-one arrow-pre-one">
                    <i class="iconfont ty-arrowll-copy arrow-pre"></i>
                </div>
                <svg version="1.1" viewBox="0 0 260 260">
                    <circle cx="130" cy="130" r="120"></circle>
                </svg>
            </div>
        </div>
    </div>
    <!-- end bus -->


    <!-- start invest -->
    <div class="invest project-silder">
        <!-- 注意format-1命名 -->
        <?php foreach ($tzlist as $k => $v): ?>
            <div class="silder silder-format">
                <div class="slide-img">
                    <div class="slide-img-effect">
                        <!-- 960*490 -->
                        <div class="img-container"
                             style="background-image: url(<?php echo UPLOAD_URL . tag_photo($v['pic']); ?>);"></div>
                        <a href="<?php echo site_url('details/' . $v['id']); ?>" class="hover-link"></a>
                        <h3><?php echo $v['title'] ?></h3>
                        <h4><?php echo $v['introduction'] ?></h4>
                    </div>
                </div>
            </div>
        <?php endforeach ?>

        <div class="invest-col">
            <div class="invest-col-box">
                <div class="title">投资组合与投资者</div>
                <div class="line"></div>
                <div class="invest-btn f-cb">
                    <a class="fl active">投资组合</a>
                    <a class="fl">投资者</a>
                </div>
            </div>
        </div>
        <div class="silder format-arrow">
            <div class="arrow-box">
                <div class="arrow-one">
                    <i class="iconfont ty-arrowll-copy arrow-next"></i>
                </div>
                <div class="arrow-one arrow-pre-one">
                    <i class="iconfont ty-arrowll-copy arrow-pre"></i>
                </div>
                <svg version="1.1" viewBox="0 0 260 260">
                    <circle cx="130" cy="130" r="120"></circle>
                </svg>
            </div>
        </div>
    </div>
    <!-- end invest -->

    <!-- start new -->
    <div class="new project-silder">
        <div class="bus-col">
            <h2>天壹动态</h2>
            <div class="line"></div>
            <a class="icon-row-right-box" href="<?php echo site_url('new'); ?>">
                <div class="icon-row-right"></div>
            </a>
        </div>
        <div class="index-new-list">
            <ul class="fl">
                <?php foreach ($nlist as $k => $v): ?>
                    <li class="fl">
                        <div class="img"
                             style="background: url(<?php echo UPLOAD_URL . tag_photo($v['photo']); ?>) no-repeat center;background-size: cover;"></div>
                        <a class="text-content" href="<?php echo site_url('details/' . $v['id']); ?>">
                            <p class="time"><?php echo date('Y.m.d', $v['timeline']); ?></p>
                            <div class="title"><?php echo $v['title'] ?></div>
                            <div class="dis">
                                <?php echo $v['introduction'] ?>
                            </div>
                        </a>
                    </li>
                <?php endforeach ?>

            </ul>
        </div>
        <!-- <div class="silder format-arrow">
            <div class="arrow-box">
                <div class="arrow-one">
                    <i class="iconfont ty-arrowll-copy arrow-next"></i>
                </div>
                <div class="arrow-one arrow-pre-one">
                    <i class="iconfont ty-arrowll-copy arrow-pre"></i>
                </div>
                <svg version="1.1" viewBox="0 0 260 260">
                    <circle cx="130" cy="130" r="120"></circle>
                </svg>
            </div>          
        </div> -->
    </div>
    <!-- end new -->

</div>

<div class="h5">
    <div class="h5-header">
        <a href="<?php echo site_url(''); ?>" class="logo"></a>
        <div class="icon-nav"></div>
    </div>
    <div class="h5-nav-box">
        <?php include_once VIEWS . 'inc/moblienav.php'; ?>
    </div>
    <div class="h5-banner">
        <div class="swiper-container">
            <div class="swiper-wrapper">
                <?php foreach ($bannerlist as $k => $v): ?>
                    <a class="swiper-slide" href="<?php echo $v['links'] ?>"
                       style="background: url(<?php echo UPLOAD_URL . tag_photo($v['photo']); ?>) no-repeat center; background-size: cover">
                        <p class="cn"><?php echo $v['title'] ?></p>
                        <p class="en"><?php echo $v['title_en'] ?></p>
                        <div class="see">See more</div>
                    </a>
                <?php endforeach ?>
            </div>
        </div>
    </div>
    <div class="h5-search-box">
        <input type="text" name="keywords2"
               id="keywords2" <?php if (!empty($keywords)) { ?> value="<?php echo $keywords2; ?>" <?php } ?> >
        <a class="h5-search-icon" onclick="javascript:myFunction2();"></a>
    </div>
    <div class="h5-about-banner">
        <div class="swiper-container">
            <div class="swiper-wrapper">
                <?php foreach ($gslist as $k => $v): ?>
                    <a class="swiper-slide" href="<?php echo $v['links'] ?>">
                        <div class="img"
                             style="background: url(<?php echo UPLOAD_URL . tag_photo($v['photo']); ?>) no-repeat center; background-size: cover"></div>
                        <div class="text">
                            <div class="title"><?php echo $v['title'] ?></div>
                            <div class="dis"><?php echo $v['introduction'] ?></div>
                            <!-- <div class="see">See more</div> -->
                        </div>
                    </a>
                <?php endforeach ?>
            </div>
        </div>
    </div>
    <div class="h5-bus f-cb">
        <div class="bus-col fl">
            <h2>天壹业务</h2>
            <div class="line"></div>
            <a class="icon-row-right-box" href="<?php echo site_url('bus'); ?>">
                <div class="icon-row-right"></div>
            </a>
        </div>
        <?php foreach ($ywlist as $k => $v): ?>
            <a href="<?php echo site_url('bus'); ?>" class="fl h5-bus-li"
               style="background: url(<?php echo UPLOAD_URL . tag_photo($v['pic']); ?>) no-repeat center;background-size: cover">
                <p class="title"><?php echo $v['title'] ?></p>
            </a>
        <?php endforeach ?>

    </div>
    <div class="h5-invest f-cb">
        <div class="bus-col fl">
            <h2>投资组合与投资者</h2>
            <div class="line"></div>
            <div class="sub-btns">
                <a class="active">投资组合</a>
                <a>
                    投资者
                </a>
            </div>
        </div>
        <?php foreach ($tzlist as $k => $v): ?>
            <a href="<?php echo site_url('details/' . $v['id']); ?>" class="h5-invest-li fl"
               style="background: url(<?php echo UPLOAD_URL . tag_photo($v['pic']); ?>) no-repeat center; background-size: cover;">
                <div class="title"><?php echo $v['title'] ?></div>
                <div class="dis"><?php echo $v['introduction'] ?></div>
            </a>
        <?php endforeach ?>
    </div>
    <a href="<?php echo site_url('pro'); ?>" class="h5-invest-see">
        <div class="seemore">See more</div>
    </a>
    <div class="h5-news f-cb">
        <div class="bus-col fl">
            <h2>天壹动态</h2>
            <div class="line"></div>
            <a class="icon-row-right-box" href="<?php echo site_url('new'); ?>">
                <div class="icon-row-right"></div>
            </a>
        </div>
        <?php foreach ($nlist as $k => $v): ?>
            <a class="h5-news-li fl" href="<?php echo site_url('details/' . $v['id']); ?>">
                <div class="img"
                     style="background: url(<?php echo UPLOAD_URL . tag_photo($v['photo']); ?>) no-repeat center; background-size: cover;"></div>
                <div class="text">
                    <div class="text-cont">
                        <div class="time"><?php date('Y-m-d', $v['timeline']) ?></div>
                        <div class="title"><?php echo $v['title'] ?></div>
                        <div class="dis"><?php echo $v['introduction'] ?></div>
                    </div>
                </div>
            </a>
        <?php endforeach ?>

    </div>
</div>


<!-- start index-contact -->
<div class="index-contact f-cb">
    <a class="index-join-box fl" href="<?php echo site_url('join'); ?>">
        <div class="index-cont-box">
            <div class="index-cont-img"></div>
            <div class="title">加入我们</div>
            <div class="dis">职位空缺更新实时为您推送</div>
        </div>
    </a>
    <a class="index-join-box fl" href="<?php echo site_url('contact'); ?>">
        <div class="index-cont-box">
            <div class="index-cont-img index-cont2-img"></div>
            <div class="title">联系我们</div>
            <div class="dis">秉承真诚、开放、共赢的理念</div>
        </div>
    </a>
    <div class="bus-col fl">
        <h2>联系我们</h2>
        <div class="line"></div>
        <a class="icon-row-right-box" href="<?php echo site_url('contact'); ?>">
            <div class="icon-row-right"></div>
        </a>
    </div>
</div>
<!-- end index-contact -->


<!-- start 底部 -->
<?php include_once VIEWS . 'inc/footer.php'; ?>
<!-- end 底部 -->
<?php
echo static_file('web/js/main.js');
echo static_file('web/js/comm.js');
?>
<script type="text/javascript">
    function myFunction2() {
        var keywords = $('#keywords2').val();
        window.location.href = GLOBAL_URL + 'index.php/search?keywords=' + keywords;
    }
</script>
</body>
</html>