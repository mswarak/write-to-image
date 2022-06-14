<?php
require_once '../src/Write_To_Image.php';
use mswarak\Write_To_Image;

$image = new Write_To_Image('img.jpg');

// add default font
$image->set_default_font(dirname(__FILE__) . "/arial.ttf");

// add text
$text = "السلام عليكم";
$image->text_center($text, 25, 150, array(0,0,0), null, 0, false);
$image->text_center($text, 25, 350, array(0,0,0), null, 0, true);

// preview image on browser
$image->preview();

?>