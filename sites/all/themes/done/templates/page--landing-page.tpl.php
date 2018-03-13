<?php require_once(drupal_get_path('theme','done').'/templates/header.tpl.php'); ?>
<?php 
  if(isset($node->field_landing_style) && !empty($node->field_landing_style)){
    $landing_style = $node->field_landing_style['und'][0]['value'];
  }else{
    $landing_style = 'category';
  }
?>
<?php if($landing_style == 'banner'){ ?>
<div style="display:none" id="landingpagetype"></div>
<div class="article-nav" style="height: 50px; position: fixed; z-index: 100000;">
  <ul>
  </ul>
</div>
<!-- Content section -->
<div id="pageContent" class="page-content">
<?php print render($page['content']); ?>
</div>
<?php }else{ ?>
<div id="pageContent" class="page-content"> 
  <section class="content content--fill content--fill--light top-null">
    <div class="container">
      <?php print render($page['content']); ?>
    </div>
  </section>
  <?php if($page['section']) print render($page['section']); ?>
</div>
<?php } ?>
<?php require_once(drupal_get_path('theme','done').'/templates/footer.tpl.php'); ?>