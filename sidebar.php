<?php
/**
 * The Sidebar
 *
 */
if (defined('FULL_WIDTH') && FULL_WIDTH) {
} else {
    ?>
<div class="primary widget-area" role="complementary">
    <?php
    /*if (defined('PORTFOLIO_PAGE') && PORTFOLIO_PAGE)
        dynamic_sidebar('portfolio-widget-area');
    elseif (is_single())
        dynamic_sidebar('blog-post-widget-area');
    elseif (defined('BLOG_PAGE') && BLOG_PAGE)
        dynamic_sidebar('blog-widget-area');
    else {
        //in every other page
        dynamic_sidebar('primary-widget-area');
    }*/
    ?>
    <div style="clear: both;"></div>
</div><!-- #primary .widget-area -->
<?php } ?>