<?php
require_once '../src/Write_To_Image.php';
use mswarak\Write_To_Image;

$image = new Write_To_Image('img.jpg');

// add default font
$image->set_default_font(dirname(__FILE__) . "/arial.ttf");

// add text
$image->text_center("hi - 1st - 01", 25, 150);
$image->text_center("hi - 1st - 02", 25, 350);

// save image to file
$image->save('output1.jpg');

// remove all text
$image->text_clear();

// add text
$image->text_center("hi - 2nd - 01", 25, 150);
$image->text_center("hi - 2nd - 02", 25, 350);

// save image to file
$image->save('output2.jpg');
?>