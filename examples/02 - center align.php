<?php
require_once '../src/Write_To_Image.php';
use msWarak\Write_To_Image;

$image = new Write_To_Image('img.jpg');

// add text
$image->text_center("hi 03", 25, 150, array(0,0,0), dirname(__FILE__) . "/arial.ttf");
$image->text_center("hi 04", 25, 350, array(0,0,0), dirname(__FILE__) . "/arial.ttf");

// save image to file
$image->save('output.jpg');
?>