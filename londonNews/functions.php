<?php
/** 
 * 

*function farma_register_styles() {
 *   wp_enqueue_style('farma_styles', get_template_directory_uri() . "style.css", array(), '1.0', 'all');
*}

*add_action('wp_enqueue_scripts', )
*?>
*/
wp_enqueue_style( 'style', get_template_directory_uri() . '/style.css', false, '1.1', 'all');

add_theme_support( 'post-thumbnails' );

register_nav_menus(
    array('primary-menu' => 'Main Menu')
);

add_action( 'widgets_init', 'my_register_sidebars' );
function my_register_sidebars() {
	register_sidebar(
		array(
			'id'            => 'event',
			'name'          => __( 'Event Sidebar' ),
			'description'   => __( 'Sidebar to hold all the events taking place.' ),
			'before_widget' => '<div id="%1$s" class="widget %2$s">',
			'after_widget'  => '</div>',
			'before_title'  => '<h3 class="widget-title">',
			'after_title'   => '</h3>',
		)
	);
	/* Repeat register_sidebar() code for additional sidebars. */

	function wpb_hook_javascript() {
		?>
			<script>
			  function menuOpen() {
				console.log('opening menu');
				let iconParent = document.querySelector('.miniMenu')
				let icon = iconParent.querySelector('i')
				console.log(icon)
				let menu = document.querySelector('.menuList');
				if (window.getComputedStyle(menu).top === "-399px") {
					icon.classList.remove("fa-bars")
					icon.classList.add("fa-times")
					menu.style.top = "83px"
					menu.style.visibility = "visible"
				} else {
					icon.classList.remove("fa-times")
					icon.classList.add("fa-bars")
					menu.style.top = "-399px"
					menu.style.visibility = "hidden"
				}

			  }
			</script>
		<?php
	}
	add_action('wp_head', 'wpb_hook_javascript');





}
