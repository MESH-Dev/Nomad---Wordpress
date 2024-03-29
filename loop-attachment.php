<?php
/**
 * The loop that displays an attachment.
 *
 * The loop displays the posts and the post content.  See
 * http://codex.wordpress.org/The_Loop to understand it and
 * http://codex.wordpress.org/Template_Tags to understand
 * the tags used in it.
 *
 */
global $apollo13;
?>
<?php if ( have_posts() ) while ( have_posts() ) : the_post(); ?>
			<h1 class="mm"><?php the_title(); ?></h1>
			<?php if ( ! empty( $post->post_parent ) ) : ?>
				<h2 class="mm"><a href="<?php echo get_permalink( $post->post_parent ); ?>" title="<?php esc_attr( printf( __( 'Return to %s', TPL_SLUG ), get_the_title( $post->post_parent ) ) ); ?>" rel="gallery"><?php
					/* translators: %s - title of parent post */
					printf( __( 'Return to %s', TPL_SLUG ), get_the_title( $post->post_parent ) );
				?></a></h2>
			<?php endif; ?>
			<div id="post-<?php the_ID(); ?>" <?php post_class('item'); ?>>
				<div class="post-info">
					<?php
						printf( __( 'By %1$s', TPL_SLUG ),
							sprintf( '<a class="url fn n" href="%1$s" title="%2$s" rel="author">%3$s</a>',
								get_author_posts_url( get_the_author_meta( 'ID' ) ),
								sprintf( esc_attr__( 'View all posts by %s', TPL_SLUG ), get_the_author() ),
								get_the_author()
							)
						);
					?><span>/</span>
					<?php
						printf( __( 'Published %1$s', TPL_SLUG ),
							sprintf( '<abbr class="published" title="%1$s">%2$s</abbr>',
								esc_attr( get_the_time() ),
								get_the_date()
							)
						);
						if ( wp_attachment_is_image() ) {
							echo '<span>-</span> ';
							$metadata = wp_get_attachment_metadata();
							printf( __( 'Full size is %s pixels', TPL_SLUG ),
								sprintf( '<a href="%1$s" title="%2$s">%3$s &times; %4$s</a>',
									wp_get_attachment_url(),
									esc_attr( __( 'Link to full-size image', TPL_SLUG ) ),
									$metadata['width'],
									$metadata['height']
								)
							);
						}
					?>
					<?php edit_post_link( __( 'Edit', TPL_SLUG ),'<span>|</span> ' ); ?>
				</div>
				<div class="post-text">
					<?php if ( wp_attachment_is_image() ) :
						$attachments = array_values( get_children( array( 'post_parent' => $post->post_parent, 'post_status' => 'inherit', 'post_type' => 'attachment', 'post_mime_type' => 'image', 'order' => 'ASC', 'orderby' => 'menu_order ID' ) ) );
						foreach ( $attachments as $k => $attachment ) {
							if ( $attachment->ID == $post->ID )
								break;
						}
						$k++;
						// If there is more than 1 image attachment in a gallery
						if ( count( $attachments ) > 1 ) {
							if ( isset( $attachments[ $k ] ) )
								// get the URL of the next image attachment
								$next_attachment_url = get_attachment_link( $attachments[ $k ]->ID );
							else
								// or get the URL of the first image attachment
								$next_attachment_url = get_attachment_link( $attachments[ 0 ]->ID );
						} else {
							// or, if there's only 1 image attachment, get the URL of the image
							$next_attachment_url = wp_get_attachment_url();
						}
					?>
					<p class="attachment"><a href="<?php echo $next_attachment_url; ?>" title="<?php echo esc_attr( get_the_title() ); ?>" rel="attachment"><?php
						echo wp_get_attachment_image( $post->ID, array( 900, 900 ) );
					?></a></p>
					<?php else : ?>
						<a href="<?php echo wp_get_attachment_url(); ?>" title="<?php echo esc_attr( get_the_title() ); ?>" rel="attachment"><?php echo basename( get_permalink() ); ?></a>
					<?php endif; ?>
				</div><!-- .post-tetx -->
			</div>
<?php endwhile; // end of the loop. ?>