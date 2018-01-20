<?php 
    $CI->load->model('article_model','marticle');
    $list = $CI->marticle->get_all(array('cid'=>6,'audit'=>1),'id,addr,title,tel,longitude');

    $CI->load->model('columnpic_model','mcolumnpic');
    $bannerit = $CI->mcolumnpic->get_one(array('cid'=>21,'audit'=>1,'ctype'=>6),'id,photo');
?>
<!DOCTYPE html>
<html>
<head>
<?php include_once VIEWS.'inc/head.php'; ?>
<script type="text/javascript" src="http://api.map.baidu.com/api?v=2.0&ak=kix3GgvM7U7OKK3aZjNHUNTb"></script>

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
    <div class="ban bus-ban" data-img="<?php if(!empty($bannerit)){echo UPLOAD_URL.tag_photo($bannerit['photo']);}else{ echo static_file('img/ban-2.jpg'); } ?>">
        <h2>联系我们</h2>
        <h3>Contact Info</h3>
        <?php include_once VIEWS . 'inc/menu.php'; ?>


    </div>
    <!-- end 列表页面banner -->

    <!-- start 列表页小标题 -->
    <div class="pc">
        <div class="sub-nav">
            <div class="sub-nav-box"><a href="<?php echo site_url('contact'); ?>" class="active">联系我们</a></div>
        </div>
    </div>
    <!-- start 列表页小标题 -->


    <div class="contact-box f-cb">
        <div class="map fl" id="mapBox"></div>
        <div class="address-box fl">
        <?php foreach ($list as $k => $v): ?>
            <div class="address-li f-cb <?php if($k==0){ echo 'active';} ?>">
                <div class="icon-address fl"></div>
                <div class="contect-text fl">
                    <p class="title"><?php echo $v['title'] ?></p>
                    <p>电话：<?php echo $v['tel'] ?></p>
                    <p>地址：<?php echo $v['addr'] ?></p>
                </div>
            </div>
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
<script type="text/javascript">
    // 百度地图API功能
    var map = new BMap.Map("mapBox");    // 创建Map实例
    // 创建地址解析器实例
    var myGeo = new BMap.Geocoder();
    // 将地址解析结果显示在地图上,并调整地图视野
    myGeo.getPoint("北京市西城区金融大街17号中国人寿中心6层", function(point){
        if (point) {
            map.centerAndZoom(point, 16);
            map.addOverlay(new BMap.Marker(point));
        }
    }, "北京市");
    // map.setCurrentCity("北京");          // 设置地图显示的城市 此项是必须设置的
    map.enableScrollWheelZoom(true);     //开启鼠标滚轮缩放


    $(".address-box .address-li").click(function(event) {
        $(".address-li").removeClass('active')
        $(this).addClass('active')
        var idx = $(this).index();
        var list = [{
            addr: '北京市西城区金融大街17号中国人寿中心6层',
            city: '北京市'
        },{
            addr: '上海市浦东新区世纪大道88号金茂大厦20层',
            city: '上海市'
        }]
        map.clearOverlays(); // 清除覆盖物
        myGeo.getPoint(list[idx].addr, function(point){
            if (point) {
                map.centerAndZoom(point, 16);
                map.addOverlay(new BMap.Marker(point));
            }
        }, list[idx].city);
    });
</script>
</body>
</html>