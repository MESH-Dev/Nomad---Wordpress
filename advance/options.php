<?php
function apollo13_settings()
{
    $opt = array(
        array(
            "name" => __('Customize Logo', TPL_SLUG),
            "type" => "fieldset"
        ),
        array(
            "name" => __('Custom logo image(light)', TPL_SLUG),
            "desc" => __('Enter an URL or upload an image for logo. Paste the full URL (include <code>http://</code>). Left empty to use default theme value.', TPL_SLUG),
            "id" => "logo_image_light",
            "default" => "",
            "type" => "upload"
        ),
        array(
            "name" => __('Custom logo image(dark)', TPL_SLUG),
            "desc" => __('Enter an URL or upload an image for logo. Paste the full URL (include <code>http://</code>). Left empty to use default theme value.', TPL_SLUG),
            "id" => "logo_image_dark",
            "default" => "",
            "type" => "upload"
        ),
        array(
            "name" => __('Theme styles', TPL_SLUG),
            "type" => "fieldset"
        ),
        array(
            "name" => __('Choose default style file to use:', TPL_SLUG),
            "desc" => "",
            "id" => "theme_styles",
            "default" => 'style-light',
            "options" => array(
                "style-light" => 'light',
                "style-dark" => 'dark',
            ),
            "type" => "radio",
        ),
        array(
            "name" => __('Blog settings', TPL_SLUG),
            "type" => "fieldset"
        ),
        array(
            "name" => __('Select blog page', TPL_SLUG),
            "desc" => __("Choose the one you use for blog display", TPL_SLUG),
            "id" => "blog_page",
            "default" => '0',
            "type" => "wp_dropdown_pages",
        ),
        array(
            "name" => __('Contact form settings', TPL_SLUG),
            "type" => "fieldset"
        ),
        array(
            "name" => __('E-mail address where e-mails will be sent:', TPL_SLUG),
            "desc" => __("If empty, will use admin site e-mail", TPL_SLUG),
            "id" => "contact_email",
            "default" => '',
            "type" => "input",
        ),
        array(
            "name" => __('Google Analytics', TPL_SLUG),
            "type" => "fieldset"
        ),
        array(
            "name" => __('Enter code here from GA here:', TPL_SLUG),
            "desc" => "",
            "id" => "ga_code",
            "default" => '',
            "type" => "textarea",
        ),
    );
    return $opt;
}

function apollo13_design_options()
{
    $opt = array(
        array(
            "name" => __('HelloText', TPL_SLUG),
            "type" => "block"
        ),
        array(
            "name" => __('Text', TPL_SLUG),
            "desc" => __('Write text to show on front page', TPL_SLUG),
            "id" => "hp_hello_text",
            "default" => '',
            "type" => "textarea",
        ),
        array(
            "name" => __('Latest works', TPL_SLUG),
            "type" => "block"
        ),
        array(
            "name" => __('Latest works items displayed', TPL_SLUG),
            "desc" => __("Set number of items displayed on front page.", TPL_SLUG),
            "id" => "hp_latest_works_items_per_page",
            "default" => '20',
            "type" => "input",
        ),
        array(
            "name" => __('Latest from Blog', TPL_SLUG),
            "type" => "block"
        ),
        array(
            "name" => __('Switch on/off Latest from Blog section', TPL_SLUG),
            "desc" => '',
            "id" => "hp_blog_switch",
            "default" => 'on',
            "options" => array(
                "on" => __('Enable', TPL_SLUG),
                "off" => __('Disable', TPL_SLUG),
            ),
            "type" => "radio",
        ),
        array(
            "name" => __('About Text', TPL_SLUG),
            "type" => "block"
        ),
        array(
            "name" => __('Switch on/off About text', TPL_SLUG),
            "desc" => '',
            "id" => "hp_about_switch",
            "default" => 'on',
            "options" => array(
                "on" => __('Enable', TPL_SLUG),
                "off" => __('Disable', TPL_SLUG),
            ),
            "type" => "radio",
        ),
        array(
            "name" => __('Select about page', TPL_SLUG),
            "desc" => __("Choose the one you use for about text display", TPL_SLUG),
            "id" => "about_page",
            "default" => '0',
            "type" => "wp_dropdown_pages",
        ),

    );
    return $opt;
}

