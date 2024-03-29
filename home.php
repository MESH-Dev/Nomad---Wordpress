<?php
/**
 * The Template for displaying blog.
 *
 */
$blog_sidebar_switch = $apollo13->get_option( 'settings', 'blog_sidebar_switch' );
if( $blog_sidebar_switch == 'off' )
	define( 'FULL_WIDTH', true );
else{
	define( 'SIDEBAR_POS', $blog_sidebar_switch );
}
get_header(); ?>
	<?php get_sidebar(); ?>
	<div id="content">
	<?php
		$blog_h1 = $apollo13->get_option( 'settings', 'blog_h1' );
		if ( !empty( $blog_h1 ) ){
			echo ( empty( $blog_h1 ) ? '' : '<h1 class="page-title mm">' . $blog_h1 . '</h1>' );
		}
	?>
		<div class="posts-elastic elastic">
			<?php
			/* Run the loop to output the post.
			 * If you want to overload this in a child theme then include a file
			 * called loop-single.php and that will be used instead.
			 */
			get_template_part( 'loop' );
			?>
		</div>
		<?php $apollo13->blog_nav(); ?>
		<?php if(function_exists('wp_paginate')) {
			wp_paginate();
		} ?>
		<div class="cleared"></div>
</div>
<?php get_footer(); ?>