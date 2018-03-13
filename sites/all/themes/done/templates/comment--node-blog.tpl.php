<div class="comments__comment">
  <div class="comments__comment__userpic">
  	<?php if(!$picture){ ?>
  		<span class="icon icon-user-circle"></span>
  	<?php }else{ ?>
  		<?php print strip_tags($picture,'<img>'); ?>
  	<?php } ?>
  </div>
  <div class="comments__comment__text">
    <h5 class="comments__comment__text__username text-uppercase"><?php print strip_tags($author,'<a>'); ?></h5>
    <div class="comments__comment__text__date"><?php print format_date($comment->created, 'custom', 'M d, Y').' at '.format_date($comment->created, 'custom','h:i a'); ?></div>
    <p><?php hide($content['links']); print render($content); ?></p>
    <div class="review__helpful"><?php print strip_tags(render($content['links']),'<a>'); ?></div>
  </div>
</div>