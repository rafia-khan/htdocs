<?php 

//  add photo support----------------------------------------------------------------
add_theme_support( 'post-thumbnails' );
// photo support end----------------------------------------------------------------
//add css-class support----------------------------------------------------------------
function add_my_styles(){
    wp_enqueue_style('style',get_stylesheet_uri(), array('bootstarap'));
    wp_enqueue_style('fonts',"https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,700,700i|Montserrat:300,400,500,700");
    wp_enqueue_style('bootstrap', get_template_directory_uri()."/lib/bootstrap/css/bootstrap.min.css");
    wp_enqueue_style('awesome',get_template_directory_uri()."/lib/font-awesome/css/font-awesome.min.css");
    wp_enqueue_style('animate',get_template_directory_uri()."/lib/animate/animate.min.css");
    wp_enqueue_style('ionicons',get_template_directory_uri()."/lib/ionicons/css/ionicons.min.css");
    wp_enqueue_style('owlcarousel',get_template_directory_uri()."/lib/owlcarousel/assets/owl.carousel.min.css");
    wp_enqueue_style('lightboxcss',get_template_directory_uri()."/lib/lightbox/css/lightbox.min.css");
    wp_enqueue_style('template_css',get_template_directory_uri()."/css/style.css",array('bootstrap'));
    wp_enqueue_style('dashicons-css','http://localhost/wordpress/wp-includes/css/dashicons.min.css?ver=6.4.2');
    wp_enqueue_style('admin-bar-css','http://localhost/wordpress/wp-includes/css/admin-bar.min.css?ver=6.4.2');
}
add_action('wp_enqueue_scripts','add_my_styles');
// css ends----------------------------------------------------------------
//javascript starts----------------------------------------------------------------
function my_scripts(){
    wp_enqueue_script('mainjs',get_template_directory_uri()."/js/main.js", array(), null, true);
    wp_enqueue_script('jqueryjs',get_template_directory_uri()."/lib/jquery/jquery.min.js", array(), null, true);
    wp_enqueue_script('migratejs',get_template_directory_uri()."/lib/jquery/jquery-migrate.min.js", array(), null, true);
    wp_enqueue_script('bootstrapjs',get_template_directory_uri()."/lib/bootstrap/js/bootstrap.bundle.min.js", array(), null, true);
    wp_enqueue_script('easingjs',get_template_directory_uri()."/lib/easing/easing.min.js", array(), null, true);
    wp_enqueue_script('superfish',get_template_directory_uri()."/lib/superfish/hoverIntent.js", array(), null, true);
    wp_enqueue_script('superfishmin',get_template_directory_uri()."/lib/superfish/superfish.min.js", array(), null, true);
    wp_enqueue_script('wowjs',get_template_directory_uri()."/lib/wow/wow.min.js", array(), null, true);
    wp_enqueue_script('waypoints',get_template_directory_uri()."/lib/waypoints/waypoints.min.js", array(), null, true);
    wp_enqueue_script('counterup',get_template_directory_uri()."/lib/counterup/counterup.min.js", array(), null, true);
    wp_enqueue_script('owlcarouseljs',get_template_directory_uri()."/lib/owlcarousel/owl.carousel.min.js", array(), null, true);
    wp_enqueue_script('isotope',get_template_directory_uri()."/lib/isotope/isotope.pkgd.min.js", array(), null, true);
    wp_enqueue_script('lightbox',get_template_directory_uri()."/lib/lightbox/js/lightbox.min.js", array(), null, true);
    wp_enqueue_script('touchSwipe',get_template_directory_uri()."/lib/touchSwipe/jquery.touchSwipe.min.js", array(), null, true);
    wp_enqueue_script('contactform',get_template_directory_uri()."/contactform/contactform.js", array(), null, true);
    wp_enqueue_script('hoverintent-js-js',"http://localhost/wordpress/wp-includes/js/hoverintent-js.min.js?ver=2.2.1");
    wp_enqueue_script('admin-bar-js',"http://localhost/wordpress/wp-includes/js/admin-bar.min.js?ver=6.4.2");
}
add_action('wp_enqueue_scripts','my_scripts');
// javascript ends----------------------------------------------------------------


// add menu starting----------------------------------------------------------------
if ( ! function_exists( 'mytheme_register_nav_menu' ) ) {

	function mytheme_register_nav_menu(){
		register_nav_menus( array(
	    	'primary_menu' => __( 'Primary Menu', 'text_domain' ),
	    	'footer_menu'  => __( 'Footer Menu', 'text_domain' ),
		) );
	}
	add_action( 'after_setup_theme', 'mytheme_register_nav_menu', 0 );
}
class AWP_Menu_Walker extends Walker_Nav_Menu{
    
    function start_el(&$output, $item, $depth = 0, $args = [], $id = 0)
    {
        $output .= '<li class="nav-item"><a class="nav-link" href="' . $item->url . '">' . $item->title . '</a>';
    }
}

// menu ends ----------------------------------------------------------------

// slide menu add-------------------------------------------------------------

function set_my_sidebar(){
    register_sidebar(array(
        'name'          => 'Sidebar', 'textdomain',
		'id'            => 'sidebar-1',
        'before_widget' => '<div id="%1$s" class="widget %2$s">',
		'after_widget'  => '</div>',
    ));
}
add_action('widgets_init','set_my_sidebar');

