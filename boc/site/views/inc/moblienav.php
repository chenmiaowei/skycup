<?php 
    $CI->load->model('columns_model','mcolumns');
    $pcnavlist = $CI->mcolumns->get_list(5,0,array('id'=>'asc'),array('depth'=>0,'show'=>1,'id !='=>1),'id,temp_index,title');
?>
<div class="h5-header">
    <a href="<?php echo site_url(''); ?>" class="logo"></a>
    <div class="icon-close"></div>
</div>
<div class="nav-list">
    <div class="nav-title">
        <div class="nav-li nav-li-fat">
            <div class="title">公司概况</div>
            <span class="iconfont ty-arrowll-copy"></span>
        </div>
        <div class="sub-nav-box">
            <a class="sub-nav-li" href="<?php echo site_url('about'); ?>">关于我们</a>
            <a class="sub-nav-li" href="<?php echo site_url('his'); ?>">发展历程</a>
            <a class="sub-nav-li" href="<?php echo site_url('invest'); ?>">投资策略</a>
        </div>
    </div>
    <a class="nav-title" href="<?php echo site_url('bus'); ?>">
        <div class="nav-li">
            <div class="title">天壹业务</div>
            <span class="iconfont ty-arrowll-copy"></span>
        </div>
    </a>
    <a class="nav-title" href="<?php echo site_url('pro?type=1'); ?>">
        <div class="nav-li">
            <div class="title">投资者与被投企业</div>
            <span class="iconfont ty-arrowll-copy"></span>
        </div>
    </a>
    <a class="nav-title" href="<?php echo site_url('new?type=3'); ?>">
        <div class="nav-li">
            <div class="title">天壹动态</div>
            <span class="iconfont ty-arrowll-copy"></span>
        </div>
    </a>
     <div class="nav-title">
        <div class="nav-li nav-li-fat">
            <div class="title">天壹团队</div>
            <span class="iconfont ty-arrowll-copy"></span>
        </div>
        <div class="sub-nav-box">
            <a class="sub-nav-li" href="<?php echo site_url('team'); ?>">团队介绍</a>
            <a class="sub-nav-li" href="<?php echo site_url('team'); ?>">行业资讯</a>
        </div>
    </div>

    <a class="nav-title" href="<?php echo site_url('contact'); ?>">
        <div class="nav-li">
            <div class="title">联系我们</div>
            <span class="iconfont ty-arrowll-copy"></span>
        </div>
    </a>
</div>
<div class="footer-icon fr">
    <a href="" class="icon-in"></a>
    <a href="" class="icon-in"></a>
    <a href="" class="icon-in"></a>
    <a href="" class="icon-in"></a>
</div>