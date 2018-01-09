<?php 
    $CI->load->model('columns_model','mcolumns');
    $pcnavlist = $CI->mcolumns->get_list(5,0,array('id'=>'asc'),array('depth'=>0,'show'=>1,'id !='=>1),'id,temp_index,title');
?>
<div class="nav-list">
<?php foreach ($pcnavlist as $k => $v): ?>
    <div>
        <a href=<?php echo site_url($v['temp_index']); ?> <?php if(strpos($_SERVER['PHP_SELF'],$v['temp_index']) !== false){ ?>class="active" <?php } ?>><?php echo $v['title'] ?></a>
    </div>    
<?php endforeach ?>
</div>