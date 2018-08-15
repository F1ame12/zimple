<?php if (!defined('__TYPECHO_ROOT_DIR__')) exit; ?>
<?php $this->need('_includes/header.php'); ?>

<!-- 文章内容 -->
<article>
	<div class="container">
		<div class="row">
			<div class="col-lg-8 col-lg-offset-2 col-md-10 col-md-offset-1 post-container">
			<?php if ($this->have()): ?>
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
			<?php else: ?>
				<p>很遗憾，没有任何内容(⊙︿⊙)</p>
			<?php endif; ?>
			</div>

			<!-- 底部信息-->
			<div class="col-lg-8 col-lg-offset-2 col-md-10 col-md-offset-1 sidebar-container">
				<!-- 标签 -->
				<?php $this->widget('Widget_Metas_Tag_Cloud', 'sort=mid&ignoreZeroCount=1&desc=0&limit=30')->to($tags); ?>
				<section>
					<hr class="hidden-sm hidden-xs">
					<h5>FEATURED TAGS</h5>
					<div class="tags">
						<?php if ($tags->have()) : ?>
						<?php while ($tags->next()) : ?>
						<a href="<?php $tags->permalink(); ?>" title="有<?php $tags->count(); ?>篇文章" rel="tag">
							<?php $tags->name(); ?>
						</a>
						<?php endwhile; ?>
						<?php else : ?>
						<li>
							<?php _e('没有任何标签'); ?>
						</li>
						<?php endif; ?>
					</div>
				</section>

				<!-- 友情链接 -->
				<hr>
				<h5>FRIENDS</h5>
				<ul class="list-inline">
					<?php if(class_exists('Links_Plugin')){Links_Plugin::output();}else{echo '<li>请先安装Links插件</li>';} ?>
				</ul>
			</div>
		</div>
</article>
<!-- /.文章内容 -->

<?php $this->need('_includes/footer.php'); ?>

<!-- 这里插入自定义函数 -->
<script>
	//todo
</script>
<!-- /.这里插入自定义函数 -->

</body>

</html>