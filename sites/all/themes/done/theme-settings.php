<?php

function done_form_system_theme_settings_alter(&$form, &$form_state) {
    $theme_path = drupal_get_path('theme', 'done');
    $form['#submit'][] = 'done_settings_form_submit';

    // Get all themes.
    $themes = list_themes();
    // Get the current theme
    $active_theme = $GLOBALS['theme_key'];
    $form_state['build_info']['files'][] = str_replace("/$active_theme.info", '', $themes[$active_theme]->filename) . '/theme-settings.php';
  	
  	$form['settings'] = array(
      	'#type' => 'vertical_tabs',
      	'#title' => t('Theme settings'),
      	'#weight' => 2,
      	'#collapsible' => TRUE,
      	'#collapsed' => FALSE,
  	);
    $form['settings']['header'] = array(
      '#type' => 'fieldset',
      '#title' => t('Header settings'),
      '#collapsible' => TRUE,
      '#collapsed' => FALSE,
    );
    /////////////
    $form['settings']['header']['logo'] = array(
        '#type' => 'fieldset',
        '#title' => t('Mobile logo'),
        '#collapsible' => TRUE,
        '#collapsed' => TRUE,
    );
    
    $form['settings']['header']['logo']['mobile_logo_default'] = array(
      '#title' => t('Use the default mobile logo'),
      '#type' => 'checkbox',
      '#default_value' => theme_get_setting('mobile_logo_default', 'done'),
      '#tree' => FALSE, 
    );

    $form['settings']['header']['logo']['upload_mobile_logo'] = array(
      '#type' => 'container', 
      '#states' => array(
        // Hide the banner settings when using the default banner.
        'invisible' => array(
          'input[name="mobile_logo_default"]' => array('checked' => TRUE),
        ),
      ),
    );
    $form['settings']['header']['logo']['upload_mobile_logo']['mobile_logo'] = array(
      '#type' => 'managed_file',
      '#title' => t('Image'),
      '#required' => FALSE,
      '#progress_message' => t('Please wait...'),
      '#progress_indicator' => 'bar',
      '#description'   => t("Upload logo image."),
      '#upload_location' => file_default_scheme() . '://logo/mobile/',
      '#default_value' => theme_get_setting('mobile_logo','done'),
      '#upload_validators' => array(
          'file_validate_extensions' => array('gif png jpg jpeg'),
      ),
    );
    
///////
    $form['settings']['header']['logo']['logo_transparent_default'] = array(
      '#title' => t('Use the default transparent logo'),
      '#type' => 'checkbox',
      '#default_value' => theme_get_setting('mobile_logo_default', 'done'),
      '#tree' => FALSE, 
    );

    $form['settings']['header']['logo']['upload_logo_transparent'] = array(
      '#type' => 'container', 
      '#states' => array(
        // Hide the banner settings when using the default banner.
        'invisible' => array(
          'input[name="logo_transparent_default"]' => array('checked' => TRUE),
        ),
      ),
    );
    $form['settings']['header']['logo']['upload_logo_transparent']['logo_transparent'] = array(
      '#type' => 'managed_file',
      '#title' => t('Image'),
      '#required' => FALSE,
      '#progress_message' => t('Please wait...'),
      '#progress_indicator' => 'bar',
      '#description'   => t("Upload logo image."),
      '#upload_location' => file_default_scheme() . '://logo/transparent/',
      '#default_value' => theme_get_setting('logo_transparent','done'),
      '#upload_validators' => array(
          'file_validate_extensions' => array('gif png jpg jpeg'),
      ),
    );
    $form['settings']['header']['header_social_networks'] = array(
      '#type' => 'textarea',
      '#title' => t('Social networks'),
      '#default_value' => theme_get_setting('header_social_networks', 'done'),
    );
    
  	$form['settings']['general_setting'] = array(
      	'#type' => 'fieldset',
      	'#title' => t('General Settings'),
      	'#collapsible' => TRUE,
      	'#collapsed' => FALSE,
  	);

  	$form['settings']['general_setting']['general_setting_tracking_code'] = array(
      	'#type' => 'textarea',
      	'#title' => t('Tracking Code'),
      	'#default_value' => theme_get_setting('general_setting_tracking_code', 'done'),
  	);
  	$form['settings']['page_done'] = array(
    '#type' => 'fieldset',
    '#title' => t('Page settings'),
    '#collapsible' => TRUE,
    '#collapsed' => FALSE,
  );
    $form['settings']['page_done']['header_float'] = array(
    '#type' => 'select',
    '#title' => t('Header float'),
    '#options' => array(
      'on' => t('ON'),
      'off' => t('OFF'),
      ),
    '#default_value' => theme_get_setting('header_float', 'done'),
  );
    $form['settings']['page_done']['direction'] = array(
    '#type' => 'select',
    '#title' => t('Direction'),
    '#options' => array(
      'ltr' => t('Left to right (default)'),
      'rtl' => t('Right to left'),
      ),
    '#default_value' => theme_get_setting('direction', 'done'),
  );
   $form['settings']['page_done']['layout'] = array(
    '#type' => 'select',
    '#title' => t('Default style layout'),
    '#options' => array(
      'layout1' => t('Style 1'),
      'layout2' => t('Style 2'),
      'layout3' => t('Style 3 (default)'),
      'layout4' => t('Style 4'),
      'layout5' => t('Style 5'),
      'layout6' => t('Style 6'),
      'layout7' => t('Style 7'),
      'layout8' => t('Style 8'),
      ),
    '#default_value' => theme_get_setting('layout', 'done'),
  );
  $form['settings']['page_done']['layout_mode'] = array(
    '#type' => 'select',
    '#title' => t('Layout mode'),
    '#options' => array(
      'default' => t('Default (1170px)'),
      'boxed' => t('Boxed'),
      'fullwidth' => t('Fullwidth'),
      'wide' => t('Wide (1770px)'),
      ),
    '#default_value' => theme_get_setting('layout_mode', 'done'),
  );
  $form['settings']['page_done']['pre_load_enable'] = array(
    '#type' => 'radios',
    '#title' => t('Pre-loader enable'),
    '#options' => array(
      'on' => t('ON'),
      'off' => t('OFF'),
      ),
    '#default_value' => theme_get_setting('pre_load_enable', 'done'),
  );
  //store
  $form['settings']['store'] = array(
    '#type' => 'fieldset',
    '#title' => t('Store settings'),
    '#collapsible' => TRUE,
    '#collapsed' => FALSE,
  );
  //fashion
  $form['settings']['store']['fashion'] = array(
    '#type' => 'fieldset',
    '#title' => t('Fashion'),
    '#collapsible' => TRUE,
    '#collapsed' => TRUE,
  );
   $form['settings']['store']['fashion']['fashion_products_listing'] = array(
    '#type' => 'select',
    '#title' => t('Product listing style'),
    '#options' => array(
      'style1' => t('Default'),
      'style2' => t('Listing 2 in row'),
      'style3' => t('Listing 3 in row'),
      'style4' => t('Listing 4 in row'),
      'style5' => t('Listing 5 in row'),
      'style6' => t('Listing 6 in row'),
      ),
    '#default_value' => theme_get_setting('fashion_products_listing', 'done'),
  );
   $form['settings']['store']['fashion']['fashion_filter'] = array(
    '#type' => 'select',
    '#title' => t('Filter enable'),
    '#options' => array(
      'on' => t('ON'),
      'off' => t('OFF'),
      ),
    '#default_value' => theme_get_setting('fashion_filter', 'done'),
    );
   //flower
   $form['settings']['store']['flower'] = array(
    '#type' => 'fieldset',
    '#title' => t('Flowers'),
    '#collapsible' => TRUE,
    '#collapsed' => TRUE,
  );
   $form['settings']['store']['flower']['flower_products_listing'] = array(
    '#type' => 'select',
    '#title' => t('Product listing style'),
    '#options' => array(
      'style1' => t('Default'),
      'style2' => t('Listing 2 in row'),
      'style3' => t('Listing 3 in row'),
      'style4' => t('Listing 4 in row'),
      'style5' => t('Listing 5 in row'),
      'style6' => t('Listing 6 in row'),
      ),
    '#default_value' => theme_get_setting('flower_products_listing', 'done'),
  );
    $form['settings']['store']['flower']['flower_filter'] = array(
    '#type' => 'select',
    '#title' => t('Filter enable'),
    '#options' => array(
      'on' => t('ON'),
      'off' => t('OFF'),
      ),
    '#default_value' => theme_get_setting('flower_filter', 'done'),
    );
   //medicine
  $form['settings']['store']['medicine'] = array(
    '#type' => 'fieldset',
    '#title' => t('Medicine'),
    '#collapsible' => TRUE,
    '#collapsed' => TRUE,
  );
   $form['settings']['store']['medicine']['medicine_products_listing'] = array(
    '#type' => 'select',
    '#title' => t('Product listing style'),
    '#options' => array(
      'style1' => t('Default'),
      'style2' => t('Listing 2 in row'),
      'style3' => t('Listing 3 in row'),
      'style4' => t('Listing 4 in row'),
      'style5' => t('Listing 5 in row'),
      'style6' => t('Listing 6 in row'),

      ),
    '#default_value' => theme_get_setting('medicine_products_listing', 'done'),
  );
    $form['settings']['store']['medicine']['medicine_filter'] = array(
    '#type' => 'select',
    '#title' => t('Filter enable'),
    '#options' => array(
      'on' => t('ON'),
      'off' => t('OFF'),
      ),
    '#default_value' => theme_get_setting('medicine_filter', 'done'),
    );
   //ishop
  $form['settings']['store']['ishop'] = array(
    '#type' => 'fieldset',
    '#title' => t('Ishop'),
    '#collapsible' => TRUE,
    '#collapsed' => TRUE,
  );
   $form['settings']['store']['ishop']['ishop_products_listing'] = array(
    '#type' => 'select',
    '#title' => t('Product listing style'),
    '#options' => array(
      'style1' => t('Default'),
      'style2' => t('Listing 2 in row'),
      'style3' => t('Listing 3 in row'),
      'style4' => t('Listing 4 in row'),
      'style5' => t('Listing 5 in row'),
      'style6' => t('Listing 6 in row'),
      ),
    '#default_value' => theme_get_setting('ishop_products_listing', 'done'),
  );
  $form['settings']['store']['ishop']['ishop_filter'] = array(
    '#type' => 'select',
    '#title' => t('Filter enable'),
    '#options' => array(
      'on' => t('ON'),
      'off' => t('OFF'),
      ),
    '#default_value' => theme_get_setting('ishop_filter', 'done'),
    );
   //toy
  $form['settings']['store']['toys'] = array(
    '#type' => 'fieldset',
    '#title' => t('Toys'),
    '#collapsible' => TRUE,
    '#collapsed' => TRUE,
  );
   $form['settings']['store']['toys']['toys_products_listing'] = array(
    '#type' => 'select',
    '#title' => t('Product listing style'),
    '#options' => array(
      'style1' => t('Default'),
      'style2' => t('Listing 2 in row'),
      'style3' => t('Listing 3 in row'),
      'style4' => t('Listing 4 in row'),
      'style5' => t('Listing 5 in row'),
      'style6' => t('Listing 6 in row'),
      ),
    '#default_value' => theme_get_setting('toys_products_listing', 'done'),
  );
    $form['settings']['store']['toys']['toys_filter'] = array(
    '#type' => 'select',
    '#title' => t('Filter enable'),
    '#options' => array(
      'on' => t('ON'),
      'off' => t('OFF'),
      ),
    '#default_value' => theme_get_setting('toys_filter', 'done'),
    );
   //sport
  $form['settings']['store']['sport'] = array(
    '#type' => 'fieldset',
    '#title' => t('Sport'),
    '#collapsible' => TRUE,
    '#collapsed' => TRUE,
  );
   $form['settings']['store']['sport']['sport_products_listing'] = array(
    '#type' => 'select',
    '#title' => t('Product listing style'),
    '#options' => array(
      'style1' => t('Default'),
      'style2' => t('Listing 2 in row'),
      'style3' => t('Listing 3 in row'),
      'style4' => t('Listing 4 in row'),
      'style5' => t('Listing 5 in row'),
      'style6' => t('Listing 6 in row'),
      ),
    '#default_value' => theme_get_setting('sport_products_listing', 'done'),
  );
    $form['settings']['store']['sport']['sport_filter'] = array(
    '#type' => 'select',
    '#title' => t('Filter enable'),
    '#options' => array(
      'on' => t('ON'),
      'off' => t('OFF'),
      ),
    '#default_value' => theme_get_setting('sport_filter', 'done'),
    );
   //swimwear
  $form['settings']['store']['swimwear'] = array(
    '#type' => 'fieldset',
    '#title' => t('SwimWear'),
    '#collapsible' => TRUE,
    '#collapsed' => TRUE,
  );
   $form['settings']['store']['swimwear']['swimwear_products_listing'] = array(
    '#type' => 'select',
    '#title' => t('Product listing style'),
    '#options' => array(
      'style1' => t('Default'),
      'style2' => t('Listing 2 in row'),
      'style3' => t('Listing 3 in row'),
      'style4' => t('Listing 4 in row'),
      'style5' => t('Listing 5 in row'),
      'style6' => t('Listing 6 in row'),
      ),
    '#default_value' => theme_get_setting('swimwear_products_listing', 'done'),
  );
    $form['settings']['store']['swimwear']['swimwear_filter'] = array(
    '#type' => 'select',
    '#title' => t('Filter enable'),
    '#options' => array(
      'on' => t('ON'),
      'off' => t('OFF'),
      ),
    '#default_value' => theme_get_setting('swimwear_filter', 'done'),
    );
 // Blog settings
  $form['settings']['blog'] = array(
    '#type' => 'fieldset',
    '#title' => t('Blog settings'),
    '#collapsible' => TRUE,
    '#collapsed' => FALSE,
  );
  $form['settings']['blog']['blog_listing'] = array(
    '#type' => 'fieldset',
    '#title' => t('Blog listing'),
    '#collapsible' => TRUE,
    '#collapsed' => TRUE,
  );
   $form['settings']['blog']['blog_listing']['listing_style'] = array(
    '#type' => 'select',
    '#title' => t('Style'),
    '#options' => array(
      'default' => t('Default'),
      'fullwidth' => t('FullWidth'),
      'mansory' => t('Masonry'),
      ),
    '#default_value' => theme_get_setting('listing_style', 'done'),
  );

    $form['settings']['blog']['blog_listing']['blog_page'] = array(
      '#type' => 'container', 
      '#states' => array(
            'visible' => array(
                ':input[name="listing_style"]' => array('value' => 'mansory'),
            ),
        ),
    );
  $form['settings']['blog']['blog_listing']['blog_page']['sidebar'] = array(
    '#type' => 'select',
    '#title' => t('Sidebar default'),
    '#options' => array(
      'none' => t('None'),
      'left' => t('Left'),
      'right' => t('Right'),
      ),
    '#default_value' => theme_get_setting('sidebar', 'done'),
  );

  // custom css
	$form['settings']['custom_css'] = array(
		'#type' => 'fieldset',
		'#title' => t('Custom CSS'),
		'#collapsible' => TRUE,
		'#collapsed' => FALSE,
	);
  

	$form['settings']['custom_css']['custom_css'] = array(
		'#type' => 'textarea',
		'#title' => t('Custom CSS'),
		'#default_value' => theme_get_setting('custom_css', 'done'),
		'#description'  => t('<strong>Example:</strong><br/>h1 { font-family: \'Metrophobic\', Arial, serif; font-weight: 400; }')
	);
  $form['settings']['icon_gear'] = array(
    '#type' => 'fieldset',
    '#title' => t('Icon-gear'),
    '#collapsible' => TRUE,
    '#collapsed' => FALSE,
    );
    $form['settings']['icon_gear']['icon_gear_enable'] = array(
    '#type' => 'select',
    '#title' => t('Icon-gear enable'),
    '#options' => array(
      'on' => t('ON'),
      'off' => t('OFF'),
      ),
    '#default_value' => theme_get_setting('icon_gear_enable', 'done'),
    //'#description'  => t('<strong>Example:</strong><br/>h1 { font-family: \'Metrophobic\', Arial, serif; font-weight: 400; }')
  );
  //footer settings
  $form['settings']['footer'] = array(
    '#type' => 'fieldset',
    '#title' => t('Footer settings'),
    '#collapsible' => TRUE,
    '#collapsed' => FALSE,
  );
  
  $form['settings']['footer']['footer_social_networks'] = array(
    '#type' => 'textarea',
    '#title' => t('Social networks'),
    '#default_value' => theme_get_setting('footer_social_networks', 'done'),
  );
  $form['settings']['footer']['copyright_text'] = array(
    '#type' => 'textarea',
    '#title' => t('Copyright text'),
    '#default_value' => theme_get_setting('copyright_text', 'done'),
  );
   $form['settings']['footer']['footer_bottom_text_right'] = array(
    '#type' => 'textarea',
    '#title' => t('Bottom text right'),
    '#default_value' => theme_get_setting('footer_bottom_text_right', 'done'),
  );
}
function done_settings_form_submit(&$form, $form_state) {
  $image_fid = $form_state['values']['mobile_logo'];
  $image1 = file_load($image_fid);

  if (is_object($image1)) {
  // Check to make sure that the file is set to be permanent.
    if ($image1->status == 0) {
      // Update the status.
      $image1->status = FILE_STATUS_PERMANENT;
      // Save the update.
      file_save($image1);
      // Add a reference to prevent warnings.
      file_usage_add($image1, 'done', 'theme', 1);
    }
  }
  //logo transparent
  $image_fid2 = $form_state['values']['logo_transparent'];
  $image2 = file_load($image_fid2);

  if (is_object($image2)) {
  // Check to make sure that the file is set to be permanent.
    if ($image2->status == 0) {
      // Update the status.
      $image2->status = FILE_STATUS_PERMANENT;
      // Save the update.
      file_save($image2);
      // Add a reference to prevent warnings.
      file_usage_add($image2, 'done', 'theme', 1);
    }
  }
}