<?php
class Apollo13_Widget_Recent_Posts extends WP_Widget
{
    function __construct()
    {
        $widget_ops = array('classname' => 'widget_recent_posts', 'description' => __("The most recent posts on your site", TPL_SLUG));
        parent::__construct('recent-posts', __('Recent Posts', TPL_SLUG), $widget_ops);
        $this->alt_option_name = 'widget_recent_entries';
        add_action('save_post', array(&$this, 'flush_widget_cache'));
        add_action('deleted_post', array(&$this, 'flush_widget_cache'));
        add_action('switch_theme', array(&$this, 'flush_widget_cache'));
    }


    function widget($args, $instance)
    {
        global $apollo13;
        $cache = wp_cache_get('widget_recent_entries', 'widget');
        if (!is_array($cache))
            $cache = array();
        if (isset($cache[$args['widget_id']])) {
            echo $cache[$args['widget_id']];
            return;
        }
        ob_start();
        extract($args);
        $title = apply_filters('widget_title', empty($instance['title']) ? __('Recent Posts', TPL_SLUG) : $instance['title'], $instance, $this->id_base);
        if (!$number = absint($instance['number']))
            $number = 10;
        $r = new WP_Query(array('posts_per_page' => $number, 'no_found_rows' => true, 'post_status' => 'publish', 'ignore_sticky_posts' => true));
        if ($r->have_posts()) :
            ?>
        <?php echo $before_widget; ?>
        <?php if ($title)
            echo $before_title . $title . $after_title; ?>
        <?php while ($r->have_posts()) : $r->the_post(); ?>
        <div class="recent_post_item">
            <div class="latest_blog_post_head">
                <a href="<?php the_permalink() ?>"><?php the_post_thumbnail(array(75, 75), array('class' => 'latest_blog_post_img')); ?></a>

                <div class="latest_blog_post_info">
                    <a href="<?php the_permalink() ?>"><h3 class="latest_blog_post_topic"><?php the_title(); ?></h3></a>

                    <p class="latest_blog_post_date"><?php the_date('d M, Y'); ?></p>
                </div>
                <div style="clear: both"></div>
            </div>
        </div>
        <?php endwhile; ?>
        <?php echo $after_widget; ?>
        <?php
            // Reset the global $the_post as this query will have stomped on it
            wp_reset_postdata();
        endif;
        $cache[$args['widget_id']] = ob_get_flush();
        wp_cache_set('widget_recent_entries', $cache, 'widget');
    }


    function update($new_instance, $old_instance)
    {
        $instance = $old_instance;
        $instance['title'] = strip_tags($new_instance['title']);
        $instance['number'] = (int)$new_instance['number'];
        $this->flush_widget_cache();
        $alloptions = wp_cache_get('alloptions', 'options');
        if (isset($alloptions['widget_recent_entries']))
            delete_option('widget_recent_entries');
        return $instance;
    }


    function flush_widget_cache()
    {
        wp_cache_delete('widget_recent_entries', 'widget');
    }


    function form($instance)
    {
        $title = isset($instance['title']) ? esc_attr($instance['title']) : '';
        $number = isset($instance['number']) ? absint($instance['number']) : 5;
        ?>
    <p><label for="<?php echo $this->get_field_id('title'); ?>"><?php _e('Title:', TPL_SLUG); ?></label>
        <input class="widefat" id="<?php echo $this->get_field_id('title'); ?>" name="<?php echo $this->get_field_name('title'); ?>" type="text" value="<?php echo $title; ?>"/></p>
    <p><label for="<?php echo $this->get_field_id('number'); ?>"><?php _e('Number of posts to show:', TPL_SLUG); ?></label>
        <input id="<?php echo $this->get_field_id('number'); ?>" name="<?php echo $this->get_field_name('number'); ?>" type="text" value="<?php echo $number; ?>" size="3"/></p>
    <?php
    }
}

unregister_widget('WP_Widget_Recent_Posts');
register_widget('Apollo13_Widget_Recent_Posts');
class Apollo13_Widget_Popular_Posts extends WP_Widget
{
    function __construct()
    {
        $widget_ops = array('classname' => 'widget_popular_entries', 'description' => __("The most popular posts on your site", TPL_SLUG));
        parent::__construct('popular-posts', __('Popular Posts', TPL_SLUG), $widget_ops);
        $this->alt_option_name = 'widget_popular_entries';
        add_action('save_post', array(&$this, 'flush_widget_cache'));
        add_action('deleted_post', array(&$this, 'flush_widget_cache'));
        add_action('switch_theme', array(&$this, 'flush_widget_cache'));
    }


