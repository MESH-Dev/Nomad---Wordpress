<?php
function apollo13_shortcode_title($atts, $content = null, $code)
{
    extract(shortcode_atts(array(
        'size' => 'h1',
        'color' => ''
    ), $atts));
    if ($color) {
        $color = ' style="color: ' . $color . ';"';
    }
    return '<' . $size . ' class="sc-title mm"' . $color . '>' . do_shortcode($content) . '</' . $size . '>';
}

//add_shortcode('title', 'apollo13_shortcode_title');
function apollo13_shortcode_blockquote($atts, $content = null, $code)
{
    extract(shortcode_atts(array(
        'align' => 'center'
    ), $atts));
    return '<blockquote class="' . $align . '"><div>' . do_shortcode($content) . '</div></blockquote>';
}

add_shortcode('blockquote', 'apollo13_shortcode_blockquote');
function apollo13_shortcode_list($atts, $content = null, $code)
{
    extract(shortcode_atts(array(
        'style' => false,
    ), $atts));
    if ($style) {
        $style = ' list-' . $style;
    }
    return '<div class="sc-list' . $style . '">' . do_shortcode($content) . '</div>';
}

add_shortcode('list', 'apollo13_shortcode_list');
function apollo13_shortcode_image($atts, $content = null, $code)
{
    extract(shortcode_atts(array(
        'align' => false,
        'img' => false,
        'url' => false,
        'alt' => false,
        'border' => 'on'
    ), $atts));
    if (!$img) {
        return;
    }
    if (!$url) {
        $url = $img;
    }
    $class = '';
    if ($align == 'left') {
        $class = 'alignleft';
    } elseif ($align == 'right') {
        $class = 'alignright';
    } else {
        $class = 'no-align';
    }
    if ($border == 'off')
        $class .= ' no-border';
    return '<a class="alpha-scope alpha-scope-image sc-image ' . $class . '" href="' . $url . '" title="' . $alt . '"><img src="' . $img . '" alt="' . $alt . '" /><span class="mosaic-overlay" style="left: 0; top: 0;"></span></a>';
}

add_shortcode('image', 'apollo13_shortcode_image');
function apollo13_shortcode_hightlighting($atts, $content = null, $code)
{
    extract(shortcode_atts(array(
        'text_color' => '',
        'hightlighting_color' => ''
    ), $atts));
    if ($text_color) {
        $text_color = ' color: ' . $text_color . '; ';
    }
    if ($hightlighting_color) {
        $hightlighting_color = "background-color: " . $hightlighting_color . ";";
    }
    return '<span class="sc-hightlighting mm" style="' . $text_color . $hightlighting_color . '">' . do_shortcode($content) . '</span>';
}

add_shortcode('hightlighting', 'apollo13_shortcode_hightlighting');
function apollo13_shortcode_dropcaps($atts, $content = null, $code)
{
    extract(shortcode_atts(array(
        'text_color' => '',
        'hightlighting_color' => '',
        'font_size' => ''
    ), $atts));
    if ($text_color) {
        $text_color = ' color: ' . $text_color . '; ';
    }
    if ($font_size) {
        $font_size = 'font-size:' . $font_size . 'px; width: ' . $font_size * 1.4 . 'px; ';
    }
    if ($hightlighting_color) {
        $hightlighting_color = "background-color: " . $hightlighting_color . ";";
    }
    return '<span class="sc-dropcaps mm" style="' . $text_color . $hightlighting_color . $font_size . '">' . do_shortcode($content) . '</span>';
}

add_shortcode('dropcaps', 'apollo13_shortcode_dropcaps');
/* * ** *** */
global $theme_code_token;
$theme_code_token = md5(uniqid(rand()));
$theme_code_matches = array();
function theme_code_before_filter($content)
{
    return preg_replace_callback("/(.?)\[(pre|code)\b(.*?)(?:(\/))?\](?:(.+?)\[\/\\2\])?(.?)/s", "theme_code_before_filter_callback", $content);
}

function theme_code_before_filter_callback(&$match)
{
    global $theme_code_token, $theme_code_matches;
    $i = count($theme_code_matches);
    $theme_code_matches[$i] = $match;
    return $theme_code_token . sprintf("%03d", $i);
}

function theme_code_after_filter($content)
{
    global $theme_code_token;
    $content = preg_replace_callback("/\s*" . $theme_code_token . "(\d{3})\s*/si", "theme_code_after_filter_callback", $content);
    return $content;
}

function theme_code_after_filter_callback($match)
{
    global $theme_code_matches;
    $i = intval($match[1]);
    $content = $theme_code_matches[$i];
    $content[5] = trim($content[5]);
    if (version_compare(PHP_VERSION, '5.2.3') >= 0) {
        $output = htmlspecialchars($content[5], ENT_NOQUOTES, get_bloginfo('charset'), false);
    } else {
        $specialChars = array('&' => '&amp;', '<' => '&lt;', '>' => '&gt;');
        $output = strtr(htmlspecialchars_decode($content[5]), $specialChars);
    }
    return '<' . $content[2] . ' class="' . $content[2] . '">' . $output . '</' . $content[2] . '>';
}

add_filter('the_content', 'theme_code_before_filter', 0);
add_filter('the_content', 'theme_code_after_filter', 99);