function wpdocs_register_Slider_cpt() {

    $labels = array(
 
       'name'                     => __( 'Sliders', 'TEXTDOMAINHERE' ),
       'singular_name'            => __( 'Slider', 'TEXTDOMAINHERE' ),
       'add_new'                  => __( 'Add New', 'TEXTDOMAINHERE' ),
       'add_new_item'             => __( 'Add New Slider', 'TEXTDOMAINHERE' ),
       'edit_item'                => __( 'Edit Slider', 'TEXTDOMAINHERE' ),
       'new_item'                 => __( 'New Slider', 'TEXTDOMAINHERE' ),
       'view_item'                => __( 'View Slider', 'TEXTDOMAINHERE' ),
       'view_items'               => __( 'View Sliders', 'TEXTDOMAINHERE' ),
       'search_items'             => __( 'Search Sliders', 'TEXTDOMAINHERE' ),
       'not_found'                => __( 'No Sliders found.', 'TEXTDOMAINHERE' ),
       'not_found_in_trash'       => __( 'No Sliders found in Trash.', 'TEXTDOMAINHERE' ),
       'parent_item_colon'        => __( 'Parent Sliders:', 'TEXTDOMAINHERE' ),
       'all_items'                => __( 'All Sliders', 'TEXTDOMAINHERE' ),
       'archives'                 => __( 'Slider Archives', 'TEXTDOMAINHERE' ),
       'attributes'               => __( 'Slider Attributes', 'TEXTDOMAINHERE' ),
       'insert_into_item'         => __( 'Insert into Slider', 'TEXTDOMAINHERE' ),
       'uploaded_to_this_item'    => __( 'Uploaded to this Slider', 'TEXTDOMAINHERE' ),
       'featured_image'           => __( 'Featured Image', 'TEXTDOMAINHERE' ),
       'set_featured_image'       => __( 'Set featured image', 'TEXTDOMAINHERE' ),
       'remove_featured_image'    => __( 'Remove featured image', 'TEXTDOMAINHERE' ),
       'use_featured_image'       => __( 'Use as featured image', 'TEXTDOMAINHERE' ),
       'menu_name'                => __( 'Sliders', 'TEXTDOMAINHERE' ),
       'filter_items_list'        => __( 'Filter Slider list', 'TEXTDOMAINHERE' ),
       'filter_by_date'           => __( 'Filter by date', 'TEXTDOMAINHERE' ),
       'items_list_navigation'    => __( 'Sliders list navigation', 'TEXTDOMAINHERE' ),
       'items_list'               => __( 'Sliders list', 'TEXTDOMAINHERE' ),
       'item_published'           => __( 'Slider published.', 'TEXTDOMAINHERE' ),
       'item_published_privately' => __( 'Slider published privately.', 'TEXTDOMAINHERE' ),
       'item_reverted_to_draft'   => __( 'Slider reverted to draft.', 'TEXTDOMAINHERE' ),
       'item_scheduled'           => __( 'Slider scheduled.', 'TEXTDOMAINHERE' ),
       'item_updated'             => __( 'Slider updated.', 'TEXTDOMAINHERE' ),
       'item_link'                => __( 'Slider Link', 'TEXTDOMAINHERE' ),
       'item_link_description'    => __( 'A link to an Slider.', 'TEXTDOMAINHERE' ),
 
    );
 
    $args = array(
 
       'labels'                => $labels,
       'description'           => __( 'organize and manage company Sliders', 'TEXTDOMAINHERE' ),
       'public'                => true,
       'menu_icon'             => 'dashicons-xing',
       'capability_type'       => 'post',
       'supports'              => array( 'title', 'editor','thumbnail','custom-fields' ),
    );
 
    register_post_type( 'slider', $args );
 
 }
 add_action( 'init', 'wpdocs_register_Slider_cpt' );

 // slider end----------------------------------------------------------------

 // customization start-------------------------------------------------------

function my_customizer( $wp_customize ) {
   // Theme Options Panel
    $wp_customize->add_panel( 'my_theme_options', 
        array(
            'title'            => __( 'Theme Options', 'my_theme' ),
            'description'      => __( 'Theme Modifications like color scheme, theme texts and layout preferences can be done here', 'my_theme' ),
        ) 
    );
    
    $wp_customize->add_section( 'text_options', 
        array(
            'title'         => __( 'Text Options', 'my_theme' ),
            'priority'      => 1,
            'panel'         => 'my_theme_options'
        ) 
    );
    // Setting for Copyright text.
    $wp_customize->add_setting( 'my_copyright_text',
        array(
            'default'           => __( 'All rights reserved ', 'my_theme' ),
            'sanitize_callback' => 'sanitize_text_field',
            'transport'         => 'refresh',
        )
    );
    // Control for Copyright text
    $wp_customize->add_control( 'my_copyright_text', 
        array(
            'type'        => 'text',
            'priority'    => 10,
            'section'     => 'text_options',
            'label'       => 'Copyright text',
            'description' => 'Text put here will be outputted in the footer',
        ) 
    );
    $wp_customize->add_setting( 'logo', array(
        'capability'        => 'edit_theme_options',
        'default'           => '',
        'sanitize_callback' => 'ic_sanitize_image',
    ) );
    $wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize, 'logo',
        array(
            'label'    => __( 'Logo', 'text-domain' ),
            'section'  => 'text_options',
            'settings' => 'logo',
        )
    ) );
}
function ic_sanitize_image( $file, $setting ) {

	$mimes = array(
		'jpg|jpeg|jpe' => 'image/jpeg',
		'gif'          => 'image/gif',
		'png'          => 'image/png',
		'bmp'          => 'image/bmp',
		'tif|tiff'     => 'image/tiff',
		'ico'          => 'image/x-icon'
	);

	//check file type from file name
	$file_ext = wp_check_filetype( $file, $mimes );

	//if file has a valid mime type return it, otherwise return default
	return ( $file_ext['ext'] ? $file : $setting->default );
}
add_action( 'customize_register', 'my_customizer' );

 // customization end---------------------------------------------------------