    function widget($args, $instance)
    {
        global $apollo13;
        $cache = wp_cache_get('widget_popular_entries', 'widget');
        if (!is_array($cache))
            $cache = array();
        if (isset($cache[$args['widget_id']])) {
            echo $cache[$args['widget_id']];
            return;
        }
        ob_start();
        extract($args);
        $title = apply_filters('widget_title', empty($instance['title']) ? __('Popular Posts', TPL_SLUG) : $instance['title'], $instance, $this->id_base);
        if (!$number = absint($instance['number']))
            $number = 10;
        $r = new WP_Query(array('posts_per_page' => $number, 'no_found_rows' => true, 'orderby' => 'comment_count', 'post_status' => 'publish', 'ignore_sticky_posts' => true));
        if ($r->have_posts()) :
            ?>
        <?php echo $before_widget; ?>
        <?php if ($title)
            echo $before_title . $title . $after_title; ?>
        <?php while ($r->have_posts()) : $r->the_post(); ?>
        <div class="recent_post_item">
            <div class="latest_blog_post_head">
                <a href="<?php the_permalink() ?>"><?php the_post_thumbnail(array(75, 75), array('class' => 'latest_blog_post_img')); ?></a>

                <div class="latest_blog_post_info">
                    <a href="<?php the_permalink() ?>"><h3 class="latest_blog_post_topic"><?php the_title(); ?></h3></a>

                    <p class="latest_blog_post_date"><?php the_date('d M, Y'); ?></p>
                </div>
                <div style="clear: both"></div>
            </div>
        </div>
        <?php endwhile; ?>
        <?php echo $after_widget; ?>
        <?php
            // Reset the global $the_post as this query will have stomped on it
            wp_reset_postdata();
        endif;
        $cache[$args['widget_id']] = ob_get_flush();
        wp_cache_set('widget_popular_entries', $cache, 'widget');
    }


    function update($new_instance, $old_instance)
    {
        $instance = $old_instance;
        $instance['title'] = strip_tags($new_instance['title']);
        $instance['number'] = (int)$new_instance['number'];
        $this->flush_widget_cache();
        $alloptions = wp_cache_get('alloptions', 'options');
        if (isset($alloptions['widget_popular_entries']))
            delete_option('widget_popular_entries');
        return $instance;
    }


    function flush_widget_cache()
    {
        wp_cache_delete('widget_popular_entries', 'widget');
    }


    function form($instance)
    {
        $title = isset($instance['title']) ? esc_attr($instance['title']) : '';
        $number = isset($instance['number']) ? absint($instance['number']) : 5;
        ?>
    <p><label for="<?php echo $this->get_field_id('title'); ?>"><?php _e('Title:', TPL_SLUG); ?></label>
        <input class="widefat" id="<?php echo $this->get_field_id('title'); ?>" name="<?php echo $this->get_field_name('title'); ?>" type="text" value="<?php echo $title; ?>"/></p>
    <p><label for="<?php echo $this->get_field_id('number'); ?>"><?php _e('Number of posts to show:', TPL_SLUG); ?></label>
        <input id="<?php echo $this->get_field_id('number'); ?>" name="<?php echo $this->get_field_name('number'); ?>" type="text" value="<?php echo $number; ?>" size="3"/></p>
    <?php
    }
}

register_widget('Apollo13_Widget_Popular_Posts');
class Apollo13_Widget_Related_Posts extends WP_Widget
{
    function __construct()
    {
        $widget_ops = array('classname' => 'widget_related_entries', 'description' => __("Related posts to current post", TPL_SLUG));
        parent::__construct('related-posts', __('Related Posts', TPL_SLUG), $widget_ops);
        $this->alt_option_name = 'widget_related_entries';
        add_action('save_post', array(&$this, 'flush_widget_cache'));
        add_action('deleted_post', array(&$this, 'flush_widget_cache'));
        add_action('switch_theme', array(&$this, 'flush_widget_cache'));
    }


