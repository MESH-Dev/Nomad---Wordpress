<?php
/* Generates user css based on settings in admin panel */
?>
<?php
/* body part */
$alias = $this->theme_options['color_options']['body_bg_color'];
$body_bg_color = '';
if (!empty($alias) && $alias != 'default') {
    $body_bg_color = 'background-color: ' . $alias . ";";
}
$alias = $this->theme_options['color_options']['body_image'];
$body_image = '';
if (!empty($alias)) {
    $body_image = 'background-image: url(' . $alias . ');';
}
$alias = $this->theme_options['color_options']['body_position_x'];
$alias2 = $this->theme_options['color_options']['body_position_y'];
$body_position = '';
if (!empty($alias) && !empty($alias2) && $alias != 'default' && $alias2 != 'default') {
    $body_position = 'background-position: ' . $alias . ' ' . $alias2 . ';';
}
$alias = $this->theme_options['color_options']['body_repeat'];
$body_repeat = '';
if (!empty($alias) && $alias != 'default') {
    $body_repeat = 'background-repeat: ' . $alias . ";";
}
$alias = $this->theme_options['settings']['logo_image_light'];
$logo_light = '';
if (!empty($alias)) {
    $logo_light = 'background-image: url(' . $alias . ')';
} else {
    $logo_light = 'background-image: url(' . TPL_GFX . '/logo.png)';
}
$alias = $this->theme_options['settings']['logo_image_dark'];
$logo_dark = '';
if (!empty($alias)) {
    $logo_dark = 'background-image: url(' . $alias . ')';
} else {
    $logo_dark = 'background-image: url(' . TPL_GFX . '/logo.png)';
}
$user_css = <<<CSS
html,body{
	{$body_bg_color}
}
body{
	{$body_image}
	{$body_position}
	{$body_repeat}
}
.theme-color-light #logo a{
	{$logo_light}
}
.theme-color-dark #logo a{
	{$logo_dark}
}
CSS;
return $user_css;
?>