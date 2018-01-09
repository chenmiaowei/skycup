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
        <h3>Tianyi Information</h3>
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

    
    <!-- start PC端新闻展示 -->
    <div class="pc new-pc">
        <div class="new-top f-cb">
        <?php foreach ($newslist as $k => $v): ?>
            <div class="new-box fl">
                <a class="new-cont" href="<?php echo site_url('details/'.$v['id']); ?>">
                    <!-- 410*210 -->
                    <div><img src="<?php echo UPLOAD_URL.tag_photo($v['photo']); ?>" alt="<?php echo $v['title'] ?>"></div>
                    <p class="title"><?php echo $v['title'] ?></p>
                    <p class="time"><?php date('Y-m-d',$v['timeline']) ?></p>
                    <p class="dis"><?php echo $v['introduction'] ?></p>
                    <div class="icon-row-right-gay">
                        <div class="icon"></div>
                    </div>
                </a>
            </div>            
        <?php endforeach ?>
            
        </div>

        <div class="new-list f-cb ">
        <?php foreach ($list as $k => $v): ?>
            <div class="new-box fl">
                <div class="new-content">
                    <div class="time"><?php date('Y-m-d',$v['timeline']) ?></div>
                    <p class="title"><?php echo $v['title'] ?></p>
                    <div class="dis"><?php echo $v['introduction'] ?></div>
                    <a href="<?php echo site_url('details/'.$v['id']); ?>" class="link">查看详情</a>
                </div>
            </div>
        <?php endforeach ?>
            
        </div>

        <div class="pages">
            <?php echo $pages;?>
        </div>
    </div>
    <!-- start PC端新闻展示 -->


    <div class="h5 new-h5">
        <div class="new-h5-top">
            <div class="swiper-container">
              <div class="swiper-wrapper">
              <?php foreach ($newslist as $k => $v): ?>
                <a class="swiper-slide" href="<?php echo site_url('details/'.$v['id']); ?>">
                    <div class="img" style="background: url(<?php echo UPLOAD_URL.tag_photo($v['photo']); ?>) no-repeat center; background-size: cover"></div>
                    <div class="text">
                        <div class="title"><?php echo $v['title'] ?></div>
                        <div class="time"><?php date('Y-m-d',$v['timeline']) ?></div>
                        <div class="dis"><?php echo $v['introduction'] ?></div>
                        <div class="see">
                            <span class="iconfont ty-arrowll-copy"></span>
                        </div>
                    </div>
                </a>
                <?php endforeach ?>
                
              </div>
              <div class="swiper-pagination"></div>
            </div>
        </div>
        <div class="new-h5-list">
        <?php foreach ($list as $k => $v): ?>
            <a class="new-h5-box" href="<?php echo site_url('details/'.$v['id']); ?>">
                <div class="time"><?php date('Y-m-d',$v['timeline']) ?></div>
                <p class="title"><?php date('Y-m-d',$v['timeline']) ?></p>
                <div class="dis">
                    <?php echo $v['introduction'] ?>
                </div>
                <div class="link">查看详情</div>
            </a>
        <?php endforeach ?>
        </div>
    </div>


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