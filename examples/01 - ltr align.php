<?php
// call Write_To_Image
require_once '../src/Write_To_Image.php';
use mswarak\Write_To_Image;

$image = new Write_To_Image('img.jpg');

// add default font
$image->set_default_font(dirname(__FILE__) . "/arial.ttf");

// add text
$image->text_ltr("hi 01", 25, 50, 50);
$image->text_ltr("hi 02", 25, 250, 250);

// preview image on browser
$image->preview();
?>