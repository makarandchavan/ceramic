<?php 
  $pageURL = 'http';  
  if(!empty($_SERVER['HTTPS']) && $_SERVER['HTTPS'] == 'on'){
    $pageURL .= "s";
  }
  $pageURL .= '://';
  if($_SERVER['SERVER_PORT'] != '80'){
    $pageURL .= $_SERVER['SERVER_NAME'].":".$_SERVER['SERVER_PORT'].$_SERVER['REQUEST_URI'];
  }else{
      $pageURL .= $_SERVER['SERVER_NAME'].$_SERVER['REQUEST_URI'];
  }
  $site_name = variable_get('site_name');
  if($content['product:field_image'] && !empty($content['product:field_image'])){
      $imageone_uri = $content['product:field_image']['#items'][0]['uri'];
      $imageone_url = file_create_url($imageone_uri);
  }else{
    $imageone_url = '';
  }
  $on_sale = strip_tags(render($content['product:field_commerce_saleprice_on_sale']));
  if(isset($node->field_display_style) && !empty($node->field_display_style)){
    $display_style = $node->field_display_style['und'][0]['value'];
  }else{
    $display_style = 'default';
  }
  //var_dump($content);
  $sr = strip_tags(render($content['product:status']));
  $str_rp = str_replace('Status:', '', $sr );
  $statuss = trim($str_rp);
?>

