<?php
/**
 * The template for displaying Search Results pages.
 *
 */
get_header();
?>
<?php get_sidebar(); ?>
<div id="content">
    <?php if (have_posts()) : ?>
        <?php
        /* Search Count */
        $allsearch = &new WP_Query("s=$s&showposts=-1");
        $count = $allsearch->post_count;
        wp_reset_query();
        ?>
    <div id="page_title" class="border_bottom">
            <h1><?php printf(__('Search results - %1$d results found for \'%2$s\'', TPL_SLUG), $count, get_search_query()); ?></h1>
            <div style="clear: both;"></div>
        </div>
        <div class="inner-640 archives">
            <?php
            /* Run the loop for the search to output the results. */
            get_template_part('loop');
            ?>
        </div>
    <?php else : ?>
        <h1 class="page-title mm"><?php _e('Search results - Nothing found', TPL_SLUG); ?></h1>
    <?php endif; ?>
    <?php $apollo13->blog_nav(); ?>
    <?php
    if (function_exists('wp_paginate')) {
        wp_paginate();
    }
    ?>
    <div class="cleared"></div>
</div>
<?php get_footer(); ?>