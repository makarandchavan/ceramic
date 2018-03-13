<?php 
$header_social_networks = theme_get_setting('header_social_networks', 'done');
//logo
if(isset($node->field_logo) && !empty($node->field_logo)){
	$cs_logo_uri = $node->field_logo['und'][0]['uri'];
 	$cs_logo_url = file_create_url($cs_logo_uri);
}else{

	$cs_logo_url = '';
}
 //logo mobile
if(isset($node->field_mobile_logo) && !empty($node->field_mobile_logo)){
  $mobile_logo_uri = $node->field_mobile_logo['und'][0]['uri'];
  $mobile_logo_url = file_create_url($mobile_logo_uri);
}else{
  $mobile_logo_url = '';
}
//logo transparent
if(isset($node->field_transparent_logo) && !empty($node->field_transparent_logo)){
    $logo_transparent_uri = $node->field_transparent_logo['und'][0]['uri'];
    $logo_transparent_url = file_create_url($logo_transparent_uri);
}else{
	$logo_transparent_url = '';
}
if(isset($node->field_header_transparent_enable) && !empty($node->field_header_transparent_enable)){
	$header_transparent = $node->field_header_transparent_enable['und'][0]['value'];
	//var_dump($node->field_header_transparent_enable);
	if($header_transparent == 1){
    	$header_class = 'done--header--i';//header--transparent
  	}else{
    	$header_class = 'header--default';
  	}
}else{
	$header_class = 'header--default';
}
if(isset($node->field_default_style_layout) && !empty($node->field_default_style_layout)){
	$homepage_layout = $node->field_default_style_layout['und'][0]['value'];
}else{
	$homepage_layout = 'layout3';
}
if(isset($node->field_homepage_sidebar) && !empty($node->field_homepage_sidebar)){
  $sidebar = $node->field_homepage_sidebar['und'][0]['value'];
}else{
  $sidebar = 0;
}
?>
<!-- Header section -->
<header id="<?php print $homepage_layout; ?>" class="header header--sticky <?php print $header_class.' '.$homepage_layout; ?>">
  <div class="header-line hidden-xs<?php if($homepage_layout == 'layout8'){ print ' header-line--light';} ?>">
    <div class="container">
      <div class="pull-left">
      <?php if(!empty($header_social_networks)): ?>
        <div class="social-links social-links--colorize">
          <?php print t($header_social_networks); ?>
        </div>
      <?php endif; ?>
      </div>
      <div class="<?php if($homepage_layout == 'layout8'){ print 'pull-left'; }else{ print 'pull-right'; } ?>">
        <div class="user-links">
          <ul>
          <?php if(!user_is_logged_in()){ ?>
            <li class="user-links__item"><a href="<?php print base_path().'user'; ?>"><?php print t('Sign In'); ?></a></li>
            <li class="user-links__item"><a href="<?php print base_path().'user/register'; ?>"><?php print t('Register'); ?></a></li>
          <?php }else{ ?>
            <li class="user-links__item"><a href="<?php print base_path().'user/logout'; ?>"><?php print t('Sign out'); ?></a></li>
          <?php } ?>
          </ul>
        </div>
      </div>
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
        <a class="logo" href="<?php print base_path(); ?>"><?php if($cs_logo_url){ ?><img class="logo-default" src="<?php print $cs_logo_url; ?>" alt="<?php print $site_name; ?>"/><?php } ?><img class="logo-mobile" src="<?php print $mobile_logo_url; ?>" alt="<?php print $site_name; ?>"/><img class="logo-transparent" src="<?php print $logo_transparent_url; ?>" alt="<?php print $site_name; ?>"/> </a> 
        <!-- End Logo --> 
      </div>
      <?php if($page['main_menu']) print render($page['main_menu']); ?>
    </div>
  </nav>
</header>
<!-- End Header section -->
<div id="pageContent" class="page-content">
<?php if($sidebar != 1){ ?>
	<?php if($page['slider']) print render($page['slider']); ?>
	<?php if($page['section']) print render($page['section']); ?>
<?php }else{ ?>
  <section class="content top-null">
    <div class="container">
      <div class="row">
        <div class="col-md-3 aside-column">
          <?php if($page['sidebar']) print render($page['sidebar']); ?>
        </div>
        <div class="col-md-9 aside-column">
          <?php if($page['slider']) print render($page['slider']); ?>
          <?php if($page['section_with_sidebar']) print render($page['section_with_sidebar']); ?>
        </div>
      </div>
    </div>
  </section>
<?php } ?>
</div>
<?php require_once(drupal_get_path('theme','done').'/templates/footer.tpl.php'); ?>