    function widget($args, $instance)
    {
        global $apollo13;
        $cache = wp_cache_get('widget_related_entries', 'widget');
        if (!is_array($cache))
            $cache = array();
        if (isset($cache[$args['widget_id']])) {
            echo $cache[$args['widget_id']];
            return;
        }
        ob_start();
        extract($args);
        $title = apply_filters('widget_title', empty($instance['title']) ? __('Related Posts', TPL_SLUG) : $instance['title'], $instance, $this->id_base);
        if (!$number = absint($instance['number']))
            $number = 10;
        global $post;
        $tags = wp_get_post_categories($post->ID);
        $tagIDs = array();
        if (count($tags)) {
            $r = new WP_Query(array('category__in' => $tags, 'post__not_in' => array($post->ID), 'posts_per_page' => $number, 'no_found_rows' => true, 'post_status' => 'publish', 'ignore_sticky_posts' => true));
            if ($r->have_posts()) :
                ?>
            <?php echo $before_widget; ?>
            <?php if ($title)
                echo $before_title . $title . $after_title; ?>
            <ul>
                <?php while ($r->have_posts()) : $r->the_post(); ?>
                <div class="recent_post_item">
                    <div class="latest_blog_post_head">
                        <a href="<?php the_permalink() ?>"><?php the_post_thumbnail(array(75, 75), array('class' => 'latest_blog_post_img')); ?></a>

                        <div class="latest_blog_post_info">
                            <a href="<?php the_permalink() ?>"><h3 class="latest_blog_post_topic"><?php the_title(); ?></h3></a>

                            <p class="latest_blog_post_date"><?php the_date('d M, Y'); ?></p>
                        </div>
                        <div style="clear: both"></div>
                    </div>
                </div>
                <?php endwhile; ?>
            </ul>
            <?php echo $after_widget; ?>
            <?php
                // Reset the global $the_post as this query will have stomped on it
                wp_reset_postdata();
            endif;
            $cache[$args['widget_id']] = ob_get_flush();
            wp_cache_set('widget_related_entries', $cache, 'widget');
        }
    }


    function update($new_instance, $old_instance)
    {
        $instance = $old_instance;
        $instance['title'] = strip_tags($new_instance['title']);
        $instance['number'] = (int)$new_instance['number'];
        $this->flush_widget_cache();
        $alloptions = wp_cache_get('alloptions', 'options');
        if (isset($alloptions['widget_related_entries']))
            delete_option('widget_related_entries');
        return $instance;
    }


    function flush_widget_cache()
    {
        wp_cache_delete('widget_related_entries', 'widget');
    }


    function form($instance)
    {
        $title = isset($instance['title']) ? esc_attr($instance['title']) : '';
        $number = isset($instance['number']) ? absint($instance['number']) : 5;
        ?>
    <p><label for="<?php echo $this->get_field_id('title'); ?>"><?php _e('Title:', TPL_SLUG); ?></label>
        <input class="widefat" id="<?php echo $this->get_field_id('title'); ?>" name="<?php echo $this->get_field_name('title'); ?>" type="text" value="<?php echo $title; ?>"/></p>
    <p><label for="<?php echo $this->get_field_id('number'); ?>"><?php _e('Number of posts to show:', TPL_SLUG); ?></label>
        <input id="<?php echo $this->get_field_id('number'); ?>" name="<?php echo $this->get_field_name('number'); ?>" type="text" value="<?php echo $number; ?>" size="3"/></p>
    <?php
    }
}

register_widget('Apollo13_Widget_Related_Posts');
class Apollo13_Widget_Recent_Comments extends WP_Widget
{
    function __construct()
    {
        $widget_ops = array('classname' => 'widget_recent_comments', 'description' => __('The most recent comments', TPL_SLUG));
        parent::__construct('recent-comments', __('Recent Comments', TPL_SLUG), $widget_ops);
        $this->alt_option_name = 'widget_recent_comments';
        add_action('comment_post', array(&$this, 'flush_widget_cache'));
        add_action('transition_comment_status', array(&$this, 'flush_widget_cache'));
    }


    function flush_widget_cache()
    {
        wp_cache_delete('widget_recent_comments', 'widget');
    }


    function widget($args, $instance)
    {
        global $comments, $comment, $apollo13;
        $cache = wp_cache_get('widget_recent_comments', 'widget');
        if (!is_array($cache))
            $cache = array();
        if (isset($cache[$args['widget_id']])) {
            echo $cache[$args['widget_id']];
            return;
        }
        extract($args, EXTR_SKIP);
        $output = '';
        $title = apply_filters('widget_title', empty($instance['title']) ? __('Recent Comments', TPL_SLUG) : $instance['title']);
        if (!$number = absint($instance['number']))
            $number = 5;
        $comments = get_comments(array('number' => $number, 'status' => 'approve', 'post_status' => 'publish'));
        echo $before_widget;
        if ($title)
            echo $before_title . $title . $after_title;
        if ($comments) {
            foreach ((array)$comments as $comment) {
                ?>
            <div class="recent_comment border_link_color">
                <?php echo get_comment_author() ?> <?php _e('on', TPL_SLUG); ?> <a class="revers_hover" href="<?php echo esc_url(get_comment_link($comment->comment_ID)); ?>"><?php echo get_the_title($comment->comment_post_ID); ?></a>
            </div>
            <?php /* <div class="widget-cloud">
                  <a class="title" href="<?php echo esc_url(get_comment_link($comment->comment_ID)); ?>"><?php echo get_the_title($comment->comment_post_ID); ?></a>
                  <span class="author">:</span>
                  <a class="content" href="<?php echo esc_url(get_comment_link($comment->comment_ID)); ?>"><?php echo $apollo13->get_comment_excerpt($comment->comment_ID, 10); ?></a>
                  <span class="arrow"></span></div> */
                ?>
            <?php
            }
        }
        echo $after_widget;
        //echo $output;
        $cache[$args['widget_id']] = $output;
        wp_cache_set('widget_recent_comments', $cache, 'widget');
    }