<?php if($page){ ?>
  <?php if($display_style == 'sticky'){ ?>
    <section id="single-product" class="content">
      <div class="container">
        <div class="row product-info-outer">
          <div class="col-sm-6 hidden-xs">
            <div class="product-main-image no-zoom" id="mainProductImg">
            	<?php 
                foreach($content['product:field_image']['#items'] as $k => $v){ 
                  $image_pd_uri = $content['product:field_image']['#items'][$k]['uri'];
                  $image_pd_url = file_create_url($image_pd_uri);
                  if($k == 0){
                    print '<div class="product-main-image__item active">'.theme('image_style', array('path' => $image_pd_uri, 'style_name' => 'image_560x700', 'attributes'=>array('alt'=>$title))).'</div>';
                  }else{
                    print '<div class="product-main-image__item">'.theme('image_style', array('path' => $image_pd_uri, 'style_name' => 'image_560x700', 'attributes'=>array('alt'=>$title))).'</div>';
                  }
            		}
            	?>
    			     <div class="product-main-image__zoom"></div>
            </div>
            <div class="product-images-carousel">
              <ul id="smallGallery">
                <?php 
                foreach($content['product:field_image']['#items'] as $k => $v){ 
                  $image_pd_uri = $content['product:field_image']['#items'][$k]['uri'];
                  $image_pd_url = file_create_url($image_pd_uri);
                  print '<li><a href="#" data-image="'.$image_pd_url.'"  data-zoom-image="'.$image_pd_url.'">'.theme('image_style', array('path' => $image_pd_uri, 'style_name' => 'image_150x180', 'attributes'=>array('alt'=>$title))).'</a></li>';
                }
              ?>
              </ul>
            </div>
            <div class="modal fade zoom" id="videoModal" tabindex="-1" role="dialog" aria-labelledby="videoModal" aria-hidden="true">
              <div class="modal-dialog">
                <div class="modal-content">
                  <div class="modal-body">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">✕ </button>
                    <div>
                      <iframe width="100%" height="350" src=""></iframe>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="product-info col-sm-6">
            <div class="product-info__title">
              <h2><?php print $title; ?></h2>
            </div>
            <div class="product-info__sku pull-right"><?php print strip_tags(render($content['product:sku'])); ?> &nbsp;&nbsp;<?php if($statuss == 'Active'){ ?><span class="label label-success"><?php print t('IN STOCK'); ?></span><?php }else{ ?><span class="label label-warning"><?php print t('OUT OF STOCK'); ?></span><?php } ?></div>
            <ul id="singleGallery" class="visible-xs">
              <?php 
                foreach($content['product:field_image']['#items'] as $k => $v){ 
                  $image_pd_uri = $content['product:field_image']['#items'][$k]['uri'];
                  $image_pd_url = file_create_url($image_pd_uri);
                  print '<li>'.theme('image_style', array('path' => $image_pd_uri, 'style_name' => 'image_560x700', 'attributes'=>array('alt'=>$title))).'</li>';
                }
              ?>
            </ul>
            <div class="price-box product-info__price"><?php if($on_sale == 1){ ?><span class="price-box__new"><?php print strip_tags(render($content['product:field_commerce_saleprice'])); ?></span>&nbsp;<span class="price-box__old"><?php print strip_tags(render($content['product:commerce_price'])); ?></span><?php }else{ ?><span class="price-box__new"><?php print strip_tags(render($content['product:commerce_price'])); ?></span><?php } ?></div>
            <div class="rating product-info__rating hidden-xs"><?php print render($content['product:field_rating']); ?></div>
            <div class="divider divider--xs product-info__divider"></div>
            <?php if($content['product:field_short_description']): ?>
              <div class="product-info__description"><?php print render($content['product:field_short_description']); ?></div>
            <?php endif; ?>
            <div class="divider divider--xs product-info__divider"></div>
              <?php print render($content['field_fashion_product']);?>
              <?php print render($content['field_flower_product']);?>
              <?php print render($content['field_ishop_product']);?>
              <?php print render($content['field_toys_product']);?>
              <?php print render($content['field_sport_product']);?>
              <?php print render($content['field_swimwear_product']);?>
              <?php print render($content['field_medicine_product']);?>
            <div class="divider divider--xs"></div>
            <div class="padding-top-25">
              <ul class="product-links">
                <?php print render($content['field_fashion_category']); ?>
                <?php print render($content['field_flower_category']); ?>
                <?php print render($content['field_ishop_category']); ?>
                <?php print render($content['field_toys_category']); ?>
                <?php print render($content['field_sport_category']); ?>
                <?php print render($content['field_swimwear_category']); ?>
                <?php print render($content['field_medicine_category']); ?>
              </ul>
              <div class="social-links social-links--colorize social-links--invert social-links--padding pull-right">
                <ul>
                  <li class="social-links__item"><a class="icon icon-facebook tooltip-link" href="http://www.facebook.com/sharer.php?u=<?php print $pageURL; ?>" target="blank" data-placement="top" data-toggle="tooltip" data-original-title="Share on facebook"></a></li>
                  <li class="social-links__item"><a class="icon icon-twitter tooltip-link" href="https://twitter.com/intent/tweet?original_referer=<?php print $pageURL; ?>&amp;text=<?php print $title; ?>&amp;tw_p=tweetbutton&amp;url=<?php print $pageURL; ?>" target="_blank" data-placement="top" data-toggle="tooltip" data-original-title="Share on twitter"></a></li>
                  <li class="social-links__item"><a class="icon icon-google tooltip-link" href="https://plusone.google.com/_/+1/confirm?hl=en-US&amp;url=<?php print $pageURL; ?>" target="_blank" data-placement="top" data-toggle="tooltip" data-original-title="Share on google"></a></li>
                  <li class="social-links__item"><a class="icon icon-pinterest tooltip-link" href="http://pinterest.com/pin/create/button/?url=<?php print $pageURL; ?>&amp;media=<?php print $imageone_url; ?>&amp;description=<?php print $title; ?>" target="_blank" data-placement="top" data-toggle="tooltip" data-original-title="Share on pinterest"></a></li>
                </ul>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
    <section class="content">
      <div id="navProduct">
        <div class="nav-product">
          <div class="container">
            <ul>
              <li class="nav-product__item" data-target="Description"><a href="#Description"><?php print t('Description'); ?></a></li>
              <li class="nav-product__item" data-target="Additional"><a href="#Additional"><?php print t('Additional Info'); ?></a></li>
              <li class="nav-product__item" data-target="Reviews"><a href="#Reviews"><?php print t('Comments'); ?></a></li>
              <li class="nav-product__item" data-target="Tags"><a href="#Tags"><?php print t('Tags'); ?></a></li>
            </ul>
          </div>
        </div>
      </div>
    </section>
    <section class="content top-null">
      <div class="container product-additional">
        <section class="product-additional__box" id="Description">
        <?php print render($content['product:field_description']); ?>
    		</section>
    	  <section class="product-additional__box" id="Additional">
    		<?php print render($content['product:field_additional_info']); ?>
        </section>
        <?php print render($content['comments']); ?>
        <section class="product-additional__box" id="Tags">
          <h3 class="text-uppercase">Tags</h3>
          <ul class="tags-list">
            <?php print render($content['field_product_tags']) ?>
          </ul>
        </section>
      </div>
    </section>
  <?php }elseif($display_style == 'default'){ ?>
    <section id="single-product" class="content">
      <div class="container">
        <div class="row product-info-outer">
          <div class="col-sm-4 col-md-4 col-lg-5 hidden-xs">
            <div class="product-main-image">
              <div class="product-main-image__item"><img class="product-zoom" src='<?php print $imageone_url; ?>' data-zoom-image="<?php print $imageone_url; ?>"/></div>
              <div class="product-main-image__zoom"></div>
            </div>
            <div class="product-images-carousel">
              <ul id="smallGallery">
                <?php 
                  foreach($content['product:field_image']['#items'] as $k => $v){ 
                    $image_pd_uri = $content['product:field_image']['#items'][$k]['uri'];
                    $image_pd_url = file_create_url($image_pd_uri);
                    print '<li><a href="#" data-image="'.$image_pd_url.'"  data-zoom-image="'.$image_pd_url.'">'.theme('image_style', array('path' => $image_pd_uri, 'style_name' => 'image_150x180', 'attributes'=>array('alt'=>$title))).'</a></li>';
                  }
                ?>
              </ul>
            </div>
          </div>
          <div class="product-info col-sm-8 col-md-4 col-lg-7">
            <div class="product-info__title">
              <h2><?php print $title; ?></h2>
              <div class="rating product-info__rating visible-xs"><?php print render($content['product:field_rating']); ?></div>
            </div>
            <div class="product-info__sku pull-right"><?php print strip_tags(render($content['product:sku'])); ?> &nbsp;&nbsp;<?php if($statuss == 'Active'){ ?><span class="label label-success"><?php print t('IN STOCK'); ?></span><?php }else{ ?><span class="label label-warning"><?php print t('OUT OF STOCK'); ?></span><?php } ?></div>
            <ul id="singleGallery" class="visible-xs">
              <?php 
                foreach($content['product:field_image']['#items'] as $k => $v){ 
                  $image_pd_uri = $content['product:field_image']['#items'][$k]['uri'];
                  $image_pd_url = file_create_url($image_pd_uri);
                  print '<li>'.theme('image_style', array('path' => $image_pd_uri, 'style_name' => 'image_560x700', 'attributes'=>array('alt'=>$title))).'</li>';
                }
              ?>
            </ul>
            <div class="price-box product-info__price"><?php if($on_sale == 1){ ?><span class="price-box__new"><?php print strip_tags(render($content['product:field_commerce_saleprice'])); ?></span>&nbsp;<span class="price-box__old"><?php print strip_tags(render($content['product:commerce_price'])); ?></span><?php }else{ ?><span class="price-box__new"><?php print strip_tags(render($content['product:commerce_price'])); ?></span><?php } ?></div>
            <div class="rating product-info__rating hidden-xs"><?php print render($content['product:field_rating']); ?></div>
            <div class="divider divider--xs product-info__divider"></div>
            <?php if($content['product:field_short_description']): ?>
              <div class="product-info__description"><?php print render($content['product:field_short_description']); ?></div>
            <?php endif; ?>
            <div class="divider divider--xs product-info__divider"></div>
              <?php print render($content['field_fashion_product']);?>
              <?php print render($content['field_flower_product']);?>
              <?php print render($content['field_ishop_product']);?>
              <?php print render($content['field_toys_product']);?>
              <?php print render($content['field_sport_product']);?>
              <?php print render($content['field_swimwear_product']);?>
              <?php print render($content['field_medicine_product']);?>
            <div class="divider divider--xs"></div>
            <div class="padding-top-25">
              <ul class="product-links">
                <?php print render($content['field_fashion_category']); ?>
                <?php print render($content['field_flower_category']); ?>
                <?php print render($content['field_ishop_category']); ?>
                <?php print render($content['field_toys_category']); ?>
                <?php print render($content['field_sport_category']); ?>
                <?php print render($content['field_swimwear_category']); ?>
                <?php print render($content['field_medicine_category']); ?>
              </ul>
              <div class="social-links social-links--colorize social-links--invert social-links--padding pull-right">
                <ul>
                  <li class="social-links__item"><a class="icon icon-facebook tooltip-link" href="http://www.facebook.com/sharer.php?u=<?php print $pageURL; ?>" target="blank" data-placement="top" data-toggle="tooltip" data-original-title="Share on facebook"></a></li>
                  <li class="social-links__item"><a class="icon icon-twitter tooltip-link" href="https://twitter.com/intent/tweet?original_referer=<?php print $pageURL; ?>&amp;text=<?php print $title; ?>&amp;tw_p=tweetbutton&amp;url=<?php print $pageURL; ?>" target="_blank" data-placement="top" data-toggle="tooltip" data-original-title="Share on twitter"></a></li>
                  <li class="social-links__item"><a class="icon icon-google tooltip-link" href="https://plusone.google.com/_/+1/confirm?hl=en-US&amp;url=<?php print $pageURL; ?>" target="_blank" data-placement="top" data-toggle="tooltip" data-original-title="Share on google"></a></li>
                  <li class="social-links__item"><a class="icon icon-pinterest tooltip-link" href="http://pinterest.com/pin/create/button/?url=<?php print $pageURL; ?>&amp;media=<?php print $imageone_url; ?>&amp;description=<?php print $title; ?>" target="_blank" data-placement="top" data-toggle="tooltip" data-original-title="Share on pinterest"></a></li>
                </ul>
              </div>
            </div>
            
          </div>
        </div>
      </div>
    </section>
    <section class="content content--fill">
      <div class="container"> 
        <!-- Nav tabs -->
        <ul class="nav nav-tabs nav-tabs--wd" role="tablist">
          <li class="active"><a href="#Tab1" aria-controls="home" role="tab" data-toggle="tab" class="text-uppercase"><?php print t('DESCRIPTION'); ?></a></li>
          <li><a href="#Tab4" role="tab" data-toggle="tab" class="text-uppercase"><?php print t('Additional Info'); ?></a></li>
          <li><a href="#Tab2" role="tab" data-toggle="tab" class="text-uppercase"><?php print t('Comments') ?></a></li>
          <li><a href="#Tab3" role="tab" data-toggle="tab" class="text-uppercase"><?php print t('Tags'); ?></a></li>
          
        </ul>
        
        <!-- Tab panes -->
        <div class="tab-content tab-content--wd">
          <div role="tabpanel" class="tab-pane active" id="Tab1">
            <?php print render($content['product:field_description']); ?>
          </div>
          <div role="tabpanel" class="tab-pane" id="Tab4">
            <?php print render($content['product:field_additional_info']); ?>
          </div>
          <div role="tabpanel" class="tab-pane" id="Tab2">
            <?php print render($content['comments']); ?>
          </div>
          <div role="tabpanel" class="tab-pane" id="Tab3">
            <ul class="tags-list">
            <?php print render($content['field_product_tags']); ?>
            </ul>
          </div>
        </div>
      </div>
    </section>
  <?php }else{ ?>
    <section id="single-product" class="content">
      <div class="container">
        <div class="row product-info-outer">
          <div class="col-sm-5 col-md-5 col-lg-6">
            <ul id="singleGalleryVertical">
            <?php 
              foreach($content['product:field_image']['#items'] as $k => $v){ 
                $image_pd_uri = $content['product:field_image']['#items'][$k]['uri'];
                $image_pd_url = file_create_url($image_pd_uri);
                print '<li>'.theme('image_style', array('path' => $image_pd_uri, 'style_name' => 'image_560x700', 'attributes'=>array('alt'=>$title))).'</li>';
              }
            ?>
            </ul>
          </div>
          <div class="product-info col-sm-7 col-md-7 col-lg-6">
            <div class="product-info__title">
              <h2><?php print $title; ?></h2>
            </div>
            <div class="product-info__sku pull-right"><?php print strip_tags(render($content['product:sku'])); ?> &nbsp;&nbsp;<?php if($statuss == 'Active'){ ?><span class="label label-success"><?php print t('IN STOCK'); ?></span><?php }else{ ?><span class="label label-warning"><?php print t('OUT OF STOCK'); ?></span><?php } ?></div>
            <div class="price-box product-info__price"><?php if($on_sale == 1){ ?><span class="price-box__new"><?php print strip_tags(render($content['product:field_commerce_saleprice'])); ?></span>&nbsp;<span class="price-box__old"><?php print strip_tags(render($content['product:commerce_price'])); ?></span><?php }else{ ?><span class="price-box__new"><?php print strip_tags(render($content['product:commerce_price'])); ?></span><?php } ?></div>
            <div class="rating product-info__rating hidden-xs"><?php print render($content['product:field_rating']); ?></div>
            <div class="divider divider--xs product-info__divider"></div>
            <?php if($content['product:field_short_description']): ?>
              <div class="product-info__description"><?php print render($content['product:field_short_description']); ?></div>
            <?php endif; ?>
            <div class="divider divider--xs product-info__divider"></div>
              <?php print render($content['field_fashion_product']);?>
              <?php print render($content['field_flower_product']);?>
              <?php print render($content['field_ishop_product']);?>
              <?php print render($content['field_toys_product']);?>
              <?php print render($content['field_sport_product']);?>
              <?php print render($content['field_swimwear_product']);?>
              <?php print render($content['field_medicine_product']);?>
            <div class="divider divider--xs"></div>
            <div class="padding-top-25">
              <ul class="product-links">
                <?php print render($content['field_fashion_category']); ?>
                <?php print render($content['field_flower_category']); ?>
                <?php print render($content['field_ishop_category']); ?>
                <?php print render($content['field_toys_category']); ?>
                <?php print render($content['field_sport_category']); ?>
                <?php print render($content['field_swimwear_category']); ?>
                <?php print render($content['field_medicine_category']); ?>
              </ul>
              <div class="social-links social-links--colorize social-links--invert social-links--padding pull-right">
                <ul>
                  <li class="social-links__item"><a class="icon icon-facebook tooltip-link" href="http://www.facebook.com/sharer.php?u=<?php print $pageURL; ?>" target="blank" data-placement="top" data-toggle="tooltip" data-original-title="Share on facebook"></a></li>
                  <li class="social-links__item"><a class="icon icon-twitter tooltip-link" href="https://twitter.com/intent/tweet?original_referer=<?php print $pageURL; ?>&amp;text=<?php print $title; ?>&amp;tw_p=tweetbutton&amp;url=<?php print $pageURL; ?>" target="_blank" data-placement="top" data-toggle="tooltip" data-original-title="Share on twitter"></a></li>
                  <li class="social-links__item"><a class="icon icon-google tooltip-link" href="https://plusone.google.com/_/+1/confirm?hl=en-US&amp;url=<?php print $pageURL; ?>" target="_blank" data-placement="top" data-toggle="tooltip" data-original-title="Share on google"></a></li>
                  <li class="social-links__item"><a class="icon icon-pinterest tooltip-link" href="http://pinterest.com/pin/create/button/?url=<?php print $pageURL; ?>&amp;media=<?php print $imageone_url; ?>&amp;description=<?php print $title; ?>" target="_blank" data-placement="top" data-toggle="tooltip" data-original-title="Share on pinterest"></a></li>
                </ul>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
    <section class="content top-null">
      <div class="container product-additional">
        <section class="product-additional__box" id="Description">
        <?php print render($content['product:field_description']); ?>
        </section>
        <section class="product-additional__box" id="Additional">
        <?php print render($content['product:field_additional_info']); ?>
        </section>
        <?php print render($content['comments']); ?>
        <section class="product-additional__box" id="Tags">
          <h3 class="text-uppercase"><?php print t('Tags'); ?></h3>
          <ul class="tags-list">
            <?php print render($content['field_product_tags']) ?>
          </ul>
        </section>
      </div>
    </section>
  <?php } ?>
<?php }else{ ?>
<div class="product-preview-wrapper">
  <div class="product-preview">
      <div class="product-preview__image">
          <a href="<?php print $node_url; ?>"><?php print theme('image_style', array('path' => $imageone_uri, 'style_name' => 'image_526x660', 'attributes'=>array('alt'=>$title))); ?></a>
          <?php if($on_sale == 1){ ?>
            <div class="product-preview__label product-preview__label--right product-preview__label--sale"><span><?php print t('sale!'); ?></span></div>
          <?php } ?>
      </div>
      <div class="product-preview__info text-center">
          <div class="product-preview__info__btns">
              <a href="<?php print base_path().'cart'; ?>" class="btn btn--round"><span class="icon-ecommerce"></span></a>
              <a href="<?php print $node_url; ?>" class="btn btn--round btn--dark"><span class="icon icon-eye"></span></a>
          </div>
          <div class="product-preview__info__title">
              <h2><a href="<?php print $node_url; ?>"><?php print $title; ?></a></h2>
          </div>
          <div class="rating"><?php print render($content['product:field_rating']); ?></div>
          <div class="price-box">
            <?php if($on_sale == 1){ ?>
              <span class="price-box__new"><?php print strip_tags(render($content['product:field_commerce_saleprice'])); ?></span> <span class="price-box__old"><?php print strip_tags(render($content['product:commerce_price'])); ?></span>
            <?php }else{ ?>
              <span class="price-box__new"><?php print strip_tags(render($content['product:commerce_price'])); ?></span>
            <?php } ?>
          </div>
          <div class="product-preview__info__description">
              <?php print render($content['product:field_short_description']); ?>
          </div>
          <div class="product-preview__info__link">
            <?php print render($content['field_fashion_product']);?>
            <?php print render($content['field_flower_product']);?>
            <?php print render($content['field_ishop_product']);?>
            <?php print render($content['field_toys_product']);?>
            <?php print render($content['field_sport_product']);?>
            <?php print render($content['field_swimwear_product']);?>
            <?php print render($content['field_medicine_product']);?>
          </div>
      </div>
  </div>
</div>
<?php } ?>