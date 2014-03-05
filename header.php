<!DOCTYPE html>
<html <?php language_attributes(); ?>>
    <?php global $page, $paged, $apollo13; ?>
    <head>
	<link rel="shortcut icon" href="<?php bloginfo('stylesheet_directory'); ?>/favicon.ico" />
        <meta name="viewport" content="width=device-width"/>
	<meta name="p:domain_verify" content="937da44a5126582922bc6f418a817ba6" />
        <meta charset="<?php bloginfo('charset'); ?>"/>
        <title><?php
    /*
     * Print the <title> tag based on what is being viewed.
     */
    wp_title('|', true, 'right');
// Add the blog name.
    bloginfo('name');
// Add the blog description for the home/front page.
    $site_description = get_bloginfo('description', 'display');
    if ($site_description && (is_home() || is_front_page()))
        echo " | $site_description";
// Add a page number if necessary:
    if ($paged >= 2 || $page >= 2)
        echo ' | ' . sprintf(__('Page %s', TPL_SLUG), max($paged, $page));
    ?></title>
        <meta name="author" content="Apollo13 Team"/>
        <?php echo $apollo13->get_option('settings', 'ga_code') ?>
        <!--
        <script type='text/javascript' src='http://meshdevsite.com/nomad/wp-includes/js/jquery/jquery.js?ver=1.8.3'></script>
        <script type='text/javascript' src='http://meshdevsite.com/nomad/wp-content/themes/skyfashion/common/js/jquery.tweet.js?ver=3.5.1'></script> 
        -->
        <script src="//ajax.googleapis.com/ajax/libs/jquery/1.8.3/jquery.min.js"></script>
        <script type="text/javascript" src="<?php bloginfo('template_url'); ?>/js/libs/cycle.js"></script>
        <script type="text/javascript" src="<?php bloginfo('template_url'); ?>/js/libs/tweets.js"></script>

        <script type='text/javascript'>
    jQuery(function($){
  /*   $('#intro_text').tweet({
          modpath: '/twitter/',
          page: 1,
          avatar_size: 32,
          count: 1,
          loading_text: "loading tweets..."
      });
        
        $("#intro_text").tweet({
            username: "thenomadtruck",
            query: "#thenomadtruck",
            join_text: "auto",
            avatar_size: 0,
            count: 1,
            auto_join_text_default: " ", 
            auto_join_text_ed: " ",
            auto_join_text_ing: " ",
            auto_join_text_reply: " ",
            auto_join_text_url: " ",
            loading_text: "loading tweets..."
        });*/
    });
</script>
<?php wp_head(); ?>
    </head>
    <body <?php body_class(); ?>>
        <div class="bgimage"></div>
        <div id="main">
            <div id="responsive_menu_overlay"></div>
            <div id="responsive_menu_button" class="no_content_font">
                <span><?php echo __('Menu', TPL_SLUG); ?></span>
            </div>
            <div id="responsive_menu" class="no_content_font">
                <div id="responsive_menu_header">
                    <?php echo __('Menu', TPL_SLUG); ?>
                </div>
                
                <?php
                if (has_nav_menu('header-menu')
                ):
                    /* Our navigation menu.  If one isn't filled out, wp_nav_menu falls back to wp_page_menu.  The menu assiged to the primary position is the one used.  If none is assigned, the menu with the lowest ID is used.  */
                    wp_nav_menu(array(
                        'container' => false,
                        'link_before' => '',
                        'link_after' => '',
                        'menu_id' => 'responsive_nav',
                        'theme_location' => 'header-menu')
                    );
                else:
                    wp_nav_menu(array(
                        'container' => false,
                        'link_before' => '<span>',
                        'link_after' => '</span>')
                    );
                endif;
                ?>
                <a id="responsive_menu_cross"></a>
            </div>
            <div id="header">

                <div id="social_icons_top" align="right">
                    <?php
                    foreach ((array)$apollo13->get_option('social_options', 'social_services') as $id => $value) {
                        if (!empty($value)) {
                            echo '<a target="_blank" href="' . $value . '" title="' . __('Follow us on ', TPL_SLUG) . $apollo13->all_theme_options['social_options']['social_services'][$id] . '"><img src="' . TPL_URI . '/common/images/social_icons/' . $id . '.png" alt="" /></a>';
                        }
                    }
                    ?>
                </div>
                
                <div id="logo" class="border_bottom">
                    <a href="<?php echo home_url('/'); ?>" title="<?php echo esc_attr(get_bloginfo('name', 'display')); ?>"
                       rel="home">
                           <?php if ($apollo13->get_option('settings', 'theme_styles') == "style-light"): ?>
                            <img src="<?php echo $apollo13->get_option('settings', 'logo_image_light'); ?>"/>
                        <?php else: ?>
                            <img src="<?php echo $apollo13->get_option('settings', 'logo_image_dark'); ?>"/>
                        <?php endif; ?>
                    </a>
                </div>

                <div id="menu" class="menu_line_bottom no_content_font">
                    <div id="menu_container">
                        <?php
                        if (has_nav_menu('header-menu')
                        ):
                            /* Our navigation menu.  If one isn't filled out, wp_nav_menu falls back to wp_page_menu.  The menu assiged to the primary position is the one used.  If none is assigned, the menu with the lowest ID is used.  */
                            wp_nav_menu(array(
                                'container' => false,
                                'link_before' => '',
                                'link_after' => '',
                                'menu_id' => 'nav',
                                'theme_location' => 'header-menu')
                            );
                        else:
                            wp_nav_menu(array(
                                'container' => false,
                                'link_before' => '<span>',
                                'link_after' => '</span>')
                            );
                        endif;
                        ?>
                        <div style="clear: both;"></div>
                    </div>
                </div>



            </div>
            