    function update($new_instance, $old_instance)
    {
        $instance = $old_instance;
        $instance['title'] = strip_tags($new_instance['title']);
        $instance['number'] = absint($new_instance['number']);
        $this->flush_widget_cache();
        $alloptions = wp_cache_get('alloptions', 'options');
        if (isset($alloptions['widget_recent_comments']))
            delete_option('widget_recent_comments');
        return $instance;
    }


    function form($instance)
    {
        $title = isset($instance['title']) ? esc_attr($instance['title']) : '';
        $number = isset($instance['number']) ? absint($instance['number']) : 5;
        ?>
    <p><label for="<?php echo $this->get_field_id('title'); ?>"><?php _e('Title:', TPL_SLUG); ?></label>
        <input class="widefat" id="<?php echo $this->get_field_id('title'); ?>" name="<?php echo $this->get_field_name('title'); ?>" type="text" value="<?php echo $title; ?>"/></p>
    <p><label for="<?php echo $this->get_field_id('number'); ?>"><?php _e('Number of comments to show:', TPL_SLUG); ?></label>
        <input id="<?php echo $this->get_field_id('number'); ?>" name="<?php echo $this->get_field_name('number'); ?>" type="text" value="<?php echo $number; ?>" size="3"/></p>
    <?php
    }
}

register_widget('Apollo13_Widget_Recent_Comments');
class Apollo13_Widget_Twitter extends WP_Widget
{
    function __construct()
    {
        $widget_ops = array('classname' => 'apollo13_widget_twitter', 'description' => __('Display twitter feeds', TPL_SLUG));
        $this->WP_Widget('apollo13_twitter', __(TPL_NAME . '  Twitter', TPL_SLUG), $widget_ops);
    }


    function widget($args, $instance)
    {
        extract($args);
        $title = apply_filters('widget_title', empty($instance['title']) ? __('Twitter', TPL_SLUG) : $instance['title'], $instance, $this->id_base);
        $title .= '<span class="tweet-ico"></span>';
        $username = $instance['username'];
        $count = (int)$instance['count'];
        if ($count < 1) {
            $count = 1;
        }
        if (!empty($username)) {
            echo $before_widget;
            if ($title)
                echo $before_title . $title . $after_title;
            $uniq = uniqid(rand());
            ?>
        <script type="text/javascript">
            jQuery(document).ready(function ($) {
                jQuery("#air-tweet<?php echo $uniq; ?>").tweet({
                    username:["<?php echo $username; ?>"],
                    count: <?php echo $count; ?>,
                    seconds_ago_text:"<?php _e('about %d seconds ago', TPL_SLUG); ?>",
                    a_minutes_ago_text:"<?php _e('about a minute ago', TPL_SLUG); ?>",
                    minutes_ago_text:"<?php _e('about %d minutes ago', TPL_SLUG); ?>",
                    a_hours_ago_text:"<?php _e('about an hour ago', TPL_SLUG); ?>",
                    hours_ago_text:"<?php _e('about %d hours ago', TPL_SLUG); ?>",
                    a_day_ago_text:"<?php _e('about a day ago', TPL_SLUG); ?>",
                    days_ago_text:"<?php _e('about %d days ago', TPL_SLUG); ?>",
                    view_text:"<?php _e('view tweet on twitter', TPL_SLUG); ?>",
                    template:"{join}{text} {time}"
                });
            });
        </script>
        <div id="air-tweet<?php echo $uniq; ?>">
        </div>
        <div class="clearboth"></div>
        <?php
            echo $after_widget;
        }
    }


    function update($new_instance, $old_instance)
    {
        $instance = $old_instance;
        $instance['title'] = strip_tags($new_instance['title']);
        $instance['username'] = strip_tags($new_instance['username']);
        $instance['avatar_size'] = $new_instance['avatar_size'] ? (int)$new_instance['avatar_size'] : '';
        $instance['count'] = (int)$new_instance['count'];
        $instance['query'] = strip_tags($new_instance['query']);
        return $instance;
    }


