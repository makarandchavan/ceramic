<?php require_once(drupal_get_path('theme','done').'/templates/header.tpl.php'); ?>
<div id="pageContent" class="page-content">
	<?php if($page['slider']) print render($page['slider']); ?>
	<?php if($page['section']) print render($page['section']); ?>
</div>
<?php require_once(drupal_get_path('theme','done').'/templates/footer.tpl.php'); ?>