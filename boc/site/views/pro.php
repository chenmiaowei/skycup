<?php
$CI->load->model('article_model', 'marticle');
$where = array('cid' => 4, 'audit' => 1);
if ($this->input->GET()) {
    $type = $this->input->GET('type');
} else {
    $type = 1;
}
$where = array('cid' => 4, 'audit' => 1, 'ctype' => $type);
$CI->load->model('article_model', 'marticle');
$list = $CI->marticle->get_all($where, 'id,photo,title,introduction,content,xphoto,color');


$CI->load->model('coltypes_model', 'mcoltypes');
$ctypelist = $CI->mcoltypes->get_all(array('cid' => 4, 'show' => 1), 'id,title', array('id' => 'asc'));
?>
<!DOCTYPE html>
<html>
<head>
    <?php include_once VIEWS . 'inc/head.php'; ?>
    <?php
    echo static_file('web/css/dest/jquery.fullPage.css');
    ?>
</head>

<body>
<div id="fullpage" class="pro-container">
    <div class="section">
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
        <div class="ban his-ban" data-img="<?php echo static_file('img/ban-1.jpg'); ?>">
            <h2><?php echo tag_columns(4); ?></h2>
            <h3>Portfolio And Investors</h3>
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
        <!-- end 列表页面banner -->


        <!-- start 投资组合与投资者 -->
        <div class="pro-list h5">
            <?php foreach ($list as $k => $v): ?>
                <?php if ($k == 0) { ?>
                    <div class="pro-box f-cb <?php echo $k===0?' first' : '' ?><?php echo $k===count($list)-1?' last' : '' ?>>">
                        <!-- 背景颜色后台配置 -->
                        <a class="fl pro-text" href="<?php echo site_url('details/' . $v['id']); ?>">
                            <div class="pro-text-bg" style="background: <?php echo $v['color']; ?>"></div>
                            <div class="pro-content">
                                <div class="pro-icon">
                                    <img src="<?php echo UPLOAD_URL . tag_photo($v['xphoto']); ?>"
                                         alt="<?php echo $v['title'] ?>">
                                </div>
                                <p class="title"><?php echo $v['title'] ?></p>
                                <div class="dis"><?php echo $v['introduction'] ?></div>
                                <div class="link">了解详情</div>
                            </div>
                        </a>
                        <!-- 1260*990 -->
                        <div class="pro-img fr"
                             style="background: url(<?php echo UPLOAD_URL . tag_photo($v['photo']); ?>) no-repeat center; background-size: cover;">
                            <?php echo $k===count($list)-1?' <a  class="go-previous"><i class="fa fa-chevron-circle-up"></i></a>' : '<a  class="go-next"><i class="fa fa-chevron-circle-down"></i></a>' ?>
                        </div>
                    </div>
                <?php } ?>
            <?php endforeach ?>

        </div>
        <!-- end 投资组合与投资者 -->


    </div>

    <?php foreach ($list as $k => $v): ?>
        <?php if ($k < count($list) - 1) { ?>
            <div class="section <?php echo $k===0?' first' : '' ?><?php echo $k===count($list)-1?' last' : '' ?>">
                <div class="pro-list h5">
                    <div class="pro-box f-cb">
                        <!-- 背景颜色后台配置 -->
                        <a class="fl pro-text" href="<?php echo site_url('details/' . $list[$k + 1]['id']); ?>">
                            <div class="pro-text-bg" style="background: <?php echo $list[$k + 1]['color']; ?>"></div>
                            <div class="pro-content">
                                <div class="pro-icon">
                                    <img src="<?php echo UPLOAD_URL . tag_photo($list[$k + 1]['xphoto']); ?>"
                                         alt="<?php echo $list[$k + 1]['title'] ?>">
                                </div>
                                <p class="title"><?php echo $list[$k + 1]['title'] ?></p>
                                <div class="dis"><?php echo strcut($list[$k + 1]['introduction'], 34) ?></div>
                                <div class="link">了解详情</div>
                            </div>
                        </a>
                        <!-- 1260*1080 -->
                        <div class="pro-img fr"
                             style="background: url(<?php echo UPLOAD_URL . tag_photo($list[$k + 1]['photo']); ?>) no-repeat center; background-size: cover;"></div>
                    </div>
                </div>
                <div class="pro-list pc">
                    <div class="pro-box f-cb">
                        <!-- 背景颜色后台配置 -->
                        <a class="fl pro-text" href="<?php echo site_url('details/' . $v['id']); ?>">
                            <div class="pro-text-bg" style="background: <?php echo $v['color']; ?>"></div>
                            <div class="pro-content">
                                <div class="pro-icon">
                                    <img src="<?php echo UPLOAD_URL . tag_photo($v['xphoto']); ?>"
                                         alt="<?php echo $v['title'] ?>">
                                </div>
                                <p class="title"><?php echo $v['title'] ?></p>
                                <div class="dis"><?php echo strcut($v['introduction'], 34) ?></div>
                                <div class="link">了解详情</div>
                            </div>
                        </a>
                        <!-- 1260*1080 -->
                        <div class="pro-img fr"
                             style="background: url(<?php echo UPLOAD_URL . tag_photo($v['photo']); ?>) no-repeat center; background-size: cover;">
                            <?php echo $k===count($list)-1?' <a  class="go-previous"><i class="fa fa-chevron-circle-up"></i></a>' : '<a  class="go-next"><i class="fa fa-chevron-circle-down"></i></a>' ?>
                        </div>
                    </div>
                </div>
            </div>
        <?php } else { ?>
            <div class="section pc <?php echo $k===0?' first' : '' ?><?php echo $k===count($list)-1?' last' : '' ?>">
                <div class="pro-list pc">
                    <div class="pro-box f-cb">
                        <!-- 背景颜色后台配置 -->
                        <a class="fl pro-text" href="<?php echo site_url('details/' . $v['id']); ?>">
                            <div class="pro-text-bg" style="background: <?php echo $v['color']; ?>"></div>
                            <div class="pro-content">
                                <div class="pro-icon">
                                    <img src="<?php echo UPLOAD_URL . tag_photo($v['xphoto']); ?>"
                                         alt="<?php echo $v['title'] ?>">
                                </div>
                                <p class="title"><?php echo $v['title'] ?></p>
                                <div class="dis"><?php echo strcut($v['introduction'], 34) ?></div>
                                <div class="link">了解详情</div>
                            </div>
                        </a>
                        <!-- 1260*1080 -->
                        <div class="pro-img fr"
                             style="background: url(<?php echo UPLOAD_URL . tag_photo($v['photo']); ?>) no-repeat center; background-size: cover;">
                            <?php echo $k===count($list)-1?' <a  class="go-previous"><i class="fa fa-chevron-circle-up"></i></a>' : '<a  class="go-next"><i class="fa fa-chevron-circle-down"></i></a>' ?>
                        </div>
                    </div>
                </div>
            </div>
        <?php } ?>
    <?php endforeach ?>

    <!-- start 底部 -->
    <!-- <div class="section pc">
        <div class="footer">
            <div class="footer-left f-cb">
                <a class="footer-logo fl" href="index.html"></a>
                <div class="footer-icon fr">
                    <a href="" class="icon-in"></a>
                    <a href="" class="icon-in"></a>
                    <a href="" class="icon-in"></a>
                    <a href="" class="icon-in"></a>
                </div>
            </div>
            <div class="footer-right f-cb">
                <p class="fl">地址/北京市西城区金融大街17号中国人寿中心6层</p>
                <p class="fr">© 2016 skycus capital.  All Rights Reserved.</p>
            </div>
        </div>
    </div> -->
    <!-- end 底部 -->
