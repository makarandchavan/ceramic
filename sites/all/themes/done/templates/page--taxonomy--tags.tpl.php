
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
<?php if($style_blog != 'mansory'){ ?>
<section id="blog-listing" class="content">
  <div class="container">
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
<?php }else{ ?>
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
<?php } ?>
</div>
<?php require_once(drupal_get_path('theme','done').'/templates/footer.tpl.php'); ?>