<?php  
    if($this->input->GET('idx')){
        $idx=$this->input->GET('idx');
        $ctype=2;
    }else{
        $idx=0;
        $ctype=1;
    }

    $CI->load->model('article_model','marticle');
    $tzlist = $CI->marticle->get_list(5,0,false,array('cid'=>4,'audit'=>1,'flag'=>1,'ctype'=>$ctype),'id,pic,title,introduction');     
?>
<div class="bus-col fl">
            <h2>投资组合与投资者</h2>
            <div class="line"></div>
            <div class="sub-btns">
                <a>投资组合</a>
                <a class="active">
                    投资者
                </a>
            </div>
        </div>
    <?php foreach ($tzlist as $k => $v): ?>
        <a href="<?php echo site_url('details/'.$v['id']); ?>" class="h5-invest-li fl" style="background: url(<?php echo UPLOAD_URL.tag_photo($v['pic']); ?>) no-repeat center; background-size: cover;">
            <div class="title"><?php echo $v['title'] ?></div>
            <div class="dis"><?php echo $v['introduction'] ?></div>
        </a>
     <?php endforeach ?>
        