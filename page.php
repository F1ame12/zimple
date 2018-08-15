<?php
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
				<!-- 版权声明 -->
				<div class="post-info"><p>本文由 <a href="<?php $this->author->url(); ?>" ><?php $this->author(); ?></a> 创作，采用 知识共享署名4.0 国际许可协议进行许可</p></div>
				<hr />
				<!-- 评论 -->
                <?php $this->need('_includes/comments.php'); ?>
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