    function form($instance)
    {
        $title = isset($instance['title']) ? esc_attr($instance['title']) : '';
        $username = isset($instance['username']) ? esc_attr($instance['username']) : '';
        $avatar_size = isset($instance['avatar_size']) ? absint($instance['avatar_size']) : '';
        $query = isset($instance['query']) ? esc_attr($instance['query']) : '';
        $count = isset($instance['count']) ? absint($instance['count']) : 3;
        $display = isset($instance['display']) ? $instance['display'] : 'latest';
        ?>
    <p><label for="<?php echo $this->get_field_id('title'); ?>"><?php _e('Title:', TPL_SLUG); ?></label>
        <input class="widefat" id="<?php echo $this->get_field_id('title'); ?>" name="<?php echo $this->get_field_name('title'); ?>" type="text" value="<?php echo $title; ?>"/></p>
    <p><label for="<?php echo $this->get_field_id('username'); ?>"><?php _e('Username:', TPL_SLUG); ?></label>
        <input class="widefat" id="<?php echo $this->get_field_id('username'); ?>" name="<?php echo $this->get_field_name('username'); ?>" type="text" value="<?php echo $username; ?>"/></p>
    <p><label for="<?php echo $this->get_field_id('count'); ?>"><?php _e('Number of tweets', TPL_SLUG); ?></label>
        <input id="<?php echo $this->get_field_id('count'); ?>" name="<?php echo $this->get_field_name('count'); ?>" type="text" value="<?php echo $count; ?>" size="3"/></p>
    <?php
    }
}

register_widget('Apollo13_Widget_Twitter');
class Apollo13_Widget_Recent_Projects extends WP_Widget
{
    function __construct()
    {
        $widget_ops = array('classname' => 'widget_recent_projects', 'description' => __("Your most recent projects", TPL_SLUG));
        parent::__construct('recent-projects', __('Recent Projects', TPL_SLUG), $widget_ops);
        $this->alt_option_name = 'widget_recent_projects';
        add_action('save_post', array(&$this, 'flush_widget_cache'));
        add_action('deleted_post', array(&$this, 'flush_widget_cache'));
        add_action('switch_theme', array(&$this, 'flush_widget_cache'));
    }


    function widget($args, $instance)
    {
        global $apollo13;
        $cache = wp_cache_get('widget_recent_projects', 'widget');
        if (!is_array($cache))
            $cache = array();
        if (isset($cache[$args['widget_id']])) {
            echo $cache[$args['widget_id']];
            return;
        }
        ob_start();
        extract($args);
        $title = apply_filters('widget_title', empty($instance['title']) ? __('Recent Projects', TPL_SLUG) : $instance['title'], $instance, $this->id_base);
        if (!$number = absint($instance['number']))
            $number = 10;
        $title = apply_filters('widget_title', empty($instance['title']) ? __('Latest works', TPL_SLUG) : $instance['title']);
        if ($title)
            echo $before_title . $title . $after_title;
        ?>
    <div class="flex-nav-container">
    <div class="flexslider">
    <ul class="slides">
        <?php
        $open_group = false;
        $posts_per_page = 4;
        $args = array('post_type' => 'portfolio', 'posts_per_page' => $posts_per_page);
        $loop = new WP_Query($args);
        $counter = 1;
        while ($loop->have_posts()) : $loop->the_post();
            ?>
            <?php if (($counter - 1) % 4 == 0): ?>
                                    <li>
                                    <?php endif; ?>
            <?php if (($counter - 1) % 2 == 0): ?>
                                        <div class="slide_boxs_groups" <?php if ($counter % 4 == 1)
                                            echo 'style="margin-right: 16px;"'; ?>>
                                            <?php $open_group = true;
            endif; ?>

            <div <?php if ($counter % 2 == 1)
                echo 'style="margin-right: 16px;"'; ?>  class="four columns slide_box">
                <div class="box_action_starter" onclick="javascript:goToPage(this);" onmouseover="javascript:slideOver(this);" onmouseout="javascript:slideOut(this)"></div>
                <div class="slide_box_hover">
                    <div class="slide_box_hover_background"></div>
                    <div class="slide_box_content no_content_font">
                        <p><?php echo get_the_title(); ?><Br/>
                            <span class="extra_description"><?php echo trim(get_post_meta(get_the_ID(), '_project_desc', true)); ?></span>
                        </p>
                    </div>
                </div>
                <a class="slide_box_link" href="<?php echo get_permalink() ?>"><?php $apollo13->portfolio_get_icon(220, 150); ?></a>
            </div>

            <?php if (($counter % 2 == 0)): ?>
                <div style="clear: both;"></div>
                                        </div>
                                    <?php endif; ?>
            <?php if ($counter % 4 == 0): ?>
                                    </li>
                                <?php endif; ?>
            <?php if ($counter == $loop->post_count && $counter % 4 != 0): ?>
                            </div>
                            </li>
                <?php endif; ?>
            <?php $counter++;
        endwhile; ?>
        </ul>
    </div>
    </div>
    <script type="text/javascript">
        function slideOver(element) {
            jQuery(element).parent().children('.slide_box_hover').fadeIn();
        }
        function slideOut(element) {
            jQuery(element).parent().children('.slide_box_hover').fadeOut();
        }
        function goToPage(element) {
            var link = jQuery(element).parent().children('.slide_box_link').attr('href');
            jQuery(location).attr('href', link);
        }
    </script>
    <?php
        //$cache[$instance['widget_id']] = ob_get_flush();
        //echo var_dump($instance);
        wp_cache_set('widget_recent_projects', $cache, 'widget');
    }


