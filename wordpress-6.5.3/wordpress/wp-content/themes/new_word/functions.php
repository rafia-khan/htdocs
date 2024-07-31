<?php
add_theme_support('title-tag');




function ali_css_jss_calling(){
wp_enqueue_style('ali-style', get_stylesheet_uri());
wp_register_style('bootstrap', get_template_directory_uri().'/css/bootstrap.css', array(), '5.0.2','all');
wp_register_style('custom', get_template_directory_uri().'/css/custom.css', array(), '1.1.1','all');

wp_enqueue_style('bootstrap');
wp_enqueue_style('custom');

//jQuery calling
// wp_enqueue_script( $handle:string, $src:string, $deps:array, $ver:string|boolean|null, $in_footer:boolean )( $block_name:string, $args:array )
wp_enqueue_script('jquery');
wp_enqueue_script('bootstrap',get_template_directory_uri().'/js/bootstrap.js',array(),'5.0.2','1.0.0','true');
wp_enqueue_script('main',get_template_directory_uri().'/js/main.js',array(),'5.0.2','1.1.1','true');

}
add_action('wp_enqueue_scripts','ali_css_jss_calling',)
?>