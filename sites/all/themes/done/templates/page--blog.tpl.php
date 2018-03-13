
<?php require_once(drupal_get_path('theme','done').'/templates/header.tpl.php'); ?>
<?php $style_blog = theme_get_setting('listing_style', 'done'); ?>
<?php 
	if(empty($style_blog)){
		$style_blog = 'default';
	 
	}
	$sidebar_listing = theme_get_setting('sidebar', 'done');
	if(empty($sidebar_listing)){
		$sidebar_listing = 'left';
	}
?>
<div id="pageContent" class="page-content">
<?php if($breadcrumb) print $breadcrumb; ?>
	<?php if(arg(0) == 'node'){ ?>
		<?php 
			if($node->field_sidebar){
		    	$sidebar = $node->field_sidebar['und'][0]['value'];
		  	}else{
		    	$sidebar = 'none';
		  	}
		  	if($node->field_blog_format){
		    	$blog_format = $node->field_blog_format['und'][0]['value'];
		  	}else{
		    	$blog_format = 'standard';
		  	}
		 ?>
		 <?php 
		 	if($sidebar == 'left' || $sidebar == 'right'){ 
		 		$class = 'col-md-9';
		 	}else{
		 		$class = 'col-md-12';
		 	}
		 ?>
		<?php if($blog_format == 'standard'){ ?>
			<?php if($sidebar != 'left' && $sidebar != 'right'){ ?>
		 	    <?php if($page['content']):?>
	            <?php
	                if (!empty($tabs['#primary']) || !empty($tabs['#secondary'])):
	                    print render($tabs);
	                endif;
	                print $messages;
	                print render($page['content']);
	            ?>
	            <?php endif; ?>
			<?php } ?>
			<?php if($sidebar == 'left' || $sidebar == 'right'){ ?>
				<section class="content">
				  <div class="container">
				    <div class="row">
				    	<?php if($sidebar == 'left'){ ?>
				      	<div class="col-md-3 aside-column">
				      		<?php if($page['sidebar']) print render($page['sidebar']); ?>
				      	</div>
				      	<?php } ?>
					 	<div class="col-md-9 aside-column">
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
					    <?php if($sidebar == 'right'){ ?>
				      	<div class="col-md-3 aside-column">
				      		<?php if($page['sidebar']) print render($page['sidebar']); ?>
				      	</div>
				      	<?php } ?>
				    </div>
				  </div>
				</section>
			<?php } ?>
		<?php }else{ ?>
			<section style="padding-top:0;" class="content">
			  <div class="container">
			    <div class="row">
			    	<?php if($sidebar == 'left'){ ?>
			      	<div class="col-md-3 aside-column">
			      		<?php if($page['sidebar']) print render($page['sidebar']); ?>
			      	</div>
			      	<?php } ?>
				 	<div class="aside-column <?php print $class; ?>">
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
				    <?php if($sidebar == 'right'){ ?>
			      	<div class="col-md-3 aside-column">
			      		<?php if($page['sidebar']) print render($page['sidebar']); ?>
			      	</div>
			      	<?php } ?>
			    </div>
			  </div>
			</section>
		<?php } ?>
	<?php }else{ ?>
		<?php if($style_blog == 'mansory'){ ?>
			<section class="content">
		      <div class="container">
		        <div class="row">
		        	<?php if($sidebar_listing == 'left'): ?>
		          	<div class="col-md-3  aside-column-1">
		           	<?php if($page['sidebar']) print render($page['sidebar']); ?>
		          	</div>
		      		<?php endif; ?>
		          	<div class="<?php if($sidebar_listing != 'left' && $sidebar_listing != 'right'){ print 'col-md-12'; }else{ print 'col-md-9'; } ?>">
		            	<h1 class="text-uppercase title-blog"><?php print $title; ?></h1>
		            	<!--===== list-blog =====-->
						<div class="list-blog">
							<?php if($page['content']):?>
				            <?php
				                if (!empty($tabs['#primary']) || !empty($tabs['#secondary'])):
				                    print render($tabs);
				                endif;
				                print $messages;
				                //hide($page['content']['system_main']['pager']);
				                print render($page['content']);
				            ?>
				            <?php endif; ?>
		            	</div>
		            	<!--===== /list-blog =====-->
						
		            	<div class="divider divider--md visible-sm"></div>
		          	</div>
		          	<?php if($sidebar_listing == 'right'): ?>
		          	<div class="col-md-3  aside-column-1">
		           	<?php if($page['sidebar']) print render($page['sidebar']); ?>
		          	</div>
		      		<?php endif; ?>
		        </div>
		      </div>
		    </section>
	    <?php }else{ ?>
		    <section id="blog-listing" class="content">
		      <div class="container"><!-- <a id="load-more" href="#">load more</a> -->
		        <div class="posts-isotope"> 
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
		        <div class="divider divider--sm"></div>
		          <?php print render($page['content']['system_main']['pager']); ?>
		      </div>
		    </section>
	    <?php } ?>
	<?php } ?>
</div>
<?php require_once(drupal_get_path('theme','done').'/templates/footer.tpl.php'); ?>