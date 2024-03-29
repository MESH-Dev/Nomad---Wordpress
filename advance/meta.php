<?php
function apollo13_metaboxes_post()
{
    $meta = array(
        array(
            "name" => '',
            "type" => "fieldset"
        ),
        array(
            "name" => __('Choose featured image position', TPL_SLUG),
            "desc" => __('Choose between next to title or in content position', TPL_SLUG),
            "id" => "top_or_incontent",
            "default" => "next_to_title",
            "type" => "switch",
            "options" => array(
                "next_to_title" => __('Next to title (Thumbnail)', TPL_SLUG),
                "in_content" => __('Top of content', TPL_SLUG)
            ),
        ),
        array(
            "type" => "end-switch",
        ),
        array(
            "name" => __('Date position', TPL_SLUG),
            "desc" => '',
            "id" => "date_pos",
            "default" => "in_left",
            "type" => "switch",
            "options" => array(
                "above_to_title" => __('Above to title', TPL_SLUG),
                "in_left" => __('Left of content', TPL_SLUG)
            ),
        ),
        array(
            "type" => "end-switch",
        ),
        array(
            "name" => __('Background image', TPL_SLUG),
            "desc" => "",
            "id" => "background_image",
            "default" => "",
            "type" => "upload"
        ),
        array(
            "name" => __('Background color', TPL_SLUG),
            "desc" => "",
            "id" => "background_color",
            "default" => "",
            "type" => "color"
        ),
        array(
            "name" => __('Link to video', TPL_SLUG),
            "desc" => 'If you put video to the post it automatically change featured image position to top of content',
            "id" => "post_video",
            "default" => "",
            "type" => "input"
        )
    );
    return $meta;
}

function apollo13_metaboxes_page()
{
    $meta = array(
        array(
            "name" => '',
            "type" => "fieldset"
        ),
        array(
            "name" => __('Extra description', TPL_SLUG),
            "desc" => '',
            "id" => 'page_extra_description',
            'class' => 'desc',
            "default" => '',
            "type" => "input"
        ),
        array(
            "name" => __('Background image', TPL_SLUG),
            "desc" => "",
            "id" => "background_image",
            "default" => "",
            "type" => "upload"
        ),
        array(
            "name" => __('Background color', TPL_SLUG),
            "desc" => "",
            "id" => "background_color",
            "default" => "",
            "type" => "color"
        ),
    );
    return $meta;
}

function apollo13_metaboxes_portfolio()
{
    global $apollo13;
    $meta = array(
        array(
            "name" => '',
            "type" => "fieldset"
        ),
        array(
            "name" => __('Portfolio page', TPL_SLUG),
            "desc" => "",
            "id" => "portfolio_page",
            "default" => "",
            "type" => "portfolio_page_select"
        ),
        array(
            "name" => __('Slider', TPL_SLUG),
            "desc" => __('Use slider ', TPL_SLUG),
            "id" => "use_slider",
            "default" => "",
            "type" => "switch",
            "options" => array(
                "slider_on" => __('Yes', TPL_SLUG),
                "slider_off" => __('No', TPL_SLUG)
            ),
        ),
        array(
            "type" => "end-switch",
        ),
        array(
            "name" => __('Custom thumbnail', TPL_SLUG),
            "desc" => '',
            "id" => "homepage_thumb",
            "default" => "",
            "type" => "upload"
        ),
        array(
            "name" => __('Image attributes', TPL_SLUG),
            "desc" => __('<strong>alt</strong> is required for <strong>img</strong> elements', TPL_SLUG),
            "id" => 'homepage_thumb_attr',
            'class' => 'for-image-attributes',
            "default" => 'alt=""',
            "type" => "input"
        ),
        array(
            "name" => __('Background image', TPL_SLUG),
            "desc" => "",
            "id" => "background_image",
            "default" => "",
            "type" => "upload"
        ),
        array(
            "name" => __('Background color', TPL_SLUG),
            "desc" => "",
            "id" => "background_color",
            "default" => "",
            "type" => "color"
        ),
        array(
            "name" => '',
            "type" => "fieldset"
        ),
        array(
            "name" => __('Short description under title', TPL_SLUG),
            "desc" => __('This text will show in the portfolio list', TPL_SLUG),
            "id" => "project_desc",
            "default" => "",
            "type" => "input"
        )
    );
    return $meta;
}

function apollo13_metaboxes_portfolio_images()
{
    $meta = array(
        array(
            "name" => '',
            "type" => "fieldset"
        ),
        array(
            "name" => __('Multi upload', TPL_SLUG),
            'desc' => '',
            'id' => 'multi-upload',
            'type' => 'multi-upload',
        ),
        array(
            "name" => '',
            "type" => "fieldset",
            "additive" => true,
            "default" => "1",
            "title" => "1",
            "id" => 'image_count'
        ),
        array(
            "name" => __('Choose image or video', TPL_SLUG),
            "desc" => __('Choose between Image or Video', TPL_SLUG),
            "id" => "image_or_video",
            "default" => "",
            "type" => "switch",
            "options" => array(
                "post_image" => __('Image', TPL_SLUG),
                "post_video" => __('Video', TPL_SLUG)
            ),
        ),
        array(
            "name" => __('Upload image', TPL_SLUG),
            "desc" => '',
            "id" => "post_image",
            "default" => "",
            "type" => "upload"
        ),
        array(
            "name" => __('Image attributes', TPL_SLUG),
            "desc" => __('<strong>alt</strong> is required for <strong>img</strong> elements', TPL_SLUG),
            "id" => 'post_image_attr',
            'class' => 'for-image-attributes',
            "default" => 'alt=""',
            "type" => "input"
        ),
        array(
            "name" => __('Link to video', TPL_SLUG),
            "desc" => '',
            "id" => "post_video",
            "default" => "",
            "type" => "input"
        ),
        array(
            "type" => "end-switch",
        ),
        array(
            "name" => __('Add next image or video', TPL_SLUG),
            "desc" => '',
            "default" => '1',
            "type" => "adder",
        ),
    );
    return $meta;
}

?>