    function update($new_instance, $old_instance)
    {
        $instance = $old_instance;
        $instance['title'] = strip_tags($new_instance['title']);
        $instance['number'] = (int)$new_instance['number'];
        $this->flush_widget_cache();
        $alloptions = wp_cache_get('alloptions', 'options');
        if (isset($alloptions['widget_recent_projects']))
            delete_option('widget_recent_projects');
        return $instance;
    }


    function flush_widget_cache()
    {
        wp_cache_delete('widget_recent_projects', 'widget');
    }


    function form($instance)
    {
        $title = isset($instance['title']) ? esc_attr($instance['title']) : '';
        $number = isset($instance['number']) ? absint($instance['number']) : 5;
        ?>
    <p><label for="<?php echo $this->get_field_id('title'); ?>"><?php _e('Title:', TPL_SLUG); ?></label>
        <input class="widefat" id="<?php echo $this->get_field_id('title'); ?>" name="<?php echo $this->get_field_name('title'); ?>" type="text" value="<?php echo $title; ?>"/></p>
    <p><label for="<?php echo $this->get_field_id('number'); ?>"><?php _e('Number of posts to show:', TPL_SLUG); ?></label>
        <input id="<?php echo $this->get_field_id('number'); ?>" name="<?php echo $this->get_field_name('number'); ?>" type="text" value="<?php echo $number; ?>" size="3"/></p>
    <?php
    }
}

register_widget('Apollo13_Widget_Recent_Projects');
class Apollo13_Widget_Related_Projects extends WP_Widget
{
    function __construct()
    {
        $widget_ops = array('classname' => 'widget_related_projects', 'description' => __("Related projects", TPL_SLUG));
        parent::__construct('related-projects', __('Related Projects', TPL_SLUG), $widget_ops);
        $this->alt_option_name = 'widget_related_projects';
        add_action('save_post', array(&$this, 'flush_widget_cache'));
        add_action('deleted_post', array(&$this, 'flush_widget_cache'));
        add_action('switch_theme', array(&$this, 'flush_widget_cache'));
    }


    function widget($args, $instance)
    {
        global $apollo13;
        $cache = wp_cache_get('widget_related_projects', 'widget');
        if (!is_array($cache))
            $cache = array();
        if (isset($cache[$args['widget_id']])) {
            echo $cache[$args['widget_id']];
            return;
        }
        ob_start();
        extract($args);
        $tags = wp_get_post_terms(get_the_ID(), 'skills', array("fields" => "ids"));
        $title = apply_filters('widget_title', empty($instance['title']) ? __('Recent Projects', TPL_SLUG) : $instance['title'], $instance, $this->id_base);
        if (!$number = absint($instance['number']))
            $number = 10;
        $title = apply_filters('widget_title', empty($instance['title']) ? __('Latest works', TPL_SLUG) : $instance['title']);
        if ($title)
            echo $before_title . $title . $after_title;
        global $post;
        if (count($tags)) {
            ?>
        <div class="flex-nav-container">
        <div class="flexslider">
        <ul class="slides">
            <?php
            $open_group = false;
            $posts_per_page = 4;
            $loop = new WP_Query(array(
                'posts_per_page' => $posts_per_page,
                'no_found_rows' => true,
                'post__not_in' => array(get_the_ID()),
                'post_type' => PORTFOLIO_POST_TYPE,
                'post_status' => 'publish',
                'ignore_sticky_posts' => true,
                'tax_query' => array(
                    array(
                        'taxonomy' => 'skills',
                        'field' => 'id',
                        'terms' => $tags,
                        'operator' => 'IN'
                    )
                )
            ));
            $counter = 1;
            while ($loop->have_posts()) : $loop->the_post();
                ?>
                <?php if (($counter - 1) % 4 == 0): ?>
                                    <li>
                                    <?php endif; ?>
                <?php if (($counter - 1) % 2 == 0): ?>
                                        <div class="slide_boxs_groups" <?php if ($counter % 4 == 1)
                                            echo 'style="margin-right: 16px;"'; ?>>
                                            <?php $open_group = true;
                endif; ?>

                <div <?php if ($counter % 2 == 1)
                    echo 'style="margin-right: 16px;"'; ?>  class="four columns slide_box">
                    <div class="box_action_starter" onclick="javascript:goToPage(this);" onmouseover="javascript:slideOver(this);" onmouseout="javascript:slideOut(this)"></div>
                    <div class="slide_box_hover">
                        <div class="slide_box_hover_background"></div>
                        <div class="slide_box_content no_content_font">
                            <p><?php echo get_the_title(); ?><Br/>
                                <span class="extra_description"><?php echo trim(get_post_meta(get_the_ID(), '_project_desc', true)); ?></span>
                            </p>
                        </div>
                    </div>
                    <a class="slide_box_link" href="<?php echo get_permalink() ?>"><?php $apollo13->portfolio_get_icon(220, 150); ?></a>
                </div>

                <?php if (($counter % 2 == 0)): ?>
                    <div style="clear: both;"></div>
                                        </div>
                                    <?php endif; ?>
                <?php if ($counter % 4 == 0): ?>
                                    </li>
                                <?php endif; ?>
                <?php if ($counter == $loop->post_count && $counter % 4 != 0): ?>
                            </div>
                            </li>
                    <?php endif; ?>
                <?php $counter++;
            endwhile; ?>
            </ul>
        </div>
        </div>
        <script type="text/javascript">
            function slideOver(element) {
                jQuery(element).parent().children('.slide_box_hover').fadeIn();
            }
            function slideOut(element) {
                jQuery(element).parent().children('.slide_box_hover').fadeOut();
            }
            function goToPage(element) {
                var link = jQuery(element).parent().children('.slide_box_link').attr('href');
                jQuery(location).attr('href', link);
            }
        </script>
        <?php
            $cache[$args['widget_id']] = ob_get_flush();
            wp_cache_set('widget_related_projects', $cache, 'widget');
        }
    }


