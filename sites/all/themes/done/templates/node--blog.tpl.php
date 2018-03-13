<?php 
	if(isset($node->field_image) && !empty($node->field_image)){
      	$imageone_uri = $node->field_image['und'][0]['uri'];
      	$imageone_url = file_create_url($imageone_uri);
   }else{
   		$imageone_url = '';
   }
   
    if(isset($node->body['und'][0]['summary']) && !empty($node->body['und'][0]['summary'])){
      $summ = $node->body['und'][0]['summary'];
      $summary = substr($summ,  0, 350).'...';
   }
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
 	if($comment_count != 1){
 		$comment_str = $comment_count.' COMMENTS';
 	}else{
 		$comment_str = $comment_count.' COMMENT';
 	}
  if($node->field_sidebar){
    $sidebar = $node->field_sidebar['und'][0]['value'];
  }else{
    $sidebar = 'none';
  }
  if($node->field_blog_format){
    $blog_format = $node->field_blog_format['und'][0]['value'];
  }else{
    $blog_format = 'standard';
  }
 	if($blog_format == 'video'){
    $imageone_url_cs = file_create_url($node->field_video_embed['und'][0]['thumbnail_path']);
  }else{
    $imageone_url_cs = $imageone_url;
  }
    
?>
<?php if(!$page){//listing ?>
<?php 
  $style_blog = theme_get_setting('listing_style', 'done');
  if(empty($style_blog)){
    $style_blog = 'default';
  }
  if($style_blog != 'mansory'){
?>
<!-- Post start -->
<div class="post post--column"><a class="post__image" href="<?php print $node_url; ?>"> <img src="<?php print $imageone_url_cs; ?>" alt="<?php print $title; ?>"> </a>
  <div class="post__view-btn">
    <div class="btn-plus">
      <div class="btn-plus__links"><a class="btn-plus__links__icon" href="<?php print $node_url; ?>"><span class="icon icon-eye"></span></a> <a class="btn-plus__links__icon" href="<?php print $node_url; ?>#comment-form-title"><span class="icon icon-message"></span></a> </div>
      <a class="btn-plus__toggle btn btn--round" href="<?php print $node_url; ?>"><span class="icon icon-dots-horizontal"></span></a> </div>
  </div>
  <h5 class="post__title text-uppercase"><a href="<?php print $node_url; ?>"><?php print $title; ?></a></h5>
  <div class="post__text">
    <p><?php print $summary; ?></p>
  </div>
  <div class="post__meta"> <span class="post__meta__date pull-left"><span class="icon icon-clock"></span><?php print format_date($created, 'custom', 'l, d M Y'); ?></span> <span class="post__meta__author pull-right"><span class="icon icon-user-circle"></span><?php print strip_tags($name,'<a>'); ?></span> </div>
</div>
<!-- end post --> 
<?php }else{ ?>
<!-- item -->
<div class="post">
  <!--  -->
  <div class="list-blog-img "><a href="<?php print $node_url; ?>">
    <span class="trim"><?php print theme('image_style', array('path' => $imageone_uri, 'style_name' => 'image_1250x555', 'attributes'=>array('alt'=>$title))); ?></span>
    <time class="img-circle"><span><?php print format_date($node->created, 'custom', 'd'); ?></span> <?php print format_date($node->created, 'custom', 'M'); ?></time>
  </a></div>
  <h2 class="text-uppercase"><a href="<?php print $node_url; ?>"><?php print $title; ?></a></h2>
  <div class="list-blog-content">
    <p>
      <?php print $summary; ?>
    </p>
  </div>
  <!-- / -->
  <!-- post__meta -->
  <div class="post__meta">
    <span class="post__meta__item">
      <span class="icon icon-clock"></span><?php print format_date($created, 'custom', 'l, d M Y'); ?>
    </span>
    <span class="post__meta__item">
      <span class="icon icon-user-circle"></span><?php print strip_tags($name,'<a>'); ?>
    </span>
  </div>
  <!-- /post__meta -->
</div>
<!-- /item -->
<?php } ?>
<?php }else{//single ?>
<?php if($blog_format == 'standard'){ //standard?>
  <?php if($sidebar != 'left' && $sidebar != 'right'){ //sidebar none?>
    <section class="content content--parallax content--parallax--high top-null" data-image="<?php print $imageone_url; ?>">
      <div class="container">
        <div class="blog-post-title blog-post-title--light">
          <h2 class="blog-post-title__title text-uppercase"><?php print $title; ?></h2>
          <div class="blog-post-title__meta">
            <div class="blog-post-title__meta__image"><?php print $user_picture; ?></div>
            <div class="blog-post-title__meta__text">
              <h4 class="blog-post-title__meta__text__name text-uppercase"><?php print strip_tags($name,'<a>'); ?></h4>
              <div class="blog-post-title__meta__text__date"><?php print format_date($created, 'custom', 'l, d M Y'); ?></div>
            </div>
          </div>
          <div style="float:left" class="blog-post-title__meta__text__name"><?php print strip_tags(render($content['field_category']),'<a>'); ?></div>
        </div>
      </div>
    </section>
    <section class="content" data-image="<?php print $imageone_url; ?>">
      <div class="container blog-post-content">
        <div class="row">
        	<?php print render($content['body'][0]['#markup']); ?>
        </div>
        <div class="row">
          <div class="col-md-12">
            <ul class="tags-list">
     			    <?php print render($content['field_tags']); ?>
            </ul>
          </div>
        </div>
        <div class="panel panel-default panel-table">
          <div class="panel-body">
            <div class="tr">
              <div class="td col-md-6 text-center">
                <div class="social-links social-links--colorize social-links--dark social-links--large">
                  <ul>
                    <li class="social-links__item"><a class="icon icon-facebook tooltip-link" href="http://www.facebook.com/sharer.php?u=<?php print $pageURL; ?>" target="blank" data-placement="top" data-toggle="tooltip" data-original-title="Share on facebook"></a></li>
                    <li class="social-links__item"><a class="icon icon-twitter tooltip-link" href="https://twitter.com/intent/tweet?original_referer=<?php print $pageURL; ?>&amp;text=<?php print $title; ?>&amp;tw_p=tweetbutton&amp;url=<?php print $pageURL; ?>" target="_blank" data-placement="top" data-toggle="tooltip" data-original-title="Share on twitter"></a></li>
                    <li class="social-links__item"><a class="icon icon-google tooltip-link" href="https://plusone.google.com/_/+1/confirm?hl=en-US&amp;url=<?php print $pageURL; ?>" target="_blank" data-placement="top" data-toggle="tooltip" data-original-title="Share on google"></a></li>
                    <li class="social-links__item"><a class="icon icon-linkedin tooltip-link" href="http://www.linkedin.com/shareArticle?mini=true&amp;url=<?php print $pageURL; ?>&amp;title=<?php print $title; ?>&amp;source=<?php print $site_name; ?>" target="_blank" data-placement="top" data-toggle="tooltip" data-original-title="Share on linkedin"></a></li>
                    <li class="social-links__item"><a class="icon icon-pinterest tooltip-link" href="http://pinterest.com/pin/create/button/?url=<?php print $pageURL; ?>&amp;media=<?php print $imageone_url; ?>&amp;description=<?php print $title; ?>" target="_blank" data-placement="top" data-toggle="tooltip" data-original-title="Share on pinterest"></a></li>
                  </ul>
                </div>
              </div>
              <div class="td col-md-6 text-center">
                <h5><span class="icon icon-chat"></span><?php print $comment_str; ?></h5>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>

  <?php }else{ //sidebar left or right?>
    <section class="content content--parallax content--parallax--high top-null" data-image="<?php print $imageone_url; ?>">
      <div class="container">
        <div class="blog-post-title blog-post-title--light">
          <h2 class="blog-post-title__title text-uppercase"><?php print $title; ?></h2>
          <div class="blog-post-title__meta">
            <div class="blog-post-title__meta__image"><?php print $user_picture; ?></div>
            <div class="blog-post-title__meta__text">
              <h4 class="blog-post-title__meta__text__name text-uppercase"><?php print strip_tags($name,'<a>'); ?></h4>
              <div class="blog-post-title__meta__text__date"><?php print format_date($created, 'custom', 'l, d M Y'); ?></div>
              
            </div>
          </div>
          <div style="float:left" class="blog-post-title__meta__text__name"><?php print strip_tags(render($content['field_category']),'<a>'); ?></div>
        </div>
      </div>
    </section>
    <section class="content" data-image="<?php print $imageone_url; ?>">
      <div class="container blog-post-content">
        <div class="row">
          <?php print render($content['body'][0]['#markup']); ?>
        </div>
        <div class="row">
          <div class="col-md-12">
            <ul class="tags-list">
              <?php print render($content['field_tags']); ?>
            </ul>
          </div>
        </div>
        <div class="panel panel-default panel-table">
          <div class="panel-body">
            <div class="tr">
              <div class="td col-md-6 text-center">
                <div class="social-links social-links--colorize social-links--dark social-links--large">
                  <ul>
                    <li class="social-links__item"><a class="icon icon-facebook tooltip-link" href="http://www.facebook.com/sharer.php?u=<?php print $pageURL; ?>" target="blank" data-placement="top" data-toggle="tooltip" data-original-title="Share on facebook"></a></li>
                    <li class="social-links__item"><a class="icon icon-twitter tooltip-link" href="https://twitter.com/intent/tweet?original_referer=<?php print $pageURL; ?>&amp;text=<?php print $title; ?>&amp;tw_p=tweetbutton&amp;url=<?php print $pageURL; ?>" target="_blank" data-placement="top" data-toggle="tooltip" data-original-title="Share on twitter"></a></li>
                    <li class="social-links__item"><a class="icon icon-google tooltip-link" href="https://plusone.google.com/_/+1/confirm?hl=en-US&amp;url=<?php print $pageURL; ?>" target="_blank" data-placement="top" data-toggle="tooltip" data-original-title="Share on google"></a></li>
                    <li class="social-links__item"><a class="icon icon-linkedin tooltip-link" href="http://www.linkedin.com/shareArticle?mini=true&amp;url=<?php print $pageURL; ?>&amp;title=<?php print $title; ?>&amp;source=<?php print $site_name; ?>" target="_blank" data-placement="top" data-toggle="tooltip" data-original-title="Share on linkedin"></a></li>
                    <li class="social-links__item"><a class="icon icon-pinterest tooltip-link" href="http://pinterest.com/pin/create/button/?url=<?php print $pageURL; ?>&amp;media=<?php print $imageone_url; ?>&amp;description=<?php print $title; ?>" target="_blank" data-placement="top" data-toggle="tooltip" data-original-title="Share on pinterest"></a></li>
                  </ul>
                </div>
              </div>
              <div class="td col-md-6 text-center">
                <h5><span class="icon icon-chat"></span><?php print $comment_str; ?></h5>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
  <?php } ?>

<?php }else{ ?>
  <?php if($blog_format == 'link'){ ?>
  <div class="blog-content">
    <div class="post">
      <div class="post post--format-link">
        <h2 class="post__title"><a href="<?php print $node_url; ?>"><?php print $title; ?></a></h2>
        <div style="float:right" class="post__meta"><span class="post__meta__item"><span class="icon icon-clock"></span><?php print format_date($created, 'custom', 'F d, Y'); ?></span></div>
        <?php print render($content['field_link']); ?>
      </div>
    </div>
  </div>
  <?php }elseif($blog_format == 'audio'){ ?>
  <div class="blog-content">
      <h2 class="post__title text-uppercase"><a href="<?php print $node_url; ?>"><?php print $title; ?></a></h2>
      <br>
      <div class="sound-audio-content">
        <?php print render($content['field_sound_cloud']); ?>
      </div>
      <div class="post__meta"><span class="post__meta__item"><span class="icon icon-clock"></span><?php print format_date($created, 'custom', 'F d, Y'); ?></span><span class="post__meta__item"><?php print strip_tags(render($content['field_category']),'<a>'); ?></span></div>
  </div>
  <?php }elseif($blog_format == 'video'){ ?>
  <div class="blog-content">
    <h2 class="post__title text-uppercase"><a href="<?php print $node_url; ?>"><?php print $title; ?></a></h2>
    <div class="embed-youtube">
      <?php print render($content['field_video_embed']); ?>
    </div>
    <br>
    <div class="post__meta"><span class="post__meta__item"><span class="icon icon-clock"></span><?php print format_date($created, 'custom', 'F d, Y'); ?></span><span class="post__meta__item"><?php print strip_tags(render($content['field_category']),'<a>'); ?></span></div>
  </div>
  <?php }elseif($blog_format == 'status'){ ?>
  <div class="blog-content">
    <div class="post--status">
      <?php print render($content['field_status']); ?>
      <div class="post__meta"><span class="post__meta__item"><span class="icon icon-chat"></span><?php print t('Status on'); ?> <?php print format_date($created, 'custom', 'F d, Y'); ?> </span><span class="post__meta__item"><?php print render($content['field_category']) ?></span></div>
    </div>
  </div>
  <?php }elseif($blog_format == 'quote'){ ?>
  <div class="blog-content">
    <div class="post--quotes">
      <div class="post__quote">
        <?php print render($content['field_quote']); ?>
      </div>
      <div class="post__meta"><span class="post__meta__item"><span class="icon icon-clock"></span><?php print format_date($created, 'custom', 'F d, Y'); ?> </span><span class="post__meta__item"><span class="post__meta__item"><?php print strip_tags(render($content['field_category']),'<a>'); ?></span></div>
    </div>
  </div> 
  <?php }elseif($blog_format == 'gallery'){ ?>

  
  <div class="blog-content">
    <div class="post--filll">
      <h2 style="text-align:center" class="post__title text-uppercase"><a href="<?php print $node_url; ?>"><?php print $title; ?></a></h2>
      <div class="divider divider--xs"></div>
        <?php /*
        $array1 = array();
        $array2 = array();
        foreach($node->field_image['und'] as $k => $v){
          if(($k+1)%2 == 0){
            $image_gallery_uri = $node->field_image['und'][$k]['uri'];
            $image_gallery_url = file_create_url($image_gallery_uri);
            $array2[$i] = '<div class="gallery-col" style="width: '.(100 - $random[$k-1]).'%;"><img src="'.$image_gallery_url.'" alt="'.$title.'"/></div>';
            print $array2[$i].'</div>';
          }else{
            $image_gallery_uri = $node->field_image['und'][$k]['uri'];
            $image_gallery_url = file_create_url($image_gallery_uri);
            $random[$k] = rand(32,70);
            $array1[$i] = '<div class="gallery-col" style="width: '.$random[$k].'%;"><img src="'.$image_gallery_url.'" alt="'.$title.'"/></div>';
            print '<div class="gallery-row">'.$array1[$i];
          }
          $i++;
       }*/

       ?>
      <div id="jssor_1" style="position: relative; margin: 0 auto; top: 0px; left: 0px; width: 800px; height: 456px; overflow: hidden; visibility: hidden; background-color: #24262e;">
        <!-- Loading Screen -->

        <div data-u="loading" style="position: absolute; top: 0px; left: 0px;">
            <div style="filter: alpha(opacity=70); opacity: 0.7; position: absolute; display: block; top: 0px; left: 0px; width: 100%; height: 100%;"></div>
            <div style="position:absolute;display:block;background:url('<?php print base_path().path_to_theme(); ?>/img/loading.gif') no-repeat center center;top:0px;left:0px;width:100%;height:100%;"></div>
        </div>
        <div data-u="slides" style="cursor: default; position: relative; top: 0px; left: 0px; width: 800px; height: 356px; overflow: hidden;">
        <?php 
          foreach($node->field_image['und'] as $k => $v){
            $image_gallery_uri = $node->field_image['und'][$k]['uri'];
            $image_gallery_url = file_create_url($image_gallery_uri);
            print '<div data-p="144.50" style="display: none;">
                    '.theme('image_style', array('path' => $image_gallery_uri, 'style_name' => 'image_800x356', 'attributes'=>array('alt'=>$title,'data-u' => 'image'))).theme('image_style', array('path' => $image_gallery_uri, 'style_name' => 'image_72x72', 'attributes'=>array('alt'=>$title,'data-u' => 'thumb'))).'
                    </div>';
          }
         ?>
            
        </div>
        <!-- Thumbnail Navigator -->
        <div data-u="thumbnavigator" class="jssort01" style="position:absolute;left:0px;bottom:0px;width:800px;height:100px;" data-autocenter="1">
            <!-- Thumbnail Item Skin Begin -->
            <div data-u="slides" style="cursor: default;">
                <div data-u="prototype" class="p">
                    <div class="w">
                        <div data-u="thumbnailtemplate" class="t"></div>
                    </div>
                    <div class="c"></div>
                </div>
            </div>
            <!-- Thumbnail Item Skin End -->
        </div>
        <!-- Arrow Navigator -->
        <span data-u="arrowleft" class="jssora05l" style="top:158px;left:8px;width:40px;height:40px;"></span>
        <span data-u="arrowright" class="jssora05r" style="top:158px;right:8px;width:40px;height:40px;"></span>
    </div>
    </div>
  </div>
  <?php } ?>
  <section class="content">
    <div class="container blog-post-content">
      <div class="row">
        <?php print render($content['body'][0]['#markup']); ?>
      </div>
      <div class="row">
        <div class="col-md-12">
          <ul class="tags-list">
            <?php print render($content['field_tags']); ?>
          </ul>
        </div>
      </div>
      <div class="panel panel-default panel-table">
        <div class="panel-body">
          <div class="tr">
            <div class="td col-md-6 text-center">
              <div class="social-links social-links--colorize social-links--dark social-links--large">
                <ul>
                  <li class="social-links__item"><a class="icon icon-facebook tooltip-link" href="http://www.facebook.com/sharer.php?u=<?php print $pageURL; ?>" target="blank" data-placement="top" data-toggle="tooltip" data-original-title="Share on facebook"></a></li>
                  <li class="social-links__item"><a class="icon icon-twitter tooltip-link" href="https://twitter.com/intent/tweet?original_referer=<?php print $pageURL; ?>&amp;text=<?php print $title; ?>&amp;tw_p=tweetbutton&amp;url=<?php print $pageURL; ?>" target="_blank" data-placement="top" data-toggle="tooltip" data-original-title="Share on twitter"></a></li>
                  <li class="social-links__item"><a class="icon icon-google tooltip-link" href="https://plusone.google.com/_/+1/confirm?hl=en-US&amp;url=<?php print $pageURL; ?>" target="_blank" data-placement="top" data-toggle="tooltip" data-original-title="Share on google"></a></li>
                  <li class="social-links__item"><a class="icon icon-linkedin tooltip-link" href="http://www.linkedin.com/shareArticle?mini=true&amp;url=<?php print $pageURL; ?>&amp;title=<?php print $title; ?>&amp;source=<?php print $site_name; ?>" target="_blank" data-placement="top" data-toggle="tooltip" data-original-title="Share on linkedin"></a></li>
                  <li class="social-links__item"><a class="icon icon-pinterest tooltip-link" href="http://pinterest.com/pin/create/button/?url=<?php print $pageURL; ?>&amp;media=<?php print $imageone_url; ?>&amp;description=<?php print $title; ?>" target="_blank" data-placement="top" data-toggle="tooltip" data-original-title="Share on pinterest"></a></li>
                </ul>
              </div>
            </div>
            <div class="td col-md-6 text-center">
              <h5><span class="icon icon-chat"></span><?php print $comment_str; ?></h5>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
<?php } ?>
<?php 
$ns = getNextPosts('blog',$node->nid,$node->created);
if($ns != -1){

  foreach ($ns as $n) {
    if($n->field_blog_format){
      $bformat = $n->field_blog_format['und'][0]['value'];
    }else{
      $bformat = 'standard';
    }
    if($bformat == 'video'){
      $nextPost_img_url = file_create_url($n->field_video_embed['und'][0]['thumbnail_path']);
    }else{
      $nextPost_img_url = file_create_url($n->field_image['und'][0]['uri']);
    }
    
 ?>
  <section class="content content--parallax content--parallax--short top-null" data-image="<?php print $nextPost_img_url; ?>">
    <div class="container">
      <div class="blog-post-title blog-post-title--light">
        <h6 class="text-uppercase"><em><?php print t('next post'); ?></em></h6>
        <h2 class="blog-post-title__title text-uppercase"><a href="<?php print url("node/" . $n->nid); ?>"><?php print $n->title; ?></a></h2>
      </div>
    </div>
  </section>
<?php } ?>
<?php } ?>
<?php print render($content['comments']); ?>
<?php }//end list ?>