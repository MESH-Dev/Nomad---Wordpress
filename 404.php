<?php
/**
 * The template for displaying 404 pages (Not Found).
 *
 */
define( 'FULL_WIDTH', true );
get_header(); ?>
	<div id="content" class="full error-page">
            <div id="page_title" class="border_bottom">
		<h1><?php _e( 'Error 404. The page you’re looking for can’t be found', TPL_SLUG ); ?></h1>
                <div style="clear: both"></div>
            </div>
		<div class="links">
			<a href="javascript:history.go(-1)"><?php _e( 'Go back', TPL_SLUG ); ?></a>
			<span>|</span>
			<?php printf( __( '<a href="%1$s" title="Home Page">Go to Home Page</a>', TPL_SLUG ), home_url() ); ?>
		</div>
	</div>
<?php get_footer(); ?>