function apollo13_fonts_options()
{
    $fonts = array();
    //array of cufon fonts
    if (is_dir(TPL_FONTS_DIR)) {
        foreach (glob(TPL_FONTS_DIR . '/' . '*.js') as $file) {
            preg_match('/([a-zA-Z-]+[0-9]*[a-zA-Z_-]*)_([0-9]+)-*/', basename($file), $matches);
            $fonts[$matches[1]] = basename($file);
        }
    }
    $opt = array(
        array(
            "name" => __('Content fonts settings', TPL_SLUG),
            "type" => "fieldset"
        ),
        array(
            "name" => __('Choose:', TPL_SLUG),
            "desc" => "",
            "id" => "gfont_switch",
            "default" => 'enable',
            "options" => array(
                "enable" => __('Google font on', TPL_SLUG),
                "disable" => __('Google font off', TPL_SLUG),
                "custom" => __('Custom font', TPL_SLUG),
            ),
            "type" => "radio",
        ),
        array(
            "name" => __('Choose Google font:', TPL_SLUG),
            "desc" => "Works when Google fonts are on",
            "id" => "google_font",
            "default" => 'Merriweather',
            "options" => array(
                "Merriweather" => __('Merriweather', TPL_SLUG),
                "Open Sans" => __('Open Sans', TPL_SLUG),
                "PT Sans" => __('PT Sans', TPL_SLUG),
                "PT Sans Narrow" => __('PT Sans Narrow', TPL_SLUG),
                "Droid Serif" => __('Droid Serif', TPL_SLUG),
                "Droid Sans" => __('Droid Sans', TPL_SLUG),
                "Nobile" => __('Nobile', TPL_SLUG),
                "Ubuntu" => __('Ubuntu', TPL_SLUG),
                "Vollkorn" => __('Vollkorn', TPL_SLUG)
            ),
            "type" => "radio",
        ),
        array(
            "name" => __('Choose standard font:', TPL_SLUG),
            "desc" => "Works when Google fonts are off",
            "id" => "standard_font",
            "default" => 'Tahoma',
            "options" => array(
                "Tahoma" => __('Tahoma', TPL_SLUG),
                "Arial" => __('Arial', TPL_SLUG),
                "Georgia" => __('Georgia', TPL_SLUG),
                "Times New Roman" => __('Times New Roman', TPL_SLUG)
            ),
            "type" => "radio",
        ),
        array(
            "name" => __('Link to CSS custom font', TPL_SLUG),
            "desc" => __("Ex. http://website.com/linktofont.css", TPL_SLUG),
            "id" => "custom_font",
            "default" => '',
            "type" => "input",
        ),
        array(
            "name" => __('CSS Font family', TPL_SLUG),
            "desc" => __("Ex.: BodoniClassico W00", TPL_SLUG),
            "id" => "font_family",
            "default" => '',
            "type" => "input",
        ),
        array(
            "name" => __('Others fonts settings', TPL_SLUG),
            "type" => "fieldset"
        ),
        array(
            "name" => __('Choose:', TPL_SLUG),
            "desc" => "",
            "id" => "gfont_switch_other",
            "default" => 'enable',
            "options" => array(
                "enable" => __('Google font on', TPL_SLUG),
                "disable" => __('Google font off', TPL_SLUG),
                "custom" => __('Custom font', TPL_SLUG),
            ),
            "type" => "radio",
        ),
        array(
            "name" => __('Choose Google font:', TPL_SLUG),
            "desc" => "Works when Google fonts are on",
            "id" => "google_font_other",
            "default" => 'Oswald',
            "options" => array(
                "Oswald Light" => __('Oswald Light', TPL_SLUG),
                "Oswald Normal" => __('Oswald Normal', TPL_SLUG),
                "Merriweather" => __('Merriweather', TPL_SLUG),
                "Open Sans" => __('Open Sans', TPL_SLUG),
                "PT Sans" => __('PT Sans', TPL_SLUG),
                "PT Sans Narrow" => __('PT Sans Narrow', TPL_SLUG),
                "Droid Serif" => __('Droid Serif', TPL_SLUG),
                "Droid Sans" => __('Droid Sans', TPL_SLUG),
                "Nobile" => __('Nobile', TPL_SLUG),
                "Ubuntu" => __('Ubuntu', TPL_SLUG),
                "Vollkorn" => __('Vollkorn', TPL_SLUG)
            ),
            "type" => "radio",
        ),
        array(
            "name" => __('Choose standard font:', TPL_SLUG),
            "desc" => "Works when Google fonts are off",
            "id" => "standard_font_other",
            "default" => 'Tahoma',
            "options" => array(
                "Tahoma" => __('Tahoma', TPL_SLUG),
                "Arial" => __('Arial', TPL_SLUG),
                "Georgia" => __('Georgia', TPL_SLUG),
                "Times New Roman" => __('Times New Roman', TPL_SLUG)
            ),
            "type" => "radio",
        ),
        array(
            "name" => __('Link to CSS custom font', TPL_SLUG),
            "desc" => __("Ex. http://website.com/linktofont.css", TPL_SLUG),
            "id" => "other_custom_font",
            "default" => '',
            "type" => "input",
        ),
        array(
            "name" => __('CSS Font family', TPL_SLUG),
            "desc" => __("Ex.: BodoniClassico W00", TPL_SLUG),
            "id" => "other_font_family",
            "default" => '',
            "type" => "input",
        ),
        array(
            "name" => __('Uppercase', TPL_SLUG),
            "desc" => "Works when Google fonts are off",
            "id" => "uppercase",
            "default" => 'on',
            "options" => array(
                "on" => __('On', TPL_SLUG),
                "Off" => __('Off', TPL_SLUG),
            ),
            "type" => "radio",
        )

    );
    return $opt;
}