    function update($new_instance, $old_instance)
    {
        $instance = $old_instance;
        $instance['title'] = strip_tags($new_instance['title']);
        $instance['number'] = (int)$new_instance['number'];
        $this->flush_widget_cache();
        $alloptions = wp_cache_get('alloptions', 'options');
        if (isset($alloptions['widget_related_projects']))
            delete_option('widget_related_projects');
        return $instance;
    }


    function flush_widget_cache()
    {
        wp_cache_delete('widget_related_projects', 'widget');
    }


    function form($instance)
    {
        $title = isset($instance['title']) ? esc_attr($instance['title']) : '';
        $number = isset($instance['number']) ? absint($instance['number']) : 5;
        ?>
    <p><label for="<?php echo $this->get_field_id('title'); ?>"><?php _e('Title:', TPL_SLUG); ?></label>
        <input class="widefat" id="<?php echo $this->get_field_id('title'); ?>" name="<?php echo $this->get_field_name('title'); ?>" type="text" value="<?php echo $title; ?>"/></p>
    <p><label for="<?php echo $this->get_field_id('number'); ?>"><?php _e('Number of posts to show:', TPL_SLUG); ?></label>
        <input id="<?php echo $this->get_field_id('number'); ?>" name="<?php echo $this->get_field_name('number'); ?>" type="text" value="<?php echo $number; ?>" size="3"/></p>
    <?php
    }
}

register_widget('Apollo13_Widget_Related_Projects');

class Apollo13_Widget_Custom_Image extends WP_Widget
{
    function __construct()
    {
        $widget_ops = array('classname' => 'widget_custom_image', 'description' => __("Custom image", TPL_SLUG));
        parent::__construct('custom-image', __('Custom image', TPL_SLUG), $widget_ops);
        $this->alt_option_name = 'widget_custom_image';
        add_action('save_post', array(&$this, 'flush_widget_cache'));
        add_action('deleted_post', array(&$this, 'flush_widget_cache'));
        add_action('switch_theme', array(&$this, 'flush_widget_cache'));
    }


    function widget($args, $instance)
    {
        global $apollo13;
        $cache = wp_cache_get('widget_custom_image', 'widget');
        if (!is_array($cache))
            $cache = array();
        if (isset($cache[$args['widget_id']])) {
            echo $cache[$args['widget_id']];
            return;
        }
        ob_start();
        extract($args);
        echo $before_widget;
        ?>
    <img class="widget-image" src="<?php echo $instance['image'] ?>"/>
    <?php
        echo $after_widget;
        $cache[$args['widget_id']] = ob_get_flush();
        wp_cache_set('widget_custom_image', $cache, 'widget');
    }


    function update($new_instance, $old_instance)
    {
        $instance = $old_instance;
        $instance['image'] = strip_tags($new_instance['image']);
        $this->flush_widget_cache();
        $alloptions = wp_cache_get('alloptions', 'options');
        if (isset($alloptions['widget_custom_image']))
            delete_option('widget_custom_image');
        return $instance;
    }


    function flush_widget_cache()
    {
        wp_cache_delete('widget_custom_image', 'widget');
    }


