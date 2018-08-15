<?php
if (!defined('__TYPECHO_ROOT_DIR__'))
    exit;
?>
<!-- 页尾 -->
<footer>
	<div class="container">
		<div class="row">
			<div class="col-lg-8 col-lg-offset-2 col-md-10 col-md-offset-1">
				<ul class="list-inline text-center">
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
				<p class="copyright text-muted">
					Copyright &copy; <?php echo date('Y').' ';$this->options->footerMsg(); echo '. 加载时间'.timer_stop().'s';?>
                </p>
                <p class="footer-info text-muted">
                    Theme by
					<a href="https://mrjooz.com">
						ZhouMo
                    </a>
                    <!-- 备案信息 -->
                    <?php if (!empty($this->options->beianMsg)) : ?>
                        / <a class="color-hui" href="http://www.miitbeian.gov.cn/" rel="external nofollow" target="_blank"><?php $this->options->beianMsg(); ?></a>
                    <?php endif; ?>
                    <!-- 公安备案信息 -->
                    <?php if (!empty($this->options->gonganMsg)) : ?>
                        / <a class="color-hui" href="http://www.beian.gov.cn/" rel="external nofollow" target="_blank"><?php $this->options->gonganMsg(); ?></a>
                    <?php endif; ?>
                </p>
			</div>
		</div>
	</div>
</footer>
<!-- /.页尾 -->

<!-- jQuery -->
<script src="<?php $this->options->themeUrl('assets/js/jquery.min.js'); ?>"></script>
<script src="<?php $this->options->themeUrl('assets/js/jquery.nav.js'); ?>"></script>

<!-- Bootstrap Core JavaScript -->
<script src="<?php $this->options->themeUrl('assets/js/bootstrap.min.js'); ?>"></script>

<!-- 主题 JavaScript -->
<script src="<?php $this->options->themeUrl('assets/js/theme-zimple.min.js'); ?>"></script>

<!-- 异步处理函数-->
<script>
    function async(u, c) {
      var d = document, t = 'script',
          o = d.createElement(t),
          s = d.getElementsByTagName(t)[0];
      o.src = u;
      if (c) { o.addEventListener('load', function (e) { c(null, e); }, false); }
      s.parentNode.insertBefore(o, s);
    }
</script>

<!--fastClick.js -->
<script>
    async("//cdn.staticfile.org/fastclick/1.0.6/fastclick.min.js", function(){
        var $nav = document.querySelector("nav");
        if($nav) FastClick.attach($nav);
    })
</script>

<!-- 切换按钮 -->
<script>
    var $body   = document.body;
    var $toggle = document.querySelector('.navbar-toggle');
    var $navbar = document.querySelector('#huxblog_navbar');
    var $collapse = document.querySelector('.navbar-collapse');

    var __HuxNav__ = {
        close: function(){
            $navbar.className = " ";
            // wait until animation end.
            setTimeout(function(){
                // prevent frequently toggle
                if($navbar.className.indexOf('in') < 0) {
                    $collapse.style.height = "0px"
                }
            },400)
        },
        open: function(){
            $collapse.style.height = "auto"
            $navbar.className += " in";
        }
    }

    // Bind Event
    $toggle.addEventListener('click', function(e){
        if ($navbar.className.indexOf('in') > 0) {
            __HuxNav__.close()
        }else{
            __HuxNav__.open()
        }
    })

    document.addEventListener('click', function(e){
        if(e.target == $toggle) return;
        if(e.target.className == 'icon-bar') return;
        __HuxNav__.close();
    })
</script>

<!-- 导航栏搜索 -->
<script>
    $("#search-btn").click(function(){
  		$("#search").toggle();
	});
	$("#search").focusout(function(){
		$("#search").hide();
	});
</script>
