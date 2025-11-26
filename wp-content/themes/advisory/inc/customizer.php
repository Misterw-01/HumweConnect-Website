<?php    
/**
 *advisory Theme Customizer
 *
 * @package Advisory
 */

/**
 * Add postMessage support for site title and description for the Theme Customizer.
 *
 * @param WP_Customize_Manager $wp_customize Theme Customizer object.
 */
function advisory_customize_register( $wp_customize ) {	
	
	function advisory_sanitize_dropdown_pages( $page_id, $setting ) {
	  // Ensure $input is an absolute integer.
	  $page_id = absint( $page_id );	
	  // If $page_id is an ID of a published page, return it; otherwise, return the default.
	  return ( 'publish' == get_post_status( $page_id ) ? $page_id : $setting->default );
	}

	function advisory_sanitize_checkbox( $checked ) {
		// Boolean check.
		return ( ( isset( $checked ) && true == $checked ) ? true : false );
	} 
	
	function advisory_sanitize_phone_number( $phone ) {
		// sanitize phone
		return preg_replace( '/[^\d+]/', '', $phone );
	} 
		
	$wp_customize->get_setting( 'blogname' )->transport         = 'postMessage';
	$wp_customize->get_setting( 'blogdescription' )->transport  = 'postMessage';
	
	$wp_customize->selective_refresh->add_partial( 'blogname', array(
		'selector' => '.logo h1 a',
		'render_callback' => 'advisory_customize_partial_blogname',
	) );
	$wp_customize->selective_refresh->add_partial( 'blogdescription', array(
		'selector' => '.logo p',
		'render_callback' => 'advisory_customize_partial_blogdescription',
	) );
	
	 //Panel for section & control
	$wp_customize->add_panel( 'advisory_themepanelarea', array(
		'priority' => null,
		'capability' => 'edit_theme_options',
		'theme_supports' => '',
		'title' => __( 'Theme Options Panel', 'advisory' ),		
	) );
	
	//Site Layout Options
	$wp_customize->add_section('advisory_themelayout',array(
		'title' => __('Site Layout Options','advisory'),			
		'priority' => 1,
		'panel' => 	'advisory_themepanelarea',          
	));		
	
	$wp_customize->add_setting('advisory_BXtype',array(
		'sanitize_callback' => 'advisory_sanitize_checkbox',
	));	 

	$wp_customize->add_control( 'advisory_BXtype', array(
    	'section'   => 'advisory_themelayout',    	 
		'label' => __('Check to Show site Box Layout','advisory'),
		'description' => __('If you want to show site box layout please check the Box Layout Option.','advisory'),
    	'type'      => 'checkbox'
     )); //Site Layout Options 
	
	$wp_customize->add_setting('advisory_color1clickoptions',array(
		'default' => '#f34a4b',
		'sanitize_callback' => 'sanitize_hex_color'
	));
	
	$wp_customize->add_control(
		new WP_Customize_Color_Control($wp_customize,'advisory_color1clickoptions',array(
			'label' => __('Color Options','advisory'),			
			'section' => 'colors',
			'settings' => 'advisory_color1clickoptions'
		))
	);
	 	
	// Header Slider Section		
	$wp_customize->add_section( 'advisory_maincarousel', array(
		'title' => __('Header Slider Sections', 'advisory'),
		'priority' => null,
		'description' => __('Default image size for slider is 1400 x 710 pixel.','advisory'), 
		'panel' => 	'advisory_themepanelarea',           			
    ));
	
	$wp_customize->add_setting('advisory_carouselpge1',array(
		'default' => '0',			
		'capability' => 'edit_theme_options',
		'sanitize_callback' => 'advisory_sanitize_dropdown_pages'
	));
	
	$wp_customize->add_control('advisory_carouselpge1',array(
		'type' => 'dropdown-pages',
		'label' => __('Select page for carousel 1:','advisory'),
		'section' => 'advisory_maincarousel'
	));	
	
	$wp_customize->add_setting('advisory_carouselpge2',array(
		'default' => '0',			
		'capability' => 'edit_theme_options',
		'sanitize_callback' => 'advisory_sanitize_dropdown_pages'
	));
	
	$wp_customize->add_control('advisory_carouselpge2',array(
		'type' => 'dropdown-pages',
		'label' => __('Select page for carousel 2:','advisory'),
		'section' => 'advisory_maincarousel'
	));	
	
	$wp_customize->add_setting('advisory_carouselpge3',array(
		'default' => '0',			
		'capability' => 'edit_theme_options',
		'sanitize_callback' => 'advisory_sanitize_dropdown_pages'
	));
	
	$wp_customize->add_control('advisory_carouselpge3',array(
		'type' => 'dropdown-pages',
		'label' => __('Select page for carousel 3:','advisory'),
		'section' => 'advisory_maincarousel'
	));	// Homepage Slider Section
	
	$wp_customize->add_setting('advisory_carouselpgebutton',array(
		'default' => null,
		'sanitize_callback' => 'sanitize_text_field'	
	));
	
	$wp_customize->add_control('advisory_carouselpgebutton',array(	
		'type' => 'text',
		'label' => __('write carousel read more button name here','advisory'),
		'section' => 'advisory_maincarousel',
		'setting' => 'advisory_carouselpgebutton'
	)); // carousel read more button text
	
	$wp_customize->add_setting('advisory_show_maincarousel',array(
		'default' => false,
		'sanitize_callback' => 'advisory_sanitize_checkbox',
		'capability' => 'edit_theme_options',
	));	 
	
	$wp_customize->add_control( 'advisory_show_maincarousel', array(
	    'settings' => 'advisory_show_maincarousel',
	    'section'   => 'advisory_maincarousel',
	    'label'     => __('Check To Show This Section','advisory'),
	   'type'      => 'checkbox'
	 ));//Show Header Slider Section	
	 
	 
	 //Three page circle Section
	$wp_customize->add_section('advisory_3circle_servicessection', array(
		'title' => __('Three Circle Services Section','advisory'),
		'description' => __('Select pages from the dropdown for 3 circle services section','advisory'),
		'priority' => null,
		'panel' => 	'advisory_themepanelarea',          
	));	
	
	
	$wp_customize->add_setting('advisory_servicestitle',array(
		'default' => null,
		'sanitize_callback' => 'sanitize_text_field'	
	));
	
	$wp_customize->add_control('advisory_servicestitle',array(	
		'type' => 'text',
		'label' => __('write services title here','advisory'),
		'section' => 'advisory_3circle_servicessection',
		'setting' => 'advisory_servicestitle'
	)); //write services title here
	
	
	$wp_customize->add_setting('advisory_servicesbutton',array(
		'default' => null,
		'sanitize_callback' => 'sanitize_text_field'	
	));
	
	$wp_customize->add_control('advisory_servicesbutton',array(	
		'type' => 'text',
		'label' => __('enter services button here','advisory'),
		'section' => 'advisory_3circle_servicessection',
		'setting' => 'advisory_servicesbutton'
	)); //write services title here
	
	
	$wp_customize->add_setting('advisory_titlelink',array(
		'default' => null,
		'sanitize_callback' => 'esc_url_raw'
	));
	
	$wp_customize->add_control('advisory_titlelink',array(
		'label' => __('Add services button link here','advisory'),
		'section' => 'advisory_3circle_servicessection',
		'setting' => 'advisory_titlelink'
	));
	
	
	$wp_customize->add_setting('advisory_3circlepge1',array(
		'default' => '0',			
		'capability' => 'edit_theme_options',
		'sanitize_callback' => 'advisory_sanitize_dropdown_pages'
	));
 
	$wp_customize->add_control(	'advisory_3circlepge1',array(
		'type' => 'dropdown-pages',			
		'section' => 'advisory_3circle_servicessection',
	));		
	
	$wp_customize->add_setting('advisory_3circlepge2',array(
		'default' => '0',			
		'capability' => 'edit_theme_options',
		'sanitize_callback' => 'advisory_sanitize_dropdown_pages'
	));
 
	$wp_customize->add_control(	'advisory_3circlepge2',array(
		'type' => 'dropdown-pages',			
		'section' => 'advisory_3circle_servicessection',
	));
	
	$wp_customize->add_setting('advisory_3circlepge3',array(
		'default' => '0',			
		'capability' => 'edit_theme_options',
		'sanitize_callback' => 'advisory_sanitize_dropdown_pages'
	));
 
	$wp_customize->add_control(	'advisory_3circlepge3',array(
		'type' => 'dropdown-pages',			
		'section' => 'advisory_3circle_servicessection',
	));	
	
	$wp_customize->add_setting('advisory_show_3circle_servicessection',array(
		'default' => false,
		'sanitize_callback' => 'advisory_sanitize_checkbox',
		'capability' => 'edit_theme_options',
	));	 
	
	
	$wp_customize->add_control( 'advisory_show_3circle_servicessection', array(
	   'settings' => 'advisory_show_3circle_servicessection',
	   'section'   => 'advisory_3circle_servicessection',
	   'label'     => __('Check To Show This Section','advisory'),
	   'type'      => 'checkbox'
	 ));//Show 3 circle services sections
	 
	 
	 //Welcome page section
	$wp_customize->add_section('advisory_themewelomesection', array(
		'title' => __('Welcome Section','advisory'),
		'description' => __('Select Pages from the dropdown for welcome section','advisory'),
		'priority' => null,
		'panel' => 	'advisory_themepanelarea',          
	));	
	
	$wp_customize->add_setting('advisory_welcome_subtitle',array(
		'default' => null,
		'sanitize_callback' => 'sanitize_text_field'	
	));
	
	$wp_customize->add_control('advisory_welcome_subtitle',array(	
		'type' => 'text',
		'label' => __('write welcome page sub title here','advisory'),
		'section' => 'advisory_themewelomesection',
		'setting' => 'advisory_welcome_subtitle'
	)); //write welcome sub title here	
	
	$wp_customize->add_setting('advisory_onlyonewelcome',array(
		'default' => '0',			
		'capability' => 'edit_theme_options',
		'sanitize_callback' => 'advisory_sanitize_dropdown_pages'
	));
 
	$wp_customize->add_control(	'advisory_onlyonewelcome',array(
		'type' => 'dropdown-pages',			
		'section' => 'advisory_themewelomesection',
	));		
	
	$wp_customize->add_setting('advisory_show_themewelomesection',array(
		'default' => false,
		'sanitize_callback' => 'advisory_sanitize_checkbox',
		'capability' => 'edit_theme_options',
	));	 
	
	$wp_customize->add_control( 'advisory_show_themewelomesection', array(
	    'settings' => 'advisory_show_themewelomesection',
	    'section'   => 'advisory_themewelomesection',
	    'label'     => __('Check To Show This Section','advisory'),
	    'type'      => 'checkbox'
	));//Show Welcome sections
	 
 
	//Sidebar Settings
	$wp_customize->add_section('advisory_themesidebar_setting', array(
		'title' => __('Sidebar Settings','advisory'),		
		'priority' => null,
		'panel' => 	'advisory_themepanelarea',          
	));	
	
	$wp_customize->add_setting('advisory_nosidebar_frontpge',array(
		'default' => false,
		'sanitize_callback' => 'advisory_sanitize_checkbox',
		'capability' => 'edit_theme_options',
	));	 
	
	$wp_customize->add_control( 'advisory_nosidebar_frontpge', array(
	   'settings' => 'advisory_nosidebar_frontpge',
	   'section'   => 'advisory_themesidebar_setting',
	   'label'     => __('Check to hide sidebar from latest post page','advisory'),
	   'type'      => 'checkbox'
	 ));// Hide sidebar from latest post page
	 
	$wp_customize->add_setting('advisory_nosidebar_withgrid',array(
		'default' => false,
		'sanitize_callback' => 'advisory_sanitize_checkbox',
		'capability' => 'edit_theme_options',
	));	 
	
	$wp_customize->add_control( 'advisory_nosidebar_withgrid', array(
	   'settings' => 'advisory_nosidebar_withgrid',
	   'section'   => 'advisory_themesidebar_setting',
	   'label'     => __('Check to show grid type post without sidebar','advisory'),
	   'type'      => 'checkbox'
	 ));// grid type posts with sidebar 
	
	
	 $wp_customize->add_setting('advisory_gridtypepostwithsidebar',array(
		'default' => false,
		'sanitize_callback' => 'advisory_sanitize_checkbox',
		'capability' => 'edit_theme_options',
	));	 
	
	$wp_customize->add_control( 'advisory_gridtypepostwithsidebar', array(
	   'settings' => 'advisory_gridtypepostwithsidebar',
	   'section'   => 'advisory_themesidebar_setting',
	   'label'     => __('Check to show grid type post with sidebar','advisory'),
	   'type'      => 'checkbox'
	 ));// grid type posts with sidebar
	 
	 
	 $wp_customize->add_setting('advisory_hidesidebar_singlepost',array(
		'default' => false,
		'sanitize_callback' => 'advisory_sanitize_checkbox',
		'capability' => 'edit_theme_options',
	));	 
	
	$wp_customize->add_control( 'advisory_hidesidebar_singlepost', array(
	   'settings' => 'advisory_hidesidebar_singlepost',
	   'section'   => 'advisory_themesidebar_setting',
	   'label'     => __('Check to hide sidebar from single post','advisory'),
	   'type'      => 'checkbox'
	 ));// hide sidebar single post	 

		 
}
add_action( 'customize_register', 'advisory_customize_register' );

