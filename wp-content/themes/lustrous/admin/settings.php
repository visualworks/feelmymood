<?php /* Theme Customizer For Lustrous Theme */
   
   
	
 	function lustrous_customize_register($wp_customize){
    
	// Theme Colors
 
	$colors = array();
    $colors[] = array( 'slug'=>'bg_color', 'default' => '#ffffff',
    'label' => __( 'Background Color', 'lustrous' ) );
    $colors[] = array( 'slug'=>'primary_color', 'default' => '#FF706C',
    'label' => __( 'Primary Color ', 'lustrous' ) );
    $colors[] = array( 'slug'=>'secondary_color', 'default' => '#1e8cbe',
    'label' => __( 'Post Links Color', 'lustrous' ) );
   
   
	
	foreach($colors as $color)
  {	
    $wp_customize->add_setting( $color['slug'], array( 'default' => $color['default'],
    'type' => 'theme_mod', 'capability' => 'edit_theme_options', 'sanitize_callback' => 'sanitize_hex_color', ));

    $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize,
     $color['slug'], array( 'label' => $color['label'], 'section' => 'colors',
     'settings' => $color['slug'] )));
  }
	// Theme Colors Ends
	// Logo Uploader
	
	$wp_customize->add_section( 'lustrous_logo_fav_section' , array(
    'title'       => __( 'Site Logo', 'lustrous' ),
    'priority'    => 30,
    'description' => 'Upload a logo to replace the default site name and description in the header',) );

    $wp_customize->add_setting( 'lustrous_logo', array(
		'sanitize_callback' => 'esc_url_raw') );

    $wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize, 'lustrous_logo', array(
    'label'    => __( 'Site Logo ( Recommended height - 60px)', 'lustrous' ),
    'section'  => 'lustrous_logo_fav_section',
    'settings' => 'lustrous_logo',
    ) ) );
	
	function check_header_video($file){
  return validate_file($file, array('', 'mp4'));
}

	// Sidebar Position
	
		$wp_customize->add_section( 'sidebar_position', array(
        'title' => 'Sidebbar Position', // The title of section
        'description' => 'Select Your Sidebar Position.', // The description of section
        'priority' => '900',
	) );
	
$wp_customize->add_setting( 'sidebar_position_option', array(
    'default' => 'sidebar_display_right',
    'type' => 'theme_mod',
	'sanitize_callback' => 'lustrous_sanitize_logo_placement',
) );

	$wp_customize->add_control( 'sidebar_position_option', array(
    'label' => 'Display Sidebar on Left or Right',
    'section' => 'sidebar_position',
    'type' => 'radio',
    'choices' => array(
        'sidebar_display_right' => 'Right (Default)',
    	'sidebar_display_left' => 'Left',
        ),
) );

