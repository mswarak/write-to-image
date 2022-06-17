<?php
require_once '../src/Write_To_Image.php';
use mswarak\Write_To_Image;

$image = new Write_To_Image('img.jpg');

// add default font
$image->set_default_font(dirname(__FILE__) . "/arial.ttf");

// add text
$text = "السلام عليكم";
$image->text_rtl($text, 25, 150, 200);
$image->text_rtl($text, 25, 350, 200, array(0,0,0), null, 0, false);

// preview image on browser
$image->preview();
?>