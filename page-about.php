<?php
/**
 * 关于我页面
 *
 * @package custom
 */
if (!defined('__TYPECHO_ROOT_DIR__'))
	exit ;
 ?>
<?php $this -> need('_includes/header.php'); ?>

<!-- 文章内容 -->
<article>
	<div class="container">
		<div class="row">
			<div class="col-lg-8 col-lg-offset-1 col-md-8 col-md-offset-1 col-sm-12 col-xs-12 postlist-container">
				<?php $this->content(); ?>
			</div>
			<?php $this->need('_includes/sidebar.php'); ?>
		</div>
</article>
<!-- /.文章内容 -->

<?php $this -> need('_includes/footer.php'); ?>
	
<!-- 这里插入自定义函数 -->
<script>

</script>
<!-- /.这里插入自定义函数 -->

</body>

</html>