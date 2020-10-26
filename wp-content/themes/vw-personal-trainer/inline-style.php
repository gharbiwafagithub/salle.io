<?php
	
	/*---------------------------First highlight color-------------------*/

	$vw_personal_trainer_first_color = get_theme_mod('vw_personal_trainer_first_color');

	$vw_personal_trainer_custom_css = '';

	if($vw_personal_trainer_first_color != false){
		$vw_personal_trainer_custom_css .='#topbar, #slider .carousel-control-prev-icon:hover, #slider .carousel-control-next-icon:hover, #slider .view-more:hover, #serv-section .view-more:hover, input[type="submit"], #footer .tagcloud a:hover, #sidebar .custom-social-icons i, #footer .custom-social-icons i, .scrollup i, #footer-2, #menu-box, .view-more, .pagination .current, .pagination a:hover, #sidebar .tagcloud a:hover, #comments input[type="submit"], nav.woocommerce-MyAccount-navigation ul li, .woocommerce #respond input#submit, .woocommerce a.button, .woocommerce button.button, .woocommerce input.button, .woocommerce #respond input#submit.alt, .woocommerce a.button.alt, .woocommerce button.button.alt, .woocommerce input.button.alt, #comments a.comment-reply-link, #sidebar .widget_price_filter .ui-slider .ui-slider-range, #sidebar .widget_price_filter .ui-slider .ui-slider-handle, #sidebar .woocommerce-product-search button, #footer .widget_price_filter .ui-slider .ui-slider-range, #footer .widget_price_filter .ui-slider .ui-slider-handle, #footer .woocommerce-product-search button, #footer a.custom_read_more, #sidebar a.custom_read_more, .woocommerce nav.woocommerce-pagination ul li a:hover, .woocommerce nav.woocommerce-pagination ul li span.current, .nav-previous a:hover, .nav-next a:hover, .header-fixed{';
			$vw_personal_trainer_custom_css .='background-color: '.esc_html($vw_personal_trainer_first_color).';';
		$vw_personal_trainer_custom_css .='}';
	}
	if($vw_personal_trainer_first_color != false){
		$vw_personal_trainer_custom_css .='a, .main-header i, #footer li a:hover, #footer .custom-social-icons i:hover, .post-navigation a:hover .post-title, .post-navigation a:focus .post-title, .page-template-custom-home-page .main-navigation a:hover, .main-navigation ul.sub-menu a:hover, .entry-content a, #sidebar .textwidget p a, .textwidget p a, #comments p a, .slider .inner_carousel p a{';
			$vw_personal_trainer_custom_css .='color: '.esc_html($vw_personal_trainer_first_color).';';
		$vw_personal_trainer_custom_css .='}';
	}
	if($vw_personal_trainer_first_color != false){
		$vw_personal_trainer_custom_css .='#slider .view-more:hover, #serv-section .view-more:hover{';
			$vw_personal_trainer_custom_css .='border-color: '.esc_html($vw_personal_trainer_first_color).';';
		$vw_personal_trainer_custom_css .='}';
	}
	if($vw_personal_trainer_first_color != false){
		$vw_personal_trainer_custom_css .='#serv-section hr, .main-navigation ul ul{';
			$vw_personal_trainer_custom_css .='border-top-color: '.esc_html($vw_personal_trainer_first_color).';';
		$vw_personal_trainer_custom_css .='}';
	}
	if($vw_personal_trainer_first_color != false){
		$vw_personal_trainer_custom_css .='#footer h3:after, .main-navigation ul ul{';
			$vw_personal_trainer_custom_css .='border-bottom-color: '.esc_html($vw_personal_trainer_first_color).';';
		$vw_personal_trainer_custom_css .='}';
	}
	if($vw_personal_trainer_first_color != false){
		$vw_personal_trainer_custom_css .='.post-main-box, #sidebar .widget{
		box-shadow: 0px 15px 10px -15px '.esc_html($vw_personal_trainer_first_color).';
		}';
	}

	/*---------------------------Second highlight color-------------------*/

	$vw_personal_trainer_second_color = get_theme_mod('vw_personal_trainer_second_color');

	if($vw_personal_trainer_second_color != false){
		$vw_personal_trainer_custom_css .='#slider, .view-more:hover, #sidebar .custom-social-icons i:hover, .pagination span, .pagination a, .woocommerce span.onsale, .woocommerce #respond input#submit:hover, .woocommerce a.button:hover, .woocommerce button.button:hover, .woocommerce input.button:hover,.woocommerce #respond input#submit.alt:hover, .woocommerce a.button.alt:hover, .woocommerce button.button.alt:hover, .woocommerce input.button.alt:hover, #sidebar a.custom_read_more:hover, #footer, .woocommerce nav.woocommerce-pagination ul li a, .nav-previous a, .nav-next a{';
			$vw_personal_trainer_custom_css .='background-color: '.esc_html($vw_personal_trainer_second_color).';';
		$vw_personal_trainer_custom_css .='}';
	}
	if($vw_personal_trainer_second_color != false){
		$vw_personal_trainer_custom_css .='h1, h2, h3, h4, h5, h6, .custom-social-icons i:hover, .logo h1 a, .logo p.site-title a, .main-header h6, .post-main-box:hover h2, .post-main-box h2, #sidebar caption, #sidebar h3, .post-navigation a, h2.woocommerce-loop-product__title,.woocommerce div.product .product_title, .woocommerce .quantity .qty, .woocommerce-message::before, .main-navigation a:hover, #footer a.custom_read_more:hover, #footer a.custom_read_more:hover i{';
			$vw_personal_trainer_custom_css .='color: '.esc_html($vw_personal_trainer_second_color).';';
		$vw_personal_trainer_custom_css .='}';
	}
	if($vw_personal_trainer_second_color != false){
		$vw_personal_trainer_custom_css .='.woocommerce .quantity .qty{';
			$vw_personal_trainer_custom_css .='border-color: '.esc_html($vw_personal_trainer_second_color).';';
		$vw_personal_trainer_custom_css .='}';
	}
	if($vw_personal_trainer_second_color != false){
		$vw_personal_trainer_custom_css .='.post-info hr, .woocommerce-message{';
			$vw_personal_trainer_custom_css .='border-top-color: '.esc_html($vw_personal_trainer_second_color).';';
		$vw_personal_trainer_custom_css .='}';
	}
	if($vw_personal_trainer_second_color != false){
		$vw_personal_trainer_custom_css .='nav.woocommerce-MyAccount-navigation ul li{
		box-shadow: 2px 2px 0 0 '.esc_html($vw_personal_trainer_second_color).';
		}';
	}

	/*---------------------------Width Layout -------------------*/

	$vw_personal_trainer_theme_lay = get_theme_mod( 'vw_personal_trainer_width_option','Full Width');
    if($vw_personal_trainer_theme_lay == 'Boxed'){
		$vw_personal_trainer_custom_css .='body{';
			$vw_personal_trainer_custom_css .='max-width: 1140px; width: 100%; padding-right: 15px; padding-left: 15px; margin-right: auto; margin-left: auto;';
		$vw_personal_trainer_custom_css .='}';
	}else if($vw_personal_trainer_theme_lay == 'Wide Width'){
		$vw_personal_trainer_custom_css .='body{';
			$vw_personal_trainer_custom_css .='width: 100%;padding-right: 15px;padding-left: 15px;margin-right: auto;margin-left: auto;';
		$vw_personal_trainer_custom_css .='}';
	}else if($vw_personal_trainer_theme_lay == 'Full Width'){
		$vw_personal_trainer_custom_css .='body{';
			$vw_personal_trainer_custom_css .='max-width: 100%;';
		$vw_personal_trainer_custom_css .='}';
	}

	/*--------------------------- Slider Opacity -------------------*/

	$vw_personal_trainer_theme_lay = get_theme_mod( 'vw_personal_trainer_slider_opacity_color','0.5');
	if($vw_personal_trainer_theme_lay == '0'){
		$vw_personal_trainer_custom_css .='#slider img{';
			$vw_personal_trainer_custom_css .='opacity:0';
		$vw_personal_trainer_custom_css .='}';
		}else if($vw_personal_trainer_theme_lay == '0.1'){
		$vw_personal_trainer_custom_css .='#slider img{';
			$vw_personal_trainer_custom_css .='opacity:0.1';
		$vw_personal_trainer_custom_css .='}';
		}else if($vw_personal_trainer_theme_lay == '0.2'){
		$vw_personal_trainer_custom_css .='#slider img{';
			$vw_personal_trainer_custom_css .='opacity:0.2';
		$vw_personal_trainer_custom_css .='}';
		}else if($vw_personal_trainer_theme_lay == '0.3'){
		$vw_personal_trainer_custom_css .='#slider img{';
			$vw_personal_trainer_custom_css .='opacity:0.3';
		$vw_personal_trainer_custom_css .='}';
		}else if($vw_personal_trainer_theme_lay == '0.4'){
		$vw_personal_trainer_custom_css .='#slider img{';
			$vw_personal_trainer_custom_css .='opacity:0.4';
		$vw_personal_trainer_custom_css .='}';
		}else if($vw_personal_trainer_theme_lay == '0.5'){
		$vw_personal_trainer_custom_css .='#slider img{';
			$vw_personal_trainer_custom_css .='opacity:0.5';
		$vw_personal_trainer_custom_css .='}';
		}else if($vw_personal_trainer_theme_lay == '0.6'){
		$vw_personal_trainer_custom_css .='#slider img{';
			$vw_personal_trainer_custom_css .='opacity:0.6';
		$vw_personal_trainer_custom_css .='}';
		}else if($vw_personal_trainer_theme_lay == '0.7'){
		$vw_personal_trainer_custom_css .='#slider img{';
			$vw_personal_trainer_custom_css .='opacity:0.7';
		$vw_personal_trainer_custom_css .='}';
		}else if($vw_personal_trainer_theme_lay == '0.8'){
		$vw_personal_trainer_custom_css .='#slider img{';
			$vw_personal_trainer_custom_css .='opacity:0.8';
		$vw_personal_trainer_custom_css .='}';
		}else if($vw_personal_trainer_theme_lay == '0.9'){
		$vw_personal_trainer_custom_css .='#slider img{';
			$vw_personal_trainer_custom_css .='opacity:0.9';
		$vw_personal_trainer_custom_css .='}';
		}

	/*---------------------------Slider Content Layout -------------------*/

	$vw_personal_trainer_theme_lay = get_theme_mod( 'vw_personal_trainer_slider_content_option','Center');
    if($vw_personal_trainer_theme_lay == 'Left'){
		$vw_personal_trainer_custom_css .='#slider .carousel-caption, #slider .inner_carousel, #slider .inner_carousel h1{';
			$vw_personal_trainer_custom_css .='text-align:left; left:15%; right:45%;';
		$vw_personal_trainer_custom_css .='}';
	}else if($vw_personal_trainer_theme_lay == 'Center'){
		$vw_personal_trainer_custom_css .='#slider .carousel-caption, #slider .inner_carousel, #slider .inner_carousel h1{';
			$vw_personal_trainer_custom_css .='text-align:center; left:22%; right:22%;';
		$vw_personal_trainer_custom_css .='}';
	}else if($vw_personal_trainer_theme_lay == 'Right'){
		$vw_personal_trainer_custom_css .='#slider .carousel-caption, #slider .inner_carousel, #slider .inner_carousel h1{';
			$vw_personal_trainer_custom_css .='text-align:right; left:45%; right:15%;';
		$vw_personal_trainer_custom_css .='}';
	}

	/*---------------------------Slider Height ------------*/

	$vw_personal_trainer_slider_height = get_theme_mod('vw_personal_trainer_slider_height');
	if($vw_personal_trainer_slider_height != false){
		$vw_personal_trainer_custom_css .='#slider img{';
			$vw_personal_trainer_custom_css .='height: '.esc_html($vw_personal_trainer_slider_height).';';
		$vw_personal_trainer_custom_css .='}';
	}

	/*--------------------------- Slider -------------------*/

	$vw_personal_trainer_slider = get_theme_mod('vw_personal_trainer_slider_hide_show');
	if($vw_personal_trainer_slider == false){
		$vw_personal_trainer_custom_css .='.page-template-custom-home-page #menu-box{';
			$vw_personal_trainer_custom_css .='position: static; background: #a72dd9;';
		$vw_personal_trainer_custom_css .='}';
	}

	/*---------------------------Blog Layout -------------------*/

	$vw_personal_trainer_theme_lay = get_theme_mod( 'vw_personal_trainer_blog_layout_option','Default');
    if($vw_personal_trainer_theme_lay == 'Default'){
		$vw_personal_trainer_custom_css .='.post-main-box{';
			$vw_personal_trainer_custom_css .='';
		$vw_personal_trainer_custom_css .='}';
	}else if($vw_personal_trainer_theme_lay == 'Center'){
		$vw_personal_trainer_custom_css .='.post-main-box, .post-main-box h2, .post-info, .new-text p, .content-bttn{';
			$vw_personal_trainer_custom_css .='text-align:center;';
		$vw_personal_trainer_custom_css .='}';
		$vw_personal_trainer_custom_css .='.post-info{';
			$vw_personal_trainer_custom_css .='margin-top:10px;';
		$vw_personal_trainer_custom_css .='}';
		$vw_personal_trainer_custom_css .='.post-info hr{';
			$vw_personal_trainer_custom_css .='margin:15px auto;';
		$vw_personal_trainer_custom_css .='}';
	}else if($vw_personal_trainer_theme_lay == 'Left'){
		$vw_personal_trainer_custom_css .='.post-main-box, .post-main-box h2, .post-info, .new-text p, .content-bttn, #our-services p{';
			$vw_personal_trainer_custom_css .='text-align:Left;';
		$vw_personal_trainer_custom_css .='}';
		$vw_personal_trainer_custom_css .='.post-main-box h2{';
			$vw_personal_trainer_custom_css .='margin-top:10px;';
		$vw_personal_trainer_custom_css .='}';
		$vw_personal_trainer_custom_css .='.post-info hr{';
			$vw_personal_trainer_custom_css .='margin-bottom:10px;';
		$vw_personal_trainer_custom_css .='}';
	}

	/*------------------------------Responsive Media -----------------------*/

	$vw_personal_trainer_resp_topbar = get_theme_mod( 'vw_personal_trainer_resp_topbar_hide_show',true);
    if($vw_personal_trainer_resp_topbar == true){
    	$vw_personal_trainer_custom_css .='@media screen and (max-width:575px) {';
		$vw_personal_trainer_custom_css .='#topbar{';
			$vw_personal_trainer_custom_css .='display:block;';
		$vw_personal_trainer_custom_css .='} }';
	}else if($vw_personal_trainer_resp_topbar == false){
		$vw_personal_trainer_custom_css .='@media screen and (max-width:575px) {';
		$vw_personal_trainer_custom_css .='#topbar{';
			$vw_personal_trainer_custom_css .='display:none;';
		$vw_personal_trainer_custom_css .='} }';
	}

	$vw_personal_trainer_resp_stickyheader = get_theme_mod( 'vw_personal_trainer_stickyheader_hide_show',false);
    if($vw_personal_trainer_resp_stickyheader == true){
    	$vw_personal_trainer_custom_css .='@media screen and (max-width:575px) {';
		$vw_personal_trainer_custom_css .='.header-fixed{';
			$vw_personal_trainer_custom_css .='display:block;';
		$vw_personal_trainer_custom_css .='} }';
	}else if($vw_personal_trainer_resp_stickyheader == false){
		$vw_personal_trainer_custom_css .='@media screen and (max-width:575px) {';
		$vw_personal_trainer_custom_css .='.header-fixed{';
			$vw_personal_trainer_custom_css .='display:none;';
		$vw_personal_trainer_custom_css .='} }';
	}

	$vw_personal_trainer_resp_slider = get_theme_mod( 'vw_personal_trainer_resp_slider_hide_show',false);
    if($vw_personal_trainer_resp_slider == true){
    	$vw_personal_trainer_custom_css .='@media screen and (max-width:575px) {';
		$vw_personal_trainer_custom_css .='#slider{';
			$vw_personal_trainer_custom_css .='display:block;';
		$vw_personal_trainer_custom_css .='} }';
	}else if($vw_personal_trainer_resp_slider == false){
		$vw_personal_trainer_custom_css .='@media screen and (max-width:575px) {';
		$vw_personal_trainer_custom_css .='#slider{';
			$vw_personal_trainer_custom_css .='display:none;';
		$vw_personal_trainer_custom_css .='} }';
	}

	$vw_personal_trainer_resp_metabox = get_theme_mod( 'vw_personal_trainer_metabox_hide_show',true);
    if($vw_personal_trainer_resp_metabox == true){
    	$vw_personal_trainer_custom_css .='@media screen and (max-width:575px) {';
		$vw_personal_trainer_custom_css .='.post-info{';
			$vw_personal_trainer_custom_css .='display:block;';
		$vw_personal_trainer_custom_css .='} }';
	}else if($vw_personal_trainer_resp_metabox == false){
		$vw_personal_trainer_custom_css .='@media screen and (max-width:575px) {';
		$vw_personal_trainer_custom_css .='.post-info{';
			$vw_personal_trainer_custom_css .='display:none;';
		$vw_personal_trainer_custom_css .='} }';
	}

	$vw_personal_trainer_resp_sidebar = get_theme_mod( 'vw_personal_trainer_sidebar_hide_show',true);
    if($vw_personal_trainer_resp_sidebar == true){
    	$vw_personal_trainer_custom_css .='@media screen and (max-width:575px) {';
		$vw_personal_trainer_custom_css .='#sidebar{';
			$vw_personal_trainer_custom_css .='display:block;';
		$vw_personal_trainer_custom_css .='} }';
	}else if($vw_personal_trainer_resp_sidebar == false){
		$vw_personal_trainer_custom_css .='@media screen and (max-width:575px) {';
		$vw_personal_trainer_custom_css .='#sidebar{';
			$vw_personal_trainer_custom_css .='display:none;';
		$vw_personal_trainer_custom_css .='} }';
	}

	$vw_personal_trainer_resp_scroll_top = get_theme_mod( 'vw_personal_trainer_resp_scroll_top_hide_show',true);
    if($vw_personal_trainer_resp_scroll_top == true){
    	$vw_personal_trainer_custom_css .='@media screen and (max-width:575px) {';
		$vw_personal_trainer_custom_css .='.scrollup i{';
			$vw_personal_trainer_custom_css .='display:block;';
		$vw_personal_trainer_custom_css .='} }';
	}else if($vw_personal_trainer_resp_scroll_top == false){
		$vw_personal_trainer_custom_css .='@media screen and (max-width:575px) {';
		$vw_personal_trainer_custom_css .='.scrollup i{';
			$vw_personal_trainer_custom_css .='display:none !important;';
		$vw_personal_trainer_custom_css .='} }';
	}

	/*------------- Top Bar Settings ------------------*/

	$vw_personal_trainer_topbar_padding_top_bottom = get_theme_mod('vw_personal_trainer_topbar_padding_top_bottom');
	if($vw_personal_trainer_topbar_padding_top_bottom != false){
		$vw_personal_trainer_custom_css .='#topbar{';
			$vw_personal_trainer_custom_css .='padding-top: '.esc_html($vw_personal_trainer_topbar_padding_top_bottom).'; padding-bottom: '.esc_html($vw_personal_trainer_topbar_padding_top_bottom).';';
		$vw_personal_trainer_custom_css .='}';
	}

	/*-------------- Sticky Header Padding ----------------*/

	$vw_personal_trainer_sticky_header_padding = get_theme_mod('vw_personal_trainer_sticky_header_padding');
	if($vw_personal_trainer_sticky_header_padding != false){
		$vw_personal_trainer_custom_css .='.header-fixed{';
			$vw_personal_trainer_custom_css .='padding: '.esc_html($vw_personal_trainer_sticky_header_padding).';';
		$vw_personal_trainer_custom_css .='}';
	}

	/*------------------ Search Settings -----------------*/
	
	$vw_personal_trainer_search_font_size = get_theme_mod('vw_personal_trainer_search_font_size');
	if($vw_personal_trainer_search_font_size != false){
		$vw_personal_trainer_custom_css .='.search-box i{';
			$vw_personal_trainer_custom_css .='font-size: '.esc_html($vw_personal_trainer_search_font_size).';';
		$vw_personal_trainer_custom_css .='}';
	}

	/*---------------- Button Settings ------------------*/

	$vw_personal_trainer_button_padding_top_bottom = get_theme_mod('vw_personal_trainer_button_padding_top_bottom');
	$vw_personal_trainer_button_padding_left_right = get_theme_mod('vw_personal_trainer_button_padding_left_right');
	if($vw_personal_trainer_button_padding_top_bottom != false || $vw_personal_trainer_button_padding_left_right != false){
		$vw_personal_trainer_custom_css .='.post-main-box .view-more{';
			$vw_personal_trainer_custom_css .='padding-top: '.esc_html($vw_personal_trainer_button_padding_top_bottom).'; padding-bottom: '.esc_html($vw_personal_trainer_button_padding_top_bottom).';padding-left: '.esc_html($vw_personal_trainer_button_padding_left_right).';padding-right: '.esc_html($vw_personal_trainer_button_padding_left_right).';';
		$vw_personal_trainer_custom_css .='}';
	}

	$vw_personal_trainer_button_border_radius = get_theme_mod('vw_personal_trainer_button_border_radius');
	if($vw_personal_trainer_button_border_radius != false){
		$vw_personal_trainer_custom_css .='.post-main-box .view-more{';
			$vw_personal_trainer_custom_css .='border-radius: '.esc_html($vw_personal_trainer_button_border_radius).'px;';
		$vw_personal_trainer_custom_css .='}';
	}

	/*------------- Single Blog Page------------------*/

	$vw_personal_trainer_single_blog_post_navigation_show_hide = get_theme_mod('vw_personal_trainer_single_blog_post_navigation_show_hide',true);
	if($vw_personal_trainer_single_blog_post_navigation_show_hide != true){
		$vw_personal_trainer_custom_css .='.post-navigation{';
			$vw_personal_trainer_custom_css .='display: none;';
		$vw_personal_trainer_custom_css .='}';
	}

	/*-------------- Copyright Alignment ----------------*/

	$vw_personal_trainer_copyright_alingment = get_theme_mod('vw_personal_trainer_copyright_alingment');
	if($vw_personal_trainer_copyright_alingment != false){
		$vw_personal_trainer_custom_css .='.copyright p{';
			$vw_personal_trainer_custom_css .='text-align: '.esc_html($vw_personal_trainer_copyright_alingment).';';
		$vw_personal_trainer_custom_css .='}';
	}

	$vw_personal_trainer_copyright_padding_top_bottom = get_theme_mod('vw_personal_trainer_copyright_padding_top_bottom');
	if($vw_personal_trainer_copyright_padding_top_bottom != false){
		$vw_personal_trainer_custom_css .='#footer-2{';
			$vw_personal_trainer_custom_css .='padding-top: '.esc_html($vw_personal_trainer_copyright_padding_top_bottom).'; padding-bottom: '.esc_html($vw_personal_trainer_copyright_padding_top_bottom).';';
		$vw_personal_trainer_custom_css .='}';
	}

	/*----------------Sroll to top Settings ------------------*/

	$vw_personal_trainer_scroll_to_top_font_size = get_theme_mod('vw_personal_trainer_scroll_to_top_font_size');
	if($vw_personal_trainer_scroll_to_top_font_size != false){
		$vw_personal_trainer_custom_css .='.scrollup i{';
			$vw_personal_trainer_custom_css .='font-size: '.esc_html($vw_personal_trainer_scroll_to_top_font_size).';';
		$vw_personal_trainer_custom_css .='}';
	}

	$vw_personal_trainer_scroll_to_top_padding = get_theme_mod('vw_personal_trainer_scroll_to_top_padding');
	$vw_personal_trainer_scroll_to_top_padding = get_theme_mod('vw_personal_trainer_scroll_to_top_padding');
	if($vw_personal_trainer_scroll_to_top_padding != false){
		$vw_personal_trainer_custom_css .='.scrollup i{';
			$vw_personal_trainer_custom_css .='padding-top: '.esc_html($vw_personal_trainer_scroll_to_top_padding).';padding-bottom: '.esc_html($vw_personal_trainer_scroll_to_top_padding).';';
		$vw_personal_trainer_custom_css .='}';
	}

	$vw_personal_trainer_scroll_to_top_width = get_theme_mod('vw_personal_trainer_scroll_to_top_width');
	if($vw_personal_trainer_scroll_to_top_width != false){
		$vw_personal_trainer_custom_css .='.scrollup i{';
			$vw_personal_trainer_custom_css .='width: '.esc_html($vw_personal_trainer_scroll_to_top_width).';';
		$vw_personal_trainer_custom_css .='}';
	}

	$vw_personal_trainer_scroll_to_top_height = get_theme_mod('vw_personal_trainer_scroll_to_top_height');
	if($vw_personal_trainer_scroll_to_top_height != false){
		$vw_personal_trainer_custom_css .='.scrollup i{';
			$vw_personal_trainer_custom_css .='height: '.esc_html($vw_personal_trainer_scroll_to_top_height).';';
		$vw_personal_trainer_custom_css .='}';
	}

	$vw_personal_trainer_scroll_to_top_border_radius = get_theme_mod('vw_personal_trainer_scroll_to_top_border_radius');
	if($vw_personal_trainer_scroll_to_top_border_radius != false){
		$vw_personal_trainer_custom_css .='.scrollup i{';
			$vw_personal_trainer_custom_css .='border-radius: '.esc_html($vw_personal_trainer_scroll_to_top_border_radius).'px;';
		$vw_personal_trainer_custom_css .='}';
	}

	/*----------------Social Icons Settings ------------------*/

	$vw_personal_trainer_social_icon_font_size = get_theme_mod('vw_personal_trainer_social_icon_font_size');
	if($vw_personal_trainer_social_icon_font_size != false){
		$vw_personal_trainer_custom_css .='#sidebar .custom-social-icons i, #footer .custom-social-icons i{';
			$vw_personal_trainer_custom_css .='font-size: '.esc_html($vw_personal_trainer_social_icon_font_size).';';
		$vw_personal_trainer_custom_css .='}';
	}

	$vw_personal_trainer_social_icon_padding = get_theme_mod('vw_personal_trainer_social_icon_padding');
	if($vw_personal_trainer_social_icon_padding != false){
		$vw_personal_trainer_custom_css .='#sidebar .custom-social-icons i, #footer .custom-social-icons i{';
			$vw_personal_trainer_custom_css .='padding: '.esc_html($vw_personal_trainer_social_icon_padding).';';
		$vw_personal_trainer_custom_css .='}';
	}

	$vw_personal_trainer_social_icon_width = get_theme_mod('vw_personal_trainer_social_icon_width');
	if($vw_personal_trainer_social_icon_width != false){
		$vw_personal_trainer_custom_css .='#sidebar .custom-social-icons i, #footer .custom-social-icons i{';
			$vw_personal_trainer_custom_css .='width: '.esc_html($vw_personal_trainer_social_icon_width).';';
		$vw_personal_trainer_custom_css .='}';
	}

	$vw_personal_trainer_social_icon_height = get_theme_mod('vw_personal_trainer_social_icon_height');
	if($vw_personal_trainer_social_icon_height != false){
		$vw_personal_trainer_custom_css .='#sidebar .custom-social-icons i, #footer .custom-social-icons i{';
			$vw_personal_trainer_custom_css .='height: '.esc_html($vw_personal_trainer_social_icon_height).';';
		$vw_personal_trainer_custom_css .='}';
	}

	$vw_personal_trainer_social_icon_border_radius = get_theme_mod('vw_personal_trainer_social_icon_border_radius');
	if($vw_personal_trainer_social_icon_border_radius != false){
		$vw_personal_trainer_custom_css .='#sidebar .custom-social-icons i, #footer .custom-social-icons i{';
			$vw_personal_trainer_custom_css .='border-radius: '.esc_html($vw_personal_trainer_social_icon_border_radius).'px;';
		$vw_personal_trainer_custom_css .='}';
	}

	/*----------------Woocommerce Products Settings ------------------*/

	$vw_personal_trainer_products_padding_top_bottom = get_theme_mod('vw_personal_trainer_products_padding_top_bottom');
	if($vw_personal_trainer_products_padding_top_bottom != false){
		$vw_personal_trainer_custom_css .='.woocommerce ul.products li.product, .woocommerce-page ul.products li.product{';
			$vw_personal_trainer_custom_css .='padding-top: '.esc_html($vw_personal_trainer_products_padding_top_bottom).'!important; padding-bottom: '.esc_html($vw_personal_trainer_products_padding_top_bottom).'!important;';
		$vw_personal_trainer_custom_css .='}';
	}

	$vw_personal_trainer_products_padding_left_right = get_theme_mod('vw_personal_trainer_products_padding_left_right');
	if($vw_personal_trainer_products_padding_left_right != false){
		$vw_personal_trainer_custom_css .='.woocommerce ul.products li.product, .woocommerce-page ul.products li.product{';
			$vw_personal_trainer_custom_css .='padding-left: '.esc_html($vw_personal_trainer_products_padding_left_right).'!important; padding-right: '.esc_html($vw_personal_trainer_products_padding_left_right).'!important;';
		$vw_personal_trainer_custom_css .='}';
	}

	$vw_personal_trainer_products_box_shadow = get_theme_mod('vw_personal_trainer_products_box_shadow');
	if($vw_personal_trainer_products_box_shadow != false){
		$vw_personal_trainer_custom_css .='.woocommerce ul.products li.product, .woocommerce-page ul.products li.product{';
				$vw_personal_trainer_custom_css .='box-shadow: '.esc_html($vw_personal_trainer_products_box_shadow).'px '.esc_html($vw_personal_trainer_products_box_shadow).'px '.esc_html($vw_personal_trainer_products_box_shadow).'px #ddd;';
		$vw_personal_trainer_custom_css .='}';
	}

	$vw_personal_trainer_products_border_radius = get_theme_mod('vw_personal_trainer_products_border_radius');
	if($vw_personal_trainer_products_border_radius != false){
		$vw_personal_trainer_custom_css .='.woocommerce ul.products li.product, .woocommerce-page ul.products li.product{';
			$vw_personal_trainer_custom_css .='border-radius: '.esc_html($vw_personal_trainer_products_border_radius).'px;';
		$vw_personal_trainer_custom_css .='}';
	}
