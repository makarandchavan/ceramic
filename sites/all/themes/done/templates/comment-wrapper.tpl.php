<section class="product-additional__box" id="Reviews">
  <h3 class="text-uppercase"><?php print t('Comments'); ?><?php print '('.$content['#node']->comment_count.')'; ?></h3>
  <div class="row">
    <div class="col-sm-7 col-md-8 col-lg-12">
      <?php print render($content['comments']); ?>
      <?php print str_replace('resizable', '', render($content['comment_form'])); ?>
    </div>
  </div>
</section>