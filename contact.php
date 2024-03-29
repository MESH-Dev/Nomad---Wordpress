<?php
/**
 * Template Name: Contact
 */
get_header();
?>
<?php get_sidebar(); ?>
<div id="content">
    <div id="blog_post"
        <?php if (!is_active_sidebar('contact-widget-area')) : ?>
         style="max-width: 940px !important; width: 100%;"
        <?php endif; ?>
            >
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
            <div id="page_title" class="border_bottom">
                <h1><?php echo get_the_title(); ?></h1>
                <?php if (strlen(trim(get_post_meta(get_the_ID(), '_page_extra_description', true))) > 0): ?>
                <span>|</span> <p><?php echo trim(get_post_meta(get_the_ID(), '_page_extra_description', true)); ?></p>
                <?php endif; ?>
                <div style="clear: both"></div>
            </div>
            <div class="page_text">
                <?php the_content(); ?>
            </div>
            <?php if (! post_password_required()): ?>
                <div id="contact_form" <?php post_class('contact-page'); ?>>
                    <div id="message_send"><?php echo __('Thanks, your email was sent successfully.', TPL_SLUG) ?></div>
                    <?php echo $apollo13->contact_form($apollo13->get_option('settings', 'contact_email')); ?>
                    <div class="clear"></div>
                </div>

                <?php endif; ?>

            <?php endwhile; // end of the loop. ?>
    </div>
    <?php if (is_active_sidebar('contact-widget-area')) : ?>
    <div id="primary" class="widget-area" role="complementary">
        <?php dynamic_sidebar('contact-widget-area'); ?>
    </div>
    <?php endif; ?>
    <div style="clear: both;"></div>
</div>
<?php get_footer(); ?>