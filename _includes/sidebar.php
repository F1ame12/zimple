<?php
if (!defined('__TYPECHO_ROOT_DIR__'))
    exit;
?>
<!-- 侧边栏 -->
<div class="col-lg-3 col-lg-offset-0 col-md-3 col-md-offset-0 col-sm-12 col-xs-12 sidebar-container">
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
					<li><?php _e('没有任何标签'); ?></li>
			<?php endif; ?>
        </div>
    </section>

    <!-- 关于 -->
    <section class="visible-md visible-lg">
        <hr>
        	<h5>ABOUT ME</h5>
        <div class="short-about">
            <?php 
            if (!empty($this->options->avatarUrl)) {
                echo '<img src="' . $this->options->avatarUrl . '">';
            } else {
                echo $this->author->gravatar('175');
            }
            ?>
            <p><?php $this->options->signature() ?></p>
            <!-- 联系方式 -->
            <ul class="list-inline">
                <?php if (!empty($this->options->rssUrl)) { ?>
                <li>
                    <a href="<?php $this->options->rssUrl(); ?>">
                        <span class="fa-stack fa-lg">
                            <i class="fa fa-circle fa-stack-2x"></i>
                            <i class="fa fa-rss fa-stack-1x fa-inverse"></i>
                        </span>
                    </a>
                </li>
                <?php 
            } ?>
                <?php if (!empty($this->options->twitterUrl)) { ?>
                <li>
                    <a href="<?php $this->options->twitterUrl(); ?>">
                        <span class="fa-stack fa-lg">
                            <i class="fa fa-circle fa-stack-2x"></i>
                            <i class="fa fa-twitter fa-stack-1x fa-inverse"></i>
                        </span>
                    </a>
                </li>
                <?php 
            } ?>
                <?php if (!empty($this->options->zhihuUrl)) { ?>
                <li>
                    <a target="_blank" href="<?php $this->options->zhihuUrl(); ?>">
                        <span class="fa-stack fa-lg">
                            <i class="fa fa-circle fa-stack-2x"></i>
                            <i class="fa  fa-stack-1x fa-inverse">知</i>
                        </span>
                    </a>
                </li>
                <?php 
            } ?>
                <?php if (!empty($this->options->weiboUrl)) { ?>
                <li>
                    <a target="_blank" href="<?php $this->options->weiboUrl(); ?>">
                        <span class="fa-stack fa-lg">
                            <i class="fa fa-circle fa-stack-2x"></i>
                            <i class="fa fa-weibo fa-stack-1x fa-inverse"></i>
                        </span>
                    </a>
                </li>
                <?php 
            } ?>
                <?php if (!empty($this->options->facebookUrl)) { ?>
                <li>
                    <a target="_blank" href="<?php $this->options->facebookUrl(); ?>">
                        <span class="fa-stack fa-lg">
                            <i class="fa fa-circle fa-stack-2x"></i>
                            <i class="fa fa-facebook fa-stack-1x fa-inverse"></i>
                        </span>
                    </a>
                </li>
                <?php 
            } ?>
                <?php if (!empty($this->options->githubUrl)) { ?>
                <li>
                    <a target="_blank" href="<?php $this->options->githubUrl(); ?>">
                        <span class="fa-stack fa-lg">
                            <i class="fa fa-circle fa-stack-2x"></i>
                            <i class="fa fa-github fa-stack-1x fa-inverse"></i>
                        </span>
                    </a>
                </li>
                <?php 
            } ?>
            </ul>
        </div>
    </section>
    <!-- 友情链接 -->
    <hr>
    <h5>FRIENDS</h5>
    <ul class="list-inline">
    		<?php if(class_exists('Links_Plugin')){Links_Plugin::output();}else{echo '<li>请先安装Links插件</li>';} ?>
    </ul>
</div>
<!-- /.侧边栏 -->