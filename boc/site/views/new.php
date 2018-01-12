<?php 
    $page = 1;
    if(!empty($reg[0])){
        $page = $reg[0];
    }    
    

    $where = array('cid'=>5,'audit'=>1);
    if($this->input->GET()){
        $type=$this->input->GET('type');
    }else{
        $type=3;
    }

    $CI->load->model('article_model','marticle');
    $newslist = $CI->marticle->get_list(4,0,false,array('audit'=>1,'cid'=>5,'photo !='=>'' ,'ctype'=>$type),'id,photo,title,timeline,ctype,introduction');    


    $where=array('cid'=>5,'audit'=>1,'ctype'=>$type);
    $limit = 8;
    $count = $CI->marticle->get_count_all($where);
    $pages = _pages(site_url($url_base),$limit,$count,2);
    $list = $CI->marticle->get_list($limit,$limit*($page-1),$orders,$where,'id,photo,title,introduction,content,timeline');    


    $CI->load->model('coltypes_model','mcoltypes');
    $ctypelist = $CI->mcoltypes->get_all(array('cid'=>5,'show'=>1),'id,title',array('id'=>'asc'));    

    $CI->load->model('columnpic_model','mcolumnpic');
    $bannerit = $CI->mcolumnpic->get_one(array('cid'=>21,'audit'=>1,'ctype'=>5),'id,photo');
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
    <div class="ban new-ban" data-img="<?php if(!empty($bannerit)){echo UPLOAD_URL.tag_photo($bannerit['photo']);}else{ echo static_file('img/ban-3.jpg'); } ?>">
        <h2><?php echo tag_columns(5); ?></h2>
        <h3>Skycus Watch</h3>
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

    <!-- start 列表页小标题 -->
    <div class="pc">
        <div class="sub-nav">
        <?php foreach ($ctypelist as $k => $v): ?>
            <div class="sub-nav-box"><a href="<?php echo site_url('new?type='.$v['id']); ?>" <?php if($v['id']==$type){ echo 'class="active"';} ?>><?php echo $v['title'] ?></a></div>
        <?php endforeach ?>
        </div>
    </div>
    <!-- start 列表页小标题 -->

    <!-- start 底部 -->
    <?php include_once VIEWS.'inc/footer.php'; ?>
    <!-- end 底部 -->


<?php
    echo static_file('jQuery.js');
    echo static_file('swiper-3.4.2.jquery.min.js');
    echo static_file('comm.js');
?>
<script type="text/javascript">
    var mySwiper = new Swiper('.swiper-container',{
        loop: true,
        autoplay: 3000,
        pagination : '.swiper-pagination',
    });
    // 改变屏幕大小
    window.onresize = function(){
        mySwiper = new Swiper('.swiper-container',{
            loop: true,
            autoplay: 3000,
            pagination : '.swiper-pagination',
        });
    }
</script>
</body>
</html>