function apollo13_color_options()
{
    $opt = array(
        array(
            "name" => __('Customize &lt;body&gt; area', TPL_SLUG),
            "type" => "fieldset"
        ),
        array(
            "name" => __('Custom background color', TPL_SLUG),
            "desc" => __('Use valid CSS <code>color</code> property values( <code>green, #33FF99, rgb(255,128,0)</code> ), or get your color with color picker tool. Left empty to use default theme value.', TPL_SLUG),
            "id" => "bg_color",
            "default" => "",
            "type" => "color"
        ),
        array(
            "name" => __('Custom background image', TPL_SLUG),
            "desc" => __('Enter an URL or upload an image for background. Paste the full URL (include <code>http://</code>). Left empty to use default theme value.', TPL_SLUG),
            "id" => "bg_image",
            "default" => "",
            "type" => "upload"
        ),
        array(
            "name" => __('Custom menu line color', TPL_SLUG),
            "desc" => __('Use valid CSS <code>color</code> property values( <code>green, #33FF99, rgb(255,128,0)</code> ), or get your color with color picker tool. Left empty to use default theme value.', TPL_SLUG),
            "id" => "menu_line_color",
            "default" => "#B49049",
            "type" => "color"
        ),
        array(
            "name" => __('Custom link color', TPL_SLUG),
            "desc" => __('Use valid CSS <code>color</code> property values( <code>green, #33FF99, rgb(255,128,0)</code> ), or get your color with color picker tool. Left empty to use default theme value.', TPL_SLUG),
            "id" => "link_color",
            "default" => "#B49049",
            "type" => "color"
        ),
        array(
            "name" => __('Button color', TPL_SLUG),
            "desc" => __('Use valid CSS <code>color</code> property values( <code>green, #33FF99, rgb(255,128,0)</code> ), or get your color with color picker tool. Left empty to use default theme value.', TPL_SLUG),
            "id" => "bt_color",
            "default" => "#B49049",
            "type" => "color"
        ),
    );
    return $opt;
}

function apollo13_footer_options()
{
    $opt = array(
        array(
            "name" => __('Footer texts settings', TPL_SLUG),
            "type" => "fieldset"
        ),
        array(
            "name" => __('Footer copyright text:', TPL_SLUG),
            "desc" => "",
            "id" => "footer_copyright",
            "default" => 'Copyright © 2012 Skyline. All rights reserved',
            "type" => "textarea",
        ),
    );
    return $opt;
}

