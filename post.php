<?php if (!defined('__TYPECHO_ROOT_DIR__')) exit; ?>
<?php $this->need('_includes/header.php'); ?>

<!-- 文章内容 -->
<article>
	<div class="container">
		<div class="row">
			<div class="col-lg-8 col-lg-offset-2 col-md-10 col-md-offset-1 post-container">
				<?php $this->content(); ?>
				<!-- 版权声明 -->
				<div class="post-info"><p>本文由 <a href="<?php $this->author->url(); ?>" ><?php $this->author(); ?></a> 创作，采用 知识共享署名4.0 国际许可协议进行许可</p></div>
				<!-- donate -->
				<div class="post_reward">
					<label class="reward_btn">请喝咖啡</label>
					<div class="qr_code" style="display: none;">
						<div class="qr_code_img">
							<img class="image" src="<?php $this->options->weiPay(); ?>" title="WeChat">
						</div>
						<div class="qr_code_img">
							<img class="image" src="<?php $this->options->aliPay(); ?>" title="AliPay">
						</div>
					</div>
				</div>
				<!-- 评论 -->
                <?php $this->need('_includes/comments.php'); ?>
                <!-- 上一篇&下一篇 -->
                <hr style="visibility: hidden;">
				<ul class="pager">
					<li class="previous">
						<?php $this->thePrev('%s'); ?>
					</li>
					<li class="next">
						<?php $this->theNext('%s'); ?>
					</li>
				</ul>
			</div>

			<!-- 侧边栏文章标题列表 -->
			<div class="col-lg-2 col-lg-offset-0 visible-lg-block sidebar-container catalog-container">
				<div class="side-catalog">
					<hr class="hidden-sm hidden-xs">
					<h5><a class="catalog-toggle" href="#">CATALOG</a></h5>
					<ul class="catalog-body"></ul>
				</div>
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
<!-- 侧边栏文章标题列表生成-->
<script type="text/javascript">
    function generateCatalog (selector) {
        _containerSelector = 'div.post-container';
        var P = $(_containerSelector),a,n,t,l,i,c;
        a = P.find('h1,h2,h3,h4,h5,h6');
        $(selector).html('')
        a.each(function () {
            n = $(this).prop('tagName').toLowerCase();
            i = "#"+$(this).prop('id');
            t = $(this).text();
            c = $('<a href="'+i+'" rel="nofollow">'+t+'</a>');
            l = $('<li class="'+n+'_nav"></li>').append(c);
            $(selector).append(l);
        });
        return true;
    }

    // 文章标题列表展开&折叠
    $(".catalog-toggle").click((function(e){
        e.preventDefault();
        $('.side-catalog').toggleClass("fold")
    }))
</script>
<!-- 文章标题处理，添加ID属性-->
<script>
    async("//cdn.staticfile.org/anchor-js/4.1.1/anchor.min.js",function(){
        anchors.options = {
          visible: 'always',
          placement: 'right',
          icon: '#'
        };
		anchors.add().remove('.intro-header h1').remove('.subheading').remove('.sidebar-container h5');
		//侧边栏文章标题列表生成
		generateCatalog(".catalog-body");
		//滚动自动匹配标题
		async("<?php $this->options->themeUrl('assets/js/jquery.nav.js'); ?>", function () {
        $('.catalog-body').onePageNav({
            currentClass: "active",
            changeHash: !1,
            easing: "swing",
            filter: "",
            scrollSpeed: 700,
            scrollOffset: 0,
            scrollThreshold: .2,
            begin: null,
            end: null,
            scrollChange: null,
            padding: 80
        });
	});
    })
</script>
<style>
    @media all and (min-width: 800px) {
        .anchorjs-link{
            position: absolute;
            left: -0.75em;
            font-size: 1.1em;
            margin-top : -0.1em;
        }
    }
</style>
<!-- 请喝咖啡 -->
<script>
$(document).ready(function() {
    $(".reward_btn").click(function() {
        $reward_btn = $(this);
        //getting the next element
        $qr_code = $reward_btn.next();
        //open up the qr_code needed - toggle the slide- if visible, slide up, if not slidedown.
        $qr_code.slideToggle(500, function() {
            //execute this after slideToggle is done
            //change text of reward_btn based on visibility of qr_code div
            $reward_btn.text(function() {
                //change text based on condition
                return $qr_code.is(":visible") ? "点击收起" : "请喝咖啡";
            });
        });
    });
});
</script>
<!-- /.这里插入自定义函数 -->

</body>

</html>