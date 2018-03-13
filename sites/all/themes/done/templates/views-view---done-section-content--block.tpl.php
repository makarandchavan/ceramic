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
 *     .view-id-[view_name]>
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
<?php if($view->current_display == 'block_homepage_2_blog_recent_post' || $view->current_display == 'block_homepage_4_blog_recent_post' || $view->current_display == 'block_homepage_1_blog_recent_posts' || $view->current_display == 'block_homepage_3_blog_recent_post'){ ?>
<div class="blog-widget">
  <?php if($header) print $header; ?>
  <div class="blog-carousel mobile-special-arrows animated-arrows">
    <?php print $rows; ?>
  </div>
</div>
<?php }elseif($view->current_display == 'block_homepage_5_blog_recent_post'){ ?>
<div class="blog-widget">
  <?php if($header) print $header; ?>
  <div class="blog-carousel mobile-special-arrows show-2">
    <?php print $rows; ?>
  </div>
</div>
<?php }elseif($view->current_display == 'done_block_homepage_2_flower_products_listing'){ ?>
<!-- /.modal -->
<!-- Filters -->
<?php if($header) print $header; ?>
<!-- //end Filters --> 
<?php if($rows): ?>
<!-- Filtered Products item -->
<div class="products-grid products-listing products-col products-isotope four-in-row">
  <?php print $rows; ?>
</div>
<!--  /End Filtered Products item -->
<?php endif; ?>
<!-- ================================= /End Filtered ===================================== -->
<?php }elseif($view->current_display == 'done_block_homepage_4__ishop_featured_products'){ ?>
<?php if($header) print $header; ?>
<div class="row product-carousel-layout4 mobile-special-arrows animated-arrows product-grid products-listing four-in-row rows-2">
  <?php if($rows) print $rows; ?>
</div>
<?php }elseif($view->current_display == 'done_block_homepage_1__fashion_featured_products'){ ?>
<?php if($header) print $header; ?>
<div class="row product-carousel mobile-special-arrows animated-arrows product-grid four-in-row">
  <?php if($rows) print $rows; ?>
</div>
<?php }elseif($view->current_display == 'done_block_homepage_1_testimonials' || $view->current_display == 'block_homepage_3_testimonials'){ ?>

<div id="testimonials-section" class="row staggered-animation-container">
  <?php if($header) print $header; ?>
  <div class="divider divider--sm visible-xs"></div>
  <div class="col-sm-6 col-md-3 animation" data-animation="fadeInUp" data-animation-delay="0.6s">
    <?php if($footer) print $footer; ?>
    <div class="testimonials">
      <div class="testimonials-carousel nav-dot">
        <?php if($rows) print $rows; ?>
      </div>
    </div>
  </div>
  <div class="divider divider--sm visible-sm visible-xs"></div>
  <?php if($attachment_after) print $attachment_after; ?>
</div>
<?php }elseif($view->current_display == 'done_block_homepage_5_testimonials'){ ?>
<div class="row staggered-animation-container">
  <?php if($attachment_before) print $attachment_before; ?>
  <div class="col-sm-6 col-md-3 animation" data-animation="fadeInUp" data-animation-delay="0.6s">
    <?php if($header) print $header; ?>
    <div class="testimonials">
      <div class="testimonials-carousel-layout5 nav-top">
        <?php if($rows) print $rows; ?>
      </div>
    </div>
  </div>
  <div class="divider divider--sm visible-xs"></div>
  <?php if($footer) print $footer; ?>
</div>
<?php }elseif($view->current_display == 'done_block_homepage_7_testimonials'){ ?>
<div class="row staggered-animation-container">
<div class="divider divider--sm visible-xs"></div>          
  <?php if($attachment_before) print $attachment_before; ?>
  <div class="divider divider--sm visible-sm visible-xs"></div>
  <div class="divider divider--sm visible-xs"></div>
  <div class="col-sm-6 col-md-3 animation" data-animation="fadeInUp" data-animation-delay="0.6s">
    <?php if($header) print $header; ?>
    <div class="testimonials layout1 ">
      <div class="testimonials-carousel-layout8 nav-top animated-arrows">
       <?php if($rows) print $rows ?>
      </div>
    </div>
  </div>
  <?php if($footer) print $footer; ?>  
</div>
<?php }elseif($view->current_display == 'done_block_homepage_5__medicine_featured_products'){ ?>
<?php if($header) print $header; ?>
<div class="row product-carousel-layout5 mobile-special-arrows product-grid four-in-row rows-2 products-listing" >
    <?php if($rows) print $rows; ?>
</div>
<?php }elseif($view->current_display == 'done_block_homepage_3__swimwear_featured_products'){ ?>
<?php if($header) print $header; ?>
<div class="row product-carousel-layout1  mobile-special-arrows product-grid four-in-row rows-2 animated-arrows products-listing">
  <?php if($rows) print $rows; ?>
</div>
<?php }elseif($view->current_display == 'done_block_homepage_6__toys_featured_products'){ ?>
<?php if($header) print $header; ?>
<div class="row product-grid three-in-row products-listing">
    <?php if($rows) print $rows; ?>
</div>
<?php }elseif($view->current_display == 'done_block_homepage_7__sport_featured_products'){ ?>
<?php if($header) print $header; ?>
<div class="row product-carousel-layout8  mobile-special-arrows product-grid four-in-row  rows-2 animated-arrows products-listing">
  <?php if($rows) print $rows; ?>
</div>
<?php }elseif($view->current_display == 'block_homepage_7_blog_recent_post'){ ?>
<div class="blog-widget">
  <?php if($header) print $header; ?>
  <div class="blog-carousel mobile-special-arrows animated-arrows show-2">
    <?php if($rows) print $rows; ?>
  </div>
</div>
<?php }elseif($view->current_display == 'done_block_gallery_page_listing_gallery'){ ?>
<div class="gallery gallery-isotope" id="gallery">
  <?php if($rows) print $rows; ?>
</div>
<div class="divider divider--sm"></div>
<div class="text-center"><?php print $pager; ?></div>
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