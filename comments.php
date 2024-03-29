<?php
/**
 * The template for displaying Comments.
 *
 * The area of the page that contains both current comments
 * and the comment form.
 *
 */
global $apollo13;
?>
<div <?php if (!have_comments()) : ?>
        style="border: none !important;"
    <?php endif; ?>
    class="comments-area" id="comments">
        <?php if (post_password_required()) : ?>
        <p class="nopassword"><?php _e('This post is password protected. Enter the password to view any comments.', TPL_SLUG); ?></p>
    </div>
    <?php
    /* Stop the rest of comments.php from being processed,
     * but don't kill the script entirely -- we still have
     * to fully load the template.
     */
    return;
endif;
?>
<?php if (have_comments()) : ?>
    <h3 class="title mm no_content_font" id="comments-title"><?php echo __('Comments', TPL_SLUG); ?></h3>
    <div id="comments_info">
        <a class="no_content_font comments_count <?php if (get_comments_number() != 0)
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
    <div id="comments_conteiner">
        <?php
        //Loop through and list the comments.
        wp_list_comments(
                array(
                    'callback' => array(&$apollo13, 'comment'),
                    'style' => 'div'
        ));
        ?>
        <div style="clear: both"></div>
    </div>
    <div style="clear: both"></div>
    <?php if (get_comment_pages_count() > 1 && get_option('page_comments')) : // Are there comments to navigate through? ?>
        <div class="navigation">
            <div class="nav-previous"><?php previous_comments_link(__('<span class="meta-nav">&larr;</span> Older Comments', TPL_SLUG)); ?></div>
            <div class="nav-next"><?php next_comments_link(__('Newer Comments <span class="meta-nav">&rarr;</span>', TPL_SLUG)); ?></div>
        </div><!-- .navigation -->
    <?php endif; // check for comment navigation  ?>
    <?php
else : // or, if we don't have comments:
    /* If there are no comments and comments are closed,
     * let's leave a little note, shall we?
     */
    if (!comments_open()) :
    /* ?>
      <p class="nocomments"><?php _e('Comments are closed.', TPL_SLUG); ?></p>
      <?php */ endif; // end ! comments_open()
    ?>
<?php endif; // end have_comments()  ?>
<?php
$commenter = wp_get_current_commenter();
$req = get_option('require_name_email');
$aria_req = ( $req ? " aria-required='true'" : '' );
if (esc_attr($commenter['comment_author']) != '') {
    $autor_name = esc_attr($commenter['comment_author']);
} else {
    $autor_name = '';
}
if (esc_attr($commenter['comment_author_email']) != '') {
    $autor_email = esc_attr($commenter['comment_author_email']);
} else {
    $autor_email = '';
}
if (esc_attr($commenter['comment_author_url']) != '') {
    $autor_url = esc_attr($commenter['comment_author_url']);
} else {
    $autor_url = '';
}
$field_author = '<div class="submit_inputs">
    <input class="required" id="author" name="author" type="text" value="' . $autor_name . '" size="30"' . $aria_req . ' />
    <label for="author">' . __('Name', TPL_SLUG) . '<span> (' . __('required', TPL_SLUG) . ')</span>
                    </label>
<div style="clear: both;"></div>';
$field_email = '<input class="required" id="email" name="email" type="text" value="' . $autor_email . '" size="30"' . $aria_req . ' />
        <label for="email">' . __('Email', TPL_SLUG) . '<span> (' . __('required', TPL_SLUG) . ')</span>
                    </label>
<div style="clear: both;"></div>';
$field_url = '<input id="url" name="url" type="text" value="' . $autor_url . '" size="30" />
        <label for="url">' . __('Website', TPL_SLUG) . '
                    </label>
<div style="clear: both;"></div></div>';
$fields = array(
    'author' => $field_author,
    'email' => $field_email,
    'url' => $field_url,
);
$form_params = array(
    'fields' => apply_filters('comment_form_default_fields', $fields),
    'comment_field' => '<textarea id="comment" name="comment" cols="45" rows="8" aria-required="true"></textarea>',
    'title_reply' => __('Leave a reply', TPL_SLUG),
    'title_reply_to' => __('<span class="mm">Leave a comment to %s</span>', TPL_SLUG),
    'comment_notes_after' => '',
    'comment_notes_before' => '',
    'id_submit' => 'comment-submit',
    'label_submit' => __('Leave reply', TPL_SLUG),
    'cancel_reply_link' => __(' | Cancel reply'),
);
comment_form($form_params);
?>
<div style="clear: both"></div>
</div>
