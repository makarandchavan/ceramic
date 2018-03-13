<?php 
	/*if(arg(0) == 'taxonomy' && arg(1) == 'term' && is_numeric(arg(2))){
		$term = taxonomy_term_load(arg(2));
	}*/

 ?>
<?php require_once(drupal_get_path('theme','done').'/templates/header.tpl.php'); ?>
<div id="pageContent" class="page-content page-content--fill">
	<?php if($breadcrumb) print $breadcrumb; ?>
    <?php if($page['content']):?>
    <section class="content">
		<div class="container">
			<?php 
		        if (!empty($tabs['#primary']) || !empty($tabs['#secondary'])):
		            print render($tabs);
		        endif;
		        print $messages;
			 ?>
			<div class="filters-row row">
				<div class="col-sm-4 col-md-5 col-lg-3 col-1"></div>
				<div class="col-sm-8 col-md-7 col-lg-6 col-2">
				</div>
				<div class="col-lg-3 visible-lg col-3">
					<?php print render($page['content']['system_main']['pager']); ?>
				</div>
			</div>
			<div class="outer">
				<div id="centerCol">
					<div class="products-grid products-listing products-col products-isotope four-in-row">
						<?php
					        hide($page['content']['system_main']['pager']);
					        print render($page['content']);
					    ?>
					</div>
				</div>
			</div>
			<div class="hidden-lg text-center">
				<div class="divider divider--sm"></div>
				<?php print render($page['content']['system_main']['pager']); ?>
			</div>
		</div>
	</section>
    <?php endif; ?>
</div>
<?php require_once(drupal_get_path('theme','done').'/templates/footer.tpl.php'); ?>