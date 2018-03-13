<?php 
	if(arg(0) == 'search'){

		$_p_class = 'done-search---page';
		
	}else{
		$_p_class = 'done-none---page';
	}
 ?>
<?php require_once(drupal_get_path('theme','done').'/templates/header.tpl.php'); ?>
<?php 
	if(isset($node->field_title_enable) && !empty($node->field_title_enable)){
		//print_r($node->field_title_enable);
		$title_status = $node->field_title_enable['und'][0]['value'];
	}else{
		$title_status = 1;
	}
 ?>
<?php 
	if(isset($node->field_classes) && !empty($node->field_classes)){
		$_w_classes = ' '.$node->field_classes['und'][0]['value'];
	}else{
		$_w_classes = '';
	}
?>
<div id="pageContent" class="page-content <?php print $_p_class; ?>">
	<?php if($breadcrumb) print $breadcrumb; ?>
	<?php if($page['slider']) print render($page['slider']); ?>
	<?php if($page['content']):?>
	<section class="content<?php print $_w_classes; ?>">
		<div class="container">
			<?php if($title_status == 1){ ?>
				<h2 class="text-uppercase"><?php print $title; ?></h2>
			<?php } ?>
			
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
	<?php if($page['section']) print render($page['section']); ?>
</div>
<?php require_once(drupal_get_path('theme','done').'/templates/footer.tpl.php'); ?>