<?php
/**
 * The header for Kaya theme.
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @author  Anphira
 * @since   0.1
 * @package Kaya
 * @version 1.4
 */

$postID = get_queried_object_id();

?><!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
<?php echo esc_html(get_post_meta($postID, '_kaya_google_experiments_code', true)); ?>
<meta charset="<?php bloginfo( 'charset' ); ?>">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="profile" href="http://gmpg.org/xfn/11">

<?php if(get_theme_mod( 'kaya_add_to_head', '' ) !== '')
	echo esc_html(get_theme_mod( 'kaya_add_to_head' ));
?>

<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
	<?php wp_body_open(); ?>

<?php if(get_theme_mod( 'kaya_add_to_body_top', '' ) !== '')
	echo esc_html(get_theme_mod( 'kaya_add_to_body_top' ));
?>

<div id="page" class="site">

	<header id="masthead" class="site-header <?php if(get_theme_mod( 'kaya_transparent_header', false ) ) echo 'transparent-header'; ?>">
	<a class="skip-link screen-reader-text" href="#content"><?php esc_html_e( 'Skip to content', 'kaya' ); ?></a>

	<?php if(get_theme_mod( 'kaya_announce_bar_checkbox', false )) { ?>
		<div class="announcement-bar">
			<?php echo esc_html(get_theme_mod( 'kaya_announce_bar_content', '' )); ?>
			<?php if(get_theme_mod( 'kaya_announce_bar_button_show', false )) { ?>
				<a class="announcement-button" href="<?php echo esc_url(get_theme_mod( 'kaya_announce_bar_button_url', '' )); ?>"><?php echo esc_html(get_theme_mod( 'kaya_announce_bar_button_text', '' )); ?></a>
			<?php } ?>
		</div>
	<?php } ?>

	<?php if( '' == get_post_meta($postID, '_kaya_hide_header_check', true)) { ?>
		<?php if(get_theme_mod( 'kaya_top_header', false )) { ?>
			<div class="top-header">
				<div class="container flexbox">
					<div class="">
						<?php dynamic_sidebar('top-header-1'); ?>
					</div>
					<div class="">
						<?php dynamic_sidebar('top-header-2'); ?>
					</div>
				</div>
			</div>
			<div class="clear"></div>
		<?php } ?>
		<div class="container flexbox">
			<?php 
			switch(get_theme_mod( 'kaya_header_columns', 'one_column' )) {
				case 'one_column': 
					echo '<div class="">';
						kaya_logo_display();
					echo '</div>';
					break;
				case 'two_column': 
					echo '<div class="">';
						kaya_logo_display();
					echo '</div>';
					echo '<div class="">';
						dynamic_sidebar('Header-2');
					echo '</div>';
					break;
				case 'three_column': 
					echo '<div class="">';
						kaya_logo_display();
					echo '</div>';
					echo '<div class="">';
						dynamic_sidebar('Header-2');
					echo '</div>';
					echo '<div class="">';
						dynamic_sidebar('Header-3');
					echo '</div>';
					break;
				case 'four_column': 
					echo '<div class="">';
						kaya_logo_display();
					echo '</div>';
					echo '<div class="">';
						dynamic_sidebar('Header-2');
					echo '</div>';
					echo '<div class="">';
						dynamic_sidebar('Header-3');
					echo '</div>';
					echo '<div class="">';
						dynamic_sidebar('Header-4');
					echo '</div>';
					break;
				case 'logo_menu':
					echo '<div class="">';
						kaya_logo_display();
					echo '</div>';
					echo '<div class="">';
						dynamic_sidebar('Header-2');
						echo '<nav id="site-navigation" class="main-navigation">';
						if( ! get_theme_mod( 'kaya_hide_mobile_button_menu', false ) ) {
							?><button class="menu-toggle" aria-controls="primary-menu" aria-expanded="false"><?php esc_html_e( 'Primary Menu', 'kaya' ); ?></button><?php
						}
						wp_nav_menu( array( 'theme_location' => 'primary', 'menu_id' => 'primary-menu' ) ); 
						echo '</nav>';
					echo '</div>';
					break;
				case 'logo_left_right_content':
					echo '<div class="">';
						kaya_logo_display();
					echo '</div>';
					echo '<div class="">';
						dynamic_sidebar('Header-2');
					echo '</div>';
					break;
				default: 
					echo '<div class="">';
						kaya_logo_display();
					echo '</div>';
					break;
			} ?>
			
		</div><!-- .container -->

		<?php if( 'logo_menu' !== get_theme_mod( 'kaya_header_columns', 'one_column' )) { ?>
		<nav id="site-navigation" class="main-navigation">
			<div class="container">
				<?php if( !get_theme_mod( 'kaya_hide_mobile_button_menu', false )) { ?>
					<button class="menu-toggle" aria-controls="primary-menu" aria-expanded="false"><?php esc_html_e( 'Primary Menu', 'kaya' ); ?></button>
				<?php } ?>
				<?php wp_nav_menu( array( 'theme_location' => 'primary', 'menu_id' => 'primary-menu' ) ); ?>
			</div> <!-- .container -->
		</nav><!-- #site-navigation -->
		<?php } ?>
	<?php } ?>
	</header><!-- #masthead -->


	<?php 
	/* Determine content classes */
	$content_class = 'site-content ';
	if(!is_search() && ( 'on' == get_post_meta($postID, '_kaya_full_width_check', true)))  {
		$content_class .= 'full-width ';
	} else {
		$content_class .= 'normal-width ';
	}

	/* Sidebar classes */
	if(is_page()) {
		if(!get_post_meta($postID, 'kaya_sidebar_setting', true) || 'use_default' == get_post_meta($postID, 'kaya_sidebar_setting', true) ) {
			if ('left_sidebar' == get_theme_mod( 'kaya_page_sidebar', 'no_sidebar' )) 
				$content_class .= 'sidebar-left ';
			elseif ('right_sidebar' == get_theme_mod( 'kaya_page_sidebar', 'right_sidebar' )) 
				$content_class .= 'sidebar-right ';
		}
		else {
			$sidebar_class_temp = get_post_meta($postID, 'kaya_sidebar_setting', true);
			switch($sidebar_class_temp) {
				case 'left_sidebar':
					$content_class .= 'sidebar-left ';
					break;
				case 'no_sidebar':
					break;
				case 'right_sidebar':
					$content_class .= 'sidebar-right ';
					break;
				default:
					break;
			}
		}
	}
	elseif(function_exists('is_woocommerce') && is_woocommerce()) {
		if ('left_sidebar' == get_theme_mod( 'kaya_woo_sidebar', 'no_sidebar' )) {
			$content_class .= 'sidebar-left ';
		}
		if ('right_sidebar' == get_theme_mod( 'kaya_woo_sidebar', 'no_sidebar' )) {
			$content_class .= 'sidebar-right ';
		}
	}
	elseif(is_archive()) { // use archive sidebar
		if ('left_sidebar' == get_theme_mod( 'kaya_archive_sidebar', 'right_sidebar' )) {
			$content_class .= 'sidebar-left ';
		}
		if ('right_sidebar' == get_theme_mod( 'kaya_archive_sidebar', 'right_sidebar' )) {
			$content_class .= 'sidebar-right ';
		}
	}
	elseif(is_single() || is_search()) { // use single post sidebar
		if ('left_sidebar' == get_theme_mod( 'kaya_post_sidebar', 'right_sidebar' )) {
			$content_class .= 'sidebar-left ';
		}
		if ('right_sidebar' == get_theme_mod( 'kaya_post_sidebar', 'right_sidebar' )) {
			$content_class .= 'sidebar-right ';
		}
	}
	//blog home page when using a page for the home
	elseif(is_home()) {

		if(!get_post_meta( get_option( 'page_for_posts' ), 'kaya_sidebar_setting', true) || 'use_default' == get_post_meta( get_option( 'page_for_posts' ), 'kaya_sidebar_setting', true)) {
			if ('left_sidebar' == get_theme_mod( 'kaya_archive_sidebar', 'right_sidebar' )) {
				$content_class .= 'sidebar-left ';
			}
			elseif ('no_sidebar' != get_theme_mod( 'kaya_archive_sidebar', 'right_sidebar' )) {
				$content_class .= 'sidebar-right ';
			}
		}
		else {
			$sidebar_class_temp = get_post_meta( get_option( 'page_for_posts' ), 'kaya_sidebar_setting', true);
			switch($sidebar_class_temp) {
				case 'left_sidebar':
					$content_class .= 'sidebar-left ';
					break;
				case 'no_sidebar':
					break;
				case 'right_sidebar':
					$content_class .= 'sidebar-right ';
					break;
				default:
					$content_class .= 'sidebar-right ';
					break;
			}
		}
	}
	
	//get hero area setting
	// set a default
	$page_hero_setting = 'no_page_hero';

	// woocommerce
	if(function_exists('is_woocommerce') && is_woocommerce()) {
		if(get_theme_mod( 'kaya_page_hero_woocommerce', false )) {
			$content_class .= 'has-page-hero ';
			$page_hero_setting = true;
		}
	}
	//get hero area setting for pages
	elseif( is_home() || ( !is_single() && !is_archive() ) ) {
		
		if(is_home()) {
			$page_for_posts = get_option( 'page_for_posts' );
			$page_hero_setting = get_post_meta($page_for_posts, 'kaya_page_hero_setting', true);
		}
		elseif (is_page()) {
			$page_hero_setting = get_post_meta($postID, 'kaya_page_hero_setting', true);
		}
		switch ($page_hero_setting ) {
			case 'no_page_hero':
				$page_hero_setting = false;
				break;
			case 'use_default':
				$page_hero_setting = get_theme_mod( 'kaya_page_hero', false );
				break;
			case 'use_page_hero':
				$page_hero_setting = true;
				break;
			default: 
				$page_hero_setting = get_theme_mod( 'kaya_page_hero', false );
		}
		if( $page_hero_setting ) {
			$content_class .= 'has-page-hero ';
		}
	}

	// get hero area setting for single blogs
	elseif( (is_single() && 'post' == get_post_type()) ) {
		$page_hero_blog = get_theme_mod( 'kaya_page_hero_blogs', false );
		if( $page_hero_blog ) {
			$content_class .= 'has-page-hero ';
		}
	}
	// get hero area setting for blog archives
	elseif( ('post' == get_post_type()) && is_archive() ) {
		$page_hero_blog = get_theme_mod( 'kaya_page_hero_blog_archive', false );
		if( $page_hero_blog ) {
			$content_class .= 'has-page-hero ';
		}
	}


	// display page hero
	if(function_exists('is_woocommerce') && is_woocommerce()) {
		if($page_hero_setting) { ?>
			<header id="page-hero-area">
				<div class="container">
					<?php
					woocommerce_breadcrumb();
					if(is_shop()) {
						echo '<h1 class="page-title">Shop Our Products</h1>';
					}
					elseif(is_archive()) {
						the_archive_title( '<h1 class="page-title">', '</h1>' );
					}
					else {
						echo '<h1 class="page-title">' . get_the_title() . '</h1>';
					}
					the_archive_description( '<div class="archive-description">', '</div>' );
					?>
				</div>
			</header>
		<?php }
	}
	if(!is_single() && !is_archive()) { 
		if($page_hero_setting) { ?>
			<header id="page-hero-area">
				<div class="container">
					<?php
						if(is_page()) {
							if( get_post_meta($postID, '_kaya_hide_title_check', true) !== 'on') {
								echo '<h1>' . esc_html(get_the_title()) . '</h1>';
							}
							echo get_post_meta($postID, '_kaya_page_hero_content', true);
						}
						elseif(is_home()) {
							if(get_post_meta($page_for_posts, '_kaya_hide_title_check', true) !== 'on') {
								echo '<h1>' . esc_html(get_the_title($page_for_posts)) . '</h1>';
							}
							echo get_post_meta($page_for_posts, '_kaya_page_hero_content', true); 
						}
						elseif(is_archive()) {
							the_archive_title( '<h1 class="page-title">', '</h1>' );
							the_archive_description( '<div class="archive-description">', '</div>' );
						}
						elseif(is_404()) {
							echo '<h1>' . esc_html(get_theme_mod( 'kaya_404_title', 'Sorry, that page could not be found' )) . '</h1>';
						}
					?>
				</div>
			</header>
		<?php }
	} else { 
		if($page_hero_blog) {
			?>
			<header id="page-hero-area">
				<div class="container">
					<?php 
					if(is_archive()) {
						the_archive_title( '<h1 class="page-title">', '</h1>' );
					}
					else {
						the_title( '<h1 class="entry-title" itemprop="name">', '</h1>' ); 
					}
					?>
				</div>
			</header>
		<?php
		}
	} ?>

	<div id="content" class="<?php  echo esc_html($content_class); ?>">
