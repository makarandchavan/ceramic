<?php
  //logo mobile
  $mobile_logo = theme_get_setting('mobile_logo', 'done');
  if(isset($mobile_logo) && !empty($mobile_logo)){
    $mobile_logo_url = file_create_url(file_load($mobile_logo)->uri);
  }else{
    $mobile_logo_url = base_path().path_to_theme().'/images/logo-mobile.png';
  }
  //logo transparent
  $logo_transparent = theme_get_setting('logo_transparent', 'done');
  if(isset($logo_transparent) && !empty($logo_transparent)){
    $logo_transparent_url = file_create_url(file_load($logo_transparent)->uri);
  }else{
    $logo_transparent_url = base_path().path_to_theme().'/images/logo-transparent.png';
  }
  $header_social_networks = theme_get_setting('header_social_networks', 'done');
  $header_transparent = theme_get_setting('header_transparent', 'done');
  if(empty($header_transparent)){
    $header_transparent = 'off';
  }
  if($header_transparent == 'on'){
    $header_class = 'header--transparent';
  }else{
    $header_class = 'header--default';
  }
  $layout = theme_get_setting('layout', 'done');
  if(empty($layout)){
    $layout = 'layout3';
  }
  $header_float = theme_get_setting('header_float','done');
  if(empty($header_float)){
    $header_float = 'on';
  }
  if($header_float == 'on'){
    $header_float_class = ' header--sticky';
  }else{
    $header_float_class = '';
  }
?>
<!-- Header section -->
<header id="<?php print $layout; ?>" class="header <?php print $header_class; ?><?php print $header_float_class; ?>">
  <div class="header-line hidden-xs">
    <div class="container">
      <div class="pull-left">
      <?php if(!empty($header_social_networks)): ?>
        <div class="social-links social-links--colorize">
          <?php print t($header_social_networks); ?>
        </div>
      <?php endif; ?>
      </div>
      <!-- <div class="pull-right">
        <div class="user-links">
          <ul>
          <?php //if(!user_is_logged_in()){ ?>
            <li class="user-links__item"><a href="<?php //print base_path().'user'; ?>"><?php //print t('Sign In'); ?></a></li>
            <li class="user-links__item"><a href="<?php //print base_path().'user/register'; ?>"><?php //print t('Register'); ?></a></li>
          <?php //}else{ ?>
            <li class="user-links__item"><a href="<?php //print base_path().'user/logout'; ?>"><?php //print t('Sign out'); ?></a></li>
          <?php //} ?>
          </ul>
        </div>
      </div> -->
    </div>
  </div>
  <div class="header__dropdowns-container">
    <div class="header__dropdowns">
      <div class="header__search pull-left"> <a href="#" class="btn dropdown-toggle btn--links--dropdown header__dropdowns__button search-open"><span class="icon icon-search"></span></a> </div>
      <?php if($page['top_right_bar']) print render($page['top_right_bar']); ?>
    </div>
  </div>
  <nav class="navbar navbar-wd" id="navbar">
    <div class="container">
      <div class="navbar-header">
        <button type="button" class="navbar-toggle" id="slide-nav"> <span class="icon-bar"></span> <span class="icon-bar"></span> <span class="icon-bar"></span> </button>
        <!--  Logo  -->
        <a class="logo" href="<?php print base_path(); ?>"><?php if($logo){ ?><img class="logo-default" src="<?php print $logo; ?>" alt="<?php print $site_name; ?>"/><?php } ?><img class="logo-mobile" src="<?php print $mobile_logo_url; ?>" alt="<?php print $site_name; ?>"/> <img class="logo-transparent" src="<?php print $logo_transparent_url; ?>" alt="<?php print $site_name; ?>"/> </a>
        <!-- End Logo -->
      </div>
      <?php if($page['main_menu']) print render($page['main_menu']); ?>
    </div>
  </nav>
</header>
<!-- End Header section -->