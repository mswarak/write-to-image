<?php

class Write_To_Image
{
    /**
     * Image link
     *
     * @var mixed
     */
    protected $file = null;
    
    /**
     * Image object
     *
     * @var mixed
     */
    protected $image_obj = null;

    /**
     * Image MIME content media type
     *
     * @var mixed
     */
    protected $image_type = array();
    
    /**
     * text content as a list
     *
     * @var mixed
     */
    protected $text_list;
    
    /**
     * image output content
     *
     * @var mixed
     */
    protected $image_output = "";
    
    /**
     * Creates a new instance
     *
     * @param mixed $file
     * @param mixed $image_type
     */
    public function __construct($file = null, $image_type = "image/jpeg")
    {
        $this->file = $file;
        $this->image_type = $image_type;
    }
    
    function text_rtl()
    {
        //
    }
    
    function text_center()
    {
        //
    }
    
    /**
     * Creates a text with left align
     *
     * @param string $string the text value
     * @param int $text_size an integer of the text font size in points
     * @param int $xcord the x-ordinate sets the position of the fonts baseline
     * @param int $ycord the y-ordinate sets the position of the fonts baseline
     * @param int $color_rgb allocate a color for the text
     * @param string $font the path to the TrueType font .ttf
     * @param float $text_angle the text angle in degrees
     */
    function text_ltr($string, $text_size = 25, $xcord = 0, $ycord = 0, $color_rgb = array(0,0,0), $font = null, $text_angle = 0)
    {
        global $text_list;
        
        $color_r = 0;
        $color_g = 0;
        $color_b = 0;
        if(count($color_rgb) == 3)
        {
            $color_r = $color_rgb[0];
            $color_g = $color_rgb[1];
            $color_b = $color_rgb[2];
        }
        
        $text_list .= array("string" => $string, "fontsize" => $text_size, "xcord" => $xcord, "ycord" => $ycord, "color_r" => $color_r, "color_g" => $color_g, "color_b" => $color_b, "font" => $font, "fontangle" => $text_angle);
    }
    
    function drow_text_to_image()
    {
        global $image_obj, $text_list;
        
        // Create Image From Existing File
        $image_obj = imagecreatefromjpeg($this->file);
        
        // loop text
        foreach($text_list as $text_list_data)
        {
            if($text_list_data["font"] == "")
            {
                //$text_list_data["font"] = $font_path;
            }

            $color = imagecolorallocate($image_obj, $text_list_data["color_r"], $text_list_data["color_g"], $text_list_data["color_b"]);
            $text = text_list_data["string"];
            //$text = $Arabic->utf8Glyphs($text_list_data["string"]);
            $xcord = $text_list_data["xcord"];
            if($xcord == "center")
            {
                $xcord = ImageTTFCenter($image_obj, $text, $text_list_data["font"], $text_list_data["fontsize"], $text_list_data["fontangle"]);
            }
            /*
            if (strpos($xcord, 'right-') !== false)
            {
                $xcord_right = explode("right-", $xcord);
                $xcord = ImageTTFRight($image_obj, $text, $text_list_data["font"], $text_list_data["fontsize"], $text_list_data["fontangle"], $xcord_right[1]);
            }
            */
            //echo "<p>fontsize: {$text_list_data["fontsize"]}</p>";
            imagettftext($image_obj, $text_list_data["fontsize"], $text_list_data["fontangle"], $xcord, $text_list_data["ycord"], $color, $text_list_data["font"], $text);
        }
    }
    
    function save()
    {
        global $image_obj;
        //drow_text_to_image()
        
        // Send Image to Browser
        imagejpeg($jpg_image);
        if($image_output != "")
        {
            imagejpeg($jpg_image, $image_output, 100);
        }

        // Clear Memory
        imagedestroy($jpg_image);
    }
    
    protected function ImageTTFCenter($image, $text, $font, $size, $angle = 0)
    {
        $xi = imagesx($image);
        $box = imagettfbbox($size, $angle, $font, $text);
        $xr = abs(max($box[2], $box[4]));
        $x = intval(($xi - $xr) / 2);

        return $x;
    }

    protected function ImageTTFRight($image, $text, $font, $size, $angle = 0, $right = 0)
    {
        $xi = imagesx($image);
        $box = imagettfbbox($size, $angle, $font, $text);
        $xr = abs(max($box[2], $box[4]));
        $x = intval(($xi - $xr)- $right);

        return $x;
    }
}

?>