function apollo13_portfolio_options()
{
    $opt = array(
        array(
            "name" => __('Portfolio settings', TPL_SLUG),
            "type" => "fieldset"
        ),
        array(
            "name" => __('Select portfolio page', TPL_SLUG),
            "desc" => __("Choose the one you use for portfolio display", TPL_SLUG),
            "id" => "portfolio_page",
            "default" => '0',
            "type" => "wp_dropdown_pages",
        ),
        array(
            "name" => __('Icons size', TPL_SLUG),
            "desc" => __("You can pick thumbs size", TPL_SLUG),
            "id" => "portfolio_icon_size",
            "default" => 'auto',
            "options" => array(
                "small" => __('Small', TPL_SLUG),
                "medium" => __('Medium', TPL_SLUG),
                "large" => __('Large', TPL_SLUG),
            ),
            "type" => "radio",
        ),
        array(
            "name" => __('Description position', TPL_SLUG),
            "desc" => __("Description on hover or below icon", TPL_SLUG),
            "id" => "portfolio_desc_position",
            "default" => 'off',
            "options" => array(
                "hover" => __('Hover', TPL_SLUG),
                "below" => __('Below icon', TPL_SLUG),
            ),
            "type" => "radio",
        ),
        array(
            "name" => __('Hover text', TPL_SLUG),
            "desc" => __("", TPL_SLUG),
            "id" => "hover_text",
            "default" => 'View project',
            "type" => "input",
        ),
        array(
            "name" => __('Sorting type', TPL_SLUG),
            "desc" => __("Reload page or use ajax", TPL_SLUG),
            "id" => "portfolio_sort_type",
            "default" => 'dynamic',
            "options" => array(
                "dynamic" => __('Dynamic', TPL_SLUG),
                "static" => __('Static', TPL_SLUG),
            ),
            "type" => "radio",
        )
    );
    return $opt;
}

function apollo13_social_options()
{
    $socials = array(
        'aim' => 'Aim',
        'behance' => 'Behance',
        'blogger' => 'Blogger',
        'delicious' => 'Delicious',
        'deviantart' => 'Deviantart',
        'digg' => 'Digg',
        'dribbble' => 'Dribbble',
        'evernote' => 'Evernote',
        'facebook' => 'Facebook',
        'flickr' => 'Flickr',
        'foursquare' => 'Foursquare',
        'github' => 'Github',
        'googleplus' => 'Google Plus',
        'lastfm' => 'Lastfm',
        'linkedin' => 'Linkedin',
        'paypal' => 'Paypal',
        'pinterest' => 'Pinterest',
        'quora' => 'Quora',
        'rss' => 'RSS',
        'sharethis' => 'Sharethis',
        'skype' => 'Skype',
        'stumbleupon' => 'Stumbleupon',
        'tumblr' => 'Tumblr',
        'twitter' => 'Twitter',
        'vimeo' => 'Vimeo',
        'wordpress' => 'Wordpress',
        'yahoo' => 'Yahoo',
        'youtube' => 'Youtube',
    );
    $opt = array(
        array(
            "name" => __('Social services', TPL_SLUG),
            "type" => "fieldset"
        ),
        array(
            "name" => __('Social services', TPL_SLUG),
            "desc" => __('Use <code>http://</code> in your social links', TPL_SLUG),
            "id" => "social_services",
            "default" => '',
            "type" => "social",
            "options" => $socials
        ),
    );
    return $opt;
}

function apollo13_advance_options()
{
    $opt = array(
        array(
            "name" => __('Timthumb settings', TPL_SLUG),
            "type" => "fieldset"
        ),
        array(
            "name" => __('Use relative paths', TPL_SLUG),
            "desc" => __('Don\'t change it if images in your blog loads normaly. Only if none image in blog is loading try to change this.', TPL_SLUG),
            "id" => "timthumb_relative_paths",
            "default" => 'no',
            "options" => array(
                "yes" => __('Yes', TPL_SLUG),
                "no" => __('No', TPL_SLUG),
            ),
            "type" => "radio",
        ),
    );
    return $opt;
}

