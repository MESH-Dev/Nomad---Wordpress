<?php
/**
 * The loop that displays a single post.
 *
 * The loop displays the posts and the post content.  See
 * http://codex.wordpress.org/The_Loop to understand it and
 * http://codex.wordpress.org/Template_Tags to understand
 * the tags used in it.
 *
 */
//define('BLOG_PAGE', true);
global $apollo13;
$featured_position = get_post_meta(get_the_ID(), '_top_or_incontent', true);
?>
<div id="content">
    <div id="blog_post" <?php if (!is_active_sidebar('blog-post-widget-area')) : ?>
             style="max-width: 940px;"
         <?php endif; ?>>
        <div id="page_title" class="border_bottom">
            <h1>Blog</h1>
            <?php if (strlen(trim(get_post_meta($apollo13->get_option('settings', 'blog_page'), '_page_extra_description', true))) > 0): ?>
                <span>|</span> <p><?php echo trim(get_post_meta($apollo13->get_option('settings', 'blog_page'), '_page_extra_description', true)); ?></p>
            <?php endif; ?>
            <div style="clear: both;"></div>
        </div>
        <?php if (have_posts())
            while (have_posts()) : the_post(); ?>
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
                <div id="post-<?php the_ID(); ?>" <?php post_class('item'); ?>>
                    <?php if (is_home() || is_archive() || ( defined('ORG_IS_FRONT_PAGE') && ORG_IS_FRONT_PAGE ))
                        $apollo13->top_image_video(get_the_ID()); ?>
                    <div class="post-info no_content_font">
                        <div class="post_date post_info_box">
                            <span class="day"><?php $apollo13->posted_on('d'); ?></span>
                            <span class="date"><?php $apollo13->posted_on('F'); ?></span>
                            <span class="date"><?php $apollo13->posted_on('Y'); ?></span>
                        </div>
                        <div class="post_tags post_info_box">
                            <?php echo __('Tags', TPL_SLUG); ?>: <?php $apollo13->posted_in(); ?>
                        </div>
                        <a class="comments_count <?php if (get_comments_number() != 0)
                        echo 'border_link_color' ?>" href="<?php echo get_comments_link() ?>" title="">
                               <?php if (get_comments_number() == 0) { ?>
                                   <?php echo __('No comments', TPL_SLUG); ?>
                                   <?php
                               } else {
                                   printf(_n('%1$s comment', '%1$s comments', get_comments_number(), TPL_SLUG), number_format_i18n(get_comments_number()));
                               }
                               ?>
                        </a>
                    </div>
                    <div class="item-content" <?php if (!is_active_sidebar('blog-post-widget-area')) : ?>
                             style="width: 820px;"
                         <?php endif; ?>>
                        <h2 class="post_title no_content_font"><?php the_title() ?></h2>
                        <?php
                        if (has_post_thumbnail()) {
                            the_post_thumbnail();
                        }
                        $apollo13->top_image_video(get_the_ID());
                        ?>
                        <div class="post-text">
                            <?php
                            the_content();
                            $href = site_url() . '?page_id=' . $apollo13->get_option('settings', 'blog_page');
                            $title = __('Back to Blog', TPL_SLUG);
                            ?>
                            <a href="<?php echo $href; ?>" title="<?php echo $title; ?>" class="back-to-blog"><?php echo __('Back to Blog', TPL_SLUG); ?></a>
                            <div style="clear: both;"></div>
                        </div>
                    </div>
                    <div style="clear: both;"></div>
                </div><!-- #post-## -->
                <?php comments_template('/comments.php', true); ?>
            <?php endwhile; // end of the loop.   ?>
        <?php $apollo13->blog_post_nav(); ?>
    </div>
    <?php if (is_active_sidebar('blog-post-widget-area')) : ?>
        <div id="primary" class="widget-area" role="complementary">
            <?php if (!function_exists('dynamic_sidebar')
                    || !dynamic_sidebar('blog-post-widget-area')) : ?>
            <?php endif; ?>
        </div>
    <?php endif; ?>
    <div style="clear: both;"></div>
</div>