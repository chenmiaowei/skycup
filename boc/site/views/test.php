
<!DOCTYPE html>
<html>
<head>
<?php include_once VIEWS.'inc/head.php'; ?>

<style>
* {
    margin: 0;
    padding: 0;
}
.blue-slide {
    background: #4390EE;
}
.red-slide {
    background: #CA4040;
}
.orange-slide {
    background: #FF8604;
}
.swiper-slide {
    line-height: 300px;
    color: #fff;
    font-size: 36px;
    text-align: center;
}

</style>
</head>
<body>
<div class="swiper-container">
  <div class="swiper-wrapper">
    <div class="swiper-slide blue-slide">slider1</div>
    <div class="swiper-slide red-slide">slider2</div>
    <div class="swiper-slide orange-slide">slider3</div>
  </div>
</div>







<script type="text/javascript">
    var mySwiper = new Swiper('.swiper-container',{
        loop: true,
        autoplay: 3000,
    });
</script>
</body>
</html>