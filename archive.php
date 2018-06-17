<?php
/**
 * The template for displaying archive pages.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @author  Anphira
 * @since   0.1
 * @package Kaya
 * @version 0.7.4
 */

get_header(); 
?>

	<?php 
	if (get_theme_mod( 'kaya_post_sidebar', 'right_sidebar' ) == 'left_sidebar') {
		get_sidebar(); 
	}
	$has_sidebar = '';
	if( get_theme_mod( 'kaya_page_sidebar', 'right_sidebar' ) !== 'no_sidebar' ) {
		$has_sidebar = 'has-sidebar';
	}
	?>
	<div id="primary" class="content-area <?php echo $has_sidebar; ?>">
		<main id="main" class="site-main" role="main">

		<?php
		if ( have_posts() ) : 
			?>

			<?php
			$page_hero_setting = get_post_meta($post->ID, 'kaya_page_hero_setting', true);
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
			if((get_post_meta($post->ID, '_kaya_hide_title_check', true) !== 'on') && (true != $page_hero_setting)) { ?>
			<header class="page-header">
				<?php
					the_archive_title( '<h1 class="page-title">', '</h1>' );
					the_archive_description( '<div class="archive-description">', '</div>' );
				?>
			</header><!-- .page-header -->
			<?php } ?>

			<?php
			/* Start the Loop */
			while ( have_posts() ) : the_post();

				/*
				 * Include the Post-Format-specific template for the content.
				 * If you want to override this in a child theme, then include a file
				 * called content-___.php (where ___ is the Post Format name) and that will be used instead.
				 */
				get_template_part( 'template-parts/content', get_post_format() );

			endwhile;

			the_posts_navigation();

		else :

			get_template_part( 'template-parts/content', 'none' );

		endif; 
		?>

		</main><!-- #main -->
	</div><!-- #primary -->
	<?php 
	if (get_theme_mod( 'kaya_post_sidebar' ) == 'right_sidebar') {
		get_sidebar(); 
	}
	?>

<?php
get_sidebar();
get_footer();
