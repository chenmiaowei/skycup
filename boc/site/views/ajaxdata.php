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
    <?php foreach ($tzlist as $k => $v): ?>
        <div class="silder silder-format">
            <div class="slide-img">
                <div class="slide-img-effect">
                    <!-- 960*490 -->
                    <div class="img-container" style="background-image: url(<?php echo UPLOAD_URL.tag_photo($v['pic']); ?>);"></div>
                    <a href="<?php echo site_url('details/'.$v['id']); ?>" class="hover-link"></a>
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
