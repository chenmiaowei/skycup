<?php 
    $CI->load->model('article_model','marticle');
    $page = 1;
    if(!empty($reg[0])){
        $page = $reg[0];
    }   
    if($this->input->GET()){
        $keywords=$this->input->GET('keywords');
    }else{
        $keywords='';
    }    

    $where=array('cid'=>5,'audit'=>1);

    $limit = 8;
    $count = $CI->marticle->get_count_all($where);
    $pages = _pages(site_url($url_base),$limit,$count,2);
    if(!empty($keywords)){$this->db->like('title',$keywords);}
    $list = $CI->marticle->get_list($limit,$limit*($page-1),$orders,$where,'id,photo,title,introduction,content,timeline');      
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


    
    <!-- start PC端新闻展示 -->
    <div class="pc new-pc" style="padding-top: 200px;">

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


    <div class="h5 new-h5" style="padding-top: 70px;">
        <div class="new-h5-list">
        <?php foreach ($list as $k => $v): ?>
            <a class="new-h5-box" href="<?php echo site_url('details'); ?>">
                <div class="time"><?php date('Y-m-d',$v['timeline']) ?></div>
                <p class="title"><?php echo $v['title'] ?></p>
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
    echo static_file('comm.js');
?>
</body>
</html>