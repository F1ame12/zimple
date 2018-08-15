<?php
if (!defined('__TYPECHO_ROOT_DIR__'))
	exit ;
 ?>
 
<?php function threadedComments($comments, $options) {
    $commentClass = '';
    if ($comments->authorId) {
        if ($comments->authorId == $comments->ownerId) {
            $commentClass .= ' comment-by-author';
        } else {
            $commentClass .= ' comment-by-user';
        }
    }
    $commentLevelClass = $comments->levels > 0 ? ' comment-child' : ' comment-parent';
?>

<li id="li-<?php $comments->theId(); ?>" class="comment-body<?php 
if ($comments->levels > 0) {
    echo ' comment-child';
    $comments->levelsAlt(' comment-level-odd', ' comment-level-even');
} else {
    echo ' comment-parent';
}
$comments->alt(' comment-odd', ' comment-even');
echo $commentClass;
?>">
    <div id="<?php $comments->theId(); ?>">
        <div class="comment-author">
            <?php $comments->gravatar('40', ''); ?>
            <cite class="fn">
            		<?php $comments->author(); ?>
            		<?php if ($comments->authorId == $comments->ownerId) {?>
            			 <img class="auth" src="<?php Helper::options()->themeUrl('assets/img/auth.png'); ?>"></img>
            			 <div class="clearfix"></div>
            		<?php } ?>
            	</cite>
        </div>
        <div class="comment-meta">
            <a href="<?php $comments->permalink(); ?>"><?php $comments->date('Y-m-d H:i'); ?></a>
        </div>
        <?php $comments->content(); ?>
        	<div class="comment-reply">
        		<?php $comments->reply(); ?>
        </div>
    </div>
<?php if ($comments->children) { ?>
    <div class="comment-children">
        <?php $comments->threadedComments($options); ?>
    </div>
<?php } ?>
</li>
<?php } ?>
 
<div id="comments" class="comments">
    <?php $this -> comments() -> to($comments); ?>
    <?php if ($comments->have()): ?>
	<div class="comments-header"><i class="fa fa-comments-o"></i> <?php $this -> commentsNum(_t('暂无评论'), _t('仅有一条评论'), _t('已有 %d 条评论')); ?></div>
    
    <?php $comments -> listComments(); ?>

    <?php $comments -> pageNav('&larr;', '&rarr;'); ?>
    
    <?php endif; ?>

    <?php if($this->allow('comment')): ?>
    <div id="<?php $this -> respondId(); ?>" class="respond">
        <div class="cancel-comment-reply">
        <?php $comments -> cancelReply(); ?>
        </div>
    <div class="comments-header"><i class="fa fa-comment-o"></i> 人生在世,错别字在所难免,无需纠正。</div>
    	<form method="post" action="<?php $this->commentUrl() ?>" id="comment-form" role="form">
            <?php if($this->user->hasLogin()): ?>
    		<p class="comments-margin"><?php _e('登录身份: '); ?><a href="<?php $this -> options -> profileUrl(); ?>"><?php $this -> user -> screenName(); ?></a>. <a href="<?php $this -> options -> logoutUrl(); ?>" title="Logout"><?php _e('退出'); ?> &raquo;</a></p>
            <?php else: ?>
    		<p class="comments-margin">
    			<input type="text" name="author" id="author" class="text" placeholder="昵称（必填）" value="<?php $this -> remember('author'); ?>" required />
    		</p>
    		<p class="comments-margin">
    			<input type="email" name="mail" id="mail" class="text" placeholder="邮箱<?php if ($this->options->commentsRequireMail): ?>（必填）<?php endif; ?>" value="<?php $this -> remember('mail'); ?>"<?php if ($this->options->commentsRequireMail): ?> required<?php endif; ?> />
    		</p>
    		<p class="comments-margin">
    			<input type="url" name="url" id="url" class="text" placeholder="<?php _e('http(s)://'); ?>" value="<?php $this -> remember('url'); ?>"<?php if ($this->options->commentsRequireURL): ?> required<?php endif; ?> />
    		</p>
            <?php endif; ?>
    		<p class="comments-margin">
            <textarea rows="8" cols="50" name="text" id="textarea" placeholder="在这里输入评论" class="textarea" required ><?php $this -> remember('text'); ?></textarea>
            </p>
    		<p class="comments-margin">
            <div class="comments-submit-btn-div"><button type="submit" class="comments-submit-btn"><?php _e('提交'); ?></button></div>
            <div class="clearfix"></div>
        </p>
    	</form>
    </div>
    <?php else: ?>
    <h3><?php _e('评论已关闭'); ?></h3>
    <?php endif; ?>
</div>
