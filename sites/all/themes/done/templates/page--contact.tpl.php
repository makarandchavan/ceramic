<?php require_once(drupal_get_path('theme','done').'/templates/header.tpl.php'); ?>
<div id="pageContent">
	<?php if($breadcrumb) print $breadcrumb; ?>
	<?php if($page['slider']) print render($page['slider']); ?>
	
	<section class="content content--fill top-null">
		<div class="container">
			<div class="row">
            	<div class="col-sm-7">
              		<h2 class="text-uppercase text-center"><?php print $title; ?></h2>
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
	        	<div class="col-sm-5 text-center">
	        		<?php if($page['sidebar']) print render($page['sidebar']); ?>
	        	</div>
	        </div>
		</div>
	</section>
	
	<?php if($page['section']) print render($page['section']); ?>
</div>
<?php require_once(drupal_get_path('theme','done').'/templates/footer.tpl.php'); ?>