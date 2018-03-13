<!DOCTYPE html>
<html>
<head>
<!-- Basic -->
<title><?php print $head_title; ?></title>

<meta name="viewport" content="width=device-width, initial-scale=1.0">

<?php print $styles; print $head; ?>
<?php    
    //Tracking code
    $tracking_code = theme_get_setting('general_setting_tracking_code', 'done');
    print $tracking_code;
    //Custom css
    $custom_css = theme_get_setting('custom_css', 'done');
    if(!empty($custom_css)):?>
    <style type="text/css" media="all">
      <?php print $custom_css;?>
    </style>
    <?php endif;?>

<!--[if IE]>
        <link rel="stylesheet" href="<?php print base_path().path_to_theme(); ?>/css/ie.css">
        <![endif]-->
<!--[if lte IE 8]>
        <script src="http://cdnjs.cloudflare.com/ajax/libs/respond.js/1.3.0/respond.js"></script>
        <script src="http://cdnjs.cloudflare.com/ajax/libs/html5shiv/3.7/html5shiv.js"></script>
        <![endif]-->

</head>
<body class="<?php print $classes;?>" <?php print $attributes;?>>
<?php
  if(arg(0) == 'node' && is_numeric(arg(1))){
    $node = node_load(arg(1));
    $ntype = $node->type;
    if($ntype == 'homepage'){
      if(isset($node->field_pre_loader_enable) && !empty($node->field_pre_loader_enable)){
        $pre_load_enable = $node->field_pre_loader_enable['und'][0]['value'];
        //print $pre_load_enable;
      }else{
        $pre_load_enable = 0;
      }
    }else{
      $pre_load_enable = theme_get_setting('pre_load_enable', 'done');
      if(empty($pre_load_enable)){
        $pre_load_enable = 'off';
      }
    }
  }else{
    $pre_load_enable = theme_get_setting('pre_load_enable', 'done');
    if(empty($pre_load_enable)){
      $pre_load_enable = 'off';
    }
  }
  if($pre_load_enable == 'on' || $pre_load_enable = 1){
    $pre_load_enable_class = 'loader-on';
  }else{
    $pre_load_enable_class = 'loader-off';
  }
?>

<div id="loader-wrapper" class="<?php print $pre_load_enable_class; ?>">
  <div id="loader"></div>
</div>
<div id="skip-link">
      <a href="#main-content" class="element-invisible element-focusable"><?php print t('Skip to main content'); ?></a>
</div>
<?php 
  $icon_gear = theme_get_setting('icon_gear_enable', 'done');
  if(empty($icon_gear)){
    $icon_gear = 'off';
  }
 ?>
<?php if($icon_gear == 'on'){ ?>
<div id="tools" class="hidden-xs">
  <div class="box-out box-in">
    <div class="menu-btn btn btn--wd"> <span class="icon icon-gear rotating"></span> </div>
    <h4><?php print t('Header Mode'); ?></h4>
    <div>
      <h6><?php print t('Float Header'); ?></h6>
      <input class='tgl' id='tglFloatHeader' type='checkbox'>
      <label class='tgl-btn' for='tglFloatHeader'></label>
    </div>
    <h4><?php print t('Layout Mode'); ?></h4>
    <div>
      <label class="radio">
        <input id="tglDefault" type="radio" name="radios" checked>
        <span class="outer"><span class="inner"></span></span><?php print t('Default (1170px) '); ?></label>
    </div>
    <div>
      <label class="radio">
        <input id="tglBoxed" type="radio" name="radios">
        <span class="outer"><span class="inner"></span></span><?php print t('Boxed'); ?></label>
    </div>
    <div>
      <label class="radio">
        <input id="tglFull" type="radio" name="radios">
        <span class="outer"><span class="inner"></span></span><?php print t('Fullwidth'); ?></label>
    </div>
    <div>
      <label class="radio">
        <input id="tglWide" type="radio" name="radios">
        <span class="outer"><span class="inner"></span></span><?php print t('Wide (1770px) '); ?></label>
    </div>
  </div>
</div>
<?php } ?>
<!-- Modal Search -->
<div class="overlay overlay-scale">
  <button type="button" class="overlay-close"> ✕ </button>
  <div class="overlay__content">
  <?php if($search): ?>
    <?php print render($search); ?>
  <?php endif; ?>
  </div>
</div>
<!-- / end Modal Search -->

<div class="wrapper"> 
  <?php print $page_top; ?><?php print $page; ?><?php print $page_bottom; ?>
</div>
<?php print $scripts; ?>
</body>
</html>