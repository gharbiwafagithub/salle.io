<?php
//about theme info
add_action( 'admin_menu', 'vw_personal_trainer_gettingstarted' );
function vw_personal_trainer_gettingstarted() {    	
	add_theme_page( esc_html__('About VW Personal Trainer', 'vw-personal-trainer'), esc_html__('About VW Personal Trainer', 'vw-personal-trainer'), 'edit_theme_options', 'vw_personal_trainer_guide', 'vw_personal_trainer_mostrar_guide');   
}

// Add a Custom CSS file to WP Admin Area
function vw_personal_trainer_admin_theme_style() {
   wp_enqueue_style( 'vw-personal-trainer-font', vw_personal_trainer_admin_font_url(), array() );
   wp_enqueue_style('vw-personal-trainer-custom-admin-style', get_template_directory_uri() . '/inc/getstart/getstart.css');
   wp_enqueue_script('vw-personal-trainer-tabs', get_template_directory_uri() . '/inc/getstart/js/tab.js');
}
add_action('admin_enqueue_scripts', 'vw_personal_trainer_admin_theme_style');

// Theme Font URL
function vw_personal_trainer_admin_font_url() {
	$font_url = '';
	$font_family = array();
	$font_family[] = 'Muli:300,400,600,700,800,900';

	$query_args = array(
		'family'	=> rawurlencode(implode('|',$font_family)),
	);
	$font_url = add_query_arg($query_args,'//fonts.googleapis.com/css');
	return $font_url;
}

