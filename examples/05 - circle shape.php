<?php
require_once '../src/Write_To_Image.php';
use mswarak\Write_To_Image;

$image = new Write_To_Image('img.jpg');

// draw circle
$image->draw_circle(300,300,100,100);
$image->draw_circle(300,300,200,200);
$image->draw_circle(300,300,300,300);

// add default font
$image->set_default_font(dirname(__FILE__) . "/arial.ttf");

// add text
$image->text_ltr("circle", 15, 280, 310);

// preview image on browser
$image->preview();
?>