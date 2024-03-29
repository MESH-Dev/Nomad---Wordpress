<?php
/**
 * The loop that displays a page.
 *
 * The loop displays the posts and the post content.  See
 * http://codex.wordpress.org/The_Loop to understand it and
 * http://codex.wordpress.org/Template_Tags to understand
 * the tags used in it.
 *
 */
global $apollo13;
?>
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
        <div id="page_title" class="border_bottom">
            <h1><?php the_title(); ?></h1>
            <?php if (strlen(trim(get_post_meta(get_the_ID(), '_page_extra_description', true))) > 0): ?>
                <span>|</span> <p><?php echo trim(get_post_meta(get_the_ID(), '_page_extra_description', true)); ?></p>
            <?php endif; ?>
            <div style="clear: both"></div>
        </div>
        <div id="post-<?php the_ID(); ?>" <?php post_class('item'); ?>>
            <?php //edit_post_link(__('Edit', TPL_SLUG), '<div class="post-info">', '</div>'); ?>
            <div class="page_text">
                <?php the_content(); ?>
                <div class="clear"></div>
            </div>
        </div>
        <?php
    endwhile; // end of the loop. ?>