<?php 
/**
 * Zimple来源于Zhou+Simple，意思是一款由<a href="https://mrjooz.com">周末</a>制作的简单主题。
 *
 * @package Zimple
 * @author 周末
 * @version 0.1
 * @link https://mrjooz.com
 */

if (!defined('__TYPECHO_ROOT_DIR__')) exit;
$this->need('_includes/header.php');
?>

<!-- 页面内容 -->
<div class="container">
	<div class="row">
		<div class="col-lg-8 col-lg-offset-1 col-md-8 col-md-offset-1 col-sm-12 col-xs-12 postlist-container">
			<?php while ($this->next()) : ?>
			<div class="post-preview">
				<a href="<?php $this->permalink(); ?>">
					<h2 class="post-title">
                    <?php $this->title(); ?>
                </h2>
					<div class="post-content-preview">
						<?php $this->excerpt(120,'...'); ?>
					</div>
				</a>
				<p class="post-meta">
					<i class="fa fa-calendar"> <?php $this->date('Y-m-d');?></i> <i class="fa fa-pencil"> <?php $this->author(); ?></i>
				</p>
			</div>
			<?php endwhile; ?>
			<hr>
			<!-- 上一页&下一页 -->
			<ul class="pager">
				<li class="previous">
					<?php $this->pageLink('&larr; PREVIOUS'); ?>
				</li>
				<li class="next">
					<?php $this->pageLink('NEXT &rarr;', 'next'); ?>
				</li>
			</ul>
        </div>
        <?php $this->need('_includes/sidebar.php'); ?>
	</div>
</div>
<!-- /.页面内容 -->

<?php $this->need('_includes/footer.php'); ?>

<!-- 这里插入自定义函数 -->
<script>
	//自定义函数
</script>

<!-- /.这里插入自定义函数 -->

</body>

</html>
