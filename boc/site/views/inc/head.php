<meta charset="utf-8">
<meta name="keywords" content="<?php echo $header['tags'];?>" />
<meta name="description" content="<?php echo $header['intro'];?>" />
<meta charset="utf-8"content="initial-scale=1.0,maximum-scale=1.0,user-scalable=0,minimal-ui" name="viewport" /> 
<meta content="yes" name="apple-mobile-web-app-capable" /> 
<meta content="black" name="apple-mobile-web-app-status-bar-style" />
<meta content="telephone=no" name="format-detection" />
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<title><?php echo $CI->config->item('title_suffix');
echo empty($header['title']) ? '':'-'.$header['title'];?></title>
<link href="<?php echo GLOBAL_URL ?>favicon.ico" rel="shortcut icon">
<script>
	var STATIC_URL = "<?php echo STATIC_URL ?>";
	var GLOBAL_URL = "<?php echo GLOBAL_URL ?>";
	var UPLOAD_URL = "<?php echo UPLOAD_URL ?>" ;
	var SITE_URL = "<?php echo site_url().'/'; ?>";
</script>
<?php
	//web
	echo static_file('web/css/reset.css');
	echo static_file('flexible.js');
	echo static_file('jQuery.js');
	echo static_file('swiper-3.4.2.jquery.min.js');
	echo static_file('jquery.easing.1.3.js');
	echo static_file('jquery.cookie.js');

	// echo static_file('web/css/style.css');
	echo static_file('web/css/page.css');
	echo static_file('web/css/dest/postcss.css');
	echo static_file('web/css/dest/iconfont.css');
	echo static_file('web/css/dest/swiper.min.css');

?>
<!--[if IE 6]>
	<?php
		echo static_file('IE6PNG.js');
	?>
	<script type="text/javascript">
		IE6PNG.fix('.png');
	</script>
<![endif]-->
