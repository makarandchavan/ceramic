<section id="single-blog" class="content content--fill top-null">
  <div class="container">
    <?php if($content['#node']->comment_count != 0){ ?>
    <h2 class="text-uppercase text-center"><?php print t('Join the discussion'); ?></h2>
    <div class="row comments">
      <div class="col-md-10 col-md-offset-1">
        <?php print render($content['comments']); ?>
      </div>
    </div>
    <div class="divider divider--line divider--line--dark"></div>
    <?php } ?>
    <h2 id="comment-form-title" class="text-uppercase text-center"><?php print t('LEAVE A COMMENT'); ?></h2>
    <?php print str_replace('resizable', '', render($content['comment_form'])); ?>
  </div>
</section>