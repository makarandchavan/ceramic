
<?php if(!user_is_logged_in()){ ?>
<?php
  $user_cate = $page['content']['system_main']['#form_id'];
  //print_r($user_cate);
  $mobile_logo = theme_get_setting('mobile_logo', 'done');
  if(isset($mobile_logo) && !empty($mobile_logo)){
    $mobile_logo_url = file_create_url(file_load($mobile_logo)->uri);
  }else{
    $mobile_logo_url = base_path().path_to_theme().'/images/logo-mobile.png';
  }
  $logo_transparent = theme_get_setting('logo_transparent', 'done');
  if(isset($logo_transparent) && !empty($logo_transparent)){
    $logo_transparent_url = file_create_url(file_load($logo_transparent)->uri);
  }else{
    $logo_transparent_url = base_path().path_to_theme().'/images/logo-transparent.png';
  }
 ?>
 <?php if($user_cate == 'user_login'){ ?>
<!-- Header section -->
<header class="header header--only-logo header--fill">
  <div class="container"> 
    <!--  Logo  -->
        <a class="logo" href="<?php print base_path(); ?>">
        	<?php if($logo){ ?><img class="logo-default" src="<?php print $logo; ?>" alt="<?php print $site_name; ?>"/><?php } ?>
        	<?php if($mobile_logo_url){ ?><img class="logo-mobile" src="<?php print $mobile_logo_url; ?>" alt="<?php print $site_name; ?>"/> <?php } ?>
        	<?php if($logo_transparent_url){ ?><img class="logo-transparent" src="<?php print $logo_transparent_url; ?>" alt="<?php print $site_name; ?>"/> <?php } ?>
        </a> 
<!-- End Logo --> 
  </div>
</header>
<div id="pageContent"> 
  <?php if($breadcrumb) print $breadcrumb; ?>
  <!-- Content section -->
  
  <section class="content content--fill top-null">
    <div class="container">
      <h2 class="h-pad-sm text-uppercase text-center">Already Registered?</h2>
      <h6 class="text-uppercase text-center"><?php print t('If you have an account with us, please log in.'); ?></h6>
      <div class="divider divider--sm"></div>
      <div class="row">
        <div class="col-md-4 col-md-offset-4 col-sm-6 col-sm-offset-3">
          <div class="card card--form"> <a href="#" class="icon card--form__icon icon-user-circle"></a>
            <?php print $messages;?>
            <?php print render($page['content']); ?>
            <div class="card--form__footer"> <a href="<?php print base_path(); ?>user/password"><?php print t('Forgot Your Password?'); ?></a></div>
          </div>
        </div>
      </div>
      <div class="divider divider--md"></div>
      <h2 class="h-pad-sm text-uppercase text-center">New Here?</h2>
      <h6 class="text-uppercase text-center"><?php print t('Registration is free and easy!'); ?></h6>
      <div class="divider divider--xs"></div>
      <div class="text-center"><a href="<?php print base_path(); ?>user/register" class="btn btn--wd text-uppercase wave"><?php print t('create an account'); ?></a></div>
      <div class="divider divider--md"></div>
    </div>
  </section>
  
  <!-- End Content section --> 
</div>
<?php }else{ ?>
<?php require_once(drupal_get_path('theme','done').'/templates/header.tpl.php'); ?>

<div id="pageContent" class="page-content">
  <?php if($breadcrumb) print $breadcrumb; ?>
  <section class="content">
    <div class="container">
      <h2 class="text-uppercase"><?php print $title; ?></h2>

      <?php if($page['content']):?>
            <?php
                if (!empty($tabs['#primary']) || !empty($tabs['#secondary'])):
                    print render($tabs);
                endif;
                print $messages;
                print render($page['content']);
            ?>
            <?php endif; ?>
    </div>
  </section>
  <?php if($page['section']) print render($page['section']); ?>
</div>
<?php require_once(drupal_get_path('theme','done').'/templates/footer.tpl.php'); ?>
<?php } ?>
<?php }else{ ?>
<?php require_once(drupal_get_path('theme','done').'/templates/header.tpl.php'); ?>

<div id="pageContent" class="page-content">
  <section class="content">
    <div class="container">
      <h2 class="text-uppercase"><?php print $title; ?></h2>

      <?php if($page['content']):?>
            <?php
                if (!empty($tabs['#primary']) || !empty($tabs['#secondary'])):
                    print render($tabs);
                endif;
                print $messages;
                print render($page['content']);
            ?>
            <?php endif; ?>
    </div>
  </section>
  <?php if($page['section']) print render($page['section']); ?>
</div>
<?php require_once(drupal_get_path('theme','done').'/templates/footer.tpl.php'); ?>
<?php } ?>