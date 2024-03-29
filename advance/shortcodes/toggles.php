<?php
function apollo13_shortcode_tabs($atts, $content = null, $code)
{
    if (!preg_match_all("/\[tab\b\s([^]]*)\](.*?)\[\/tab\]/s", $content, $matches)) {
        return do_shortcode($content);
    } else {
        for ($i = 0; $i < count($matches[0]); $i++) {
            $matches[1][$i] = shortcode_parse_atts($matches[1][$i]);
        }
        $uniq = 'id' . uniqid(rand());
        $html = '<div class="tabsCell">';
        $htmlUl = '<ul class="tabs">';
        $htmlIn = '<div class="tab_container">';
        for ($i = 0; $i < count($matches[0]); $i++) {
            $htmlUl .= '<li><a href="#' . $uniq . 'tab' . $i . '" title=""><span>' . $matches[1][$i]['title'] . '</span></a></li>';
            $htmlIn .= '<div id="' . $uniq . 'tab' . $i . '" class="tab_content">
			';
            //space top open <p> by filter
            $htmlIn .= do_shortcode($matches[2][$i]);
            $htmlIn .= '</div>';
        }
        $htmlUl .= '</ul>';
        $htmlIn .= '</div>';
        $html .= $htmlUl . $htmlIn;
        $html .= '</div>';
        return $html;
    }
}

add_shortcode('tabs', 'apollo13_shortcode_tabs');
