<?php
!isset($reg[0]) and show_404();
$CI->load->model('product_model','mproduct');
$it = $CI->mproduct->get_one(array('id'=>$reg[0],'audit'=>1));

//背景轮播
$lblist=explode(',',$it['mbjimg']);

//第二屏
$CI->load->model('page_model','mpage');
$pgit = $CI->mpage->get_one(array('cid'=>1,'ccid'=>$reg[0]));

//第二屏小图标
$tblist=explode(',',$pgit['pic']);


//第三屏
$CI->load->model('gallery_model','mgallery');
$glist = $CI->mgallery->get_all(array('cid'=>1,'ccid'=>$reg[0]));


//第四屏
$CI->load->model('article_model','marticle');
$alist = $CI->marticle->get_list(6,0,false,array('cid'=>1,'ccid'=>$reg[0],'audit'=>1),'id,title,mphoto,content');


//第五屏
$CI->load->model('columnpic_model','mcolumnpic');
$blist = $CI->mcolumnpic->get_list(6,0,false,array('cid'=>1,'ccid'=>$reg[0],'audit'=>1),'id,mphoto');

//点击率
$CI->load->library('session');
$click=$it['click'];
$click++;
$data=array('click'=>$click);
$this->db->where('id',$it['id']);
$this->db->update('product',$data);
?>
<!DOCTYPE html>
<html>
<head>
<?php include_once VIEWS.'inc/head.php'; ?>
<?php
    echo static_file('m/js/touch.js');
    echo static_file('m/js/swiper-3.4.1.min.js');
    echo static_file('m/css/swiper-3.4.1.min.css');
?>
</head>

<body>
    <?php include_once VIEWS.'inc/header.php'; ?>
    <div class="main">
        <div class="pro-ad-banner">
            <div class="pics">
                <div class="ab swiper-container">
                    <ul class="swiper-wrapper">
                    <?php foreach ($lblist as $k => $v) { ?>
                        <li class="swiper-slide">
                            <img src="<?php echo UPLOAD_URL.tag_photo($v);?>" alt="<?php echo $it['title'] ?>" width="100%">
                        </li>
                    <?php } ?>

                    </ul>
                </div>
                 <img src="<?php echo UPLOAD_URL.tag_photo($it['mproimg']);?>" class="child">
            </div>

            <div class="btns">

            </div>
        </div>
        <div class="goods-adv">
            <div class="texts">
                <img src="<?php echo static_file('m/img/pd04.png')?>">
            </div>
            <img src="<?php echo UPLOAD_URL.tag_photo($pgit['mphoto']);?>" class="pic">
            <div class="advs fix">
                <ul>
                <?php foreach ($tblist as $k => $v): ?>
                    <li>
                        <div class="adv-img">
                            <img src="<?php echo UPLOAD_URL.tag_photo($v);?>">
                        </div>
                        <p><?php echo get_title($v,'upload'); ?></p>
                    </li>
                <?php endforeach; ?>

                </ul>
            </div>
        </div>
        <div class="goods-color">
            <img src="<?php echo static_file('m/img/pd10.jpg')?>" class="pic">
            <div class="pro-pic">
        <?php foreach ($glist as $k => $v): ?>
            <?php $slist=explode(',',$v['mphoto']); ?>
               <ul>
               <?php foreach ($slist as $key => $value) { ?>
                   <li <?php echo $v['id']; ?>><img src="<?php echo UPLOAD_URL.tag_photo($value)?>" alt="<?php echo $v['title'] ?>"></li>
               <?php } ?>

               </ul>
        <?php endforeach; ?>

            </div>
            <div class="choose-color">
                <p>可选颜色</p>
                <div class="buttons">
                <?php foreach ($glist as $k => $v): ?>
                    <a href="javascript:void(0);" data-has="0" style="background:<?php echo $v['color'];  ?>;"></a>
                <?php endforeach; ?>
                    <!-- <a href="javascript:void(0);" data-has="1" style="background:#f0eef4;"></a> -->
                </div>
            </div>
        </div>
        <div class="desc-ul goods-box">
           <ul>
           <?php foreach ($alist as $k => $v): ?>
                <li class="<?php if($k%2==0){echo 'right-style';}else{ echo 'left-style';} ?> fix">
                    <img src="<?php echo UPLOAD_URL.tag_photo($v['mphoto']);?>" class="img-tit">
                    <div class="text-main">
                        <div class="s-head">
                            <p class="big-t"><?php echo $v['title'] ?></p>
                        </div>
                        <div class="text-cover">
                            <?php echo $v['content']; ?>
                        </div>
                    </div>
                </li>
            <?php endforeach; ?>

           </ul>
        </div>
        <div class="home-banner">
		 <div class="as-w swiper-container">
            <ul class="swiper-wrapper">
                 <?php foreach ($blist as $k => $v): ?>
                    <li class="swiper-slide">
                       <img src="<?php echo UPLOAD_URL.tag_photo($v['mphoto']);?>" alt="<?php echo $v['title'] ?>">
                    </li>
                <?php endforeach; ?>
            </ul>
            <!-- 如果需要分页器 -->
            <div class="aturn turnpage"></div>
        </div>

			<!--<div class="btns">
                <//?php foreach ($blist as $k => $v): ?>
                    <a href="javascript:void(0);" <//?php if($k==0){echo ' class="cur"';} ?>></a>
                <//?php endforeach; ?>
            </div>-->
        </div>
        <div class="good-data">
            <div class="titles">
                <p class="en"><img src="<?php echo static_file('m/img/pd19.png')?>"></p>
                <p class="cn">产品参数</p>
            </div>
            <ul class="data-list fix">
                <li>
                    <span>名称NAME</span><span><?php echo $it['title'] ?></span>
                </li>
                <li>
                    <span>产品型号model</span><span><?php echo $it['model'] ?></span>
                </li>
                <li>
                    <span>适用年龄 age</span><span><?php echo $it['age'] ?></span>
                </li>
                <li>
                    <span>最大承重 max breden</span><span><?php echo $it['maxbreden'] ?></span>
                </li>
                <li>
                    <span>产品尺寸 size</span><span><?php echo $it['size'] ?></span>
                </li>
                <li>
                    <span>速度 speed</span><span><?php echo $it['speed'] ?></span>
                </li>
                <li>
                    <span>颜色color </span><span><?php echo $it['color'] ?></span>
                </li>
                <li>
                    <span>包装箱尺寸 size </span><span><?php echo $it['boxsize'] ?></span>
                </li>
            </ul>
        </div>
    </div>


    <?php include_once VIEWS.'inc/footer.php'; ?>
