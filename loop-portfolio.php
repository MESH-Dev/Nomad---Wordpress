<?php
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
<?php /* Start the Loop.
 * ***************************
 */ ?>
<?php
$hover_text = $apollo13->get_option('portfolio_options', 'hover_text');
$counter = 1;
$dec_position = $apollo13->get_option('portfolio_options', 'portfolio_desc_position');
/*$args = array(
	'posts_per_page' => 1000,
	'offset' => $offset,
	'post_type' => PORTFOLIO_POST_TYPE,
	'post_status' => 'publish',
	'ignore_sticky_posts' => true,
//	'orderby'             => 'epo_custom'
);
$term_slug = get_query_var('term');
if( ! empty( $term_slug ) ){
	$portfolio_mode = 'static';
	$args['category'] = $term_slug;//give portfolios from selected category
	$term_name = get_term_by( 'slug', $term_slug, 'skills');
	$title .= ' : ' . $term_name->name;
}
$loop = new WP_Query($args);*/
if (!have_posts()) :
    ?>
    <div id="post-0" class="post error404 not-found">
        <h2 class="mm"><?php _e('Apologies, but no results were found for the requested archive. ', TPL_SLUG); ?></h2>
    </div>
<?php
endif;
while (have_posts()): the_post();
    ?>
    <?php
    $item_desc = trim(get_post_meta(get_the_ID(), '_project_desc', true));
    $featured = get_post_meta(get_the_ID(), '_featured', true);
    $term_list = wp_get_post_terms($post->ID, 'skills', array("fields" => "all"));
    $item_classes = '';
    if (count($term_list)):
        foreach ($term_list as $term) {
            $item_classes .= ' ' . PORTFOLIO_PRE_CLASS . $term->slug;
            //for home page display
        }
    endif;
    $size = $apollo13->get_option('portfolio_options', 'portfolio_icon_size');
    if ($dec_position == "hover"):
        if ($size == "small") {
            $width = 220;
            $height = 150;
        } elseif ($size == "medium") {
            $width = 300;
            $height = 200;
        } else {
            $width = 460;
            $height = 300;
        }
        ?>
        <div class="item <?php echo $item_classes ?> four columns portfolio_box">
            <div class="box_action_starter" style="width: <?php echo $width ?>px; height:<?php echo $height ?>px;" onclick="javascript:goToPage(this);"  onmouseover="javascript:slideOver(this);" onmouseout="javascript:slideOut(this)"></div>
            <div class="slide_box_hover" style="width: <?php echo $width ?>px; height:<?php echo $height ?>px;">
                <div class="slide_box_hover_background"  style="width: <?php echo $width ?>px; height:<?php echo $height ?>px;"></div>
                <div class="slide_box_content" style="width: <?php echo $width ?>px; height:<?php echo $height ?>px;">
                    <p  style="width: <?php echo $width ?>px;"><?php echo get_the_title(); ?><br />
                        <span class="extra_description"  style="width: <?php echo $width ?>px;">
        <?php echo trim(get_post_meta(get_the_ID(), '_project_desc', true)); ?>
                        </span>
                    </p>
                </div>
            </div>
            <a class="slide_box_link" href="<?php echo get_permalink() ?>"><?php $apollo13->portfolio_get_icon($width, $height); ?></a>
        </div>
    <?php
    else:
        if ($size == "small") {
            $width = 220;
            $height = 150;
            $height_action = 223;
        } elseif ($size == "medium") {
            $width = 300;
            $height = 200;
            $height_action = 273;
        } else {
            $width = 460;
            $height = 300;
            $height_action = 373;
        }
        ?>
        <div class="item <?php echo $item_classes ?> four columns portfolio_box">
            <div class="box_action_starter" style="width: <?php echo $width ?>px; height:<?php echo $height_action ?>px;" onclick="javascript:goToPage(this);"  onmouseover="javascript:slideOver(this);" onmouseout="javascript:slideOut(this)"></div>
            <div class="portfolio_box_hover" style="width: <?php echo $width ?>px; height:<?php echo $height ?>px;">
                <div class="slide_box_hover_background" style="width: <?php echo $width ?>px; height: <?php echo $height ?>px;"></div>
                <p style="padding-top: <?php echo $height / 2 - 5 ?>px; width: <?php echo $width ?>px;"><?php echo $hover_text ?></p>
            </div>
            <a class="slide_box_link" href="<?php echo get_permalink() ?>"><?php $apollo13->portfolio_get_icon($width, $height); ?></a>
            <div class="portfolio_desc_below border_bottom"  style="width: <?php echo $width ?>px;">
                <p class="portfolio_box_title"><?php echo get_the_title(); ?></p>
                <p class="portfolio_extra_description"><?php echo trim(get_post_meta(get_the_ID(), '_project_desc', true)); ?></p>
            </div>
        </div>
    <?php endif; ?>
    <?php $counter++;
endwhile; // End the loop. Whew.    ?>
<div style="clear: both;"></div>
<?php if ($dec_position == "hover"): ?>
    <script type="text/javascript">
        function slideOver(element){
            jQuery(element).parent().children('.slide_box_hover').fadeIn();
        }
        function slideOut(element){
            jQuery(element).parent().children('.slide_box_hover').fadeOut();
        }
        function goToPage(element){
            var link = jQuery(element).parent().children('.slide_box_link').attr('href');
            jQuery(location).attr('href',link);
        }
    </script>
<?php else: ?>
    <script type="text/javascript">
        function slideOver(element){
            jQuery(element).parent().children('.portfolio_box_hover').fadeIn();
            jQuery(element).parent().children('.portfolio_desc_below').children('p.portfolio_box_title').addClass('link_hover');
        }
        function slideOut(element){
            jQuery(element).parent().children('.portfolio_box_hover').fadeOut();
            jQuery(element).parent().children('.portfolio_desc_below').children('p.portfolio_box_title').removeClass('link_hover')
        }
        function goToPage(element){
            var link = jQuery(element).parent().children('.slide_box_link').attr('href');
            jQuery(location).attr('href',link);
        }
    </script>
<?php endif; ?>
