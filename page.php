<?php
/**
 * The template for displaying all pages.
 *
 */
get_header(); ?>
<?php get_sidebar(); ?>
	<div id="content">
			<?php
			/* Run the loop to output the page.
			 * If you want to overload this in a child theme then include a file
			 * called loop-page.php and that will be used instead.
			 */
			get_template_part( 'loop', 'page' );
			?>
	</div>
<?php get_footer(); ?>