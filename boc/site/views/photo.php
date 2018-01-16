<?php
$where = array('cid' => 23);
$CI->load->model('article_model', 'marticle');
$list = $CI->marticle->get_all($where, 'id,photo,title,introduction,content,xphoto,color');


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
    <h2>照片墙</h2>
    <h3>Our Picture</h3>
    <?php include_once VIEWS . 'inc/menu.php'; ?>
</div>
<!-- end 列表页面banner -->

<div class="photo-container">
    <div class="pc">
        <!-- start invest -->
        <div class="invest project-silder">
            <!-- 注意format-1命名 -->
            <?php foreach ($list as $k => $v): ?>
                <div class="silder silder-format">
                    <div class="slide-img">
                        <div class="slide-img-effect">
                            <!-- 960*490 -->
                            <div class="img-container"
                                 style="background-image: url(<?php echo UPLOAD_URL . tag_photo($v['photo']); ?>);"></div>
                            <a href="<?php echo site_url('photos/' . $v['id']); ?>" class="hover-link"></a>
                            <h3><?php echo $v['title'] ?></h3>
                            <h4><?php echo $v['introduction'] ?></h4>
                        </div>
                    </div>
                </div>
            <?php endforeach ?>
        </div>
    </div>
    <div class="h5">
        <div class="h5-invest f-cb">
            <div></div>
            <?php foreach ($list as $k => $v): ?>
                <a href="<?php echo site_url('photos/' . $v['id']); ?>" class="h5-invest-li fl"
                   style="background: url(<?php echo UPLOAD_URL . tag_photo($v['photo']); ?>) no-repeat center; background-size: cover;">
                    <div class="title"><?php echo $v['title'] ?></div>
                    <div class="dis"><?php echo $v['introduction'] ?></div>
                </a>
            <?php endforeach ?>
        </div>
    </div>
</div>
<!-- end invest -->
<!-- start 底部 -->
<?php include_once VIEWS . 'inc/footer.php'; ?>
<!-- end 底部 -->
<?php
echo static_file('jQuery.js');
echo static_file('comm.js');
?>
<script>
    $(function () {
        var busSetInitInvest;
        var setIntInvest;
        var setNextRemoveInvest;
        var setPrevRemoveInvest;
        var isIdxInvest = true;

        function invest(total, ln, arrowBox, svg, arrowPre, box, delayTm) {// total: 总共几个; ln: 循环个数; arrowBox: 箭头盒子; svg: 往后箭头; arrowPre: 往前箭头; box: 主要的块; delayTm: 延时
            arrowBox.addClass("circleAni");
            var add = function (i, k) {
                box.find($(".silder-format")).eq(i).addClass("format-" + (k + 1))
                box.find($(".silder-format")).eq(i).css({opacity: 1})
                box.find($(".silder-format")).eq(i).find('.slide-img').addClass('slideAni')
                box.find($(".silder-format")).eq(i).find('.slide-img-effect').addClass('slideAni')
                box.find($(".silder-format")).eq(i).find('.img-container').addClass('trans3d')
                box.find($(".silder-format")).eq(i).find('.gayBg').addClass('bgAni')
            }
            var remove = function (i, k) {
                box.find($(".silder-format")).eq(i).removeClass("format-" + (k + 1))
                box.find($(".silder-format")).eq(i).find('.slide-img').removeClass('slideAni')
                box.find($(".silder-format")).eq(i).find('.slide-img-effect').removeClass('slideAni')
                box.find($(".silder-format")).eq(i).find('.img-container').removeClass('trans3d')
                box.find($(".silder-format")).eq(i).find('.gayBg').removeClass('bgAni')

                // box.find($(".format-"+i+" .slide-img,.format-"+i+" .slide-img-effect")).removeClass('slideAni')
                // box.find($(".format-"+i+" .img-container")).removeClass('trans3d')
                // box.find($(".format-"+i+" .slide-text,.format-"+i+" .slide-text-effect")).removeClass('textAni')
                // box.find($(".format-"+i+" .gayBg")).removeClass('bgAni')
            }

            // start 一开始打开的时候，先渲染5个
            var i = 0;
            busSetInitInvest = setInterval(function () {
                i == ln ? clearInterval(busSetInitInvest) : add(i, i)
                i++
            }, delayTm)
            // end

            // 循环开始
            var isBusClick = false;
            var int = function () {
                clearInterval(setIntInvest)
                isBusClick = false;
                setIntInvest = setInterval(function () {
                    goNext()
                }, 3000 * ln)
            }
            // 循环结束

            //向前开始
            var goNext = function () {
                isBusClick = false;
                var k = 0;
                remove(0, k);
                var sl = box.find('.silder-format').eq(0)
                box.append(sl)
                add(ln - 1, k)
                setNextRemoveInvest = setInterval(function () {
                    k++;
                    if (k == ln) {
                        clearInterval(setNextRemoveInvest)
                        isBusClick = true
                        console.log(isBusClick)
                    } else {
                        remove(0, k);
                        sl = box.find('.silder-format').eq(0)
                        box.append(sl)
                        add(ln - 1, k)
                    }
                }, delayTm)
                arrowBox.removeClass("circleAni");
                setTimeout(function () {
                    arrowBox.addClass("circleAni");
                    //add(1)
                }, 100)
            }
            //向前结束

            //向后开始
            var goPrev = function () {
                isBusClick = false;
                var k = 0;
                remove(0, k);
                var sl = box.find('.silder-format:last')
                box.prepend(sl)
                add(0, k)
                setPrevRemoveInvest = setInterval(function () {
                    k++;
                    if (k == ln) {
                        clearInterval(setPrevRemoveInvest)
                        isBusClick = true
                    } else {
                        remove(k + 1, k);
                        add(k, k)
                    }
                }, delayTm)
                arrowBox.removeClass("circleAni");
                setTimeout(function () {
                    arrowBox.addClass("circleAni");
                    //add(1)
                }, 100)
            }
            //向后结束

            // 如果总数大于显示的数据，那么循环
            if (total > ln) {
                int();
            }


            box.on("mouseover mouseout", 'svg', function (event) {
                if (event.type == "mouseover") {
                    //鼠标悬浮
                    clearInterval(setIntInvest)
                } else if (event.type == "mouseout") {
                    //鼠标离开
                    int()
                }
            })

            box.on("mouseover mouseout", '.arrow-pre-one', function (event) {
                if (event.type == "mouseover") {
                    //鼠标悬浮
                    clearInterval(setIntInvest)
                } else if (event.type == "mouseout") {
                    //鼠标离开
                    int()
                }
            })

            box.on('click', 'svg', function (event) {
                event.preventDefault();
                /* Act on the event */
                console.log("点击了向前的按钮")
                console.log('isBusClick====', isBusClick)
                if (isBusClick) {
                    goNext();
                    console.log(111)
                }
            });
            box.on('click', '.arrow-pre-one', function (event) {
                event.preventDefault();
                /* Act on the event */
                clearInterval(setIntInvest)
                console.log(isBusClick)
                if (isBusClick && total >= ln * 2) {
                    goPrev();
                    console.log(222)
                }
            });


        }

        invest($(".invest .silder-format").length, 7, $(".invest .arrow-box"), 'svg', 'arrow-pre-one', $(".invest"), 800)
    })
</script>
</body>
</html>