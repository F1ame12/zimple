<?php
/**
 * 主题配置
 */
if (!defined('__TYPECHO_ROOT_DIR__'))
	exit ;

//主题配置
function themeConfig($form) {
	$options = Helper::options();
	//主题地址
	$themeUrl = $options -> siteUrl . 'usr/themes/zimple';
	//Favicon
	$faviconUrl = new Typecho_Widget_Helper_Form_Element_Text('faviconUrl', null, $themeUrl . '/assets/img/favicon.ico', _t('Favicon'), _t('favicon在浏览器标签以及收藏夹显示'));
	$form -> addInput($faviconUrl);

	//主页头图
	$homeBgUrl = new Typecho_Widget_Helper_Form_Element_Text('homeBgUrl', null, $themeUrl . '/assets/img/home-bg.jpg', _t('主页头图'));
	$form -> addInput($homeBgUrl);

	//文章页面默认头图
	$postBgUrl = new Typecho_Widget_Helper_Form_Element_Text('postBgUrl', null, $themeUrl . '/assets/img/post-bg.jpg', _t('文章页面默认头图'));
	$form -> addInput($postBgUrl);

	//独立页头图
	$pageBgUrl = new Typecho_Widget_Helper_Form_Element_Text('pageBgUrl', null, $themeUrl . '/assets/img/page-bg.jpg', _t('独立页面默认头图'));
	$form -> addInput($pageBgUrl);

	//备案信息
	$beianMsg = new Typecho_Widget_Helper_Form_Element_Text('beianMsg', null, null, _t('备案信息'));
	$form -> addInput($beianMsg);

	//公安备案信息
	$gonganMsg = new Typecho_Widget_Helper_Form_Element_Text('gonganMsg', null, null, _t('公安备案信息'));
	$form -> addInput($gonganMsg);

	//底部信息
	$footerMsg = new Typecho_Widget_Helper_Form_Element_Text('footerMsg', null, null, _t('底部信息'));
	$form -> addInput($footerMsg);

	//支付宝收款码
	$aliPay = new Typecho_Widget_Helper_Form_Element_Text('aliPay', null, $themeUrl . '/assets/img/alipay.jpg', _t('支付宝收款码'));
	$form -> addInput($aliPay);

	//微信收款码
	$weiPay = new Typecho_Widget_Helper_Form_Element_Text('weiPay', null, $themeUrl . '/assets/img/weipay.jpg', _t('微信收款码'));
	$form -> addInput($weiPay);

	//头像
	$avatarUrl = new Typecho_Widget_Helper_Form_Element_Text('avatarUrl', null, $themeUrl . '/assets/img/avatar.png', _t('默认头像'), _t('在页面右侧的ABOUT ME中显示'));
	$form -> addInput($avatarUrl);

	$searchPage = new Typecho_Widget_Helper_Form_Element_Text('searchPage', null, null, _t('搜索页面'));
	$form -> addInput($searchPage);

	//个性签名
	$signature = new Typecho_Widget_Helper_Form_Element_Text('signature', null, '我，超凡绝伦的人中龙凤。', _t('个性签名'));
	$form -> addInput($signature);

	//RSS地址
	$rssUrl = new Typecho_Widget_Helper_Form_Element_Text('rssUrl', null, $options -> feedUrl, _t('RSS地址'));
	$form -> addInput($rssUrl);

	//Twitter地址
	$twitterUrl = new Typecho_Widget_Helper_Form_Element_Text('twitterUrl', null, null, _t('Twitter地址'));
	$form -> addInput($twitterUrl);

	//知乎地址
	$zhihuUrl = new Typecho_Widget_Helper_Form_Element_Text('zhihuUrl', null, null, _t('知乎地址'));
	$form -> addInput($zhihuUrl);

	//微博地址
	$weiboUrl = new Typecho_Widget_Helper_Form_Element_Text('weiboUrl', null, null, _t('微博地址'));
	$form -> addInput($weiboUrl);

	//Facebook地址
	$facebookUrl = new Typecho_Widget_Helper_Form_Element_Text('facebookUrl', null, null, _t('Facebook地址'));
	$form -> addInput($facebookUrl);

	//GitHub地址
	$githubUrl = new Typecho_Widget_Helper_Form_Element_Text('githubUrl', null, null, _t('GitHub地址'));
	$form -> addInput($githubUrl);

}
