<?php
require_once '../src/Write_To_Image.php';
use mswarak\Write_To_Image;

$image = new Write_To_Image('img.jpg');

// add default font
$image->set_default_font(dirname(__FILE__) . "/arial.ttf");

// add text
$image->text_center("hi 03", 25, 150);
$image->text_center("hi 04", 25, 350);

// save image to file
$image->save('output.jpg');
?>