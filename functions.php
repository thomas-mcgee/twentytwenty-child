<?php 
/**
 * Functions
 *
 * Twenty Twenty Child theme.
 */

function my_theme_enqueue_styles() {
	
	$parenthandle = 'parent-style'; // This is 'twentyfifteen-style' for the Twenty Fifteen theme.
	
	$theme = wp_get_theme();
	
	wp_enqueue_style( $parenthandle, get_template_directory_uri() . '/style.css', 
		array(),  // if the parent theme code has a dependency, copy it to here
		$theme->parent()->get('Version')
	);
	
	wp_enqueue_style( 'child-style', get_stylesheet_uri(),
		array( $parenthandle ),
		$theme->get('Version') . time() // this only works if you have Version in the style header
	);
	
}
add_action( 'wp_enqueue_scripts', 'my_theme_enqueue_styles' );

/*--------------------------------------------------------------
# Custom head items.
--------------------------------------------------------------*/
function hfm_wp_head() { ?>
	
	<script src="https://kit.fontawesome.com/be5334ee40.js" crossorigin="anonymous"></script>
	
<?php }
add_action( 'wp_head', 'hfm_wp_head' );

/*--------------------------------------------------------------
# Custom image sizes.
--------------------------------------------------------------*/
add_image_size( 'large_avatar', 512, 512, true );

/*--------------------------------------------------------------
# Custom post types.
--------------------------------------------------------------*/
require get_stylesheet_directory() . '/posts/docs.php';

/*--------------------------------------------------------------
# Require ACF custom integrations.
--------------------------------------------------------------*/
require get_stylesheet_directory() . '/inc/acf.php';