    function form($instance)
    {
        $image = isset($instance['image']) ? esc_attr($instance['image']) : '';
        ?>
    <p><label for="<?php echo $this->get_field_name('image'); ?>"><?php _e('Image:', TPL_SLUG); ?></label>
        <input class="widefat" id="<?php echo $this->get_field_name('image'); ?>" name="<?php echo $this->get_field_name('image'); ?>" type="text" value="<?php echo $image; ?>"/></p>
    <input id="upload_<?php echo $this->get_field_name('image'); ?>" class="upload-image-button" type="button" value="<?php _e('Upload Image', TPL_SLUG); ?>"/>
    <?php
    }
}

register_widget('Apollo13_Widget_Custom_Image');

class Apollo13_Widget_Flickr extends WP_Widget
{
    function __construct()
    {
        $widget_ops = array('classname' => 'widget_flickr', 'description' => __("Flickr", TPL_SLUG));
        parent::__construct('flickr', __('Flickr', TPL_SLUG), $widget_ops);
        $this->alt_option_name = 'widget_flickr';
        add_action('save_post', array(&$this, 'flush_widget_cache'));
        add_action('deleted_post', array(&$this, 'flush_widget_cache'));
        add_action('switch_theme', array(&$this, 'flush_widget_cache'));
    }


    public function getImages($rss_url, $number)
    {
        $xml = simplexml_load_file($rss_url);
        $images = array();
        $regx = "/<img(.+)\/>/";

        foreach ($xml->channel->item as $item) {
            if (count($images) == $number) {
                break;
            }
            preg_match($regx, $item->description, $matches);

            $images[] = array(
                'title' => $item->title,
                'link' => $item->link,
                'thumb' => $matches[0]
            );
        }

        return $images;
    }


    function widget($args, $instance)
    {
        global $apollo13;
        $cache = wp_cache_get('widget_flickr', 'widget');
        if (!is_array($cache))
            $cache = array();

        if (isset($cache[$args['widget_id']])) {
            echo $cache[$args['widget_id']];
            return;
        }
        ob_start();
        extract($args);
        echo $before_widget;

        $title = apply_filters('widget_title', empty($instance['title']) ? __('Flickr', TPL_SLUG) : $instance['title']);
        if ($title)
            echo $before_title . $title . $after_title;

        $rss_url = $instance['rss_url'];
        $number = $instance['number'];
        $images = $this->getImages($rss_url, $number);
        ?>
    <div class="flickrpress-container">
        <div class="flickrpress-items">


            <?php
            foreach ($images as $image) : ?>
                <div class="flickr_item flickr_item_view_squares">
                    <a title="<?php $image['title'] ?>" href="<?php echo $image['link'] ?>"><?php echo $image['thumb']; ?></a>
                </div>
                <?php endforeach; ?>

        </div>
    </div>
    <?php
        echo $after_widget;
        $cache[$args['widget_id']] = ob_get_flush();
        wp_cache_set('widget_flickr', $cache, 'widget');
    }


    function update($new_instance, $old_instance)
    {
        $instance = $old_instance;
        $instance['rss_url'] = strip_tags($new_instance['rss_url']);
        $instance['number'] = strip_tags($new_instance['number']);
        $this->flush_widget_cache();
        $alloptions = wp_cache_get('alloptions', 'options');
        if (isset($alloptions['widget_flickr']))
            delete_option('widget_flickr');
        return $instance;
    }


    function flush_widget_cache()
    {
        wp_cache_delete('widget_flickr', 'widget');
    }


    function form($instance)
    {
        $rss_url = isset($instance['rss_url']) ? esc_attr($instance['rss_url']) : '';
        $number = isset($instance['number']) ? absint($instance['number']) : 8;
        ?>
    <p><label for="<?php echo $this->get_field_id('title'); ?>"><?php _e('Title:', TPL_SLUG); ?></label>
        <input class="widefat" id="<?php echo $this->get_field_id('title'); ?>" name="<?php echo $this->get_field_name('title'); ?>" type="text" value="<?php echo $title; ?>"/></p>

    <p>
        <label for="<?php echo $this->get_field_name('rss_url'); ?>"><?php _e('RSS url:', TPL_SLUG); ?></label>
        <input class="widefat" id="<?php echo $this->get_field_name('rss_url'); ?>" name="<?php echo $this->get_field_name('rss_url'); ?>" type="text" value="<?php echo $rss_url; ?>"/>
    </p>
    <p><label for="<?php echo $this->get_field_id('number'); ?>"><?php _e('Number of images to show:', TPL_SLUG); ?></label>
        <input id="<?php echo $this->get_field_id('number'); ?>" name="<?php echo $this->get_field_name('number'); ?>" type="text" value="<?php echo $number; ?>" size="3"/>
    </p>

    <?php
    }
}

register_widget('Apollo13_Widget_Flickr');

?>