function advisory_custom_css(){ 
?>
	<style type="text/css"> 					
        a, .articledefault h2 a:hover,
        #sidebar ul li a:hover,						
        .articledefault h3 a:hover,		
        .postmeta a:hover,		
		.header-menubar .menu a:hover,
		.header-menubar .menu a:focus,
		.header-menubar .menu ul a:hover,
		.header-menubar .menu ul a:focus,
		.header-menubar ul li a:hover, 
		.header-menubar ul li.current-menu-item a,
		.header-menubar ul li.current-menu-parent a.parent,
		.header-menubar ul li.current-menu-item ul.sub-menu li a:hover,		 			
        .button:hover,
		h4.sub_title,		
		h2.services_title span,		
		.blog_postmeta a:hover,
		.blog_postmeta a:focus,		
		.site-footer ul li::before,
		.menu_fter ul li a:hover, 
		.menu_fter ul li.current_page_item a,
		blockquote::before	
            { color:<?php echo esc_html( get_theme_mod('advisory_color1clickoptions','#f34a4b')); ?>;}					 
            
        .pagination ul li .current, .pagination ul li a:hover, 
        #commentform input#submit:hover,		
        .nivo-controlNav a.active,
		.sd-search input, .sd-top-bar-nav .sd-search input,			
		a.blogreadmore,	
		.logo,
		.logo:before,
		.nivo-caption .buttonforslider:hover,
		.learnmore:hover,		
		.copyrigh-wrapper:before,										
        #sidebar .search-form input.search-submit,				
        .wpcf7 input[type='submit'],				
        nav.pagination .page-numbers.current,		
		.blogreadbtn,	
		.nivo-directionNav a:hover,	
        .toggle a,
		.WelcomeIMGBX-45:after,
		.circle3pageBox .smallthumbbox:hover		
            { background-color:<?php echo esc_html( get_theme_mod('advisory_color1clickoptions','#f34a4b')); ?>;}
			
		
		.tagcloud a:hover,				
		h3.widget-title::after,
		blockquote
            { border-color:<?php echo esc_html( get_theme_mod('advisory_color1clickoptions','#f34a4b')); ?>;}			
			
		 button:focus,
		input[type="button"]:focus,
		input[type="reset"]:focus,
		input[type="submit"]:focus,
		input[type="text"]:focus,
		input[type="email"]:focus,
		input[type="url"]:focus,
		input[type="password"]:focus,
		input[type="search"]:focus,
		input[type="number"]:focus,
		input[type="tel"]:focus,
		input[type="range"]:focus,
		input[type="date"]:focus,
		input[type="month"]:focus,
		input[type="week"]:focus,
		input[type="time"]:focus,
		input[type="datetime"]:focus,
		input[type="datetime-local"]:focus,
		input[type="color"]:focus,
		textarea:focus,
		#themegripper a:focus
            { outline:thin dotted <?php echo esc_html( get_theme_mod('advisory_color1clickoptions','#f34a4b')); ?>;}				
							
	
    </style> 
<?php                                                                                                                    
}
         
add_action('wp_head','advisory_custom_css');	 

/**
 * Binds JS handlers to make Theme Customizer preview reload changes asynchronously.
 */
function advisory_customize_preview_js() {
	wp_enqueue_script( 'advisory_customizer', get_template_directory_uri() . '/js/customize-preview.js', array( 'customize-preview' ), '19062019', true );
}
add_action( 'customize_preview_init', 'advisory_customize_preview_js' );