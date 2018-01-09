<?php
!isset($reg[0]) and show_404();
$CI->load->model('gallery_model','mgallery');
$it=$CI->mgallery->get_one(array('id'=>$reg[0]),'title,id,position,content,pic');
// //点击率
// $CI->load->library('session');
// $click=$it['click'];
// $click++;
// $data=array('click'=>$click);
// $this->db->where('id',$it['id']);
// $this->db->update('article',$data);
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

    <!-- start 团队介绍详情页 -->
    <div class="team-details">
        <div class="team-details-content f-cb">
            <img src="<?php echo UPLOAD_URL.tag_photo($it['pic']); ?>" alt="" class="team-details-img pc">
            <div class="team-text fr">
                <div class="top">
                    <div class="name"><?php echo $it['title']; ?></div>
                    <div class="title"><?php echo $it['position']; ?></div>
                </div>
                <div class="dis">
                    <?php echo $it['content']; ?>
                </div>
            </div>
        </div>
    </div>
    <!-- end 团队介绍详情页 -->


    <!-- start 底部 -->
    <?php include_once VIEWS.'inc/footer.php'; ?>
    <!-- end 底部 -->


<?php
    echo static_file('jQuery.js');
    echo static_file('comm.js');
?>
</body>
</html>