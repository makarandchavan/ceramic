<?php

/**
 * @file
 * Main view template.
 *
 * Variables available:
 * - $classes_array: An array of classes determined in
 *   template_preprocess_views_view(). Default classes are:
 *     .view
 *     .view-[css_name]
 *     .view-id-[view_name]
 *     .view-display-id-[display_name]
 *     .view-dom-id-[dom_id]
 * - $classes: A string version of $classes_array for use in the class attribute
 * - $css_name: A css-safe version of the view name.
 * - $css_class: The user-specified classes names, if any
 * - $header: The view header
 * - $footer: The view footer
 * - $rows: The results of the view query, if any
 * - $empty: The empty text to display if the view is empty
 * - $pager: The pager next/prev links to display, if any
 * - $exposed: Exposed widget form/info to display
 * - $feed_icon: Feed icon to display, if any
 * - $more: A link to view more, if any
 *
 * @ingroup views_templates
 */
?>
<?php if($view->current_display == 'done_attachment_testimonials__fashion_new_products' || $view->current_display == 'done_attachment_testimonials__swimwear_new_products'){ ?>
<div class="col-sm-6 col-md-3 animation" data-animation="fadeInUp" data-animation-delay="0.9s">
  <?php if($header) print $header; ?>
  <div class="products-widget card">
    <div class="products-widget-carousel nav-dot">
      <?php if($rows) print $rows; ?>
    </div>
  </div>
</div>
<div class="divider divider--sm visible-xs"></div>
<?php }elseif($view->current_display == 'done_attachment_testimonials__fashion_sale_products' || $view->current_display == 'done_attachment_testimonials__swimwear_sale_products'){ ?>
<div class="col-sm-6 col-md-3 animation" data-animation="fadeInUp" data-animation-delay="1.2s">
  <?php if($header) print $header; ?>
  <div class="products-widget card">
    <div class="products-widget-carousel nav-dot">
      <?php if($rows) print $rows; ?>
    </div>
  </div>
</div>
<?php }elseif($view->current_display == 'done_attachment_testimonials__medicine_new_products'  || $view->current_display == 'done_attachment_testimonials__sport_new_products'){ ?>
<div class="col-sm-6 col-md-3 animation" data-animation="fadeInUp" data-animation-delay="0.9s">
  <?php if($header) print $header; ?>
  <div class="products-widget card">
    <div class="products-widget-carousel-layout5 nav-top">
      <?php if($rows) print $rows; ?>
    </div>
  </div>
</div>
<div class="divider divider--sm visible-xs"></div>
<?php }elseif($view->current_display == 'done_attachment_testimonials__medicine_sale_products' || $view->current_display == 'done_attachment_testimonials__sport_sale_products'){ ?>
<div class="col-sm-6 col-md-3 animation" data-animation="fadeInUp" data-animation-delay="1.2s">
  <?php if($header) print $header; ?>
  <div class="products-widget card">
    <div class="products-widget-carousel-layout5 nav-top">
      <?php if($rows) print $rows; ?>
    </div>
  </div>
</div>
<div class="divider divider--sm visible-sm visible-xs"></div>
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