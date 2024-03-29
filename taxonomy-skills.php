<?php
/**
Template Name: Portfolio
 */
global $apollo13; //for get_tempalte_part() calls
/* * ** QUERY STRAT *** */
$original_query = $wp_query;
$title = get_the_title();
//get from theme portfolio settings
$portfolio_page = $apollo13->get_option('portfolio_options', 'portfolio_page');
$sort_type = $apollo13->get_option('portfolio_options', 'portfolio_sort_type');
if ($sort_type != 'dynamic') {
    $sort_type = '';
}
$offset = 0;
global $paged;
//$per_page = 80;
$pages = get_pages(array(
    'meta_key' => '_wp_page_template',
    'meta_value' => 'taxonomy-skills.php',
    'hierarchical' => 0
));

if (count($pages) > 1) {
    $args = array(
        'posts_per_page' => 1000,
        'paged' => $paged,
        'offset' => $offset,
        'post_type' => PORTFOLIO_POST_TYPE,
        'meta_key' => '_portfolio_page',
        'meta_value' => get_the_ID(),
        'post_status' => 'publish',
        'ignore_sticky_posts' => true,
//	'orderby'             => 'epo_custom'
    );
} else {
    $args = array(
        'posts_per_page' => 1000,
        'paged' => $paged,
        'offset' => $offset,
        'post_type' => PORTFOLIO_POST_TYPE,
        'post_status' => 'publish',
        'ignore_sticky_posts' => true,
//	'orderby'             => 'epo_custom'
    );
}
$term_slug = get_query_var('term');
if (!empty($term_slug)) {
    $portfolio_mode = 'static';
    $args['skills'] = $term_slug; //give portfolios from selected category
    $term_name = get_term_by('slug', $term_slug, 'skills');
    $title .= ' : ' . $term_name->name;
}
//get portfolio posts
$wp_query = new WP_Query($args);
/* * * QUERY END ** */
get_header();
?>
<?php ?>
<div id="content">
    <?php
    $bg_color = get_post_meta(get_the_ID(), '_background_color', true);
    $bg_image = get_post_meta(get_the_ID(), '_background_image', true);
    ?>
    <style type="text/css" media="screen">
        <?php if ($bg_color != "") : ?>
        body {
            background-color: <?php echo $bg_color; ?> !important;
        }
            <?php endif;
        if ($bg_image != "") : ?>
        div.bgimage {
            background-image: url('<?php echo $bg_image ?>') !important;
        }
            <?php endif; ?>
    </style>
    <div id="page_title" class="page_title_portfolio border_bottom">
        <h1><?php echo $title; ?></h1>
        <?php if (strlen(trim(get_post_meta(get_the_ID(), '_page_extra_description', true))) > 0): ?>
        <span>|</span> <p><?php echo trim(get_post_meta(get_the_ID(), '_page_extra_description', true)); ?></p>
        <?php endif; ?>
        <div style="clear: both;"></div>
    </div>
    <?php
    if ($wp_query->have_posts()) :
        //get portfolio categories
        $terms = get_terms('skills', 'hide_empty=1');
        $separator = ' ';
        $count_terms = count($terms);
        $iter = 1;
        if ($count_terms):
            echo '<div id="portfolioList" class="no_content_font ' . $sort_type . ' portfolio_cat">';
            echo '<a href="' . site_url() . '?page_id=' . $portfolio_page . '" class="' . PORTFOLIO_PRE_CLASS . 'all' . (empty($term_slug) ? ' selected' : '') . '">' . __('All', TPL_SLUG) . '</a>';
            echo $separator;
            foreach ($terms as $term) {
                $is_term = false;
                while (have_posts()): the_post();
                    if ($apollo13->check_if_have_term($term, get_the_ID())) {
                        $is_term = true;
                        break;
                    }
                endwhile;
                rewind_posts();
                if ($is_term) {
                    echo '<a class="' . PORTFOLIO_PRE_CLASS . $term->slug . (($term_slug == $term->slug) ? ' selected' : '') . '" href="' . get_term_link($term) . '">' . $term->name . '</a>';
                    if ($count_terms != $iter) {
                        echo $separator;
                    }
                    $iter++;
                }
            }
            echo '</div>';
        endif;
    endif;
    ?>
    <div id="portfolio_conteiner" class="portfolio-elastic elastic no_content_font">
        <?php
        get_template_part('loop', 'portfolio');
        ?>
    </div>
    <?php //$apollo13->blog_nav(); ?>
    <?php
    if (function_exists('wp_paginate')) {
        wp_paginate(array(
            'page' => $paged,
            'pages' => intval(ceil($wp_query->found_posts / $per_page))
        ));
    }
    ?>
    <div class="cleared"></div>
    <?php
    // Reset the global $the_post as this query will have stomped on it
    $wp_query = $original_query;
    wp_reset_postdata();
    ?>
</div>
<?php get_footer(); ?>