function apollo13_slider_options()
{
    $opt = array(
        array(
            "name" => __('Slider photos', TPL_SLUG),
            "type" => "fieldset"
        ),
        array(
            "name" => __('Slider photo 1 Caption', TPL_SLUG),
            "id" => "slider_photo_desc_1",
            "default" => '',
            "type" => "input",
        ),
        array(
            "name" => __('Slider photo 1 link', TPL_SLUG),
            "id" => "slider_photo_link_1",
            "default" => '',
            "type" => "input",
        ),
        array(
            "name" => __('Slider photo 1', TPL_SLUG),
            "desc" => __('Widht: 940px Hight: 300px', TPL_SLUG),
            "id" => "slider_photo_1",
            "default" => "",
            "type" => "upload"
        ),
        array(
            "name" => __('Slider photo 2 Caption', TPL_SLUG),
            "id" => "slider_photo_desc_2",
            "default" => '',
            "type" => "input",
        ),
        array(
            "name" => __('Slider photo 2 link', TPL_SLUG),
            "id" => "slider_photo_link_2",
            "default" => '',
            "type" => "input",
        ),
        array(
            "name" => __('Slider photo 2', TPL_SLUG),
            "desc" => __('Widht: 940px Hight: 300px', TPL_SLUG),
            "id" => "slider_photo_2",
            "default" => "",
            "type" => "upload"
        ),
        array(
            "name" => __('Slider photo 3 Caption', TPL_SLUG),
            "id" => "slider_photo_desc_3",
            "default" => '',
            "type" => "input",
        ),
        array(
            "name" => __('Slider photo 3 link', TPL_SLUG),
            "id" => "slider_photo_link_3",
            "default" => '',
            "type" => "input",
        ),
        array(
            "name" => __('Slider photo 3', TPL_SLUG),
            "desc" => __('Widht: 940px Hight: 300px', TPL_SLUG),
            "id" => "slider_photo_3",
            "default" => "",
            "type" => "upload"
        ),
        array(
            "name" => __('Slider photo 4 Caption', TPL_SLUG),
            "id" => "slider_photo_desc_4",
            "default" => '',
            "type" => "input",
        ),
        array(
            "name" => __('Slider photo 4 link', TPL_SLUG),
            "id" => "slider_photo_link_4",
            "default" => '',
            "type" => "input",
        ),
        array(
            "name" => __('Slider photo 4', TPL_SLUG),
            "desc" => __('Widht: 940px Hight: 300px', TPL_SLUG),
            "id" => "slider_photo_4",
            "default" => "",
            "type" => "upload"
        ),
        array(
            "name" => __('Slider photo 5 Caption', TPL_SLUG),
            "id" => "slider_photo_desc_5",
            "default" => '',
            "type" => "input",
        ),
        array(
            "name" => __('Slider photo 5 link', TPL_SLUG),
            "id" => "slider_photo_link_5",
            "default" => '',
            "type" => "input",
        ),
        array(
            "name" => __('Slider photo 5', TPL_SLUG),
            "desc" => __('Widht: 940px Hight: 300px', TPL_SLUG),
            "id" => "slider_photo_5",
            "default" => "",
            "type" => "upload"
        ),
        array(
            "name" => __('Slider photo 6 Caption', TPL_SLUG),
            "id" => "slider_photo_desc_6",
            "default" => '',
            "type" => "input",
        ),
        array(
            "name" => __('Slider photo 6 link', TPL_SLUG),
            "id" => "slider_photo_link_6",
            "default" => '',
            "type" => "input",
        ),
        array(
            "name" => __('Slider photo 6', TPL_SLUG),
            "desc" => __('Widht: 940px Hight: 300px', TPL_SLUG),
            "id" => "slider_photo_6",
            "default" => "",
            "type" => "upload"
        ),
        array(
            "name" => __('Slider settings', TPL_SLUG),
            "type" => "fieldset"
        ),
        array(
            "name" => __('Animation', TPL_SLUG),
            "desc" => __('Select your animation type', TPL_SLUG),
            "id" => "animation_type",
            "default" => 'slide',
            "options" => array(
                "fade" => __('Fade', TPL_SLUG),
                "slide" => __('Slide', TPL_SLUG),
            ),
            "type" => "radio",
        ),
        array(
            "name" => __('Slide direction', TPL_SLUG),
            "desc" => __('Select the sliding direction', TPL_SLUG),
            "id" => "slide_direction",
            "default" => 'horizontal',
            "options" => array(
                "horizontal" => __('Horizontal', TPL_SLUG),
                "vertical" => __('Vertical', TPL_SLUG),
            ),
            "type" => "radio",
        ),
        array(
            "name" => __('Slideshow', TPL_SLUG),
            "desc" => __('Animate slider automatically', TPL_SLUG),
            "id" => "slideshow",
            "default" => 'true',
            "options" => array(
                "true" => __('Yes', TPL_SLUG),
                "false" => __('No', TPL_SLUG),
            ),
            "type" => "radio",
        ),
        array(
            "name" => __('Cotrol Navigation', TPL_SLUG),
            "desc" => __('Create navigation for paging control of each slide', TPL_SLUG),
            "id" => "cotrol_nav",
            "default" => 'true',
            "options" => array(
                "true" => __('Yes', TPL_SLUG),
                "false" => __('No', TPL_SLUG),
            ),
            "type" => "radio",
        ),
        array(
            "name" => __('Slide show speed', TPL_SLUG),
            "id" => "slide_show_speed",
            "default" => '7000',
            "type" => "input",
        ),
        array(
            "name" => __('Animation duration', TPL_SLUG),
            "id" => "animation_duration",
            "default" => '600',
            "type" => "input",
        ),
    );
    return $opt;
}

?>