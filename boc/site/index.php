<?php

# ERROR REPORTING
if (defined('ENVIRONMENT'))
{
	switch (ENVIRONMENT)
	{
		case 'development':
			error_reporting(E_ALL);
		break;

		case 'testing':
		case 'production':
			error_reporting(0);
		break;

		default:
			exit('The application environment is not set correctly.');
	}
}

# ci目录
$system_path = CI_PATH;

# APP路径
$application_folder = SITE_PATH;

# 默认 controller, $routing会对路由有重定向的作用。
// $routing['directory']  = ''; // 目录
// $routing['controller'] = ''; // 控制器
// $routing['function']   = ''; // 动作

# 配置 config/目录下设置的配置信息。
// $assign_to_config['name_of_config_item'] = 'value of config item';

// --------------------------------------------------------------------
// END OF USER CONFIGURABLE SETTINGS.  DO NOT EDIT BELOW THIS LINE
# 上面为配置，下面为检测系统路径和APP路进正确性
// --------------------------------------------------------------------

/*
 * ---------------------------------------------------------------
 *  Resolve the system path for increased reliability
 * ---------------------------------------------------------------
 */

	// Set the current directory correctly for CLI requests
	if (defined('STDIN'))
	{
		chdir(dirname(__FILE__));
	}

	if (realpath($system_path) !== FALSE)
	{
		$system_path = realpath($system_path).'/';
	}

	// ensure there's a trailing slash
	$system_path = rtrim($system_path, '/').'/';

	// Is the system path correct?
	if ( ! is_dir($system_path))
	{
		exit("系统路径出错，去正确设定配置: ".pathinfo(__FILE__, PATHINFO_BASENAME));
	}

/*
 * -------------------------------------------------------------------
 *  Now that we know the path, set the main path constants
 * -------------------------------------------------------------------
 */
	// The name of THIS file
	define('SELF', pathinfo(__FILE__, PATHINFO_BASENAME));

	// The PHP file extension
	// this global constant is deprecated.
	define('EXT', '.php');

	// Path to the system folder
	define('BASEPATH', str_replace("\\", "/", $system_path));

	// Path to the front controller (this file)
	define('FCPATH', str_replace(SELF, '', __FILE__));

	// Name of the "system folder"
	define('SYSDIR', trim(strrchr(trim(BASEPATH, '/'), '/'), '/'));


	// The path to the "application" folder
	if (is_dir($application_folder))
	{
		define('APPPATH', $application_folder.'/');
	}
	else
	{
		if ( ! is_dir(BASEPATH.$application_folder.'/'))
		{
			exit(" APP 路径不存在,检查并重新设置: ".SELF);
		}

		define('APPPATH', BASEPATH.$application_folder.'/');
	}

# 此处定义外部VIEWS时
// define('VIEWS',ROOT.'views/');
$user_agent = $_SERVER['HTTP_USER_AGENT'];
// if(isMobile()){
// 	define('VIEWS',SITE_PATH.'/views_m/');
// }

# 加载引擎
require_once BASEPATH.'core/CodeIgniter.php';

/* End of file index.php */
/* Location: ./index.php */

/**
 * 判定手机浏览
 */
function isMobile(){

	$isMobile = false;
	$isBot = false;

	$op = isset($_SERVER['HTTP_X_OPERAMINI_PHONE'])?strtolower($_SERVER['HTTP_X_OPERAMINI_PHONE']):'';
	$ua = isset($_SERVER['HTTP_USER_AGENT'])?strtolower($_SERVER['HTTP_USER_AGENT']):'';
	$ac = strtolower($_SERVER['HTTP_ACCEPT']);
	$ip = $_SERVER['REMOTE_ADDR'];

	$isMobile = strpos($ac, 'application/vnd.wap.xhtml+xml') !== false
		|| $op != ''
		|| strpos($ua, 'sony') !== false
		|| strpos($ua, 'symbian') !== false
		|| strpos($ua, 'nokia') !== false
		|| strpos($ua, 'samsung') !== false
		|| strpos($ua, 'mobile') !== false
		|| strpos($ua, 'windows ce') !== false
		|| strpos($ua, 'epoc') !== false
		|| strpos($ua, 'opera mini') !== false
		|| strpos($ua, 'nitro') !== false
		|| strpos($ua, 'j2me') !== false
		|| strpos($ua, 'midp-') !== false
		|| strpos($ua, 'cldc-') !== false
		|| strpos($ua, 'netfront') !== false
		|| strpos($ua, 'mot') !== false
		|| strpos($ua, 'up.browser') !== false
		|| strpos($ua, 'up.link') !== false
		|| strpos($ua, 'audiovox') !== false
		|| strpos($ua, 'blackberry') !== false
		|| strpos($ua, 'ericsson,') !== false
		|| strpos($ua, 'panasonic') !== false
		|| strpos($ua, 'philips') !== false
		|| strpos($ua, 'sanyo') !== false
		|| strpos($ua, 'sharp') !== false
		|| strpos($ua, 'sie-') !== false
		|| strpos($ua, 'portalmmm') !== false
		|| strpos($ua, 'blazer') !== false
		|| strpos($ua, 'avantgo') !== false
		|| strpos($ua, 'danger') !== false
		|| strpos($ua, 'palm') !== false
		|| strpos($ua, 'series60') !== false
		|| strpos($ua, 'palmsource') !== false
		|| strpos($ua, 'pocketpc') !== false
		|| strpos($ua, 'smartphone') !== false
		|| strpos($ua, 'rover') !== false
		|| strpos($ua, 'ipaq') !== false
		|| strpos($ua, 'au-mic,') !== false
		|| strpos($ua, 'alcatel') !== false
		|| strpos($ua, 'ericy') !== false
		|| strpos($ua, 'up.link') !== false
		|| strpos($ua, 'vodafone/') !== false
		|| strpos($ua, 'wap1.') !== false
		|| strpos($ua, 'wap2.') !== false;

	$isBot =  $ip == '66.249.65.39'
		|| strpos($ua, 'googlebot') !== false
		|| strpos($ua, 'mediapartners') !== false
		|| strpos($ua, 'yahooysmcm') !== false
		|| strpos($ua, 'baiduspider') !== false
		|| strpos($ua, 'msnbot') !== false
		|| strpos($ua, 'slurp') !== false
		|| strpos($ua, 'ask') !== false
		|| strpos($ua, 'teoma') !== false
		|| strpos($ua, 'spider') !== false
		|| strpos($ua, 'heritrix') !== false
		|| strpos($ua, 'attentio') !== false
		|| strpos($ua, 'twiceler') !== false
		|| strpos($ua, 'irlbot') !== false
		|| strpos($ua, 'fast crawler') !== false
		|| strpos($ua, 'fastmobilecrawl') !== false
		|| strpos($ua, 'jumpbot') !== false
		|| strpos($ua, 'googlebot-mobile') !== false
		|| strpos($ua, 'yahooseeker') !== false
		|| strpos($ua, 'motionbot') !== false
		|| strpos($ua, 'mediobot') !== false
		|| strpos($ua, 'chtml generic') !== false
		|| strpos($ua, 'nokia6230i/. fast crawler') !== false;

	// 对IPAD排除
	if (strpos($ua, 'ipad') !== false) {
		$isMobile = false;
	}

	return $isMobile;
}
