<?php
if (!defined('__TYPECHO_ROOT_DIR__')) exit; ?>
<!DOCTYPE HTML>
<html lang="zh-CN">
<head>
	<meta charset="<?php $this->options->charset(); ?>">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="renderer" content="webkit">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
	
    <title><?php $this->archiveTitle(array('category' => _t('分类 %s 下的文章'), 'search' => _t('包含关键字 %s 的文章'), 'tag' => _t('标签 %s 下的文章'), 'author' => _t('%s 发布的文章')), '', ' - '); ?><?php $this->options->title(); ?></title>

    <!-- Favicon -->
    <link rel="shortcut icon" href="<?php $this->options->faviconUrl(); ?>">
    <!-- Canonical URL -->
    <link rel="canonical" href="<?php $this->options->siteUrl(); ?>">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="<?php $this->options->themeUrl('assets/css/bootstrap.min.css'); ?>">
    <!-- 主题 CSS -->
    <link rel="stylesheet" href="<?php $this->options->themeUrl('assets/css/theme-zimple.min.css'); ?>">
    <!-- font-awesome CSS -->
    <link href="//cdn.staticfile.org/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" type="text/css">
    	<!-- 评论 CSS -->
    <link rel="stylesheet" href="<?php $this->options->themeUrl('assets/css/comment.min.css'); ?>">
    	<!-- donate CSS -->
    <link rel="stylesheet" href="<?php $this->options->themeUrl('assets/css/donate.min.css'); ?>">
    <!-- 自定义CSS -->
    <link rel="stylesheet" href="<?php $this->options->themeUrl('style.css'); ?>">

    <!--[if lt IE 9]>
  		<script src="//cdn.staticfile.org/html5shiv/r29/html5.min.js"></script>
        <script src="//cdn.staticfile.org/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

<?php
//在文章页面使用自定义字段description、keywords来优化文章seo
if ($this->is('single')) {
    if (isset($this->fields->description)) {
        $this->setDescription($this->fields->description);
    }
    if (isset($this->fields->keywords)) {
        $this->setKeywords($this->fields->keywords);
    } else {
        $this->setKeywords(implode(',', Typecho_Common::arrayFlatten($this->tags, 'name')));
    }
}
?>

<!-- 通过自有函数输出HTML头部信息 -->
<?php $this->header(); ?>
</head>

<body>

<!-- 顶部导航栏 -->
<nav class="navbar navbar-default navbar-custom navbar-fixed-top">
    <div class="container-fluid">
        <div class="navbar-header page-scroll">
            <button type="button" class="navbar-toggle">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="<?php $this->options->siteUrl(); ?>"><?php $this->options->title() ?></a>
        </div>

        <!-- 独立页面链接 -->
        <div id="huxblog_navbar">
            <div class="navbar-collapse">
                <ul class="nav navbar-nav navbar-right">
                    <li>
                        <a href="<?php $this->options->siteUrl(); ?>">HOME</a>
                    </li>
                 	<?php $this->widget('Widget_Contents_Page_List')->parse('<li><a href="{permalink}">{title}</a></li>'); ?>       
                	<?php if($this->user->hasLogin()): ?>
                		<li>
                       		<a href="<?php echo $this->options->siteUrl.'/admin'; ?>">CONSOLE</a>
                    	</li>
                    <?php else: ?>
                    	<li>
                        	<a href="<?php echo $this->options->siteUrl.'/admin'; ?>">LOGIN</a>
                    	</li>
                    <?php endif; ?>
                    	<li>
                		<?php if($this->options->searchPage): ?>
   						<a href="<?php $this->options->searchPage(); ?>" class="navbar-search">
            					<i class="fa fa-search"></i>
        					</a>
        				<?php else: ?>
						<a id="search-btn" href="javacript:;" class="navbar-search">
            					<i class="fa fa-search"></i>
        				</a>
					<?php endif; ?>
           			</li>
                </ul>
                <form id="search" method="post" action="<?php $this->options->siteUrl(); ?>" role="search" hidden="hidden">
					<span>
						<input type="text" id="input" class="input" name="s" required="true" placeholder="Search..." maxlength="30" autocomplete="off">
					</span>
				</form>
            </div>
        </div>
        <!-- /.独立页面链接 -->
    </div>
</nav>
<!-- /.顶部导航栏 -->

<!-- 页头 -->
<?php if ($this->is('index')) { //首页 ?>
<header class="intro-header" style="background-image: url('<?php $this->options->homeBgUrl(); ?>')">
    <div class="container">
        <div class="row">
            <div class="col-lg-8 col-lg-offset-2 col-md-10 col-md-offset-1 ">
                <div class="site-heading">
                    <h1><?php $this->options->title() ?></h1>
                    <hr class="small">
                    <span class="subheading"><?php $this->options->description() ?></span>
                </div>
            </div>
        </div>
    </div>
</header>
<?php 
} elseif ($this->is('page')) { //独立页面?>
<header class="intro-header" style="background-image: url('<?php $this->options->pageBgUrl(); ?>')">
    <div class="container">
        <div class="row">
            <div class="col-lg-8 col-lg-offset-2 col-md-10 col-md-offset-1 ">
                <div class="site-heading">
                    <h1><?php $this->title() ?></h1>
                </div>
            </div>
        </div>
    </div>
</header>
<?php 
} elseif ($this->is('single')) { //文章页?>
<header class="intro-header" style="background-image: url('<?php echo img_postthemb($this, $this->options->postBgUrl) ?>')">
    <div class="container">
        <div class="row">
            <div class="col-lg-8 col-lg-offset-2 col-md-10 col-md-offset-1">
                <div class="post-heading">
                    <div class="tags">
                        <?php $this->tags(' ', true, ''); ?>
                    </div>
                    <h1><?php $this->title() ?></h1>
                    <span class="meta"><i class="fa fa-calendar"> 日期 <?php $this->date('Y-m-d');?></i> <i class="fa fa-archive"> <?php $this->category(); ?></i></span>
                    <span class="meta"><i class="fa fa-pencil"> 作者 <?php $this->author(); ?></i> <i class="fa fa-comments"> 共<?php $this->commentsNum('%d'); ?>评论</i></span>
                </div>
            </div>
        </div>
    </div>
</header>
<?php } elseif($this->is('archive')){ //归档页面：分类、标签?>
<header class="intro-header" style="background-image: url('<?php $this->options->homeBgUrl(); ?>')">
    <div class="container">
        <div class="row">
            <div class="col-lg-8 col-lg-offset-2 col-md-10 col-md-offset-1 ">
                <div class="site-heading">
					<h1>
						<?php $this->archiveTitle(array(
		        			'category'  =>  _t('分类'),
		        			'search'    =>  _t('搜索'),
		        			'tag'       =>  _t('标签'),
		        			'author'    =>  _t('作者'),
		        			'date'      =>  _t('日期')
		    				), '', ''); 
						?>
					</h1>
                    <span class="subheading">
                    		<?php $this->archiveTitle(array(
		        			'category'  =>  _t('%s'),
		        			'search'    =>  _t('%s'),
		        			'tag'       =>  _t('%s'),
		        			'author'    =>  _t('%s'),
		        			'date'      =>  _t('%s')
		    				), '', ''); 
						?>
                    </span>
                </div>
            </div>
        </div>
    </div>
</header>
<?php } ?>
<!-- /.页头 -->

    
    