<?php
	echo static_file('web/js/main.js');
?>
<script>
        $(".pro-pic ul:first").show().find("li:first").show().addClass("current");
        $(".buttons a:first").addClass("on");
        $(".buttons a").click(function(){
            var can=$(this).data("has"),index=$(this).index();
            if(can==1){
                alert("暂时还没有这个配色产品")
            }
            else{
                $(this).addClass("on").siblings().removeClass("on");
                $(".pro-pic ul").eq(index).show().siblings().hide();
                $(".pro-pic li").hide().removeClass("current");
                $(".pro-pic ul").eq(index).find("li:first").show().addClass("current");
            }

        })

        touch.on(".pro-pic","swipeleft swiperight",function(e){
            var index=$(".current").index(),num=$(".carbtn .on").index()-1,last=7;
            var newpos;
            if(e.direction=="left"){
                newpos=index==last?0:index+1;
            }else{
                newpos=index==0?last:index-1;
            }
            $(".pro-pic ul").eq(num).find("li").eq(newpos).addClass("current").siblings().removeClass("current");
            $(".pro-pic ul").eq(num).find("li").eq(newpos).show().siblings().hide();
        })
          var m1 = new Swiper ('.ab', {
            loop:true,
            effect : 'fade',
            initialSlide:0,
            autoplay:3000,
            // 如果需要分页器
            pagination: '.btns',
            paginationClickable:true,

        })
		var m2 = new Swiper ('.as-w', {
            loop:true,
            effect : 'fade',
            initialSlide:0,
            autoplay:3000,
            // 如果需要分页器
            pagination: '.turnpage',
            paginationClickable:true,

        })
</script>
</body>
</html>
