<?php

/**
 * The template for displaying Archive pages.
 *
 * Used to display archive-type pages if nothing more specific matches a query.
 * For example, puts together date-based pages if no date.php file exists.
 *
 * Learn more: http://codex.wordpress.org/Template_Hierarchy
 *
 */
get_header();
/**
* The loop that displays posts.
*
* The loop displays the posts and the post content.  See
* http://codex.wordpress.org/The_Loop to understand it and
* http://codex.wordpress.org/Template_Tags to understand
* the tags used in it.
*
*/
global $apollo13;
?>
<div id="content">
    <div id="blog_posts" <?php if (!is_active_sidebar('blog-widget-area')) : ?>
         style="max-width: 940px;"
        <?php endif; ?>>
        <?php
        $bg_color = get_post_meta(get_the_ID(), '_background_color', true);
        $bg_image = get_post_meta(get_the_ID(), '_background_image', true);
        ?>
        <style type="text/css" media="screen">
            <?php if ($bg_color != "") : ?>
            body { background-color: <?php echo $bg_color; ?> !important;}
                <?php endif;
            if ($bg_image != "") : ?>
            div.bgimage { background-image: url('<?php echo $bg_image ?>')!important; }
                <?php endif; ?>
        </style>
        <div id="page_title" class="border_bottom">
            <h1><?php if ( is_author() ) : ?>
                <?php printf( __( 'Author Archives: %s',  TPL_SLUG  ), "<span class='vcard'><a class='url fn n' href='" . get_author_posts_url( get_the_author_meta( 'ID' ) ) . "' title='" . esc_attr( get_the_author() ) . "' rel='me'>" . get_the_author() . "</a></span>" ); ?>
                <?php elseif ( is_category() ) : ?>
                <?php printf( __( 'Category Archives: %s',  TPL_SLUG  ), '' . single_cat_title( '', false ) . '' ); ?>
                <?php elseif ( is_day() ) : ?>
                <?php printf( __( 'Daily Archives: <p>%s</p>', TPL_SLUG ), get_the_date() ); ?>
                <?php elseif ( is_month() ) : ?>
                <?php printf( __( 'Monthly Archives: <p>%s</p>', TPL_SLUG ), get_the_date( 'F Y' ) ); ?>
                <?php elseif ( is_year() ) : ?>
                <?php printf( __( 'Yearly Archives: <p>%s</p>', TPL_SLUG ), get_the_date( 'Y' ) ); ?>
                <?php else : ?>
                <?php _e( 'Blog Archives', TPL_SLUG ); ?>
                <?php endif; ?></h1>
            <?php if (strlen(trim(get_post_meta(get_the_ID(), '_page_extra_description', true))) > 0): ?>
            <span>|</span> <p><?php echo trim(get_post_meta(get_the_ID(), '_page_extra_description', true)); ?></p>
            <?php endif; ?>
            <div style="clear: both;"></div>
        </div>
        <?php /* If there are no posts to display, such as an empty archive page */ ?>
        <?php if (!have_posts()) : ?>
        <div id="post-0" class="post border_bottom error404 not-found">
            <h2><?php _e('Apologies, but no results were found for the requested archive. ', TPL_SLUG); ?></h2>
        </div>
        <?php endif; ?>
        <?php /* Start the Loop.
         * ***************************
         */ ?>
        <?php
        /* Since we called the_post() above, we need to
               * rewind the loop back to the beginning that way
               * we can run the loop properly, in full.
               */
        rewind_posts();
        /* Run the loop to output the post.
               * If you want to overload this in a child theme then include a file
               * called loop-single.php and that will be used instead.
               */
        get_template_part( 'loop' );
        ?>

        <?php $apollo13->pagination(); ?>
    </div>
    <?php if (is_active_sidebar('blog-widget-area')) : ?>
    <div id="primary" class="widget-area" role="complementary">
        <?php if (!function_exists('dynamic_sidebar')
        || !dynamic_sidebar('blog-widget-area')) : ?>
        <?php endif; ?>
    </div>
    <?php endif; ?>
    <div style="clear: both"></div>
</div>
<?php get_footer(); ?>
