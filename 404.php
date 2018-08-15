<?php
if (!defined('__TYPECHO_ROOT_DIR__'))
	exit ;
 ?>
<?php $this -> need('_includes/header.php'); ?>
<header class="intro-header" style="background-image: url('<?php $this -> options -> themeUrl('assets/img/404-bg.jpg'); ?>')">
	<div class="container">
		<div class="row">
			<div class="col-lg-8 col-lg-offset-2 col-md-10 col-md-offset-1">
				<div class="site-heading" id="tag-heading">
					<h1>404</h1>
					<span class="subheading">该页面不存在 :(</span>
					<span class="subheading"><p id="go-home" style="cursor:pointer;"><i class="fa fa-arrow-circle-left"></i> 返回首页</p></span>
				</div>
			</div>
		</div>
	</div>
</header>

<?php $this -> need('_includes/footer.php'); ?>

<!-- 这里插入自定义函数 -->
<script>
	document.body.classList.add('page-fullscreen');
	$('#go-home').click(function(){
		$(location).prop('href', '<?php $this->options->siteUrl(); ?>');
	});

</script>
<!-- /.这里插入自定义函数 -->

</body>

</html>