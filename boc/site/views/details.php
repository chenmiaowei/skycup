<?php 
!isset($reg[0]) and show_404();
$CI->load->model('article_model','marticle');
$it=$CI->marticle->get_one_pn(array('id'=>$reg[0]),'title,id,timeline,content,click,cid,sort_id');


$CI->load->model('columnpic_model','mcolumnpic');
$bannerit = $CI->mcolumnpic->get_one(array('cid'=>21,'audit'=>1,'ctype'=>$it['cid']),'id,photo');

$CI->load->model('columns_model','mcolumns');
$columnsit = $CI->mcolumns->get_one(array('id'=>$it['cid']),'id,title');

//点击率
$CI->load->library('session');
$click=$it['click'];
$click++;
$data=array('click'=>$click);
$this->db->where('id',$it['id']);
$this->db->update('article',$data);

?>
<!DOCTYPE html>
<html>
<head>
<?php include_once VIEWS.'inc/head.php'; ?>
</head>

<body class="details-bg">
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
    <div class="ban new-ban" data-img="<?php if(!empty($bannerit)){echo UPLOAD_URL.tag_photo($bannerit['photo']);}else{ echo static_file('img/ban-1.jpg'); } ?>">
        <h2><?php echo $columnsit['title'] ?></h2>
        <h3><?php if($it['cid']==4){ echo 'Portfolio And Investors';}elseif($it['cid']==5){ echo 'Tianyi Information'; }elseif($it['cid']==3){echo 'Our Business';} ?></h3>
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


    <div class="details">
        <h1><?php echo $it['title'] ?></h1>
        <div class="time"><?php echo date('Y.m.d',$it['timeline']); ?></div>
        <div class="dis">
            <?php echo $it['content']; ?>
        </div>
        <div class="details-next f-cb">
            <div class="fl">
            <?php if(isset($it['prev_id'])){ ?>
                <a href="<?php echo site_url('details/'.$it['prev_id']); ?>" class="link">上一条：<?php echo strcut($it['prev_title'],37); ?></a>
            <?php } ?>
            <?php if(isset($it['next_id'])){ ?>
                <a href="<?php echo site_url('details/'.$it['next_id']); ?>" class="link">下一条：<?php echo strcut($it['next_title'],37); ?></a>
            <?php } ?>
            </div>
            <a href="javascript:window.history.go(-1);" class="back fr">返回</a>
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