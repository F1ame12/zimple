<?php
/**
 * 时间轴页面
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
		<?php
    			$stat = Typecho_Widget::widget('Widget_Stat');
    			$this->widget('Widget_Contents_Post_Recent', 'pageSize='.$stat->publishedPostsNum)->to($archives);
    			$year=0; $mon=0; $i=0; $j=0;
    			$output = '';
    			while($archives->next()){
        			$year_tmp = date('Y',$archives->created);
        			$mon_tmp = date('m',$archives->created);
        			$y=$year; $m=$mon;
        			if ($year > $year_tmp) {
            			$output .= '</ul></div>';
        			}
        			if ($year != $year_tmp) {
					$year = $year_tmp;
			 		$mon = $mon_tmp;
			 		$output .= '<div class="one-tag-list"><span class="fa fa-calendar-times-o listing-seperator"><span class="tag-text">'.$year.'</span></span><ul>';
        		}
        		$output .= '<li>'.date('m-d',$archives->created).' <i class="fa fa-angle-double-right" aria-hidden="true"></i><a href="'.$archives->permalink .'" style="color: #0085a1"><span> '.$archives->title .'</span></a></li>';
    		}
    			$output .= '</ul></div>';
    			echo $output;
    		?>
		</div>
	</div>
</div>

<?php $this -> need('_includes/footer.php'); ?>

<!-- 这里插入自定义函数 -->
<script></script>
<!-- /.这里插入自定义函数 -->

</body>

</html>