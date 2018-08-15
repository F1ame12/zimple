<?php /**
 * 搜索页面
 *
 * @package custom
 */
if (!defined('__TYPECHO_ROOT_DIR__'))
	exit ;
?>
<?php $this -> need('_includes/header.php'); ?>
<header class="intro-header" style="background-image: url('<?php $this -> options -> themeUrl('assets/img/search-bg.jpg'); ?>')">
	<div class="container">
		<div class="row">
			<div class="col-lg-8 col-lg-offset-2 col-md-10 col-md-offset-1">
				
				<div class="site-heading" id="tag-heading">
					<div class="subheading">
						<form id="search" class="search-form" method="post" action="<?php $this->options->siteUrl(); ?>" role="search">
							<span class="search-box">
							<input type="text" id="input" class="input" name="s" required="true" placeholder="输入搜索内容..." maxlength="30" autocomplete="off">
						</form>
					</div>
					<span class="subheading">
					<p id="go-home" style="cursor:pointer;">
						<i class="fa fa-arrow-circle-left"></i> 返回首页
					</p></span>
				</div>
			</div>
		</div>
	</div>
</header>

<?php $this -> need('_includes/footer.php'); ?>

<!-- 这里插入自定义函数 -->
<script>document.body.classList.add('page-fullscreen');
$('#go-home').click(function() {
			$(location).prop('href', '<?php $this -> options -> siteUrl(); ?>');
});</script>
<!-- /.这里插入自定义函数 -->

</body>

</html>