<?php /**
 * 分类页面
 *
 * @package custom
 */
if (!defined('__TYPECHO_ROOT_DIR__'))
	exit ;
?>
<?php $this -> need('_includes/header.php'); ?>

<div class="container">
	<div class="row">
		<div class="col-lg-8 col-lg-offset-2 col-md-10 col-md-offset-1">	
		<?php $this -> widget('Widget_Metas_Category_List') -> to($categorys); ?>
    		<?php if ($categorys->have()): ?>
        <?php while($categorys->next()): ?>
            <div class="categorys-item">
                <div class="categorys-title">
                    <a href="<?php $categorys -> permalink(); ?>"><?php $categorys -> name(); ?></a><span> ：<?php $categorys -> count(); ?></span>
                </div>
                <?php $catlist = $this -> widget('Widget_Archive@categorys_' . $categorys -> mid, 'pageSize=10000&type=category', 'mid=' . $categorys -> mid); ?>
                <?php if($catlist->have()): ?>
            		<div class="category-lists">
						<div class="category-lists-body">
						<?php while($catlist->next()): ?>
							<div class="category-list-item">
								<div class="category-list-item-container">
									<div class="item-label">
										<div class="item-title"><a href="<?php $catlist->permalink() ?>"><?php $catlist->title() ?></a></div>
										<div class="item-meta clearfix">
											<div class="item-meta-date"> <?php $catlist -> date('Y-m-d'); ?> </div>
										</div>
									</div>
								</div>
							</div>
						<?php endwhile; ?>
						</div>
					</div>
            	<?php endif; ?>
            </div>
            <div class="clearfix">
            	</div>
        <?php endwhile; ?>
    <?php endif; ?>
		</div>
	</div>
</div>
<?php $this -> need('_includes/footer.php'); ?>

<!-- 这里插入自定义函数 -->
<script></script>
<!-- /.这里插入自定义函数 -->

</body>

</html>