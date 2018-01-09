<div class="header f-b">
    <a class="fl nav"></a>
    <a class="fl logo" href="<?php echo site_url(''); ?>"></a>
    <div class="fr header-right f-cb">
        <!-- <div class="lag f-cb fl">
            <div class="icon-lag fl"></div>
            <span class="fl">语言选择</span>
        </div> -->
        <a class="search fl"></a>
    </div>
</div>
<div class="nav-box">
    <div class="nav-box-bg"></div>
    <?php include_once VIEWS.'inc/nav.php'; ?>
</div>
<div class="search-box">
    <div class="search-close"></div>
    <div class="input">
        <input type="text" name="keywords" id="keywords" <?php if(!empty($keywords)){?> value = "<?php echo $keywords; ?>" <?php } ?> placeholder="Search">
        <a class="search-icon" onclick="javascript:myFunction();"></a>
    </div>
</div>
<script type="text/javascript">
    function myFunction(){
        var keywords = $('#keywords').val();
        window.location.href = GLOBAL_URL + 'index.php/search?keywords=' + keywords;
    }
</script>