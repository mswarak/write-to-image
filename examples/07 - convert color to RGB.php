<?php
require_once '../src/Write_To_Image.php';
use mswarak\Write_To_Image;

$image = new Write_To_Image('img.jpg');

// colors
$circle_color_shape = $image->convert_to_RGB("#FFFF00");

// draw circle
$image->draw_rectangle(100,100,400,400, $image->convert_to_RGB("#FFFF00"), $image->convert_to_RGB("#ff7373"));
$image->draw_rectangle(300,300,100,100, $image->convert_to_RGB("#ff80ed"), $image->convert_to_RGB("#800080"));

// add default font
$image->set_default_font(dirname(__FILE__) . "/arial.ttf");

// add text
$image->text_ltr("rectangle 1", 15, 150, 320);
$image->text_ltr("rectangle 2", 15, 150, 420);

// preview image on browser
$image->preview();
?>