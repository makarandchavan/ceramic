<?php require_once(drupal_get_path('theme','done').'/templates/header.tpl.php'); ?>
<div id="pageContent" class="page-content">
	<?php if($breadcrumb) print $breadcrumb; ?>
	<?php if($page['content']): ?>
	    <?php
        if (!empty($tabs['#primary']) || !empty($tabs['#secondary'])):
            print render($tabs);
        endif;
        print $messages;
        print render($page['content']);
    	?>
    <?php endif; ?>
</div>
<?php require_once(drupal_get_path('theme','done').'/templates/footer.tpl.php'); ?>