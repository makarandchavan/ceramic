<?php if($view->current_display == 'done_block_fashion_shop__product_categories' || $view->current_display == 'done_block_flowers_shop__product_categories' || $view->current_display == 'done_block_medicine_shop__product_categories' || $view->current_display == 'done_block_toys_shop__product_categories' || $view->current_display == 'done_block_ishop_shop__product_categories' || $view->current_display == 'done_block_swimwear_shop__product_categories' || $view->current_display == 'done_block_sport_shop__product_categories'){ ?>
<?php if($rows){ ?>
<div class="product-category-carousel mobile-special-arrows animated-arrows slick">
  <?php print $rows; ?>
</div>
<?php } ?>
<?php }elseif(strpos($view->current_display,'on_products_listing_sidebar__tags') !== FALSE){ ?>
<div class="filters-col__collapse__content">
  <ul class="tags-list">
    <?php if($rows) print $rows; ?>
  </ul>
</div>
<?php }elseif($view->current_display == 'done_block_homepage_7__sport_product_categories'){ ?>
<?php if($rows) print $rows; ?>
<?php }elseif($view->current_display == 'block_blog_categories_on_sidebar'){ ?>
<?php if($header) print $header; ?>
<ul class="category-list">
  <?php if($rows) print $rows; ?>
</ul>
<div class="divider divider--md"></div>
<?php }elseif($view->current_display == 'block_blog_tags_on_sidebar'){ ?>
<?php if($header) print $header; ?>
<ul class="tags-list">
  <?php if($rows) print $rows; ?>
</ul>
<div class="divider divider--md"></div>
<?php }else{ ?>
<div class="<?php print $classes; ?>">
  <?php print render($title_prefix); ?>
  <?php if ($title): ?>
    <?php print $title; ?>
  <?php endif; ?>
  <?php print render($title_suffix); ?>
  <?php if ($header): ?>
    <div class="view-header">
      <?php print $header; ?>
    </div>
  <?php endif; ?>

  <?php if ($exposed): ?>
    <div class="view-filters">
      <?php print $exposed; ?>
    </div>
  <?php endif; ?>

  <?php if ($attachment_before): ?>
    <div class="attachment attachment-before">
      <?php print $attachment_before; ?>
    </div>
  <?php endif; ?>

  <?php if ($rows): ?>
    <div class="view-content">
      <?php print $rows; ?>
    </div>
  <?php elseif ($empty): ?>
    <div class="view-empty">
      <?php print $empty; ?>
    </div>
  <?php endif; ?>

  <?php if ($pager): ?>
    <?php print $pager; ?>
  <?php endif; ?>

  <?php if ($attachment_after): ?>
    <div class="attachment attachment-after">
      <?php print $attachment_after; ?>
    </div>
  <?php endif; ?>

  <?php if ($more): ?>
    <?php print $more; ?>
  <?php endif; ?>

  <?php if ($footer): ?>
    <div class="view-footer">
      <?php print $footer; ?>
    </div>
  <?php endif; ?>

  <?php if ($feed_icon): ?>
    <div class="feed-icon">
      <?php print $feed_icon; ?>
    </div>
  <?php endif; ?>

</div><?php /* class view */ ?>
<?php } ?>