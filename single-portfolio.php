<?php
/**
 * The Template for displaying portfolios.
 *
 */
define('PORTFOLIO_PAGE', true);
get_header();
?>
<div id="content">
    <?php $apollo13->port_post_nav(); ?>
    <div class="inner-640 post-blog post-portfolio">
        <?php if (have_posts())
        while (have_posts()) : the_post(); ?>
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
            <div class="portfolio_post_container">
                <h2 class="post_title"><?php the_title() ?></h2>

                <div id="portfolio_info_content">
                    <?php $variant = get_post_meta(get_the_ID(), '_use_slider', true); ?>
                    <div class="post-info">
                        <?php
                        $content = get_the_content();
                        $content = apply_filters('the_content', $content);
                        $content = str_replace(']]>', ']]&gt;', $content);
                        ?>
                    </div>
                    <?php if (strlen($content)): ?>
                    <div id="post-<?php the_ID(); ?>">
                        <div class="post-text">
                            <?php echo $content; ?>
                            <div class="clear"></div>
                        </div>
                    </div>
                    <?php endif; ?>
                </div>
                <div id="portfolio_photos" <?php if ($content == '') echo 'class="no_content_portfolio"'; ?>>
                    <?php
                    if ($variant == "slider_on") {
                        $variant = "slider";
                    } else {
                        $variant = "vertical";
                    }
                    if ( ! post_password_required()) {

                        $apollo13->make_collection($variant, $content);
                    }
                    $custom = get_post_custom($post->ID);
                    ?>
                </div>
            </div>
            <?php endwhile; // end of the loop. ?>
        <div style="clear: both;"></div>
        <div id="portfolio_widgets">
            <div id="primary" class="widget-area" role="complementary">
                <?php if (!function_exists('dynamic_sidebar')
                || !dynamic_sidebar('portfolio-widget-area')
            ) : ?>
                <?php endif; ?>
            </div>
        </div>
        <div style="clear: both;"></div>
    </div>
</div>
<?php get_footer(); ?>