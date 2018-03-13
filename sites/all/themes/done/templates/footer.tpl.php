<?php 
  $footer_social_networks = theme_get_setting('footer_social_networks', 'done');
  $copyright_text = theme_get_setting('copyright_text', 'done');
  $footer_bottom_text_right = theme_get_setting('footer_bottom_text_right', 'done');

?>
<footer class="footer">
  <?php if($page['footer_top_bar']) print render($page['footer_top_bar']); ?>
  <div class="footer__column-links">
    <div class="back-to-top"> <a href="#top" class="btn btn--round btn--round--lg"><span class="icon-arrow-up"></span></a></div>
    <div class="container">
      <div class="row">
        <?php if($page['footer_column_1']) print render($page['footer_column_1']); ?>
        <?php if($page['footer_column_2']) print render($page['footer_column_2']); ?>
        <?php if($page['footer_column_2']) print render($page['footer_column_3']); ?>
        <?php if($page['footer_column_2']) print render($page['footer_column_4']); ?>
        <?php if($page['footer_column_5']) print render($page['footer_column_5']); ?>
      </div>
    </div>
  </div>
  <div class="footer__subscribe">
    <div class="container">
      <div class="row">
        <div class="col-sm-7 col-md-6">
          <?php if($page['footer__subscribe']) print render($page['footer__subscribe']); ?>
        </div>
        <?php if(!empty($footer_social_networks)): ?>
        <div class="col-sm-5 col-md-6">
          <div class="social-links social-links--colorize social-links--large">
              <?php print t($footer_social_networks); ?>
          </div>
        </div>
        <?php endif ?>
      </div>
    </div>
  </div>
  <div class="footer__bottom">      
    <div class="container">
      <div class="pull-left text-uppercase"><?php if(!empty($copyright_text)) print t($copyright_text); ?></div>
      <div class="pull-right text-uppercase text-right"><?php if(!empty($footer_bottom_text_right)) print t($footer_bottom_text_right); ?></div>
    </div>
  </div>
</footer>