//guidline for about theme
function vw_personal_trainer_mostrar_guide() { 
	//custom function about theme customizer
	$return = add_query_arg( array()) ;
	$theme = wp_get_theme( 'vw-personal-trainer' );
?>

<div class="wrapper-info">
    <div class="col-left">
    	<h2><?php esc_html_e( 'Welcome to VW Personal Trainer Theme', 'vw-personal-trainer' ); ?> <span class="version">Version: <?php echo esc_html($theme['Version']);?></span></h2>
    	<p><?php esc_html_e('All our WordPress themes are modern, minimalist, 100% responsive, seo-friendly,feature-rich, and multipurpose that best suit designers, bloggers and other professionals who are working in the creative fields.','vw-personal-trainer'); ?></p>
    </div>
    <div class="col-right">
    	<div class="logo">
			<img src="<?php echo esc_url(get_template_directory_uri()); ?>/inc/getstart/images/final-logo.png" alt="" />
		</div>
		<div class="update-now">
			<h4><?php esc_html_e('Buy VW Personal Trainer at 20% Discount','vw-personal-trainer'); ?></h4>
			<h4><?php esc_html_e('Use Coupon','vw-personal-trainer'); ?> ( <span><?php esc_html_e('vwpro20','vw-personal-trainer'); ?></span> ) </h4> 
			<div class="info-link">
				<a href="<?php echo esc_url( VW_PERSONAL_TRAINER_BUY_NOW ); ?>" target="_blank"> <?php esc_html_e( 'Upgrade to Pro', 'vw-personal-trainer' ); ?></a>
			</div>
		</div>
    </div>

    <div class="tab-sec">
		<div class="tab">
		  <button class="tablinks" onclick="vw_personal_trainer_open_tab(event, 'theme_lite')"><?php esc_html_e( 'Getting Started', 'vw-personal-trainer' ); ?></button>		  
		  <button class="tablinks" onclick="vw_personal_trainer_open_tab(event, 'theme_pro')"><?php esc_html_e( 'Get Premium', 'vw-personal-trainer' ); ?></button>
		  <button class="tablinks" onclick="vw_personal_trainer_open_tab(event, 'free_pro')"><?php esc_html_e( 'Support', 'vw-personal-trainer' ); ?></button>
		</div>

		<!-- Tab content -->
		<div id="theme_lite" class="tabcontent open">
			<h3><?php esc_html_e( 'Lite Theme Information', 'vw-personal-trainer' ); ?></h3>
			<hr class="h3hr">
		  	<p><?php esc_html_e('VW Personal Trainer is a boldly stylish, graceful, resourceful and feature-full fitness WordPress theme designed and developed for gym, fitness clubs, personal trainers, yoga classes, health consultants, lifestyle coach, physiotherapy centres, fitness studios, nutritionists, massage and spa centres, gymnasium trainers, sports coaches, wrestling academy, boxing club and all businesses related to health and fitness. This multipurpose theme can be customized to be used as a health blog or a trainer portfolio. Its background, colour, fonts, logo and various other components can be changed through theme customizer which eliminates the need to hire a professional coder to manage your website. VW Personal Trainer is responsive, retina ready, social media linked and SEO ready. It loads on all browsers and can be translated into several languages including RTL writing style language. It is built on the latest WordPress version and follows standard coding format. This health and fitness theme is loaded with amazing features and some over-the-top functionality to get a modern website. It offers various layout options, many other header and footer styles and some beautiful blog layouts. Its design is fresh and alluring to capture attention instantly. It supports various post formats and has many predesigned sections. It comes with online documentation.  ','vw-personal-trainer'); ?></p>
		  	<div class="col-left-inner">
		  		<h4><?php esc_html_e( 'Theme Documentation', 'vw-personal-trainer' ); ?></h4>
				<p><?php esc_html_e( 'If you need any assistance regarding setting up and configuring the Theme, our documentation is there.', 'vw-personal-trainer' ); ?></p>
				<div class="info-link">
					<a href="<?php echo esc_url( VW_PERSONAL_TRAINER_FREE_THEME_DOC ); ?>" target="_blank"> <?php esc_html_e( 'Documentation', 'vw-personal-trainer' ); ?></a>
				</div>
				<hr>
				<h4><?php esc_html_e('Theme Customizer', 'vw-personal-trainer'); ?></h4>
				<p> <?php esc_html_e('To begin customizing your website, start by clicking "Customize".', 'vw-personal-trainer'); ?></p>
				<div class="info-link">
					<a target="_blank" href="<?php echo esc_url( admin_url('customize.php') ); ?>"><?php esc_html_e('Customizing', 'vw-personal-trainer'); ?></a>
				</div>
				<hr>				
				<h4><?php esc_html_e('Having Trouble, Need Support?', 'vw-personal-trainer'); ?></h4>
				<p> <?php esc_html_e('Our dedicated team is well prepared to help you out in case of queries and doubts regarding our theme.', 'vw-personal-trainer'); ?></p>
				<div class="info-link">
					<a href="<?php echo esc_url( VW_PERSONAL_TRAINER_SUPPORT ); ?>" target="_blank"><?php esc_html_e('Support Forum', 'vw-personal-trainer'); ?></a>
				</div>
				<hr>
				<h4><?php esc_html_e('Reviews & Testimonials', 'vw-personal-trainer'); ?></h4>
				<p> <?php esc_html_e('All the features and aspects of this WordPress Theme are phenomenal. I\'d recommend this theme to all.', 'vw-personal-trainer'); ?>  </p>
				<div class="info-link">
					<a href="<?php echo esc_url( VW_PERSONAL_TRAINER_REVIEW ); ?>" target="_blank"><?php esc_html_e('Reviews', 'vw-personal-trainer'); ?></a>
				</div>
		  		<div class="link-customizer">
					<h3><?php esc_html_e( 'Link to customizer', 'vw-personal-trainer' ); ?></h3>
					<hr class="h3hr">
					<div class="first-row">
						<div class="row-box">
							<div class="row-box1">
								<span class="dashicons dashicons-format-image"></span><a href="<?php echo esc_url( admin_url('customize.php?autofocus[control]=custom_logo') ); ?>" target="_blank"><?php esc_html_e('Upload your logo','vw-personal-trainer'); ?></a>
							</div>
							<div class="row-box2">
								<span class="dashicons dashicons-images-alt"></span><a href="<?php echo esc_url( admin_url('customize.php?autofocus[section]=vw_personal_trainer_topbar') ); ?>" target="_blank"><?php esc_html_e('Topbar Settings','vw-personal-trainer'); ?></a>
							</div>
						</div>
						<div class="row-box">
							<div class="row-box1">
								<span class="dashicons dashicons-align-center"></span><a href="<?php echo esc_url( admin_url('customize.php?autofocus[section]=vw_personal_trainer_slidersettings') ); ?>" target="_blank"><?php esc_html_e('Slider Section','vw-personal-trainer'); ?></a>
							</div>
							<div class="row-box2">
								<span class="dashicons dashicons-align-center"></span><a href="<?php echo esc_url( admin_url('customize.php?autofocus[section]=vw_personal_trainer_footer') ); ?>" target="_blank"><?php esc_html_e('Footer Text','vw-personal-trainer'); ?></a>
							</div>
						</div>
						<div class="row-box">
							<div class="row-box1">
								<span class="dashicons dashicons-editor-aligncenter"></span><a href="<?php echo esc_url( admin_url('customize.php?autofocus[panel]=nav_menus') ); ?>" target="_blank"><?php esc_html_e('Menus','vw-personal-trainer'); ?></a>
							</div>
							<div class="row-box2">
								<span class="dashicons dashicons-screenoptions"></span><a href="<?php echo esc_url( admin_url('customize.php?autofocus[panel]=vw_personal_trainer_typography') ); ?>" target="_blank"><?php esc_html_e('Typography','vw-personal-trainer'); ?></a>
							</div>
						</div>
						
						<div class="row-box">
							<div class="row-box1">
								<span class="dashicons dashicons-welcome-write-blog"></span><a href="<?php echo esc_url( admin_url('customize.php?autofocus[section]=vw_personal_trainer_left_right') ); ?>" target="_blank"><?php esc_html_e('Blog Layout','vw-personal-trainer'); ?></a>
							</div>
							 <div class="row-box2">
								<span class="dashicons dashicons-screenoptions"></span><a href="<?php echo esc_url( admin_url('customize.php?autofocus[panel]=widgets') ); ?>" target="_blank"><?php esc_html_e('Footer Widget','vw-personal-trainer'); ?></a>
							</div> 
						</div>
					</div>
				</div>
		  	</div>
			<div class="col-right-inner">
				<h3 class="page-template"><?php esc_html_e('How to set up Home Page Template','vw-personal-trainer'); ?></h3>
			  	<hr class="h3hr">
				<p><?php esc_html_e('Follow these instructions to setup Home page.','vw-personal-trainer'); ?></p>
                <ul>
                	<li><?php esc_html_e('1. Create a Page to set template:  Go to ','vw-personal-trainer'); ?>
                  	<b><?php esc_html_e('Dashboard &gt;&gt; Pages &gt;&gt; Add New Page','vw-personal-trainer'); ?></b>.
                  	<p><?php esc_html_e('Label it "home" or anything as you wish. Then select template "home-page" from template dropdown.','vw-personal-trainer'); ?></p></li>
                  	<img src="<?php echo esc_url(get_template_directory_uri()); ?>/inc/getstart/images/home-page-template.png" alt="" />
                  	<p></p><span class="strong"><?php esc_html_e('2. Set the front page:','vw-personal-trainer'); ?></span><?php esc_html_e(' Go to ','vw-personal-trainer'); ?>
				  	<b><?php esc_html_e(' Settings -&gt; Reading --&gt; Set the front page display static page to home page ','vw-personal-trainer'); ?></b></p>
                  	<img src="<?php echo esc_url(get_template_directory_uri()); ?>/inc/getstart/images/set-front-page.png" alt="" />
                  	<p><?php esc_html_e(' Once you are done with this, you can see all the demo content on front page. ','vw-personal-trainer'); ?></p>
                </ul>
		  	</div>
		</div>	

		<div id="theme_pro" class="tabcontent">
		  	<h3><?php esc_html_e( 'Premium Theme Information', 'vw-personal-trainer' ); ?></h3>
			<hr class="h3hr">
		    <div class="col-left-pro">
		    	<p><?php esc_html_e('Capture visitors attention and encourage them to get into their fitness attire through your website designed with this personal trainer WordPress theme that has a bold and stylish design, clean and clutter-free layout and robust and reliable code. It is especially designed for fitness clubs, gyms, physiotherapists, yoga classes, health consultants, nutritionists, fitness & health bloggers and everything pertaining to health and fitness industry. This personal trainer theme has thoughtfully designed sections to professionally display your services and keep audience engaged for a longer period of time. It is based on the recently launched WordPress version and sincerely abides by WordPress coding standards. The best part about this personal trainer WordPress theme is that it does not require any previous coding knowledge to set up and handle it, relieving you from the burden of maintaining it and preventing you from diving into the complex coding world.','vw-personal-trainer'); ?></p>
		    	<div class="pro-links">
			    	<a href="<?php echo esc_url( VW_PERSONAL_TRAINER_LIVE_DEMO ); ?>" target="_blank"><?php esc_html_e('Live Demo', 'vw-personal-trainer'); ?></a>
					<a href="<?php echo esc_url( VW_PERSONAL_TRAINER_BUY_NOW ); ?>"><?php esc_html_e('Buy Pro', 'vw-personal-trainer'); ?></a>
					<a href="<?php echo esc_url( VW_PERSONAL_TRAINER_PRO_DOC ); ?>" target="_blank"><?php esc_html_e('Pro Documentation', 'vw-personal-trainer'); ?></a>
				</div>
		    </div>
		    <div class="col-right-pro">
		    	<img src="<?php echo esc_url(get_template_directory_uri()); ?>/inc/getstart/images/responsive.png" alt="" />
		    </div>
		    <div class="featurebox">
			    <h3><?php esc_html_e( 'Theme Features', 'vw-personal-trainer' ); ?></h3>
				<hr class="h3hr">
				<div class="table-image">
					<table class="tablebox">
						<thead>
							<tr>
								<th></th>
								<th><?php esc_html_e('Free Themes', 'vw-personal-trainer'); ?></th>
								<th><?php esc_html_e('Premium Themes', 'vw-personal-trainer'); ?></th>
							</tr>
						</thead>
						<tbody>
							<tr>
								<td><?php esc_html_e('Theme Customization', 'vw-personal-trainer'); ?></td>
								<td class="table-img"><img src="<?php echo esc_url(get_template_directory_uri()); ?>/inc/getstart/images/right-arrow.png" alt="" /></td>
								<td class="table-img"><img src="<?php echo esc_url(get_template_directory_uri()); ?>/inc/getstart/images/right-arrow.png" alt="" /></td>
							</tr>
							<tr class="odd">
								<td><?php esc_html_e('Responsive Design', 'vw-personal-trainer'); ?></td>
								<td class="table-img"><img src="<?php echo esc_url(get_template_directory_uri()); ?>/inc/getstart/images/right-arrow.png" alt="" /></td>
								<td class="table-img"><img src="<?php echo esc_url(get_template_directory_uri()); ?>/inc/getstart/images/right-arrow.png" alt="" /></td>
							</tr>
							<tr>
								<td><?php esc_html_e('Logo Upload', 'vw-personal-trainer'); ?></td>
								<td class="table-img"><img src="<?php echo esc_url(get_template_directory_uri()); ?>/inc/getstart/images/right-arrow.png" alt="" /></td>
								<td class="table-img"><img src="<?php echo esc_url(get_template_directory_uri()); ?>/inc/getstart/images/right-arrow.png" alt="" /></td>
							</tr>
							<tr class="odd">
								<td><?php esc_html_e('Social Media Links', 'vw-personal-trainer'); ?></td>
								<td class="table-img"><img src="<?php echo esc_url(get_template_directory_uri()); ?>/inc/getstart/images/right-arrow.png" alt="" /></td>
								<td class="table-img"><img src="<?php echo esc_url(get_template_directory_uri()); ?>/inc/getstart/images/right-arrow.png" alt="" /></td>
							</tr>
							<tr>
								<td><?php esc_html_e('Slider Settings', 'vw-personal-trainer'); ?></td>
								<td class="table-img"><img src="<?php echo esc_url(get_template_directory_uri()); ?>/inc/getstart/images/right-arrow.png" alt="" /></td>
								<td class="table-img"><img src="<?php echo esc_url(get_template_directory_uri()); ?>/inc/getstart/images/right-arrow.png" alt="" /></td>
							</tr>
							<tr class="odd">
								<td><?php esc_html_e('Number of Slides', 'vw-personal-trainer'); ?></td>
								<td class="table-img"><?php esc_html_e('4', 'vw-personal-trainer'); ?></td>
								<td class="table-img"><?php esc_html_e('Unlimited', 'vw-personal-trainer'); ?></td>
							</tr>
							<tr>
								<td><?php esc_html_e('Template Pages', 'vw-personal-trainer'); ?></td>
								<td class="table-img"><?php esc_html_e('3', 'vw-personal-trainer'); ?></td>
								<td class="table-img"><?php esc_html_e('6', 'vw-personal-trainer'); ?></td>
							</tr>
							<tr class="odd">
								<td><?php esc_html_e('Home Page Template', 'vw-personal-trainer'); ?></td>
								<td class="table-img"><?php esc_html_e('1', 'vw-personal-trainer'); ?></td>
								<td class="table-img"><?php esc_html_e('1', 'vw-personal-trainer'); ?></td>
							</tr>
							<tr>
								<td><?php esc_html_e('Contact us Page Template', 'vw-personal-trainer'); ?></td>
								<td class="table-img">0</td>
								<td class="table-img"><?php esc_html_e('1', 'vw-personal-trainer'); ?></td>
							</tr>
							<tr class="odd">
								<td><?php esc_html_e('Blog Templates & Layout', 'vw-personal-trainer'); ?></td>
								<td class="table-img">0</td>
								<td class="table-img"><?php esc_html_e('3(Full width/Left/Right Sidebar)', 'vw-personal-trainer'); ?></td>
							</tr>
							<tr>
								<td><?php esc_html_e('Page Templates & Layout', 'vw-personal-trainer'); ?></td>
								<td class="table-img">0</td>
								<td class="table-img"><?php esc_html_e('2(Left/Right Sidebar)', 'vw-personal-trainer'); ?></td>
							</tr>
							<tr class="odd">
								<td><?php esc_html_e('Full Documentation', 'vw-personal-trainer'); ?></td>
								<td class="table-img"><img src="<?php echo esc_url(get_template_directory_uri()); ?>/inc/getstart/images/right-arrow.png" alt="" /></td>
								<td class="table-img"><img src="<?php echo esc_url(get_template_directory_uri()); ?>/inc/getstart/images/right-arrow.png" alt="" /></td>
							</tr>
							<tr>
								<td><?php esc_html_e('Latest WordPress Compatibility', 'vw-personal-trainer'); ?></td>
								<td class="table-img"><img src="<?php echo esc_url(get_template_directory_uri()); ?>/inc/getstart/images/right-arrow.png" alt="" /></td>
								<td class="table-img"><img src="<?php echo esc_url(get_template_directory_uri()); ?>/inc/getstart/images/right-arrow.png" alt="" /></td>
							</tr>
							<tr class="odd">
								<td><?php esc_html_e('Woo-Commerce Compatibility', 'vw-personal-trainer'); ?></td>
								<td class="table-img"><img src="<?php echo esc_url(get_template_directory_uri()); ?>/inc/getstart/images/right-arrow.png" alt="" /></td>
								<td class="table-img"><img src="<?php echo esc_url(get_template_directory_uri()); ?>/inc/getstart/images/right-arrow.png" alt="" /></td>
							</tr>
							<tr>
								<td><?php esc_html_e('Support 3rd Party Plugins', 'vw-personal-trainer'); ?></td>
								<td class="table-img"><img src="<?php echo esc_url(get_template_directory_uri()); ?>/inc/getstart/images/right-arrow.png" alt="" /></td>
								<td class="table-img"><img src="<?php echo esc_url(get_template_directory_uri()); ?>/inc/getstart/images/right-arrow.png" alt="" /></td>
							</tr>
							<tr class="odd">
								<td><?php esc_html_e('Secure and Optimized Code', 'vw-personal-trainer'); ?></td>
								<td class="table-img"><img src="<?php echo esc_url(get_template_directory_uri()); ?>/inc/getstart/images/right-arrow.png" alt="" /></td>
								<td class="table-img"><img src="<?php echo esc_url(get_template_directory_uri()); ?>/inc/getstart/images/right-arrow.png" alt="" /></td>
							</tr>
							<tr>
								<td><?php esc_html_e('Exclusive Functionalities', 'vw-personal-trainer'); ?></td>
								<td class="table-img"><img src="<?php echo esc_url(get_template_directory_uri()); ?>/inc/getstart/images/w-arrow.png" alt="" /></td>
								<td class="table-img"><img src="<?php echo esc_url(get_template_directory_uri()); ?>/inc/getstart/images/right-arrow.png" alt="" /></td>
							</tr>
							<tr class="odd">
								<td><?php esc_html_e('Section Enable / Disable', 'vw-personal-trainer'); ?></td>
								<td class="table-img"><img src="<?php echo esc_url(get_template_directory_uri()); ?>/inc/getstart/images/w-arrow.png" alt="" /></td>
								<td class="table-img"><img src="<?php echo esc_url(get_template_directory_uri()); ?>/inc/getstart/images/right-arrow.png" alt="" /></td>
							</tr>
							<tr>
								<td><?php esc_html_e('Section Google Font Choices', 'vw-personal-trainer'); ?></td>
								<td class="table-img"><img src="<?php echo esc_url(get_template_directory_uri()); ?>/inc/getstart/images/w-arrow.png" alt="" /></td>
								<td class="table-img"><img src="<?php echo esc_url(get_template_directory_uri()); ?>/inc/getstart/images/right-arrow.png" alt="" /></td>
							</tr>
							<tr class="odd">
								<td><?php esc_html_e('Gallery', 'vw-personal-trainer'); ?></td>
								<td class="table-img"><img src="<?php echo esc_url(get_template_directory_uri()); ?>/inc/getstart/images/w-arrow.png" alt="" /></td>
								<td class="table-img"><img src="<?php echo esc_url(get_template_directory_uri()); ?>/inc/getstart/images/right-arrow.png" alt="" /></td>
							</tr>
							<tr>
								<td><?php esc_html_e('Simple & Mega Menu Option', 'vw-personal-trainer'); ?></td>
								<td class="table-img"><img src="<?php echo esc_url(get_template_directory_uri()); ?>/inc/getstart/images/w-arrow.png" alt="" /></td>
								<td class="table-img"><img src="<?php echo esc_url(get_template_directory_uri()); ?>/inc/getstart/images/right-arrow.png" alt="" /></td>
							</tr>
							<tr class="odd">
								<td><?php esc_html_e('Support to add custom CSS / JS ', 'vw-personal-trainer'); ?></td>
								<td class="table-img"><img src="<?php echo esc_url(get_template_directory_uri()); ?>/inc/getstart/images/w-arrow.png" alt="" /></td>
								<td class="table-img"><img src="<?php echo esc_url(get_template_directory_uri()); ?>/inc/getstart/images/right-arrow.png" alt="" /></td>
							</tr>
							<tr>
								<td><?php esc_html_e('Shortcodes', 'vw-personal-trainer'); ?></td>
								<td class="table-img"><img src="<?php echo esc_url(get_template_directory_uri()); ?>/inc/getstart/images/w-arrow.png" alt="" /></td>
								<td class="table-img"><img src="<?php echo esc_url(get_template_directory_uri()); ?>/inc/getstart/images/right-arrow.png" alt="" /></td>
							</tr>
							<tr class="odd">
								<td><?php esc_html_e('Custom Background, Colors, Header, Logo & Menu', 'vw-personal-trainer'); ?></td>
								<td class="table-img"><img src="<?php echo esc_url(get_template_directory_uri()); ?>/inc/getstart/images/w-arrow.png" alt="" /></td>
								<td class="table-img"><img src="<?php echo esc_url(get_template_directory_uri()); ?>/inc/getstart/images/right-arrow.png" alt="" /></td>
							</tr>
							<tr>
								<td><?php esc_html_e('Premium Membership', 'vw-personal-trainer'); ?></td>
								<td class="table-img"><img src="<?php echo esc_url(get_template_directory_uri()); ?>/inc/getstart/images/w-arrow.png" alt="" /></td>
								<td class="table-img"><img src="<?php echo esc_url(get_template_directory_uri()); ?>/inc/getstart/images/right-arrow.png" alt="" /></td>
							</tr>
							<tr class="odd">
								<td><?php esc_html_e('Budget Friendly Value', 'vw-personal-trainer'); ?></td>
								<td class="table-img"><img src="<?php echo esc_url(get_template_directory_uri()); ?>/inc/getstart/images/w-arrow.png" alt="" /></td>
								<td class="table-img"><img src="<?php echo esc_url(get_template_directory_uri()); ?>/inc/getstart/images/right-arrow.png" alt="" /></td>
							</tr>
							<tr>
								<td><?php esc_html_e('Priority Error Fixing', 'vw-personal-trainer'); ?></td>
								<td class="table-img"><img src="<?php echo esc_url(get_template_directory_uri()); ?>/inc/getstart/images/w-arrow.png" alt="" /></td>
								<td class="table-img"><img src="<?php echo esc_url(get_template_directory_uri()); ?>/inc/getstart/images/right-arrow.png" alt="" /></td>
							</tr>
							<tr class="odd">
								<td><?php esc_html_e('Custom Feature Addition', 'vw-personal-trainer'); ?></td>
								<td class="table-img"><img src="<?php echo esc_url(get_template_directory_uri()); ?>/inc/getstart/images/w-arrow.png" alt="" /></td>
								<td class="table-img"><img src="<?php echo esc_url(get_template_directory_uri()); ?>/inc/getstart/images/right-arrow.png" alt="" /></td>
							</tr>
							<tr>
								<td><?php esc_html_e('All Access Theme Pass', 'vw-personal-trainer'); ?></td>
								<td class="table-img"><img src="<?php echo esc_url(get_template_directory_uri()); ?>/inc/getstart/images/w-arrow.png" alt="" /></td>
								<td class="table-img"><img src="<?php echo esc_url(get_template_directory_uri()); ?>/inc/getstart/images/right-arrow.png" alt="" /></td>
							</tr>
							<tr class="odd">
								<td><?php esc_html_e('Seamless Customer Support', 'vw-personal-trainer'); ?></td>
								<td class="table-img"><img src="<?php echo esc_url(get_template_directory_uri()); ?>/inc/getstart/images/w-arrow.png" alt="" /></td>
								<td class="table-img"><img src="<?php echo esc_url(get_template_directory_uri()); ?>/inc/getstart/images/right-arrow.png" alt="" /></td>
							</tr>
							<tr>
								<td></td>
								<td class="table-img"></td>
								<td class="update-link"><a href="<?php echo esc_url( VW_PERSONAL_TRAINER_BUY_NOW ); ?>" target="_blank"><?php esc_html_e('Upgrade to Pro', 'vw-personal-trainer'); ?></a></td>
							</tr>
						</tbody>
					</table>
				</div>
			</div>
		</div>

		<div id="free_pro" class="tabcontent">
		  	<div class="col-3">
		  		<h4><span class="dashicons dashicons-star-filled"></span><?php esc_html_e('Pro Version', 'vw-personal-trainer'); ?></h4>
				<p> <?php esc_html_e('To gain access to extra theme options and more interesting features, upgrade to pro version.', 'vw-personal-trainer'); ?></p>
				<div class="info-link">
					<a href="<?php echo esc_url( VW_PERSONAL_TRAINER_BUY_NOW ); ?>" target="_blank"><?php esc_html_e('Get Pro', 'vw-personal-trainer'); ?></a>
				</div>
		  	</div>
		  	<div class="col-3">
		  		<h4><span class="dashicons dashicons-cart"></span><?php esc_html_e('Pre-purchase Queries', 'vw-personal-trainer'); ?></h4>
				<p> <?php esc_html_e('If you have any pre-sale query, we are prepared to resolve it.', 'vw-personal-trainer'); ?></p>
				<div class="info-link">
					<a href="<?php echo esc_url( VW_PERSONAL_TRAINER_CONTACT ); ?>" target="_blank"><?php esc_html_e('Question', 'vw-personal-trainer'); ?></a>
				</div>
		  	</div>
		  	<div class="col-3">		  		
		  		<h4><span class="dashicons dashicons-admin-customizer"></span><?php esc_html_e('Child Theme', 'vw-personal-trainer'); ?></h4>
				<p> <?php esc_html_e('For theme file customizations, make modifications in the child theme and not in the main theme file.', 'vw-personal-trainer'); ?></p>
				<div class="info-link">
					<a href="<?php echo esc_url( VW_PERSONAL_TRAINER_CHILD_THEME ); ?>" target="_blank"><?php esc_html_e('About Child Theme', 'vw-personal-trainer'); ?></a>
				</div>
		  	</div>

		  	<div class="col-3">
		  		<h4><span class="dashicons dashicons-admin-comments"></span><?php esc_html_e('Frequently Asked Questions', 'vw-personal-trainer'); ?></h4>
				<p> <?php esc_html_e('We have gathered top most, frequently asked questions and answered them for your easy understanding. We will list down more as we get new challenging queries. Check back often.', 'vw-personal-trainer'); ?></p>
				<div class="info-link">
					<a href="<?php echo esc_url( VW_PERSONAL_TRAINER_FAQ ); ?>" target="_blank"><?php esc_html_e('View FAQ','vw-personal-trainer'); ?></a>
				</div>
		  	</div>

		  	<div class="col-3">
		  		<h4><span class="dashicons dashicons-sos"></span><?php esc_html_e('Support Queries', 'vw-personal-trainer'); ?></h4>
				<p> <?php esc_html_e('If you have any queries after purchase, you can contact us. We are eveready to help you out.', 'vw-personal-trainer'); ?></p>
				<div class="info-link">
					<a href="<?php echo esc_url( VW_PERSONAL_TRAINER_SUPPORT ); ?>" target="_blank"><?php esc_html_e('Contact Us', 'vw-personal-trainer'); ?></a>
				</div>
		  	</div>
		</div>
	</div>
</div>
<?php } ?>