<?php
/**
 * VW Personal Trainer Theme Customizer
 *
 * @package VW Personal Trainer
 */

/**
 * Add postMessage support for site title and description for the Theme Customizer.
 *
 * @param WP_Customize_Manager $wp_customize Theme Customizer object.
 */
function vw_personal_trainer_custom_controls() {

    load_template( trailingslashit( get_template_directory() ) . '/inc/custom-controls.php' );
}
add_action( 'customize_register', 'vw_personal_trainer_custom_controls' );

function vw_personal_trainer_customize_register( $wp_customize ) {

	load_template( trailingslashit( get_template_directory() ) . 'inc/customize-homepage/class-customize-homepage.php' );

	load_template( trailingslashit( get_template_directory() ) . '/inc/icon-picker.php' );

	$wp_customize->get_setting( 'blogname' )->transport = 'postMessage'; 
	$wp_customize->get_setting( 'blogdescription' )->transport = 'postMessage';

	//Selective Refresh
	$wp_customize->selective_refresh->add_partial( 'blogname', array( 
		'selector' => '.logo .site-title a', 
	 	'render_callback' => 'vw_personal_trainer_customize_partial_blogname', 
	)); 

	$wp_customize->selective_refresh->add_partial( 'blogdescription', array( 
		'selector' => 'p.site-description', 
		'render_callback' => 'vw_personal_trainer_customize_partial_blogdescription', 
	));

	//add home page setting pannel
	$VWPersonalTrainerParentPanel = new VW_Personal_Trainer_WP_Customize_Panel( $wp_customize, 'vw_personal_trainer_panel_id', array(
		'capability' => 'edit_theme_options',
		'theme_supports' => '',
		'title' => 'VW Settings',
		'priority' => 10,
	));

	// Layout
	$wp_customize->add_section( 'vw_personal_trainer_left_right', array(
    	'title'      => __( 'General Settings', 'vw-personal-trainer' ),
		'panel' => 'vw_personal_trainer_panel_id'
	) );

	$wp_customize->add_setting('vw_personal_trainer_width_option',array(
        'default' => __('Full Width','vw-personal-trainer'),
        'sanitize_callback' => 'vw_personal_trainer_sanitize_choices'
	));
	$wp_customize->add_control(new VW_Personal_Trainer_Image_Radio_Control($wp_customize, 'vw_personal_trainer_width_option', array(
        'type' => 'select',
        'label' => __('Width Layouts','vw-personal-trainer'),
        'description' => __('Here you can change the width layout of Website.','vw-personal-trainer'),
        'section' => 'vw_personal_trainer_left_right',
        'choices' => array(
            'Full Width' => get_template_directory_uri().'/assets/images/full-width.png',
            'Wide Width' => get_template_directory_uri().'/assets/images/wide-width.png',
            'Boxed' => get_template_directory_uri().'/assets/images/boxed-width.png',
    ))));

	// Add Settings and Controls for Layout
	$wp_customize->add_setting('vw_personal_trainer_theme_options',array(
        'default' => __('Right Sidebar','vw-personal-trainer'),
        'sanitize_callback' => 'vw_personal_trainer_sanitize_choices'	        
	) );
	$wp_customize->add_control('vw_personal_trainer_theme_options', array(
        'type' => 'select',
        'label' => __('Post Sidebar Layout','vw-personal-trainer'),
        'description' => __('Here you can change the sidebar layout for posts. ','vw-personal-trainer'),
        'section' => 'vw_personal_trainer_left_right',
        'choices' => array(
            'Left Sidebar' => __('Left Sidebar','vw-personal-trainer'),
            'Right Sidebar' => __('Right Sidebar','vw-personal-trainer'),
            'One Column' => __('One Column','vw-personal-trainer'),
            'Three Columns' => __('Three Columns','vw-personal-trainer'),
            'Four Columns' => __('Four Columns','vw-personal-trainer'),
            'Grid Layout' => __('Grid Layout','vw-personal-trainer')
        ),
	));

	$wp_customize->add_setting('vw_personal_trainer_page_layout',array(
        'default' => __('One Column','vw-personal-trainer'),
        'sanitize_callback' => 'vw_personal_trainer_sanitize_choices'
	));
	$wp_customize->add_control('vw_personal_trainer_page_layout',array(
        'type' => 'select',
        'label' => __('Page Sidebar Layout','vw-personal-trainer'),
        'description' => __('Here you can change the sidebar layout for pages. ','vw-personal-trainer'),
        'section' => 'vw_personal_trainer_left_right',
        'choices' => array(
            'Left Sidebar' => __('Left Sidebar','vw-personal-trainer'),
            'Right Sidebar' => __('Right Sidebar','vw-personal-trainer'),
            'One Column' => __('One Column','vw-personal-trainer')
        ),
	) );

	//Pre-Loader
	$wp_customize->add_setting( 'vw_personal_trainer_loader_enable',array(
        'default' => 1,
        'transport' => 'refresh',
        'sanitize_callback' => 'vw_personal_trainer_switch_sanitization'
    ) );
    $wp_customize->add_control( new VW_Personal_Trainer_Toggle_Switch_Custom_Control( $wp_customize, 'vw_personal_trainer_loader_enable',array(
        'label' => esc_html__( 'Pre-Loader','vw-personal-trainer' ),
        'section' => 'vw_personal_trainer_left_right'
    )));

	$wp_customize->add_setting('vw_personal_trainer_loader_icon',array(
        'default' => __('Two Way','vw-personal-trainer'),
        'sanitize_callback' => 'vw_personal_trainer_sanitize_choices'
	));
	$wp_customize->add_control('vw_personal_trainer_loader_icon',array(
        'type' => 'select',
        'label' => __('Pre-Loader Type','vw-personal-trainer'),
        'section' => 'vw_personal_trainer_left_right',
        'choices' => array(
            'Two Way' => __('Two Way','vw-personal-trainer'),
            'Dots' => __('Dots','vw-personal-trainer'),
            'Rotate' => __('Rotate','vw-personal-trainer')
        ),
	) );

	//Topbar
	$wp_customize->add_section( 'vw_personal_trainer_topbar', array(
    	'title'      => __( 'Topbar Settings', 'vw-personal-trainer' ),
		'panel' => 'vw_personal_trainer_panel_id'
	) );

	$wp_customize->add_setting( 'vw_personal_trainer_topbar_hide_show',array(
		'default' => 1,
		'transport' => 'refresh',
		'sanitize_callback' => 'vw_personal_trainer_switch_sanitization'
    ));  
    $wp_customize->add_control( new VW_Personal_Trainer_Toggle_Switch_Custom_Control( $wp_customize, 'vw_personal_trainer_topbar_hide_show',array(
		'label' => esc_html__( 'Show / Hide Topbar','vw-personal-trainer' ),
		'section' => 'vw_personal_trainer_topbar'
    )));

    $wp_customize->add_setting('vw_personal_trainer_topbar_padding_top_bottom',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('vw_personal_trainer_topbar_padding_top_bottom',array(
		'label'	=> __('Topbar Padding Top Bottom','vw-personal-trainer'),
		'description'	=> __('Enter a value in pixels. Example:20px','vw-personal-trainer'),
		'input_attrs' => array(
            'placeholder' => __( '10px', 'vw-personal-trainer' ),
        ),
		'section'=> 'vw_personal_trainer_topbar',
		'type'=> 'text'
	));

    //Sticky Header
	$wp_customize->add_setting( 'vw_personal_trainer_sticky_header',array(
        'default' => 0,
        'transport' => 'refresh',
        'sanitize_callback' => 'vw_personal_trainer_switch_sanitization'
    ) );
    $wp_customize->add_control( new VW_Personal_Trainer_Toggle_Switch_Custom_Control( $wp_customize, 'vw_personal_trainer_sticky_header',array(
        'label' => esc_html__( 'Sticky Header','vw-personal-trainer' ),
        'section' => 'vw_personal_trainer_topbar'
    )));

    $wp_customize->add_setting('vw_personal_trainer_sticky_header_padding',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('vw_personal_trainer_sticky_header_padding',array(
		'label'	=> __('Sticky Header Padding','vw-personal-trainer'),
		'description'	=> __('Enter a value in pixels. Example:20px','vw-personal-trainer'),
		'input_attrs' => array(
            'placeholder' => __( '10px', 'vw-personal-trainer' ),
        ),
		'section'=> 'vw_personal_trainer_topbar',
		'type'=> 'text'
	));

	$wp_customize->add_setting( 'vw_personal_trainer_search_hide_show',array(
		'default' => 1,
		'transport' => 'refresh',
		'sanitize_callback' => 'vw_personal_trainer_switch_sanitization'
    ));  
    $wp_customize->add_control( new VW_Personal_Trainer_Toggle_Switch_Custom_Control( $wp_customize, 'vw_personal_trainer_search_hide_show',array(
		'label' => esc_html__( 'Show / Hide Search','vw-personal-trainer' ),
		'section' => 'vw_personal_trainer_topbar'
    )));

    $wp_customize->add_setting('vw_personal_trainer_search_font_size',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('vw_personal_trainer_search_font_size',array(
		'label'	=> __('Search Font Size','vw-personal-trainer'),
		'description'	=> __('Enter a value in pixels. Example:20px','vw-personal-trainer'),
		'input_attrs' => array(
            'placeholder' => __( '10px', 'vw-personal-trainer' ),
        ),
		'section'=> 'vw_personal_trainer_topbar',
		'type'=> 'text'
	));

	//Selective Refresh
	$wp_customize->selective_refresh->add_partial('vw_personal_trainer_call_text', array( 
		'selector' => '.main-header h6', 
		'render_callback' => 'vw_personal_trainer_customize_partial_vw_personal_trainer_call_text', 
	));

    $wp_customize->add_setting('vw_personal_trainer_phone_number_icon',array(
		'default'	=> 'fas fa-phone',
		'sanitize_callback'	=> 'sanitize_text_field'
	));	
	$wp_customize->add_control(new VW_Personal_Trainer_Fontawesome_Icon_Chooser(
        $wp_customize,'vw_personal_trainer_phone_number_icon',array(
		'label'	=> __('Add Phone Number Icon','vw-personal-trainer'),
		'transport' => 'refresh',
		'section'	=> 'vw_personal_trainer_topbar',
		'setting'	=> 'vw_personal_trainer_phone_number_icon',
		'type'		=> 'icon'
	)));

	$wp_customize->add_setting('vw_personal_trainer_call_text',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('vw_personal_trainer_call_text',array(
		'label'	=> __('Add Phone Text','vw-personal-trainer'),
		'input_attrs' => array(
            'placeholder' => __( 'PHONE', 'vw-personal-trainer' ),
        ),
		'section'=> 'vw_personal_trainer_topbar',
		'type'=> 'text'
	));

	$wp_customize->add_setting('vw_personal_trainer_call',array(
		'default'=> '',
		'sanitize_callback'	=> 'vw_personal_trainer_sanitize_phone_number'
	));
	$wp_customize->add_control('vw_personal_trainer_call',array(
		'label'	=> __('Add Phone Number','vw-personal-trainer'),
		'input_attrs' => array(
            'placeholder' => __( '+00 987 654 1230', 'vw-personal-trainer' ),
        ),
		'section'=> 'vw_personal_trainer_topbar',
		'type'=> 'text'
	));

	$wp_customize->add_setting('vw_personal_trainer_email_icon',array(
		'default'	=> 'far fa-envelope',
		'sanitize_callback'	=> 'sanitize_text_field'
	));	
	$wp_customize->add_control(new VW_Personal_Trainer_Fontawesome_Icon_Chooser(
        $wp_customize,'vw_personal_trainer_email_icon',array(
		'label'	=> __('Add Email Icon','vw-personal-trainer'),
		'transport' => 'refresh',
		'section'	=> 'vw_personal_trainer_topbar',
		'setting'	=> 'vw_personal_trainer_email_icon',
		'type'		=> 'icon'
	)));

	$wp_customize->add_setting('vw_personal_trainer_email_text',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('vw_personal_trainer_email_text',array(
		'label'	=> __('Add Email Text','vw-personal-trainer'),
		'input_attrs' => array(
            'placeholder' => __( 'EMAIL', 'vw-personal-trainer' ),
        ),
		'section'=> 'vw_personal_trainer_topbar',
		'type'=> 'text'
	));

	$wp_customize->add_setting('vw_personal_trainer_email',array(
		'default'=> '',
		'sanitize_callback'	=> 'vw_personal_trainer_sanitize_email'
	));
	$wp_customize->add_control('vw_personal_trainer_email',array(
		'label'	=> __('Add Email Address','vw-personal-trainer'),
		'input_attrs' => array(
            'placeholder' => __( 'example@gmail.com', 'vw-personal-trainer' ),
        ),
		'section'=> 'vw_personal_trainer_topbar',
		'type'=> 'text'
	));

	$wp_customize->add_setting('vw_personal_trainer_timing_icon',array(
		'default'	=> 'far fa-clock',
		'sanitize_callback'	=> 'sanitize_text_field'
	));	
	$wp_customize->add_control(new VW_Personal_Trainer_Fontawesome_Icon_Chooser(
        $wp_customize,'vw_personal_trainer_timing_icon',array(
		'label'	=> __('Add Timing Icon','vw-personal-trainer'),
		'transport' => 'refresh',
		'section'	=> 'vw_personal_trainer_topbar',
		'setting'	=> 'vw_personal_trainer_timing_icon',
		'type'		=> 'icon'
	)));

	//Selective Refresh
	$wp_customize->selective_refresh->add_partial('vw_personal_trainer_opening_time', array( 
		'selector' => '#topbar span', 
		'render_callback' => 'vw_personal_trainer_customize_partial_vw_personal_trainer_opening_time', 
	));

	$wp_customize->add_setting('vw_personal_trainer_opening_time',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('vw_personal_trainer_opening_time',array(
		'label'	=> __('Add Open Timming','vw-personal-trainer'),
		'input_attrs' => array(
            'placeholder' => __( 'Mon to Fri 8:00am - 9:00pm ', 'vw-personal-trainer' ),
        ),
		'section'=> 'vw_personal_trainer_topbar',
		'type'=> 'text'
	));

	//Slider
	$wp_customize->add_section( 'vw_personal_trainer_slidersettings' , array(
    	'title'      => __( 'Slider Section', 'vw-personal-trainer' ),
		'panel' => 'vw_personal_trainer_panel_id'
	) );

	$wp_customize->add_setting( 'vw_personal_trainer_slider_hide_show',array(
      'default' => 0,
      'transport' => 'refresh',
      'sanitize_callback' => 'vw_personal_trainer_switch_sanitization'
    ));  
    $wp_customize->add_control( new VW_Personal_Trainer_Toggle_Switch_Custom_Control( $wp_customize, 'vw_personal_trainer_slider_hide_show',array(
      'label' => esc_html__( 'Show / Hide Slider','vw-personal-trainer' ),
      'section' => 'vw_personal_trainer_slidersettings'
    )));

     //Selective Refresh
    $wp_customize->selective_refresh->add_partial('vw_personal_trainer_slider_hide_show',array(
		'selector'        => '#slider .inner_carousel h1',
		'render_callback' => 'vw_personal_trainer_customize_partial_vw_personal_trainer_slider_hide_show',
	));

	for ( $count = 1; $count <= 4; $count++ ) {
		$wp_customize->add_setting( 'vw_personal_trainer_slider_page' . $count, array(
			'default'           => '',
			'sanitize_callback' => 'vw_personal_trainer_sanitize_dropdown_pages'
		) );
		$wp_customize->add_control( 'vw_personal_trainer_slider_page' . $count, array(
			'label'    => __( 'Select Slider Page', 'vw-personal-trainer' ),
			'description' => __('Slider image size (1500 x 590)','vw-personal-trainer'),
			'section'  => 'vw_personal_trainer_slidersettings',
			'type'     => 'dropdown-pages'
		) );
	}

	$wp_customize->add_setting('vw_personal_trainer_slider_button_text',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('vw_personal_trainer_slider_button_text',array(
		'label'	=> __('Add Slider Button Text','vw-personal-trainer'),
		'input_attrs' => array(
            'placeholder' => __( 'READ MORE', 'vw-personal-trainer' ),
        ),
		'section'=> 'vw_personal_trainer_slidersettings',
		'type'=> 'text'
	));

	$wp_customize->add_setting('vw_personal_trainer_slider_button_icon',array(
		'default'	=> 'fa fa-angle-right',
		'sanitize_callback'	=> 'sanitize_text_field'
	));	
	$wp_customize->add_control(new VW_Personal_Trainer_Fontawesome_Icon_Chooser(
        $wp_customize,'vw_personal_trainer_slider_button_icon',array(
		'label'	=> __('Add Slider Button Icon','vw-personal-trainer'),
		'transport' => 'refresh',
		'section'	=> 'vw_personal_trainer_slidersettings',
		'setting'	=> 'vw_personal_trainer_slider_button_icon',
		'type'		=> 'icon'
	)));

	//content layout
	$wp_customize->add_setting('vw_personal_trainer_slider_content_option',array(
        'default' => __('Center','vw-personal-trainer'),
        'sanitize_callback' => 'vw_personal_trainer_sanitize_choices'
	));
	$wp_customize->add_control(new VW_Personal_Trainer_Image_Radio_Control($wp_customize, 'vw_personal_trainer_slider_content_option', array(
        'type' => 'select',
        'label' => __('Slider Content Layouts','vw-personal-trainer'),
        'section' => 'vw_personal_trainer_slidersettings',
        'choices' => array(
            'Left' => get_template_directory_uri().'/assets/images/slider-content1.png',
            'Center' => get_template_directory_uri().'/assets/images/slider-content2.png',
            'Right' => get_template_directory_uri().'/assets/images/slider-content3.png',
    ))));

    //Slider excerpt
	$wp_customize->add_setting( 'vw_personal_trainer_slider_excerpt_number', array(
		'default'              => 30,
		'transport' 		   => 'refresh',
		'sanitize_callback'    => 'vw_personal_trainer_sanitize_number_range'
	) );
	$wp_customize->add_control( 'vw_personal_trainer_slider_excerpt_number', array(
		'label'       => esc_html__( 'Slider Excerpt length','vw-personal-trainer' ),
		'section'     => 'vw_personal_trainer_slidersettings',
		'type'        => 'range',
		'settings'    => 'vw_personal_trainer_slider_excerpt_number',
		'input_attrs' => array(
			'step'             => 5,
			'min'              => 0,
			'max'              => 50,
		),
	) );

	//Opacity
	$wp_customize->add_setting('vw_personal_trainer_slider_opacity_color',array(
      'default'              => 0.5,
      'sanitize_callback' => 'vw_personal_trainer_sanitize_choices'
	));

	$wp_customize->add_control( 'vw_personal_trainer_slider_opacity_color', array(
	'label'       => esc_html__( 'Slider Image Opacity','vw-personal-trainer' ),
	'section'     => 'vw_personal_trainer_slidersettings',
	'type'        => 'select',
	'settings'    => 'vw_personal_trainer_slider_opacity_color',
	'choices' => array(
      '0' =>  esc_attr('0','vw-personal-trainer'),
      '0.1' =>  esc_attr('0.1','vw-personal-trainer'),
      '0.2' =>  esc_attr('0.2','vw-personal-trainer'),
      '0.3' =>  esc_attr('0.3','vw-personal-trainer'),
      '0.4' =>  esc_attr('0.4','vw-personal-trainer'),
      '0.5' =>  esc_attr('0.5','vw-personal-trainer'),
      '0.6' =>  esc_attr('0.6','vw-personal-trainer'),
      '0.7' =>  esc_attr('0.7','vw-personal-trainer'),
      '0.8' =>  esc_attr('0.8','vw-personal-trainer'),
      '0.9' =>  esc_attr('0.9','vw-personal-trainer')
	),
	));

	//Slider height
	$wp_customize->add_setting('vw_personal_trainer_slider_height',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('vw_personal_trainer_slider_height',array(
		'label'	=> __('Slider Height','vw-personal-trainer'),
		'description'	=> __('Specify the slider height (px).','vw-personal-trainer'),
		'input_attrs' => array(
            'placeholder' => __( '500px', 'vw-personal-trainer' ),
        ),
		'section'=> 'vw_personal_trainer_slidersettings',
		'type'=> 'text'
	));

	$wp_customize->add_setting( 'vw_personal_trainer_slider_speed', array(
		'default'  => 3000,
		'sanitize_callback'	=> 'vw_personal_trainer_sanitize_float'
	) );
	$wp_customize->add_control( 'vw_personal_trainer_slider_speed', array(
		'label' => esc_html__('Slider Transition Speed','vw-personal-trainer'),
		'section' => 'vw_personal_trainer_slidersettings',
		'type'  => 'number',
	) );
    
	//Popular Courses section
	$wp_customize->add_section( 'vw_personal_trainer_best_services_section' , array(
    	'title'      => __( 'Popular Courses', 'vw-personal-trainer' ),
		'priority'   => null,
		'panel' => 'vw_personal_trainer_panel_id'
	) );

	//Selective Refresh
	$wp_customize->selective_refresh->add_partial( 'vw_personal_trainer_section_title', array( 
		'selector' => '#serv-section h2', 
		'render_callback' => 'vw_personal_trainer_customize_partial_vw_personal_trainer_section_title',
	));

	$wp_customize->add_setting('vw_personal_trainer_section_title',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('vw_personal_trainer_section_title',array(
		'label'	=> __('Add Section Title','vw-personal-trainer'),
		'input_attrs' => array(
            'placeholder' => __( 'POPULAR COURSES', 'vw-personal-trainer' ),
        ),
		'section'=> 'vw_personal_trainer_best_services_section',
		'type'=> 'text'
	));

	$categories = get_categories();
	$cat_post = array();
	$cat_post[]= 'select';
	$i = 0;	
	foreach($categories as $category){
		if($i==0){
			$default = $category->slug;
			$i++;
		}
		$cat_post[$category->slug] = $category->name;
	}

	$wp_customize->add_setting('vw_personal_trainer_best_services',array(
		'default'	=> 'select',
		'sanitize_callback' => 'vw_personal_trainer_sanitize_choices',
	));
	$wp_customize->add_control('vw_personal_trainer_best_services',array(
		'type'    => 'select',
		'choices' => $cat_post,
		'label' => __('Select Category to display courses','vw-personal-trainer'),
		'description' => __('Image Size (533 x 333)','vw-personal-trainer'),
		'section' => 'vw_personal_trainer_best_services_section',
	));

	//Courses excerpt
	$wp_customize->add_setting( 'vw_personal_trainer_courses_excerpt_number', array(
		'default'              => 30,
		'transport' 		   => 'refresh',
		'sanitize_callback'    => 'vw_personal_trainer_sanitize_number_range'
	) );
	$wp_customize->add_control( 'vw_personal_trainer_courses_excerpt_number', array(
		'label'       => esc_html__( 'Courses Excerpt length','vw-personal-trainer' ),
		'section'     => 'vw_personal_trainer_best_services_section',
		'type'        => 'range',
		'settings'    => 'vw_personal_trainer_courses_excerpt_number',
		'input_attrs' => array(
			'step'             => 5,
			'min'              => 0,
			'max'              => 50,
		),
	) );

	$wp_customize->add_setting('vw_personal_trainer_courses_button_text',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('vw_personal_trainer_courses_button_text',array(
		'label'	=> __('Add Courses Button Text','vw-personal-trainer'),
		'input_attrs' => array(
            'placeholder' => __( 'READ MORE', 'vw-personal-trainer' ),
        ),
		'section'=> 'vw_personal_trainer_best_services_section',
		'type'=> 'text'
	));

	$wp_customize->add_setting('vw_personal_trainer_courses_btn_icon',array(
		'default'	=> 'fa fa-angle-right',
		'sanitize_callback'	=> 'sanitize_text_field'
	));	
	$wp_customize->add_control(new VW_Personal_Trainer_Fontawesome_Icon_Chooser(
        $wp_customize,'vw_personal_trainer_courses_btn_icon',array(
		'label'	=> __('Add Courses Button Icon','vw-personal-trainer'),
		'transport' => 'refresh',
		'section'	=> 'vw_personal_trainer_best_services_section',
		'setting'	=> 'vw_personal_trainer_courses_btn_icon',
		'type'		=> 'icon'
	)));

	//Blog Post
	$wp_customize->add_panel( $VWPersonalTrainerParentPanel );

	$BlogPostParentPanel = new VW_Personal_Trainer_WP_Customize_Panel( $wp_customize, 'blog_post_parent_panel', array(
		'title' => __( 'Blog Post Settings', 'vw-personal-trainer' ),
		'panel' => 'vw_personal_trainer_panel_id',
	));

	$wp_customize->add_panel( $BlogPostParentPanel );

	// Add example section and controls to the middle (second) panel
	$wp_customize->add_section( 'vw_personal_trainer_post_settings', array(
		'title' => __( 'Post Settings', 'vw-personal-trainer' ),
		'panel' => 'blog_post_parent_panel',
	));

	//Selective Refresh
	$wp_customize->selective_refresh->add_partial('vw_personal_trainer_toggle_postdate', array( 
		'selector' => '.post-main-box h2 a', 
		'render_callback' => 'vw_personal_trainer_customize_partial_vw_personal_trainer_toggle_postdate', 
	));

	$wp_customize->add_setting( 'vw_personal_trainer_toggle_postdate',array(
        'default' => 1,
        'transport' => 'refresh',
        'sanitize_callback' => 'vw_personal_trainer_switch_sanitization'
    ) );
    $wp_customize->add_control( new VW_Personal_Trainer_Toggle_Switch_Custom_Control( $wp_customize, 'vw_personal_trainer_toggle_postdate',array(
        'label' => esc_html__( 'Post Date','vw-personal-trainer' ),
        'section' => 'vw_personal_trainer_post_settings'
    )));

    $wp_customize->add_setting( 'vw_personal_trainer_toggle_author',array(
		'default' => 1,
		'transport' => 'refresh',
		'sanitize_callback' => 'vw_personal_trainer_switch_sanitization'
    ) );
    $wp_customize->add_control( new VW_Personal_Trainer_Toggle_Switch_Custom_Control( $wp_customize, 'vw_personal_trainer_toggle_author',array(
		'label' => esc_html__( 'Author','vw-personal-trainer' ),
		'section' => 'vw_personal_trainer_post_settings'
    )));

    $wp_customize->add_setting( 'vw_personal_trainer_toggle_comments',array(
		'default' => 1,
		'transport' => 'refresh',
		'sanitize_callback' => 'vw_personal_trainer_switch_sanitization'
    ) );
    $wp_customize->add_control( new VW_Personal_Trainer_Toggle_Switch_Custom_Control( $wp_customize, 'vw_personal_trainer_toggle_comments',array(
		'label' => esc_html__( 'Comments','vw-personal-trainer' ),
		'section' => 'vw_personal_trainer_post_settings'
    )));

    $wp_customize->add_setting( 'vw_personal_trainer_toggle_tags',array(
		'default' => 1,
		'transport' => 'refresh',
		'sanitize_callback' => 'vw_personal_trainer_switch_sanitization'
	));
    $wp_customize->add_control( new VW_Personal_Trainer_Toggle_Switch_Custom_Control( $wp_customize, 'vw_personal_trainer_toggle_tags', array(
		'label' => esc_html__( 'Tags','vw-personal-trainer' ),
		'section' => 'vw_personal_trainer_post_settings'
    )));

    $wp_customize->add_setting( 'vw_personal_trainer_excerpt_number', array(
		'default'              => 30,
		'transport' 		   => 'refresh',
		'sanitize_callback'    => 'vw_personal_trainer_sanitize_number_range'
	) );
	$wp_customize->add_control( 'vw_personal_trainer_excerpt_number', array(
		'label'       => esc_html__( 'Excerpt length','vw-personal-trainer' ),
		'section'     => 'vw_personal_trainer_post_settings',
		'type'        => 'range',
		'settings'    => 'vw_personal_trainer_excerpt_number',
		'input_attrs' => array(
			'step'             => 5,
			'min'              => 0,
			'max'              => 50,
		),
	) );

	//Blog layout
    $wp_customize->add_setting('vw_personal_trainer_blog_layout_option',array(
        'default' => __('Default','vw-personal-trainer'),
        'sanitize_callback' => 'vw_personal_trainer_sanitize_choices'
    ));
    $wp_customize->add_control(new VW_Personal_Trainer_Image_Radio_Control($wp_customize, 'vw_personal_trainer_blog_layout_option', array(
        'type' => 'select',
        'label' => __('Blog Layouts','vw-personal-trainer'),
        'section' => 'vw_personal_trainer_post_settings',
        'choices' => array(
            'Default' => get_template_directory_uri().'/assets/images/blog-layout1.png',
            'Center' => get_template_directory_uri().'/assets/images/blog-layout2.png',
            'Left' => get_template_directory_uri().'/assets/images/blog-layout3.png',
    ))));

    $wp_customize->add_setting('vw_personal_trainer_excerpt_settings',array(
        'default' => __('Excerpt','vw-personal-trainer'),
        'transport' => 'refresh',
        'sanitize_callback' => 'vw_personal_trainer_sanitize_choices'
	));
	$wp_customize->add_control('vw_personal_trainer_excerpt_settings',array(
        'type' => 'select',
        'label' => __('Post Content','vw-personal-trainer'),
        'section' => 'vw_personal_trainer_post_settings',
        'choices' => array(
        	'Content' => __('Content','vw-personal-trainer'),
            'Excerpt' => __('Excerpt','vw-personal-trainer'),
            'No Content' => __('No Content','vw-personal-trainer')
        ),
	) );

	$wp_customize->add_setting('vw_personal_trainer_excerpt_suffix',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('vw_personal_trainer_excerpt_suffix',array(
		'label'	=> __('Add Excerpt Suffix','vw-personal-trainer'),
		'input_attrs' => array(
            'placeholder' => __( '[...]', 'vw-personal-trainer' ),
        ),
		'section'=> 'vw_personal_trainer_post_settings',
		'type'=> 'text'
	));

	$wp_customize->add_setting( 'vw_personal_trainer_blog_pagination_hide_show',array(
      'default' => 1,
      'transport' => 'refresh',
      'sanitize_callback' => 'vw_personal_trainer_switch_sanitization'
    ));  
    $wp_customize->add_control( new VW_Personal_Trainer_Toggle_Switch_Custom_Control( $wp_customize, 'vw_personal_trainer_blog_pagination_hide_show',array(
      'label' => esc_html__( 'Show / Hide Blog Pagination','vw-personal-trainer' ),
      'section' => 'vw_personal_trainer_post_settings'
    )));

	$wp_customize->add_setting( 'vw_personal_trainer_blog_pagination_type', array(
        'default'			=> 'blog-page-numbers',
        'sanitize_callback'	=> 'vw_personal_trainer_sanitize_choices'
    ));
    $wp_customize->add_control( 'vw_personal_trainer_blog_pagination_type', array(
        'section' => 'vw_personal_trainer_post_settings',
        'type' => 'select',
        'label' => __( 'Blog Pagination', 'vw-personal-trainer' ),
        'choices'		=> array(
            'blog-page-numbers'  => __( 'Numeric', 'vw-personal-trainer' ),
            'next-prev' => __( 'Older Posts/Newer Posts', 'vw-personal-trainer' ),
    )));

    // Button Settings
	$wp_customize->add_section( 'vw_personal_trainer_button_settings', array(
		'title' => __( 'Button Settings', 'vw-personal-trainer' ),
		'panel' => 'blog_post_parent_panel',
	));

	$wp_customize->add_setting('vw_personal_trainer_button_padding_top_bottom',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('vw_personal_trainer_button_padding_top_bottom',array(
		'label'	=> __('Padding Top Bottom','vw-personal-trainer'),
		'description'	=> __('Enter a value in pixels. Example:20px','vw-personal-trainer'),
		'input_attrs' => array(
            'placeholder' => __( '10px', 'vw-personal-trainer' ),
        ),
		'section'=> 'vw_personal_trainer_button_settings',
		'type'=> 'text'
	));

	$wp_customize->add_setting('vw_personal_trainer_button_padding_left_right',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('vw_personal_trainer_button_padding_left_right',array(
		'label'	=> __('Padding Left Right','vw-personal-trainer'),
		'description'	=> __('Enter a value in pixels. Example:20px','vw-personal-trainer'),
		'input_attrs' => array(
            'placeholder' => __( '10px', 'vw-personal-trainer' ),
        ),
		'section'=> 'vw_personal_trainer_button_settings',
		'type'=> 'text'
	));

	$wp_customize->add_setting( 'vw_personal_trainer_button_border_radius', array(
		'default'              => '',
		'transport' 		   => 'refresh',
		'sanitize_callback'    => 'vw_personal_trainer_sanitize_number_range'
	) );
	$wp_customize->add_control( 'vw_personal_trainer_button_border_radius', array(
		'label'       => esc_html__( 'Button Border Radius','vw-personal-trainer' ),
		'section'     => 'vw_personal_trainer_button_settings',
		'type'        => 'range',
		'input_attrs' => array(
			'step'             => 1,
			'min'              => 1,
			'max'              => 50,
		),
	) );

	//Selective Refresh
	$wp_customize->selective_refresh->add_partial('vw_personal_trainer_button_text', array( 
		'selector' => '.post-main-box .content-bttn a', 
		'render_callback' => 'vw_personal_trainer_customize_partial_vw_personal_trainer_button_text', 
	));

    $wp_customize->add_setting('vw_personal_trainer_button_text',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('vw_personal_trainer_button_text',array(
		'label'	=> __('Add Button Text','vw-personal-trainer'),
		'input_attrs' => array(
            'placeholder' => __( 'READ MORE', 'vw-personal-trainer' ),
        ),
		'section'=> 'vw_personal_trainer_button_settings',
		'type'=> 'text'
	));

	$wp_customize->add_setting('vw_personal_trainer_blog_button_icon',array(
		'default'	=> 'fa fa-angle-right',
		'sanitize_callback'	=> 'sanitize_text_field'
	));	
	$wp_customize->add_control(new VW_Personal_Trainer_Fontawesome_Icon_Chooser(
        $wp_customize,'vw_personal_trainer_blog_button_icon',array(
		'label'	=> __('Add Blog Button Icon','vw-personal-trainer'),
		'transport' => 'refresh',
		'section'	=> 'vw_personal_trainer_button_settings',
		'setting'	=> 'vw_personal_trainer_blog_button_icon',
		'type'		=> 'icon'
	)));

	// Related Post Settings
	$wp_customize->add_section( 'vw_personal_trainer_related_posts_settings', array(
		'title' => __( 'Related Posts Settings', 'vw-personal-trainer' ),
		'panel' => 'blog_post_parent_panel',
	));

	//Selective Refresh
	$wp_customize->selective_refresh->add_partial('vw_personal_trainer_related_post_title', array( 
		'selector' => '.related-post h3', 
		'render_callback' => 'vw_personal_trainer_customize_partial_vw_personal_trainer_related_post_title', 
	));

    $wp_customize->add_setting( 'vw_personal_trainer_related_post',array(
		'default' => 1,
		'transport' => 'refresh',
		'sanitize_callback' => 'vw_personal_trainer_switch_sanitization'
    ) );
    $wp_customize->add_control( new VW_Personal_Trainer_Toggle_Switch_Custom_Control( $wp_customize, 'vw_personal_trainer_related_post',array(
		'label' => esc_html__( 'Related Post','vw-personal-trainer' ),
		'section' => 'vw_personal_trainer_related_posts_settings'
    )));

    $wp_customize->add_setting('vw_personal_trainer_related_post_title',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('vw_personal_trainer_related_post_title',array(
		'label'	=> __('Add Related Post Title','vw-personal-trainer'),
		'input_attrs' => array(
            'placeholder' => __( 'Related Post', 'vw-personal-trainer' ),
        ),
		'section'=> 'vw_personal_trainer_related_posts_settings',
		'type'=> 'text'
	));

   	$wp_customize->add_setting('vw_personal_trainer_related_posts_count',array(
		'default'=> '3',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('vw_personal_trainer_related_posts_count',array(
		'label'	=> __('Add Related Post Count','vw-personal-trainer'),
		'input_attrs' => array(
            'placeholder' => __( '3', 'vw-personal-trainer' ),
        ),
		'section'=> 'vw_personal_trainer_related_posts_settings',
		'type'=> 'number'
	));

	// Single Posts Settings
	$wp_customize->add_section( 'vw_personal_trainer_single_blog_settings', array(
		'title' => __( 'Single Post Settings', 'vw-personal-trainer' ),
		'panel' => 'blog_post_parent_panel',
	));

	$wp_customize->add_setting( 'vw_personal_trainer_single_blog_post_navigation_show_hide',array(
		'default' => 1,
		'transport' => 'refresh',
		'sanitize_callback' => 'vw_personal_trainer_switch_sanitization'
	));
    $wp_customize->add_control( new VW_Personal_Trainer_Toggle_Switch_Custom_Control( $wp_customize, 'vw_personal_trainer_single_blog_post_navigation_show_hide', array(
		'label' => esc_html__( 'Post Navigation','vw-personal-trainer' ),
		'section' => 'vw_personal_trainer_single_blog_settings'
    )));

	//navigation text
	$wp_customize->add_setting('vw_personal_trainer_single_blog_prev_navigation_text',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('vw_personal_trainer_single_blog_prev_navigation_text',array(
		'label'	=> __('Post Navigation Text','vw-personal-trainer'),
		'input_attrs' => array(
            'placeholder' => __( 'PREVIOUS', 'vw-personal-trainer' ),
        ),
		'section'=> 'vw_personal_trainer_single_blog_settings',
		'type'=> 'text'
	));

	$wp_customize->add_setting('vw_personal_trainer_single_blog_next_navigation_text',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('vw_personal_trainer_single_blog_next_navigation_text',array(
		'label'	=> __('Post Navigation Text','vw-personal-trainer'),
		'input_attrs' => array(
            'placeholder' => __( 'NEXT', 'vw-personal-trainer' ),
        ),
		'section'=> 'vw_personal_trainer_single_blog_settings',
		'type'=> 'text'
	));

    //404 Page Setting
	$wp_customize->add_section('vw_personal_trainer_404_page',array(
		'title'	=> __('404 Page Settings','vw-personal-trainer'),
		'panel' => 'vw_personal_trainer_panel_id',
	));	

	$wp_customize->add_setting('vw_personal_trainer_404_page_title',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));

	$wp_customize->add_control('vw_personal_trainer_404_page_title',array(
		'label'	=> __('Add Title','vw-personal-trainer'),
		'input_attrs' => array(
            'placeholder' => __( '404 Not Found', 'vw-personal-trainer' ),
        ),
		'section'=> 'vw_personal_trainer_404_page',
		'type'=> 'text'
	));

	$wp_customize->add_setting('vw_personal_trainer_404_page_content',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));

	$wp_customize->add_control('vw_personal_trainer_404_page_content',array(
		'label'	=> __('Add Text','vw-personal-trainer'),
		'input_attrs' => array(
            'placeholder' => __( 'Looks like you have taken a wrong turn, Dont worry, it happens to the best of us.', 'vw-personal-trainer' ),
        ),
		'section'=> 'vw_personal_trainer_404_page',
		'type'=> 'text'
	));

	$wp_customize->add_setting('vw_personal_trainer_404_page_button_text',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('vw_personal_trainer_404_page_button_text',array(
		'label'	=> __('Add Button Text','vw-personal-trainer'),
		'input_attrs' => array(
            'placeholder' => __( 'Return to the home page', 'vw-personal-trainer' ),
        ),
		'section'=> 'vw_personal_trainer_404_page',
		'type'=> 'text'
	));

	$wp_customize->add_setting('vw_personal_trainer_404_page_button_icon',array(
		'default'	=> 'fa fa-angle-right',
		'sanitize_callback'	=> 'sanitize_text_field'
	));	
	$wp_customize->add_control(new VW_Personal_Trainer_Fontawesome_Icon_Chooser(
        $wp_customize,'vw_personal_trainer_404_page_button_icon',array(
		'label'	=> __('Add Button Icon','vw-personal-trainer'),
		'transport' => 'refresh',
		'section'	=> 'vw_personal_trainer_404_page',
		'setting'	=> 'vw_personal_trainer_404_page_button_icon',
		'type'		=> 'icon'
	)));

	//Social Icon Setting
	$wp_customize->add_section('vw_personal_trainer_social_icon_settings',array(
		'title'	=> __('Social Icons Settings','vw-personal-trainer'),
		'panel' => 'vw_personal_trainer_panel_id',
	));	

	$wp_customize->add_setting('vw_personal_trainer_social_icon_font_size',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('vw_personal_trainer_social_icon_font_size',array(
		'label'	=> __('Icon Font Size','vw-personal-trainer'),
		'description'	=> __('Enter a value in pixels. Example:20px','vw-personal-trainer'),
		'input_attrs' => array(
            'placeholder' => __( '10px', 'vw-personal-trainer' ),
        ),
		'section'=> 'vw_personal_trainer_social_icon_settings',
		'type'=> 'text'
	));

	$wp_customize->add_setting('vw_personal_trainer_social_icon_padding',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('vw_personal_trainer_social_icon_padding',array(
		'label'	=> __('Icon Padding','vw-personal-trainer'),
		'description'	=> __('Enter a value in pixels. Example:20px','vw-personal-trainer'),
		'input_attrs' => array(
            'placeholder' => __( '10px', 'vw-personal-trainer' ),
        ),
		'section'=> 'vw_personal_trainer_social_icon_settings',
		'type'=> 'text'
	));

	$wp_customize->add_setting('vw_personal_trainer_social_icon_width',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('vw_personal_trainer_social_icon_width',array(
		'label'	=> __('Icon Width','vw-personal-trainer'),
		'description'	=> __('Enter a value in pixels. Example:20px','vw-personal-trainer'),
		'input_attrs' => array(
            'placeholder' => __( '10px', 'vw-personal-trainer' ),
        ),
		'section'=> 'vw_personal_trainer_social_icon_settings',
		'type'=> 'text'
	));

	$wp_customize->add_setting('vw_personal_trainer_social_icon_height',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('vw_personal_trainer_social_icon_height',array(
		'label'	=> __('Icon Height','vw-personal-trainer'),
		'description'	=> __('Enter a value in pixels. Example:20px','vw-personal-trainer'),
		'input_attrs' => array(
            'placeholder' => __( '10px', 'vw-personal-trainer' ),
        ),
		'section'=> 'vw_personal_trainer_social_icon_settings',
		'type'=> 'text'
	));

	$wp_customize->add_setting( 'vw_personal_trainer_social_icon_border_radius', array(
		'default'              => '',
		'transport' 		   => 'refresh',
		'sanitize_callback'    => 'vw_personal_trainer_sanitize_number_range'
	) );
	$wp_customize->add_control( 'vw_personal_trainer_social_icon_border_radius', array(
		'label'       => esc_html__( 'Icon Border Radius','vw-personal-trainer' ),
		'section'     => 'vw_personal_trainer_social_icon_settings',
		'type'        => 'range',
		'input_attrs' => array(
			'step'             => 1,
			'min'              => 1,
			'max'              => 50,
		),
	) );

	//Responsive Media Settings
	$wp_customize->add_section('vw_personal_trainer_responsive_media',array(
		'title'	=> __('Responsive Media','vw-personal-trainer'),
		'panel' => 'vw_personal_trainer_panel_id',
	));

	$wp_customize->add_setting( 'vw_personal_trainer_resp_topbar_hide_show',array(
      'default' => 1,
      'transport' => 'refresh',
      'sanitize_callback' => 'vw_personal_trainer_switch_sanitization'
    ));  
    $wp_customize->add_control( new VW_Personal_Trainer_Toggle_Switch_Custom_Control( $wp_customize, 'vw_personal_trainer_resp_topbar_hide_show',array(
      'label' => esc_html__( 'Show / Hide Topbar','vw-personal-trainer' ),
      'section' => 'vw_personal_trainer_responsive_media'
    )));

    $wp_customize->add_setting( 'vw_personal_trainer_stickyheader_hide_show',array(
      'default' => 0,
      'transport' => 'refresh',
      'sanitize_callback' => 'vw_personal_trainer_switch_sanitization'
    ));  
    $wp_customize->add_control( new VW_Personal_Trainer_Toggle_Switch_Custom_Control( $wp_customize, 'vw_personal_trainer_stickyheader_hide_show',array(
      'label' => esc_html__( 'Sticky Header','vw-personal-trainer' ),
      'section' => 'vw_personal_trainer_responsive_media'
    )));

    $wp_customize->add_setting( 'vw_personal_trainer_resp_slider_hide_show',array(
      'default' => 0,
      'transport' => 'refresh',
      'sanitize_callback' => 'vw_personal_trainer_switch_sanitization'
    ));  
    $wp_customize->add_control( new VW_Personal_Trainer_Toggle_Switch_Custom_Control( $wp_customize, 'vw_personal_trainer_resp_slider_hide_show',array(
      'label' => esc_html__( 'Show / Hide Slider','vw-personal-trainer' ),
      'section' => 'vw_personal_trainer_responsive_media'
    )));

	$wp_customize->add_setting( 'vw_personal_trainer_metabox_hide_show',array(
      'default' => 1,
      'transport' => 'refresh',
      'sanitize_callback' => 'vw_personal_trainer_switch_sanitization'
    ));  
    $wp_customize->add_control( new VW_Personal_Trainer_Toggle_Switch_Custom_Control( $wp_customize, 'vw_personal_trainer_metabox_hide_show',array(
      'label' => esc_html__( 'Show / Hide Metabox','vw-personal-trainer' ),
      'section' => 'vw_personal_trainer_responsive_media'
    )));

    $wp_customize->add_setting( 'vw_personal_trainer_sidebar_hide_show',array(
      'default' => 1,
      'transport' => 'refresh',
      'sanitize_callback' => 'vw_personal_trainer_switch_sanitization'
    ));  
    $wp_customize->add_control( new VW_Personal_Trainer_Toggle_Switch_Custom_Control( $wp_customize, 'vw_personal_trainer_sidebar_hide_show',array(
      'label' => esc_html__( 'Show / Hide Sidebar','vw-personal-trainer' ),
      'section' => 'vw_personal_trainer_responsive_media'
    )));

    $wp_customize->add_setting( 'vw_personal_trainer_resp_scroll_top_hide_show',array(
      'default' => 1,
      'transport' => 'refresh',
      'sanitize_callback' => 'vw_personal_trainer_switch_sanitization'
    ));  
    $wp_customize->add_control( new VW_Personal_Trainer_Toggle_Switch_Custom_Control( $wp_customize, 'vw_personal_trainer_resp_scroll_top_hide_show',array(
      'label' => esc_html__( 'Show / Hide Scroll To Top','vw-personal-trainer' ),
      'section' => 'vw_personal_trainer_responsive_media'
    )));

    $wp_customize->add_setting('vw_personal_trainer_res_open_menus_icon',array(
		'default'	=> 'fas fa-bars',
		'sanitize_callback'	=> 'sanitize_text_field'
	));	
	$wp_customize->add_control(new VW_Personal_Trainer_Fontawesome_Icon_Chooser(
        $wp_customize,'vw_personal_trainer_res_open_menus_icon',array(
		'label'	=> __('Add Open Menu Icon','vw-personal-trainer'),
		'transport' => 'refresh',
		'section'	=> 'vw_personal_trainer_responsive_media',
		'setting'	=> 'vw_personal_trainer_res_open_menus_icon',
		'type'		=> 'icon'
	)));

	$wp_customize->add_setting('vw_personal_trainer_res_close_menus_icon',array(
		'default'	=> 'fas fa-times',
		'sanitize_callback'	=> 'sanitize_text_field'
	));	
	$wp_customize->add_control(new VW_Personal_Trainer_Fontawesome_Icon_Chooser(
        $wp_customize,'vw_personal_trainer_res_close_menus_icon',array(
		'label'	=> __('Add Close Menu Icon','vw-personal-trainer'),
		'transport' => 'refresh',
		'section'	=> 'vw_personal_trainer_responsive_media',
		'setting'	=> 'vw_personal_trainer_res_close_menus_icon',
		'type'		=> 'icon'
	)));

	//Content Creation
	$wp_customize->add_section( 'vw_personal_trainer_content_section' , array(
    	'title' => __( 'Customize Home Page', 'vw-personal-trainer' ),
		'priority' => null,
		'panel' => 'vw_personal_trainer_panel_id'
	) );

	$wp_customize->add_setting('vw_personal_trainer_content_creation_main_control', array(
		'sanitize_callback' => 'esc_html',
	) );

	$homepage= get_option( 'page_on_front' );

	$wp_customize->add_control(	new vw_personal_trainer_Content_Creation( $wp_customize, 'vw_personal_trainer_content_creation_main_control', array(
		'options' => array(
			esc_html__( 'First select static page in homepage setting for front page.Below given edit button is to customize Home Page. Just click on the edit option, add whatever elements you want to include in the homepage, save the changes and you are good to go.','vw-personal-trainer' ),
		),
		'section' => 'vw_personal_trainer_content_section',
		'button_url'  => admin_url( 'post.php?post='.$homepage.'&action=edit'),
		'button_text' => esc_html__( 'Edit', 'vw-personal-trainer' ),
	) ) );

	//Footer Text
	$wp_customize->add_section('vw_personal_trainer_footer',array(
		'title'	=> __('Footer','vw-personal-trainer'),
		'panel' => 'vw_personal_trainer_panel_id',
	));	

	//Selective Refresh
	$wp_customize->selective_refresh->add_partial('vw_personal_trainer_footer_text', array( 
		'selector' => '.copyright p', 
		'render_callback' => 'vw_personal_trainer_customize_partial_vw_personal_trainer_footer_text', 
	));
	
	$wp_customize->add_setting('vw_personal_trainer_footer_text',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));	
	$wp_customize->add_control('vw_personal_trainer_footer_text',array(
		'label'	=> __('Copyright Text','vw-personal-trainer'),
		'input_attrs' => array(
            'placeholder' => __( 'Copyright 2019, .....', 'vw-personal-trainer' ),
        ),
		'section'=> 'vw_personal_trainer_footer',
		'type'=> 'text'
	));	

	$wp_customize->add_setting('vw_personal_trainer_copyright_alingment',array(
        'default' => __('center','vw-personal-trainer'),
        'sanitize_callback' => 'vw_personal_trainer_sanitize_choices'
	));
	$wp_customize->add_control(new VW_Personal_Trainer_Image_Radio_Control($wp_customize, 'vw_personal_trainer_copyright_alingment', array(
        'type' => 'select',
        'label' => __('Copyright Alignment','vw-personal-trainer'),
        'section' => 'vw_personal_trainer_footer',
        'settings' => 'vw_personal_trainer_copyright_alingment',
        'choices' => array(
            'left' => get_template_directory_uri().'/assets/images/copyright1.png',
            'center' => get_template_directory_uri().'/assets/images/copyright2.png',
            'right' => get_template_directory_uri().'/assets/images/copyright3.png'
    ))));

    $wp_customize->add_setting('vw_personal_trainer_copyright_padding_top_bottom',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('vw_personal_trainer_copyright_padding_top_bottom',array(
		'label'	=> __('Copyright Padding Top Bottom','vw-personal-trainer'),
		'description'	=> __('Enter a value in pixels. Example:20px','vw-personal-trainer'),
		'input_attrs' => array(
            'placeholder' => __( '10px', 'vw-personal-trainer' ),
        ),
		'section'=> 'vw_personal_trainer_footer',
		'type'=> 'text'
	));

	$wp_customize->add_setting( 'vw_personal_trainer_hide_show_scroll',array(
    	'default' => 1,
      	'transport' => 'refresh',
      	'sanitize_callback' => 'vw_personal_trainer_switch_sanitization'
    ));  
    $wp_customize->add_control( new VW_Personal_Trainer_Toggle_Switch_Custom_Control( $wp_customize, 'vw_personal_trainer_hide_show_scroll',array(
      	'label' => esc_html__( 'Show / Hide Scroll To Top','vw-personal-trainer' ),
      	'section' => 'vw_personal_trainer_footer'
    )));

    //Selective Refresh
	$wp_customize->selective_refresh->add_partial('vw_personal_trainer_scroll_to_top_icon', array( 
		'selector' => '.scrollup i', 
		'render_callback' => 'vw_personal_trainer_customize_partial_vw_personal_trainer_scroll_to_top_icon', 
	));

    $wp_customize->add_setting('vw_personal_trainer_scroll_to_top_icon',array(
		'default'	=> 'fas fa-long-arrow-alt-up',
		'sanitize_callback'	=> 'sanitize_text_field'
	));	
	$wp_customize->add_control(new VW_Personal_Trainer_Fontawesome_Icon_Chooser(
        $wp_customize,'vw_personal_trainer_scroll_to_top_icon',array(
		'label'	=> __('Add Scroll to Top Icon','vw-personal-trainer'),
		'transport' => 'refresh',
		'section'	=> 'vw_personal_trainer_footer',
		'setting'	=> 'vw_personal_trainer_scroll_to_top_icon',
		'type'		=> 'icon'
	)));

	$wp_customize->add_setting('vw_personal_trainer_scroll_to_top_font_size',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('vw_personal_trainer_scroll_to_top_font_size',array(
		'label'	=> __('Icon Font Size','vw-personal-trainer'),
		'description'	=> __('Enter a value in pixels. Example:20px','vw-personal-trainer'),
		'input_attrs' => array(
            'placeholder' => __( '10px', 'vw-personal-trainer' ),
        ),
		'section'=> 'vw_personal_trainer_footer',
		'type'=> 'text'
	));

	$wp_customize->add_setting('vw_personal_trainer_scroll_to_top_padding',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('vw_personal_trainer_scroll_to_top_padding',array(
		'label'	=> __('Icon Top Bottom Padding','vw-personal-trainer'),
		'description'	=> __('Enter a value in pixels. Example:20px','vw-personal-trainer'),
		'input_attrs' => array(
            'placeholder' => __( '10px', 'vw-personal-trainer' ),
        ),
		'section'=> 'vw_personal_trainer_footer',
		'type'=> 'text'
	));

	$wp_customize->add_setting('vw_personal_trainer_scroll_to_top_width',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('vw_personal_trainer_scroll_to_top_width',array(
		'label'	=> __('Icon Width','vw-personal-trainer'),
		'description'	=> __('Enter a value in pixels Example:20px','vw-personal-trainer'),
		'input_attrs' => array(
            'placeholder' => __( '10px', 'vw-personal-trainer' ),
        ),
		'section'=> 'vw_personal_trainer_footer',
		'type'=> 'text'
	));

	$wp_customize->add_setting('vw_personal_trainer_scroll_to_top_height',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('vw_personal_trainer_scroll_to_top_height',array(
		'label'	=> __('Icon Height','vw-personal-trainer'),
		'description'	=> __('Enter a value in pixels. Example:20px','vw-personal-trainer'),
		'input_attrs' => array(
            'placeholder' => __( '10px', 'vw-personal-trainer' ),
        ),
		'section'=> 'vw_personal_trainer_footer',
		'type'=> 'text'
	));

	$wp_customize->add_setting( 'vw_personal_trainer_scroll_to_top_border_radius', array(
		'default'              => '',
		'transport' 		   => 'refresh',
		'sanitize_callback'    => 'vw_personal_trainer_sanitize_number_range'
	) );
	$wp_customize->add_control( 'vw_personal_trainer_scroll_to_top_border_radius', array(
		'label'       => esc_html__( 'Icon Border Radius','vw-personal-trainer' ),
		'section'     => 'vw_personal_trainer_footer',
		'type'        => 'range',
		'input_attrs' => array(
			'step'             => 1,
			'min'              => 1,
			'max'              => 50,
		),
	) );

	$wp_customize->add_setting('vw_personal_trainer_scroll_top_alignment',array(
        'default' => __('Right','vw-personal-trainer'),
        'sanitize_callback' => 'vw_personal_trainer_sanitize_choices'
	));
	$wp_customize->add_control(new VW_Personal_Trainer_Image_Radio_Control($wp_customize, 'vw_personal_trainer_scroll_top_alignment', array(
        'type' => 'select',
        'label' => __('Scroll To Top','vw-personal-trainer'),
        'section' => 'vw_personal_trainer_footer',
        'settings' => 'vw_personal_trainer_scroll_top_alignment',
        'choices' => array(
            'Left' => get_template_directory_uri().'/assets/images/layout1.png',
            'Center' => get_template_directory_uri().'/assets/images/layout2.png',
            'Right' => get_template_directory_uri().'/assets/images/layout3.png'
    ))));

    //Woocommerce settings
	$wp_customize->add_section('vw_personal_trainer_woocommerce_section', array(
		'title'    => __('WooCommerce Layout', 'vw-personal-trainer'),
		'priority' => null,
		'panel'    => 'woocommerce',
	));

    //Woocommerce Shop Page Sidebar
	$wp_customize->add_setting( 'vw_personal_trainer_woocommerce_shop_page_sidebar',array(
		'default' => 1,
		'transport' => 'refresh',
		'sanitize_callback' => 'vw_personal_trainer_switch_sanitization'
    ) );
    $wp_customize->add_control( new VW_Personal_Trainer_Toggle_Switch_Custom_Control( $wp_customize, 'vw_personal_trainer_woocommerce_shop_page_sidebar',array(
		'label' => esc_html__( 'Shop Page Sidebar','vw-personal-trainer' ),
		'section' => 'vw_personal_trainer_woocommerce_section'
    )));

    //Woocommerce Single Product page Sidebar
	$wp_customize->add_setting( 'vw_personal_trainer_woocommerce_single_product_page_sidebar',array(
		'default' => 1,
		'transport' => 'refresh',
		'sanitize_callback' => 'vw_personal_trainer_switch_sanitization'
    ) );
    $wp_customize->add_control( new VW_Personal_Trainer_Toggle_Switch_Custom_Control( $wp_customize, 'vw_personal_trainer_woocommerce_single_product_page_sidebar',array(
		'label' => esc_html__( 'Single Product Sidebar','vw-personal-trainer' ),
		'section' => 'vw_personal_trainer_woocommerce_section'
    )));

    //Products per page
    $wp_customize->add_setting('vw_personal_trainer_products_per_page',array(
		'default'=> '9',
		'sanitize_callback'	=> 'vw_personal_trainer_sanitize_float'
	));
	$wp_customize->add_control('vw_personal_trainer_products_per_page',array(
		'label'	=> __('Products Per Page','vw-personal-trainer'),
		'description' => __('Display on shop page','vw-personal-trainer'),
		'input_attrs' => array(
            'step'             => 1,
			'min'              => 0,
			'max'              => 50,
        ),
		'section'=> 'vw_personal_trainer_woocommerce_section',
		'type'=> 'number',
	));

    //Products per row
    $wp_customize->add_setting('vw_personal_trainer_products_per_row',array(
		'default'=> '3',
		'sanitize_callback'	=> 'vw_personal_trainer_sanitize_choices'
	));
	$wp_customize->add_control('vw_personal_trainer_products_per_row',array(
		'label'	=> __('Products Per Row','vw-personal-trainer'),
		'description' => __('Display on shop page','vw-personal-trainer'),
		'choices' => array(
            '2' => '2',
			'3' => '3',
			'4' => '4',
        ),
		'section'=> 'vw_personal_trainer_woocommerce_section',
		'type'=> 'select',
	));

	//Products padding
	$wp_customize->add_setting('vw_personal_trainer_products_padding_top_bottom',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('vw_personal_trainer_products_padding_top_bottom',array(
		'label'	=> __('Products Padding Top Bottom','vw-personal-trainer'),
		'description'	=> __('Enter a value in pixels. Example:20px','vw-personal-trainer'),
		'input_attrs' => array(
            'placeholder' => __( '10px', 'vw-personal-trainer' ),
        ),
		'section'=> 'vw_personal_trainer_woocommerce_section',
		'type'=> 'text'
	));

	$wp_customize->add_setting('vw_personal_trainer_products_padding_left_right',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('vw_personal_trainer_products_padding_left_right',array(
		'label'	=> __('Products Padding Left Right','vw-personal-trainer'),
		'description'	=> __('Enter a value in pixels. Example:20px','vw-personal-trainer'),
		'input_attrs' => array(
            'placeholder' => __( '10px', 'vw-personal-trainer' ),
        ),
		'section'=> 'vw_personal_trainer_woocommerce_section',
		'type'=> 'text'
	));

	//Products box shadow
	$wp_customize->add_setting( 'vw_personal_trainer_products_box_shadow', array(
		'default'              => '',
		'transport' 		   => 'refresh',
		'sanitize_callback'    => 'vw_personal_trainer_sanitize_number_range'
	) );
	$wp_customize->add_control( 'vw_personal_trainer_products_box_shadow', array(
		'label'       => esc_html__( 'Products Box Shadow','vw-personal-trainer' ),
		'section'     => 'vw_personal_trainer_woocommerce_section',
		'type'        => 'range',
		'input_attrs' => array(
			'step'             => 1,
			'min'              => 1,
			'max'              => 50,
		),
	) );

	//Products border radius
    $wp_customize->add_setting( 'vw_personal_trainer_products_border_radius', array(
		'default'              => '',
		'transport' 		   => 'refresh',
		'sanitize_callback'    => 'vw_personal_trainer_sanitize_number_range'
	) );
	$wp_customize->add_control( 'vw_personal_trainer_products_border_radius', array(
		'label'       => esc_html__( 'Products Border Radius','vw-personal-trainer' ),
		'section'     => 'vw_personal_trainer_woocommerce_section',
		'type'        => 'range',
		'input_attrs' => array(
			'step'             => 1,
			'min'              => 1,
			'max'              => 50,
		),
	) );

    // Has to be at the top
	$wp_customize->register_panel_type( 'VW_Personal_Trainer_WP_Customize_Panel' );
	$wp_customize->register_section_type( 'VW_Personal_Trainer_WP_Customize_Section' );
}

add_action( 'customize_register', 'vw_personal_trainer_customize_register' );

load_template( trailingslashit( get_template_directory() ) . '/inc/logo/logo-resizer.php' );

if ( class_exists( 'WP_Customize_Panel' ) ) {
  	class VW_Personal_Trainer_WP_Customize_Panel extends WP_Customize_Panel {
	    public $panel;
	    public $type = 'vw_personal_trainer_panel';
	    public function json() {

	      $array = wp_array_slice_assoc( (array) $this, array( 'id', 'description', 'priority', 'type', 'panel', ) );
	      $array['title'] = html_entity_decode( $this->title, ENT_QUOTES, get_bloginfo( 'charset' ) );
	      $array['content'] = $this->get_content();
	      $array['active'] = $this->active();
	      $array['instanceNumber'] = $this->instance_number;
	      return $array;
    	}
  	}
}

if ( class_exists( 'WP_Customize_Section' ) ) {
  	class VW_Personal_Trainer_WP_Customize_Section extends WP_Customize_Section {
	    public $section;
	    public $type = 'vw_personal_trainer_section';
	    public function json() {

	      $array = wp_array_slice_assoc( (array) $this, array( 'id', 'description', 'priority', 'panel', 'type', 'description_hidden', 'section', ) );
	      $array['title'] = html_entity_decode( $this->title, ENT_QUOTES, get_bloginfo( 'charset' ) );
	      $array['content'] = $this->get_content();
	      $array['active'] = $this->active();
	      $array['instanceNumber'] = $this->instance_number;

	      if ( $this->panel ) {
	        $array['customizeAction'] = sprintf( 'Customizing &#9656; %s', esc_html( $this->manager->get_panel( $this->panel )->title ) );
	      } else {
	        $array['customizeAction'] = 'Customizing';
	      }
	      return $array;
    	}
  	}
}

// Enqueue our scripts and styles
function vw_personal_trainer_customize_controls_scripts() {
  wp_enqueue_script( 'customizer-controls', get_theme_file_uri( '/assets/js/customizer-controls.js' ), array(), '1.0', true );
}
add_action( 'customize_controls_enqueue_scripts', 'vw_personal_trainer_customize_controls_scripts' );

/**
 * Singleton class for handling the theme's customizer integration.
 *
 * @since  1.0.0
 * @access public
 */
final class VW_Personal_Trainer_Customize {

	/**
	 * Returns the instance.
	 *
	 * @since  1.0.0
	 * @access public
	 * @return object
	 */
	public static function get_instance() {

		static $instance = null;

		if ( is_null( $instance ) ) {
			$instance = new self;
			$instance->setup_actions();
		}

		return $instance;
	}

	/**
	 * Constructor method.
	 *
	 * @since  1.0.0
	 * @access private
	 * @return void
	 */
	private function __construct() {}

	/**
	 * Sets up initial actions.
	 *
	 * @since  1.0.0
	 * @access private
	 * @return void
	 */
	private function setup_actions() {

		// Register panels, sections, settings, controls, and partials.
		add_action( 'customize_register', array( $this, 'sections' ) );

		// Register scripts and styles for the controls.
		add_action( 'customize_controls_enqueue_scripts', array( $this, 'enqueue_control_scripts' ), 0 );
	}

	/**
	 * Sets up the customizer sections.
	 *
	 * @since  1.0.0
	 * @access public
	 * @param  object  $manager
	 * @return void
	*/
	public function sections( $manager ) {

		// Load custom sections.
		load_template( trailingslashit( get_template_directory() ) . '/inc/section-pro.php' );

		// Register custom section types.
		$manager->register_section_type( 'VW_Personal_Trainer_Customize_Section_Pro' );

		// Register sections.
		$manager->add_section(new VW_Personal_Trainer_Customize_Section_Pro($manager,'example_1',array(
			'priority'   => 1,
			'title'    => esc_html__( 'VW Personal Trainer', 'vw-personal-trainer' ),
			'pro_text' => esc_html__( 'UPGRADE PRO', 'vw-personal-trainer' ),
			'pro_url'  => esc_url('https://www.vwthemes.com/themes/personal-trainer-wordpress-theme/'),
		)));
		
		// Register sections.
		$manager->add_section(new VW_Personal_Trainer_Customize_Section_Pro($manager,'example_2',array(
			'priority'   => 1,
			'title'    => esc_html__( 'DOCUMENTATION', 'vw-personal-trainer' ),
			'pro_text' => esc_html__( 'DOCS', 'vw-personal-trainer' ),
			'pro_url'  => admin_url('themes.php?page=vw_personal_trainer_guide'),
		)));
	}
	
	/**
	 * Loads theme customizer CSS.
	 *
	 * @since  1.0.0
	 * @access public
	 * @return void
	 */
	public function enqueue_control_scripts() {

		wp_enqueue_script( 'vw-personal-trainer-customize-controls', trailingslashit( get_template_directory_uri() ) . '/assets/js/customize-controls.js', array( 'customize-controls' ) );

		wp_enqueue_style( 'vw-personal-trainer-customize-controls', trailingslashit( get_template_directory_uri() ) . '/assets/css/customize-controls.css' );
	}
}

// Doing this customizer thang!
VW_Personal_Trainer_Customize::get_instance();