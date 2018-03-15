<?php



	if(arg(0) == 'node' && is_numeric(arg(1))){

		$node = node_load(arg(1));

		$ntype = $node->type;

		if($ntype == 'landing_page'){

			if(isset($node->field_landing_style) && !empty($node->field_landing_style)){

				$landing_style = $node->field_landing_style['und'][0]['value'];

			}else{

				$landing_style = 'category';

			}

			if($landing_style == 'banner'){

				$css_layout = array(

				  '#tag' => 'link', // The #tag is the html tag - <link />

				  '#attributes' => array( // Set up an array of attributes inside the tag

				  'href' => base_path().path_to_theme().'/css/style-colors-pink.css',

				  'rel' => 'stylesheet',

				  'type' => 'text/css',

				  ),

				  '#weight' => 2,

				);

				drupal_add_html_head($css_layout, 'landing_page');

			}

		}

		if($ntype == 'homepage'){

			if(isset($node->field_direction) && !empty($node->field_direction)){

				$homepage_direction = $node->field_direction['und'][0]['value'];

			}else{

				$homepage_direction = 'ltr';

			}

			if($homepage_direction == 'rtl'){

				drupal_add_html_head(

					array(

						'#tag' => 'link', // The #tag is the html tag - <link />

					  	'#attributes' => array( // Set up an array of attributes inside the tag

					  	'href' => base_path().path_to_theme().'/css/style-rtl.css',

					  	'rel' => 'stylesheet',

					  	'type' => 'text/css',

					  ),

					  	'#weight' => 2,

				), 'direction');

			}

			if(isset($node->field_default_style_layout) && !empty($node->field_default_style_layout)){

				$homepage_layout = $node->field_default_style_layout['und'][0]['value'];

			}else{

				$homepage_layout = 'layout3';

			}

			//print $homepage_layout;

			if(!empty($homepage_layout) && $homepage_layout != 'layout3'){

			  	$layout = '/css/style-'.$homepage_layout.'.css';

				$css_layout = array(

				  '#tag' => 'link', // The #tag is the html tag - <link />

				  '#attributes' => array( // Set up an array of attributes inside the tag

				  'href' => base_path().path_to_theme().$layout,

				  'rel' => 'stylesheet',

				  'type' => 'text/css',

				  'id' => 'done-theme-config-layout',

				  ),

				  '#weight' => 2,

				);

				drupal_add_html_head($css_layout, 'skin_2');

			}



		}else{

			$direction = theme_get_setting('direction', 'done');

			if(empty($direction)){

				$direction = 'ltr';

			}



			$layout = theme_get_setting('layout', 'done');

			if(!empty($layout) && $layout != 'layout3'){

			  	$layout = '/css/style-'.$layout.'.css';

				$css_layout = array(

				  '#tag' => 'link', // The #tag is the html tag - <link />

				  '#attributes' => array( // Set up an array of attributes inside the tag

				  'href' => base_path().path_to_theme().$layout,

				  'rel' => 'stylesheet',

				  'type' => 'text/css',

				  'id' => 'done-theme-config-layout',

				  ),

				  '#weight' => 2,

				);

				drupal_add_html_head($css_layout, 'skin');

			}

			if($direction == 'rtl'){

				drupal_add_html_head(

					array(

						'#tag' => 'link', // The #tag is the html tag - <link />

					  	'#attributes' => array( // Set up an array of attributes inside the tag

					  	'href' => base_path().path_to_theme().'/css/style-rtl.css',

					  	'rel' => 'stylesheet',

					  	'type' => 'text/css',

					  ),

					  	'#weight' => 2,

				), 'direction');

			}

		}

	}else{

		$direction = theme_get_setting('direction', 'done');

		if(empty($direction)){

			$direction = 'ltr';

		}



		$layout = theme_get_setting('layout', 'done');

		if(!empty($layout) && $layout != 'layout3'){

		  	$layout = '/css/style-'.$layout.'.css';

			$css_layout = array(

			  '#tag' => 'link', // The #tag is the html tag - <link />

			  '#attributes' => array( // Set up an array of attributes inside the tag

			  'href' => base_path().path_to_theme().$layout,

			  'rel' => 'stylesheet',

			  'type' => 'text/css',

			  'id' => 'done-theme-config-layout',

			  ),

			  '#weight' => 2,

			);

			drupal_add_html_head($css_layout, 'skin');

		}

		if($direction == 'rtl'){

			drupal_add_html_head(

				array(

					'#tag' => 'link', // The #tag is the html tag - <link />

				  	'#attributes' => array( // Set up an array of attributes inside the tag

				  	'href' => base_path().path_to_theme().'/css/style-rtl.css',

				  	'rel' => 'stylesheet',

				  	'type' => 'text/css',

				  ),

				  	'#weight' => 2,

			), 'direction');

		}

	}

	$style_blog = theme_get_setting('listing_style', 'done');



	if(empty($style_blog)){

		$style_blog = 'default';



	}

	if(arg(0) == 'taxonomy' && arg(1) == 'term' && is_numeric(arg(2))){

		$term = taxonomy_term_load(arg(2));

		$vname = $term->vocabulary_machine_name;

	}else{

		$vname = 'no_name';

	}

	//print_r(taxonomy_term_load(arg(2)));

	if(arg(0) == 'blog' || $vname == 'tags' || $vname == 'blog_categories'){

		if($style_blog == 'mansory'){

			$css_layout = array(

				  '#tag' => 'link', // The #tag is the html tag - <link />

				  '#attributes' => array( // Set up an array of attributes inside the tag

				  'href' => base_path().path_to_theme().'/css/style-wp.css',

				  'rel' => 'stylesheet',

				  'type' => 'text/css',

				  ),

				  '#weight' => 2,

			);

			drupal_add_html_head($css_layout, 'style_wp');

		}

	}

	function done_css_alter(&$css) {

	  	if(arg(0) == 'node' && is_numeric(arg(1))){

			$node = node_load(arg(1));

			$ntype = $node->type;

			if($ntype == 'homepage'){

				if(isset($node->field_default_style_layout) && !empty($node->field_default_style_layout)){

					$homepage_layout = $node->field_default_style_layout['und'][0]['value'];

				}else{

					$homepage_layout = 'layout3';

				}

				if($homepage_layout == 'layout4' || $homepage_layout == 'layout2' || $homepage_layout == 'layout1' || $homepage_layout == 'layout8'){

					unset($css[drupal_get_path('theme', 'done') . '/css/style.css']);

				}

			}

		}



	}

	function done_preprocess_node(&$vars) {

		unset($vars['content']['links']['statistics']['#links']['statistics_counter']);



  		// Get a list of all the regions for this theme

	  	/*foreach (system_region_list($GLOBALS['theme']) as $region_key => $region_name) {
	    // Get the content for each region and add it to the $region variable
		    if ($blocks = block_get_blocks_by_region($region_key)) {
		      $vars['region'][$region_key] = $blocks;
		    } else {
		      $vars['region'][$region_key] = array();
	    	}
  		}*/

  		if(arg(0) == 'node' && is_numeric(arg(1))){
  			$n = node_load(arg(1));
  			$ntype = $n->type;
	  		if($ntype == '_fashion_product_display' || $ntype == '_flower_product_display' || $ntype == '_ishop_product_display' || $ntype == '_medicine_product_display' || $ntype == '_sport_product_display' || $ntype == '_swimwear_product_display' || $ntype == '_toys_product_display'){
	  			$vars['theme_hook_suggestions'][] = 'node__product_display';
	  		}
  		}

  		if(arg(0) == 'taxonomy' && arg(1) == 'term') {

	        $tid = (int)arg(2);

	        $term = taxonomy_term_load($tid);

        	if($term->vocabulary_machine_name == '_fashion_product_categories' || $term->vocabulary_machine_name == '_flowers_product_categories' || $term->vocabulary_machine_name == '_medicine_product_categories' || $term->vocabulary_machine_name == '_sport_product_categories' || $term->vocabulary_machine_name == '_toys_product_categories' || $term->vocabulary_machine_name == '_swimwear_product_categories' || $term->vocabulary_machine_name == '_ishop_product_categories' || $term->vocabulary_machine_name == 'product_tags'){

        		$vars['theme_hook_suggestions'][] = 'node__product_display';

        	}

  		}



	}



	function done_preprocess_html(&$variables){

		/*$fashion_products_listing = theme_get_setting('fashion_products_listing', 'done');

		if(empty($fashion_products_listing)){

			$fashion_products_listing = 'style1';

		}*/

		if(arg(0) == 'blog'){

			$listing_style = theme_get_setting('listing_style', 'done');

			if(empty($listing_style)){

				$listing_style = 'default';

			}

			if($listing_style == 'fullwidth'){

				$listing_style_class = 'fullwidth';

			}else{

				$listing_style_class = 'listing-container';

			}

			$variables['classes_array'][] = $listing_style_class;

		}

		/*if(views_get_page_view()){

			$vname = views_get_page_view()->name;

			$pname = views_get_page_view()->current_display;

			if($vname == '_done_store_catalog' && $pname == 'fashion_shop_catalog'){

				if($fashion_products_listing == 'style6' || $fashion_products_listing == 'style7' || $fashion_products_listing == 'style8'){

					$variables['classes_array'][] = 'fullwidth';

					//print $fashion_products_listing;

				}

			}

			//print_r(views_get_page_view());

		}*/

		if(arg(0) == 'node' && is_numeric(arg(1))){

			$node = node_load(arg(1));

			$ntype = $node->type;

			if($ntype == 'homepage'){

				if(isset($node->field_direction) && !empty($node->field_direction)){

					$homepage_direction = $node->field_direction['und'][0]['value'];

				}else{

					$homepage_direction = 'ltr';

				}

				$variables['classes_array'][] = $homepage_direction;

				if(isset($node->field_layout_mode) && !empty($node->field_layout_mode)){

					$ct_hompage_layout_mode = $node->field_layout_mode['und'][0]['value'];

				}else{

					$ct_hompage_layout_mode = 'default';

				}

				if($ct_hompage_layout_mode == 'wide'){

					$ct_homepage_class = 'wide';

				}elseif($ct_hompage_layout_mode == 'fullwidth'){

					$ct_homepage_class = 'fullwidth';

				}elseif($ct_hompage_layout_mode == 'boxed'){

					$ct_homepage_class = 'boxed';

				}else{

					$ct_homepage_class = 'default';

				}

				$variables['classes_array'][] = $ct_homepage_class;

			}else{

				$direction = theme_get_setting('direction', 'done');

				if(empty($direction)){

					$direction = 'ltr';

				}

				$variables['classes_array'][] = $direction;

				$layout_mode = theme_get_setting('layout_mode', 'done');



				if($layout_mode == 'wide'){

					$bodyclass = 'wide';

				}elseif($layout_mode == 'fullwidth'){

					$bodyclass = 'fullwidth';

				}elseif($layout_mode == 'boxed'){

					$bodyclass = 'boxed';

				}else{

					$bodyclass = 'default';

				}

				$variables['classes_array'][] = $bodyclass;

			}

		}else{

			$direction = theme_get_setting('direction', 'done');

			if(empty($direction)){

				$direction = 'ltr';

			}

			$variables['classes_array'][] = $direction;

			if(arg(0) != 'blog'){

				$layout_mode = theme_get_setting('layout_mode', 'done');

				if($layout_mode == 'wide'){

					$bodyclass = 'wide';

				}elseif($layout_mode == 'fullwidth'){

					$bodyclass = 'fullwidth';

				}elseif($layout_mode == 'boxed'){

					$bodyclass = 'boxed';

				}else{

					$bodyclass = 'default';

				}

				$variables['classes_array'][] = $bodyclass;

			}

		}



		$variables['search'] = block_get_blocks_by_region('search');

  		//-- Google web fonts -->

	  	drupal_add_css('http://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700,800%7CShadows+Into+Light', array('type' => 'external'));

	  	//drupal_add_js('https://maps.googleapis.com/maps/api/js?key=AIzaSyAXwI1twhh_oEXr8w_Cb1eg2dcq6I5WmAw&sensor=false', array('type' => 'external'));

	  	/*drupal_add_js("jQuery(document).ready(function($) {

	  				if($('#map').length){

						google.maps.event.addDomListener(window, 'load', init);

						function init() {

						  // Basic options for a simple Google Map

						  // For more options see: https://developers.google.com/maps/documentation/javascript/reference#MapOptions

						  var mapOptions = {

						    // How zoomed in you want the map to start at (always required)

						    zoom: 11,



						    // The latitude and longitude to center the map (always required)

						    center: new google.maps.LatLng(40.6700, -73.9400), // New York



						    // How you would like to style the map.

						    // This is where you would paste any style found on Snazzy Maps.

						    styles: [{'featureType':'water','elementType':'geometry.fill','stylers':[{'color':'#d3d3d3'}]},{'featureType':'transit','stylers':[{'color':'#808080'},{'visibility':'off'}]},{'featureType':'road.highway','elementType':'geometry.stroke','stylers':[{'visibility':'on'},{'color':'#b3b3b3'}]},{'featureType':'road.highway','elementType':'geometry.fill','stylers':[{'color':'#ffffff'}]},{'featureType':'road.local','elementType':'geometry.fill','stylers':[{'visibility':'on'},{'color':'#ffffff'},{'weight':1.8}]},{'featureType':'road.local','elementType':'geometry.stroke','stylers':[{'color':'#d7d7d7'}]},{'featureType':'poi','elementType':'geometry.fill','stylers':[{'visibility':'on'},{'color':'#ebebeb'}]},{'featureType':'administrative','elementType':'geometry','stylers':[{'color':'#a7a7a7'}]},{'featureType':'road.arterial','elementType':'geometry.fill','stylers':[{'color':'#ffffff'}]},{'featureType':'road.arterial','elementType':'geometry.fill','stylers':[{'color':'#ffffff'}]},{'featureType':'landscape','elementType':'geometry.fill','stylers':[{'visibility':'on'},{'color':'#efefef'}]},{'featureType':'road','elementType':'labels.text.fill','stylers':[{'color':'#696969'}]},{'featureType':'administrative','elementType':'labels.text.fill','stylers':[{'visibility':'on'},{'color':'#737373'}]},{'featureType':'poi','elementType':'labels.icon','stylers':[{'visibility':'off'}]},{'featureType':'poi','elementType':'labels','stylers':[{'visibility':'off'}]},{'featureType':'road.arterial','elementType':'geometry.stroke','stylers':[{'color':'#d6d6d6'}]},{'featureType':'road','elementType':'labels.icon','stylers':[{'visibility':'off'}]},{},{'featureType':'poi','elementType':'geometry.fill','stylers':[{'color':'#dadada'}]}]

						  };



						  // Get the HTML DOM element that will contain your map



						  var mapElement = document.getElementById('map');



						  // Create the Google Map using our element and options defined above

						  var map = new google.maps.Map(mapElement, mapOptions);



						  var marker = new google.maps.Marker({

						    position: new google.maps.LatLng(40.6700, -73.9400),

						    map: map,

						    title: 'Snazzy!'

						  });

						}}});", 'inline');*/

 		drupal_add_css('https://fonts.googleapis.com/css?family=Roboto:400,300,300italic,400italic,700,700italic', array('type' => 'external'));

 		drupal_add_css('https://fonts.googleapis.com/css?family=Ubuntu:300,400,500,700', array('type' => 'external'));

 		//drupal_add_css('http://fonts.googleapis.com/css?family=Raleway:600&amp;subset=latin', array('type' => 'external'));

 	}

 	function done_form_comment_form_alter(&$form, &$form_state) {

  		$form['comment_body']['#after_build'][] = 'done_customize_comment_form';

  		//$form['comment_body']['#attributes']['class'] = 'textarea--full';

  		$form['actions']['submit']['#attributes']['class'] = array('btn', 'btn--wd', 'text-uppercase', 'wave waves-effect');

	}

	function done_form_alter(&$form, $form_state, $form_id) {

  		if (strpos($form_id, 'commerce_cart_add_to_cart_form') !== FALSE) {

			$form['submit']['#attributes']['class'] = array('form-submit', 'btn', 'btn--wd', 'text-uppercase');

			$form['quantity']['#attributes']['class'] = array('input--wd', 'input-qty pull-left');

	  	}

	  	if($form_id == 'commerce_checkout_form_checkout'){

	  		if(isset($form['commerce_coupon']['coupon_add'])){

	  			$form['commerce_coupon']['coupon_add']['#attributes']['class'] = array('form-submit', 'btn', 'btn--wd', 'text-uppercase');

	  		}

	  		$form['buttons']['continue']['#attributes']['class'] = array('form-submit', 'btn', 'btn--wd', 'text-uppercase');

	  		$form['buttons']['cancel']['#attributes']['class'] = array('btn', 'btn--wd', 'btn--light');

	  	}elseif($form_id == 'commerce_checkout_form_review'){

	  		$form['buttons']['continue']['#attributes']['class'] = array('form-submit', 'btn', 'btn--wd', 'text-uppercase');

	  		$form['buttons']['back']['#attributes']['class'] = array('btn', 'btn--wd', 'btn--light');

	  	}elseif(strpos($form_id, 'user_login') !== FALSE){

	  		$form['name']['#attributes']['class'] = array('input--wd', 'input-text-width-100','input--wd--full');

	  		$form['name']['#attributes']['placeholder'] = t('Username');

	  		//var_dump($form);

	  		unset($form['name']['#title']);

	  		unset($form['name']['#description']);

	  		$form['pass']['#attributes']['placeholder'] = t('Password');

	  		unset($form['pass']['#title']);

	  		unset($form['pass']['#description']);

	  		$form['pass']['#attributes']['class'] = array('input--wd', 'input-text-width-100','input--wd--full');

	  		$form['email']['#attributes']['class'] = array('input--wd');

	  		$form['actions']['submit']['#attributes']['class'] = array('form-submit', 'btn', 'btn--wd', 'text-uppercase');

	  		//print_r($form);

	  		//unset($form['name']['#attributes']['class']['required']);

	  	}elseif(strpos($form_id,'user_register_form') !== FALSE){

	  		$form['account']['name']['#attributes']['class'] = array('input--wd');

	  		//$form['name']['#attributes']['placeholder'] = t('Username');

	  		//var_dump($form);

	  		//unset($form['name']['#title']);

	  		//unset($form['name']['#description']);

	  		//$form['pass']['#attributes']['placeholder'] = t('Password');

	  		//unset($form['pass']['#title']);

	  		//unset($form['pass']['#description']);

	  		$form['pass']['#attributes']['class'] = array('input--wd', 'input-text-width-100','input--wd--full');

	  		$form['account']['mail']['#attributes']['class'] = array('input--wd');

	  		$form['actions']['submit']['#attributes']['class'] = array('form-submit', 'btn', 'btn--wd', 'text-uppercase');

	  		$form['account']['#attributes']['class'] = array('user-register-form-field');

	  	}elseif(strpos($form_id, 'user_pass') !== FALSE){

	  		$form['name']['#attributes']['class'] = array('input--wd');

	  		//$form['name']['#attributes']['placeholder'] = t('Username');

	  		//var_dump($form);

	  		//unset($form['name']['#title']);

	  		//unset($form['name']['#description']);

	  		//$form['pass']['#attributes']['placeholder'] = t('Password');

	  		//unset($form['pass']['#title']);

	  		//unset($form['pass']['#description']);

	  		$form['pass']['#attributes']['class'] = array('input--wd', 'input-text-width-100','input--wd--full');

	  		$form['mail']['#attributes']['class'] = array('input--wd');

	  		$form['actions']['submit']['#attributes']['class'] = array('form-submit', 'btn', 'btn--wd', 'text-uppercase');

	  		//$form['account']['#attributes']['class'] = array('user-register-form-field');

	  	}elseif(strpos($form_id, 'contact_site_form') !== FALSE){



	  		//print_r($form);

	  		$form['#attributes']['class'] = array('contact-form');

	  		$form['name']['#attributes']['class'] = array('input--full', 'input--wd');

	  		unset($form['name']['#title']);

	  		$form['name']['#attributes']['placeholder'] = t('Your Name (required)');

	  		$form['mail']['#attributes']['class'] = array('input--full', 'input--wd');

	  		unset($form['mail']['#title']);

	  		$form['mail']['#attributes']['placeholder'] = t('Your Email (required)');

	  		$form['subject']['#attributes']['class'] = array('input--full', 'input--wd');

	  		unset($form['subject']['#title']);

	  		$form['subject']['#attributes']['placeholder'] = t('Subject (required)');



	  		$form['message']['#attributes']['class'] = array('textarea--full', 'textarea--wd', 'done-textarea-height');

	  		unset($form['message']['#title']);

	  		$form['message']['#attributes']['placeholder'] = t('Your Message (required)');

	  		$form['actions']['submit']['#attributes']['class'] = array('form-submit', 'btn', 'btn--wd', 'text-uppercase');



	  	}

	}

	function done_customize_comment_form(&$form) {

  		$form[LANGUAGE_NONE][0]['format']['#access'] = FALSE;

  		return $form;

	}

 	function done_preprocess_page(&$vars){

  		if (isset($vars['node'])){

    		$vars['theme_hook_suggestions'][] = 'page__'. $vars['node']->type;

  		}

  		if(arg(0) == 'node' && is_numeric(arg(1))){

  			$n = node_load(arg(1));

  			$ntype = $n->type;

	  		if($ntype == '_fashion_product_display' || $ntype == '_flower_product_display' || $ntype == '_ishop_product_display' || $ntype == '_medicine_product_display' || $ntype == '_sport_product_display' || $ntype == '_swimwear_product_display' || $ntype == '_toys_product_display'){

	  			$vars['theme_hook_suggestions'][] = 'page__product_display';

	  		}

  		}



  		if(arg(0) == 'cart'){

  			$vars['theme_hook_suggestions'][] = 'page__cart';

  		}

  		if(arg(0) == 'checkout'){

  			$vars['theme_hook_suggestions'][] = 'page__checkout';

  		}

    	//View template

    	if(views_get_page_view()){

    		$vars['theme_hook_suggestions'][] = 'page__view';
    		//$news_annouce = views_get_page_view();
    	}



    	drupal_add_js('jQuery.extend(Drupal.settings, { "pathToTheme": "' .base_path().path_to_theme() . '" });', 'inline');


    	if(arg(0) == 'taxonomy' && arg(1) == 'term') {

	        $tid = (int)arg(2);

	        $term = taxonomy_term_load($tid);

        	if(is_object($term)) {

           		$vars['theme_hook_suggestions'][] = 'page__taxonomy__'.$term->vocabulary_machine_name;

        	}

        	if($term->vocabulary_machine_name == '_fashion_product_categories' || $term->vocabulary_machine_name == '_flowers_product_categories' || $term->vocabulary_machine_name == '_medicine_product_categories' || $term->vocabulary_machine_name == '_sport_product_categories' || $term->vocabulary_machine_name == '_toys_product_categories' || $term->vocabulary_machine_name == '_swimwear_product_categories' || $term->vocabulary_machine_name == '_ishop_product_categories'){

        		$vars['theme_hook_suggestions'][] = 'page__taxonomy__done_product_categories';

        	}

  		}

  		if (drupal_is_front_page()) {

    		unset($vars['page']['content']['system_main']['default_message']); //will remove message "no front page content is created"

  		}

  		 if(arg(0) == 'taxonomy' && arg(1) == 'term' && is_numeric(arg(2))) {

    		unset($vars['page']['content']['system_main']['term_heading']);

  		}

	}

	function done_breadcrumb($variables) {

		$crumbs ='';

		$breadcrumb = $variables['breadcrumb'];

		if (!empty($breadcrumb)) {

			$crumbs .= '<section class="breadcrumbs  hidden-xs"><div class="container"><ol class="breadcrumb breadcrumb--wd pull-left">';

			foreach($breadcrumb as $value) {



				$crumbs .= '<li>'.strip_tags($value,'<a>').'</li>';

			}

			$crumbs .= '<li class="active">'.drupal_get_title().'</li>';

			$crumbs .= '</ol></div></section>';

			return $crumbs;

		}else{

			return NULL;

		}

	}

	function done_node_view_alter(&$build){

    	if ($build['#view_mode'] == 'teaser'){

        // remove "add comment" link from node teaser mode display

        unset($build['links']['comment']['#links']['comment-add']);

        // and if logged out this will cause another list item to appear, so let's get rid of that

        unset($build['links']['comment']['#links']['comment_forbidden']);

    	}

	}

	function done_links($links) {

    	return theme_links($links);

	}

	function done_menu_tree__main_menu($variables) {

		//print_r($variables['tree']);

		//var_dump($variables);

	  	return '<ul class="nav navbar-nav">' . $variables['tree'] . '</ul>';

	}

	function done_menu_tree__menu_side_menu($variables) {

		//print_r($variables['tree']);

		//var_dump($variables['tree']);

		if (preg_match("/\bexpanded\b/i", $variables['tree'])){

			return '<ul class="nav navbar-nav navbar-nav--vertical">' . $variables['tree'] . '</ul>';

		}else{

	  		return '<ul class="dropdown-menu animated fadeIn" role="menu">'.$variables['tree'].'</ul>';

	  	}

	}

	function done_menu_link__main_menu(array $variables) {
		global $base_url;

  		$element = $variables['element'];

  		//print_r($element);

  		//print_r($variables);

	  	$sub_menu = '';

	  	//$a = format_string('<h1>thuy </h1>');

	  	//print t(format_string(l($a, $element['#href'])));

	  	if($element['#href'] == '<front>'){

			$path = $base_url;

		}else{

			$path = $base_url . '/' . drupal_get_path_alias($element['#href']);

		}

	  	//print l('<h1>thuy </h1>', $element['#href']);

	  	if ($element['#below']) {

	    	$sub_menu = drupal_render($element['#below']);

	    	//print_r($element['#below']);

	  	}

	  	$output = l($element['#title'], $element['#href'], $element['#localized_options']);

	  	//print ($output);

	  	foreach($element['#attributes']['class'] as $k => $v){

  			if (preg_match("/\bdone-megamenu\b/i", $v)){

  				return '<li' .drupal_attributes($element['#attributes']).'><a href="'.$path.'"><span class="link-name">'.$element['#title'].'</span><span class="caret caret--dots"></span></a><div class="dropdown-menu megamenu animated fadeIn">

                <div class="container">'.$sub_menu.'</div></div></li>';

  			}elseif(preg_match("/\bdone-dropdown\b/i", $v)){

  				return '<li' .drupal_attributes($element['#attributes']).'><a href="'.$path.'"><span class="link-name">'.$element['#title'].'</span><span class="caret caret--dots"></span></a>

                '.$sub_menu.'</li>';

  			}elseif(preg_match("/\bdone-level-1\b/i", $v)){

  				return '<li '.drupal_attributes($element['#attributes']).'><a href="'.$path.'"><span class="link-name">'.$element['#title'].'</span></a></li>';

  			}

  		}

	  	return '<li' . drupal_attributes($element['#attributes']) . '>' . $output . $sub_menu . "</li>\n";

	}

	/*function done_menu_tree__menu_top_menu($variables) {

	  	if (preg_match("/\bexpanded\b/i", $variables['tree'])){

	    	return '<ul class="menu">' . $variables['tree'] . '</ul>';

	  	}else{

	    	return '<ul class="sub-menu">' . $variables['tree'] . '</ul>';

	  	}

	}*/

	/*function done_menu_link__menu_side_menu($variables){

		$element = $variables['element'];

  		//print_r($element);

  		//print_r($variables);

	  	$sub_menu = '';

	  	//print t(format_string(l($a, $element['#href'])));

	  	if($element['#href'] == '<front>'){

			$path = base_path();

		}else{

			$path = drupal_get_path_alias($element['#href']);

		}

	  	if ($element['#below']) {

	    	$sub_menu = drupal_render($element['#below']);

	    	//print_r($element['#below']);

	  	}

	  	//var_dump($element['#attributes']['class']);

	  	$output = l($element['#title'], $element['#href'], $element['#localized_options']);

	  	foreach($element['#attributes']['class'] as $k => $v){

  			if (preg_match("/\bdone-dropdown\b/i", $v)){

  				return '<li' . drupal_attributes($element['#attributes']) . '><a href="'.$path.'" class="dropdown-toggle"><span class="link-name">'.$element['#title'].'</span><span class="caret caret--dots"></span></a></li>';

  			}

  		}

	  	return '<li' . drupal_attributes($element['#attributes']) . '>' . $output . $sub_menu . "</li>\n";



	}*/

	function done_form_search_block_form_alter(&$form, &$form_state, $form_id) {

	    unset($form['search_block_form']['#title']); // remove label form

	    $form['search_block_form']['#title_display'] = 'invisible'; // Toggle label visibilty

	    $form['search_block_form']['#attributes']['placeholder'] = 'search text here ...';

	    $form['actions']['submit']['#value'] = t('Search'); // Change the text on the submit button

	    //$form['actions']['submit']['#attributes']['class'] = 'btn';

	    $form['#attributes']['id'] = 'searchform';

	}



	function done_form_simplenews_block_form_alter(&$form, &$form_state, $form_id) {

		//var_dump($form);

	    $form['mail']['#title'] = 'Subscribe'; // label form

	    //$form['simplenews_block_form']['#title_display'] = 'invisible'; // Toggle label visibilty

	    //$form['simplenews_block_form']['#default_value'] = t('Search'); // Set a default value for the textfield

	    $form['mail']['#attributes']['placeholder'] = 'Your e-mail address';

	    $form['mail']['#attributes']['class'] = array('subscribe-form__input','input--wd');

	    //$form['simplenews_block_form']['#attributes']['onblur'] = 'if(this.value=="")this.value="Search";';

	    //$form['search_block_form']['#attributes']['name'] = 's';

	    $form['simplenews_block_form']['#attributes']['id'] = 's';

	    //$form['actions']['#value'] = t('subscribse'); // Change the text on the submit button

	    $form['submit']['#attributes']['class'] = array('btn btn--wd', 'text-uppercase wave', 'waves-effect');

	    $form['#attributes']['class'] = 'subscribe-form';

	    //var_dump($form);

	}

	//remove footer ubercart

	//function done_uc_store_footer(){

	//	return;

	//}

	function getNextPosts($ntype,$nid,$created){

		$nids = db_query("SELECT n.nid, title FROM {node} n WHERE n.status = 1 AND n.type = :type AND n.nid <> :nid AND n.created > :created ORDER BY n.created asc LIMIT 1", array(':type' => $ntype, ':nid' => $nid,':created' => $created))->fetchCol();

		if($nids){

			$nodes = node_load_multiple($nids);

			return $nodes;

		}else{

			return -1;

		}

	}

	function done_form_views_form_commerce_cart_form_default_alter(&$form, &$form_state, $form_id) {

		//var_dump($form);

  		$form['actions']['checkout']['#attributes']['class'] = array('btn', 'btn--wd');

  		$form['actions']['submit']['#attributes']['class'] = array('btn', 'btn--wd');

  		if(isset($form['edit_quantity'])){

	  		foreach($form['edit_quantity'] as $k => $v){

	  			if(is_numeric($k)){

	  				$form['edit_quantity'][$k]['#attributes']['class'] = array('input--wd', 'input-qty', 'pull-left');

	  			}

	  		}

	  	}

	  	if(isset($form['edit_delete'])){

	  		foreach($form['edit_delete'] as $k => $v){

	  			if(is_numeric($k)){

	  				$form['edit_delete'][$k]['#attributes']['class'] = array('btn', 'btn--wd', 'btn--light');

	  			}

	  		}

	  	}



	}



	function done_commerce_cart_empty_page() {

  		return '<div class="text-center"> <img src="'.base_path().path_to_theme().'/images/shopping-cart-icon.png" alt="shopping cart empty" class="img-responsive img-center">

          			<div class="divider divider--sm"></div>

          			<h2 class="text-uppercase">Shopping Cart is Empty</h2>

          			<h5>You have no items in your shopping cart.</h5>

          			<div class="divider divider--sm"></div>

          			<a href="'.base_path().'" class="btn btn--wd">BACK TO FRONT PAGE</a> </div>';

	}

	function done_preprocess_views_view(&$vars){

		//var_dump($vars['view']->view);

		//var_dump($vars);

		//var_dump(system_region_list($GLOBALS['theme']));

		foreach (system_region_list($GLOBALS['theme']) as $region_key => $region_name) {



	    	//$vars['region'][$region_key] = block_get_blocks_by_region($region_key);



  		}

	}

	function done_form_views_exposed_form_alter(&$form, &$form_state, $form_id) {

	  //print '<pre>';

	  //print_r($form);

	  $form['commerce_price_amount']['min']['#attributes']['class'] = array('input--wd');

	  $form['commerce_price_amount']['max']['#attributes']['class'] = array('input--wd');

	  //print '</pre>';

	}



 	function done_commerce_cart_empty_block() {

  		return '<div class="dropdown pull-right"><a href="#" class="btn dropdown-toggle btn--links--dropdown header__cart__button header__dropdowns__button" data-toggle="dropdown"><span class="icon icon-bag-alt"></span><span class="badge badge--menu">0</span></a></div>';

	}