function lustrous_sanitize_logo_placement( $input ) {
    $valid = array(
       'sidebar_display_right' => 'Right (Default)',
    	'sidebar_display_left' => 'Left',
    );
 
    if ( array_key_exists( $input, $valid ) ) {
        return $input;
    } else {
        return '';
    }
}
	  
	// Sidebar Position Ends
	// Social Links
	
	$wp_customize->add_section( 'sociallinks', array(
        'title' => 'Social Links', // The title of section
        'description' => 'Add Your Copyright Notes Here.', // The description of section
        'priority' => '900',
	) );
	
	$wp_customize->add_setting( 'facebooklink', array('default' => 'http://facebook.com/webloggerz','sanitize_callback' => 'esc_url_raw') );
    $wp_customize->add_control( 'facebooklink', array('label' => 'Facebook URL', 'section' => 'sociallinks', ) );
	$wp_customize->add_setting( 'twitterlink', array('default' => 'webloggerz','sanitize_callback' => 'esc_url_raw') );
    $wp_customize->add_control( 'twitterlink', array('label' => 'Twitter Handle', 'section' => 'sociallinks', ) );
    $wp_customize->add_setting( 'googlelink', array('default' => '#', 'sanitize_callback' => 'esc_url_raw') );
    $wp_customize->add_control( 'googlelink', array('label' => 'Google Plus URL','section' => 'sociallinks',) );
	$wp_customize->add_setting( 'pinterestlink', array('default' => '#', 'sanitize_callback' => 'esc_url_raw') );
    $wp_customize->add_control( 'pinterestlink', array('label' => 'Pinterest URL','section' => 'sociallinks',) );
	$wp_customize->add_setting( 'youtubelink', array('default' => '#', 'sanitize_callback' => 'esc_url_raw') );
    $wp_customize->add_control( 'youtubelink', array('label' => 'Youtube URL','section' => 'sociallinks',) );
	$wp_customize->add_setting( 'stumblelink', array('default' => '#', 'sanitize_callback' => 'esc_url_raw') );
    $wp_customize->add_control( 'stumblelink', array('label' => 'Stumbleupon Link','section' => 'sociallinks', ) );
	$wp_customize->add_setting( 'rsslink', array('default' => '#', 'sanitize_callback' => 'esc_url_raw') );
    $wp_customize->add_control( 'rsslink', array('label' => 'RSS Feeds URL','section' => 'sociallinks',) );

	// Social Links Ends
	
 	// Footer Copyright Section
	
	$wp_customize->add_section( 'fcopyright', array(
        'title' => 'Footer Copyright', // The title of section
        'description' => 'Add Your Copyright Notes Here.', // The description of section
        'priority' => '900',
	) );
 
	$wp_customize->add_setting( 'lustrous_footer_top', array('default' => 'Any Text Here','sanitize_callback' => 'sanitize_footer_text',) );
    $wp_customize->add_control( 'lustrous_footer_top', array('label' => 'Footer Text','section' => 'fcopyright',) );
    	
	function sanitize_footer_text( $input ) {
    return wp_kses_post( force_balance_tags( $input ) );
}
	
	
	  } // function ends here

	   // This will output the custom WordPress settings to the live theme's WP head. */
   
   function header_output() {
     $sidebar_pos = get_theme_mod('sidebar_position_option');
     $bgcolor = get_theme_mod('bg_color');
	 $primarycolor = get_theme_mod('primary_color');
	 $secondarycolor = get_theme_mod('secondary_color');
	
	
	 
	 
	 ?><?php echo get_theme_mod('textarea_setting'); 
      if ( ($sidebar_pos == 'sidebar_display_left') || ( ! empty( $bgcolor )) || (!empty($primarycolor)) || (!empty($secondarycolor))){
?>	  <!--Customizer CSS--> 
      
	  <style type="text/css">
	        <?php if ($sidebar_pos == 'sidebar_display_left') { ?>
     	    #content{float:right;}
			.post-container, .page-container, .cat-container, .home-container { margin-left: 440px; margin-right:0px;}
			 #sidebar{margin-right: -420px; margin-left:0px; float: left;}
			 @media only screen and (max-width: 767px) and (min-width: 480px){ .post-container, .page-container, .cat-container, .home-container {margin-left:0px;} }
			 @media only screen and (max-width: 479px){.post-container, .page-container, .cat-container, .home-container{ margin-left:0px;}
			 #sidebar{margin-right:-300px;}
			 }
		    	<?php } ?>

		    <?php if($bgcolor) { ?>
		      body{background-color: <?php echo $bgcolor; ?>}
		   	<?php } ?>
            <?php if($primarycolor) { ?>

			#wp-calendar tbody td, #gototop	{background-color:<?php echo $primarycolor; ?>;}
			  .related-article h5 a:hover, .pagenavi a, #main-footer a,
			  .post-meta-author a:hover , .post-meta-comments a:hover, .comment-metadata a, 
.cdetail h3 a:hover, .cdetail h2 a:hover, #main-nav  #main-menu li:hover > a {color: <?php echo $primarycolor; ?>;}

.comment-meta {box-shadow: 0 0 1px 0 <?php echo $primarycolor; ?>; -webkit-box-shadow: 0 0 1px 0 <?php echo $primarycolor; ?>;}

			  #main-nav  #main-menu ul li{border-bottom: 1px solid <?php echo $primarycolor; ?>;}
			   #main-footer {border-top: 6px solid <?php echo $primarycolor; ?>;}
	  		
			.widget_nav_menu #menu-top-menu li a:hover, .widget_archive ul li a:hover, .widget_categories ul li a:hover, .widget_meta ul li a:hover, 
			  .widget_pages ul li a:hover, .widget_nav_menu ul li a:hover, .widget_recent_comments ul li a:hover, .widget_rss ul li a:hover,
			  .widget_recent_entries ul li:hover, .widget_recent_entries ul li a:hover, .lustrous-category-posts li p a:hover
			  {color: <?php echo $primarycolor; ?>;}
			  #respond .form-submit input, .button, .next-image a, .previous-image a, .comment-list .reply {background-color:<?php echo $primarycolor; ?>;}
			
			
			@media only screen and (max-width: 479px){#main-nav  #main-menu li:hover > a {color: #fff;}}
			
@media only screen and (max-width: 767px) and (min-width: 480px){ #main-nav  #main-menu li:hover > a {color: #fff;}}
			@media only screen and (max-width: 985px) and (min-width: 768px){#main-nav  #main-menu li:hover > a {color: #fff;}	}	
		   	<?php } ?>

			<?php if($secondarycolor) { ?>
			.entry-content a, 
			  .search-block #s,  .top-nav li a,
			  .catbox a {color:<?php echo $secondarycolor; ?>;}
			  	.entry-content a:hover{ border-bottom-color: <?php echo $secondarycolor; ?>;}	  
					  
					  
			  <?php } ?>
	  </style>
      <!--/Customizer CSS-->
	<?php } ?>
	<?php } 
	
	   function footer_output() {
	   ?><?php echo get_theme_mod('textarea_setting2'); 
	   }
	  
	  
add_action( 'customize_register', 'lustrous_customize_register', 11 );
add_action( 'wp_head', 'header_output', 11 );
add_action( 'wp_footer', 'footer_output', 11 );

//add_action( 'customize_register' , array( 'lustrous_Customize' , 'register' ) );
//add_action( 'wp_head' , array( 'lustrous_Customize' , 'header_output' ) );