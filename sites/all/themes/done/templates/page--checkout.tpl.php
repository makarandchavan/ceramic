
<?php require_once(drupal_get_path('theme','done').'/templates/header.tpl.php'); ?>

<div id="pageContent" class="page-content done-page-checkout">
<?php if($breadcrumb) print $breadcrumb; ?>
	<section class="content">
      	<div class="container">
 	    <?php if($page['content']):?>
        <?php
            if (!empty($tabs['#primary']) || !empty($tabs['#secondary'])):
                print render($tabs);
            endif;
            print $messages;
            hide($page['content']['system_main']['pager']);
            print render($page['content']);
        ?>
        <?php endif; ?>
        </div>      
    </section>
</div>
<?php require_once(drupal_get_path('theme','done').'/templates/footer.tpl.php'); ?>