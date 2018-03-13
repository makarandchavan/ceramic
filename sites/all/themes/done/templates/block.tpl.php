<?php 
	$out = '';
	if($block->region == 'main_menu'){
		$out .= '<div class="pull-left search-focus-fade '.$classes.'" id="slidemenu"'.$attributes.'>';
		$out .= '<div class="slidemenu-close visible-xs">✕</div>';
		$out .= render($title_suffix);
		$out .= $content;
		$out .= '</div>';
	}elseif($block->region == 'footer_column_2' || $block->region ==  'footer_column_3' || $block->region == 'footer_column_4' || $block->region == 'footer_column_5'){
		$out .= '<div class="col-sm-3 col-md-2 mobile-collapse '.$classes.'" '.$attributes.'>';
		$out .= render($title_suffix);
		if($block->subject){
        	$out .= '<h5 class="title text-uppercase mobile-collapse__title">'.$block->subject.'</h5>';
        }
        $out .= '<div class="v-links-list mobile-collapse__content">';
        $out .= $content;
        $out .= '</div>';
        $out .= '</div>';
    }elseif($block->region == 'footer_column_1'){
    	$out .= '<div class="col-sm-3 hidden-xs hidden-sm '.$classes.'" '.$attributes.'>';
    	$out .= render($title_suffix);
		if($block->subject){
        	$out .= '<h5 class="title text-uppercase mobile-collapse__title">'.$block->subject.'</h5>';
        }
        $out .= $content;
        $out .= '</div>';
    }elseif($block->region == 'footer__subscribe'){
    	$out .= '<div class="'.$classes.'" '.$attributes.'>';
    	$out .= render($title_suffix);
		if($block->subject){
        	$out .= '<h5 class="title text-uppercase mobile-collapse__title">'.$block->subject.'</h5>';
        }
        $out .= $content;
        $out .= '</div>';
    }elseif($block->region == 'footer_top_bar'){
        $out .= '<div class="footer__links hidden-xs '.$classes.'" '.$attributes.'>';
        $out .= '<div class="container"><div class="row">';
        $out .= render($title_suffix);
        if($block->subject){
            $out .= '<h5 class="title text-uppercase mobile-collapse__title">'.$block->subject.'</h5>';
        }
        $out .= $content;
        $out .= '</div></div></div>';       
    }elseif($block->region == 'section'){
        $out .= '<section class="'.$classes.'" '.$attributes.'>
                    <div class="container">';
        $out .= render($title_suffix);
        if($block->subject){
            $out .= t('<h2 class="text-center text-uppercase">'.$block->subject.'</h2>');
        }
        $out .= $content;
        $out .= '</div></section>';
    }elseif($block->region == 'slider'){
        $out .= '<section class="'.$classes.'" '.$attributes.'>';
        $out .= render($title_suffix);
        $out .= $content;
        $out .= '</section>'; 
     
    }elseif($block->region == 'sidebar_listing_product'){
        $out .= '<div class="filters-col__collapse '.$classes.'" '.$attributes.'>';
        $out .= render($title_suffix);
        if($block->subject){
            $out .= '<h4 class="filters-col__collapse__title text-uppercase">'.$block->subject.'</h4>';
        }
        $out .= $content;
        $out .= '</div>'; 
    }elseif($block->region == 'content'){
        $out .= $content;
    }elseif($block->region == 'top_right_bar'){
        $out .= '<div class="header__cart pull-left '.$classes.'" '.$attributes.'>';
        $out .= render($title_suffix);
        $out .= $content;
        $out .= '</div>';
     }elseif($block->region == 'section_with_sidebar'){
        $out .= '<section class="'.$classes.'" '.$attributes.'>';
        $out .= render($title_suffix);
        $out .= '<div class="row">';
        if($block->subject){
            $out .= '<h2 class="text-center text-capitalize">'.$block->subject.'</h2>';
        }
        $out .= $content;
        $out .= '</div>';
        $out .= '</section>';
	}else{       
		$out .= '<div class="'.$classes.'" '.$attributes.'>';
        $out .= render($title_suffix);
        if($block->subject){
            $out .= '<h2 class="text-center text-uppercase">'.$block->subject.'</h2>';
        }
		$out .= $content;
		$out .= '</div>';
	}
	print $out;
?>
