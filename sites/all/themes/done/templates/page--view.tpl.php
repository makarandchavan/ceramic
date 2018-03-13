<?php require_once(drupal_get_path('theme','done').'/templates/header.tpl.php'); ?>
<div id="pageContent" class="page-content page-content--fill">
	<?php if($breadcrumb) print $breadcrumb; ?>
	<?php if($page['section']) print render($page['section']); ?>
    <?php if($page['content']):?>
    <section class="content">
		<div class="container">
		    <?php
		        if (!empty($tabs['#primary']) || !empty($tabs['#secondary'])):
		            print render($tabs);
		        endif;
		        print $messages;
		        print render($page['content']);
		    ?>
		</div>
	</section>
    <?php endif; ?>
</div>
<?php require_once(drupal_get_path('theme','done').'/templates/footer.tpl.php'); ?>