</div>

<!-- start 列表页小标题 -->
<div class="pc">
    <div class="sub-nav">
        <?php foreach ($ctypelist as $k => $v): ?>
            <div class="sub-nav-box"><a
                        href="<?php echo site_url('pro?type=' . $v['id']); ?>" <?php if ($v['id'] == $type) {
                    echo 'class="active"';
                } ?>><?php echo $v['title'] ?></a></div>
        <?php endforeach ?>
    </div>
</div>
<!-- start 列表页小标题 -->
<?php
echo static_file('web/css/dest/jquery.fullPage.css');
echo static_file('jQuery.js');
echo static_file('jquery.easing.1.3.js');
echo static_file('jquery.fullPage.min.js');
echo static_file('comm.js');
?>
<script>
    $(function () {
        var nowWidth = $(window).width()
        window.onresize = function () {
            nowWidth = $(window).width()
            if (nowWidth <= 1024) {
                $("#superContainer").css('top', '0');
            }
        }
        var proSection = $("#fullpage .section.pc");
        
        
        $('#fullpage').fullpage({
            scrollOverflow: false,
            onLeave: function (index) {
                if (nowWidth <= 1024) {
                    //$.fn.fullpage.moveTo(1)
                    proSection.remove()
                } else {
                    $('#fullpage').append(proSection)
                }
            }
            // afterLoad: function(){
            //     setTimeout(function(){
            //         $(".scrollable").scrollTop(0)
            //     },300)
            // }
        });
        $('.go-next').click(function () {
            $.fn.fullpage.moveSectionDown();
        })
         $('.go-previous').click(function () {
            $.fn.fullpage.moveTo(1);
        })
    });
</script>
</body>
</html>