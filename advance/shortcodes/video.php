<?php
function apollo13_shortcode_video($atts, $content = null, $code)
{
    extract(shortcode_atts(array(
        'type' => '',
        'src' => '',
        'width' => '',
        'height' => '',
        'autoplay' => 0,
    ), $atts));
    if ($autoplay == 'on')
        $autoplay = '&amp;autoplay=1';
    else
        $autoplay = '';
    if (empty($type))
        return;
    if ($type == 'youtube') {
        if (preg_match("/\??v=([a-zA-Z0-9]+)&?/s", $src, $matches)) {
            $video_id = $matches[1];
            return '<div class="post-video">
						<iframe style="border: none;" src="http://www.youtube.com/embed/' . $video_id . '?controls=1' . $autoplay . '&amp;fs=1&amp;hd=1&amp;loop=0&amp;rel=0&amp;showinfo=1&amp;showsearch=0&amp;wmode=transparent"></iframe>
					</div>';
        }
    } elseif ($type == 'vimeo') {
        // regexp $src http://vimeo.com/16998178
        if (preg_match("/(\.com\/)?([0-9]+)/s", $src, $matches)) {
            $video_id = $matches[2];
            return '<div class="post-video">
						<iframe style="border: none;" src="http://player.vimeo.com/video/' . $video_id . '?title=1' . $autoplay . 'loop=0"></iframe>
					</div>';
        }
    }
}

add_shortcode('video', 'apollo13_shortcode_video');
?>