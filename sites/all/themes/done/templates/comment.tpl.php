<div class="divider divider--sm"></div>
<div class="review">
	<h5 class="review__title"><?php print $title; ?></h5>
	<div class="review__content"><?php hide($content['links']); print render($content); ?></div>
	<div class="review__meta"><?php print t('By'); ?>&nbsp;<?php print strip_tags($author,'<a>'); ?> <?php print t('on'); ?>&nbsp;<?php print format_date($comment->created, 'custom', 'F d, Y') ?></div>
	<div class="review__helpful"><?php print strip_tags(render($content['links']),'<a>'); ?></div>
</div>