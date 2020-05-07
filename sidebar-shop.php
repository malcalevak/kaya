<?php
/**
 * The sidebar containing the main widget area.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @author  Anphira
 * @since   0.1
 * @package Kaya
 * @version 0.8.4
 */

?>

<?php if('right_sidebar' == get_theme_mod( 'kaya_woo_sidebar', 'right_sidebar' )) { ?>
	<aside id="secondary" class="widget-area" role="complementary">
		<?php 
		if(is_active_sidebar('everywhere-top-sidebar')) {
			dynamic_sidebar('everywhere-top-sidebar');
		}
		if ( is_active_sidebar( 'woocommerce-sidebar' ))  {
			dynamic_sidebar( 'woocommerce-sidebar' );
		} 
		if(is_active_sidebar('everywhere-bottom-sidebar')) {
			dynamic_sidebar('everywhere-bottom-sidebar');
		} ?>
	</aside><!-- #secondary -->
<?php } ?>
