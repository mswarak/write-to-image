<?php

/**
* Write_To_Image is a sample class for write text to images
*
* Add a text into jpg images with customized align (ltr, center and rtl)
*
* Example usage:
* // load Write_To_Image
* use mswarak\Write_To_Image;
* $image = new Write_To_Image('img.jpg');
* 
* // add default font
* $image->set_default_font(dirname(__FILE__) . "/arial.ttf");
* 
* // add text
* $image->text_ltr("hi 01", 25, 50, 50);
* $image->text_ltr("hi 02", 25, 250, 250);
* 
* // preview image on browser
* $image->preview();
*
* @package  Example
* @author   Mansur Saleh Warak mansour.worak@gmail.com
* @version  Release: 1.2.3
* @access   public
*/

namespace mswarak;
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
     * Default font path
     *
     * @var mixed
     */
    protected $default_font = "";
    
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
     * @throws Exception if the image format not supported
     */
    public function __construct($file = null, $image_type = "image/jpeg")
    {
        global $image_obj;
        $this->file = $file;
        $this->image_type = $image_type;
        
        if($image_type == "image/jpeg")
        {
            if (strpos($file, '.jpg') === false)
            {
                throw new Exception("Only jpg images are supported");
            }
        }
        
        // Create Image From Existing File
        $image_obj = imagecreatefromjpeg($this->file);
    }
    
    /**
    * Creates a text with right align
    *
    * @param string $string the text value
    * @param int $text_size an integer of the text font size in points
    * @param int $xcord the x-ordinate sets the position of the fonts baseline
    * @param int $ycord the y-ordinate sets the position of the fonts baseline
    * @param int $color_rgb allocate a color for the text
    * @param string $font the path to the TrueType font .ttf
    * @param float $text_angle the text angle in degrees
    */
    function text_rtl($string, $text_size = 25, $xcord = 0, $ycord = 0, $color_rgb = array(0,0,0), $font = null, $text_angle = 0, $arabic_uni = true)
    {
        global $text_list, $default_font;
        
        $color_r = 0;
        $color_g = 0;
        $color_b = 0;
        if(count($color_rgb) == 3)
        {
            $color_r = $color_rgb[0];
            $color_g = $color_rgb[1];
            $color_b = $color_rgb[2];
        }
        
        if($arabic_uni == true)
        {
            $string = $this->text2uni($string);
        }
        
        if($font == null)
        {
            $font = $default_font;
        }
        
        $text_list[] = array("string" => $string, "fontsize" => $text_size, "xcord" => "right-{$xcord}", "ycord" => $ycord, "color_r" => $color_r, "color_g" => $color_g, "color_b" => $color_b, "font" => $font, "fontangle" => $text_angle);
    }
    
    /**
    * Creates a text with center align
    *
    * @param string $string the text value
    * @param int $text_size an integer of the text font size in points
    * @param int $ycord the y-ordinate sets the position of the fonts baseline
    * @param int $color_rgb allocate a color for the text
    * @param string $font the path to the TrueType font .ttf
    * @param float $text_angle the text angle in degrees
    */
    function text_center($string, $text_size = 25, $ycord = 0, $color_rgb = array(0,0,0), $font = null, $text_angle = 0, $arabic_uni = false)
    {
        global $text_list, $default_font;
        
        $color_r = 0;
        $color_g = 0;
        $color_b = 0;
        if(count($color_rgb) == 3)
        {
            $color_r = $color_rgb[0];
            $color_g = $color_rgb[1];
            $color_b = $color_rgb[2];
        }
        
        if($arabic_uni == true)
        {
            $string = $this->text2uni($string);
        }
        
        if($font == null)
        {
            $font = $default_font;
        }
        
        $text_list[] = array("string" => $string, "fontsize" => $text_size, "xcord" => "center", "ycord" => $ycord, "color_r" => $color_r, "color_g" => $color_g, "color_b" => $color_b, "font" => $font, "fontangle" => $text_angle);
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
    function text_ltr($string, $text_size = 25, $xcord = 0, $ycord = 0, $color_rgb = array(0,0,0), $font = null, $text_angle = 0, $arabic_uni = false)
    {
        global $text_list, $default_font;
        
        $color_r = 0;
        $color_g = 0;
        $color_b = 0;
        if(count($color_rgb) == 3)
        {
            $color_r = $color_rgb[0];
            $color_g = $color_rgb[1];
            $color_b = $color_rgb[2];
        }
        
        if($arabic_uni == true)
        {
            $string = $this->text2uni($string);
        }
        
        if($font == null)
        {
            $font = $default_font;
        }
        
        $text_list[] = array("string" => $string, "fontsize" => $text_size, "xcord" => $xcord, "ycord" => $ycord, "color_r" => $color_r, "color_g" => $color_g, "color_b" => $color_b, "font" => $font, "fontangle" => $text_angle);
    }
    
    /**
    * Remove all text content
    */
    function text_clear()
    {
        global $image_obj, $text_list;
        
        // Remove all text content
        $text_list = array();
        
        // Create Image From Existing File
        $image_obj = imagecreatefromjpeg($this->file);
    }
    
    /**
    * Set a default font file
    * 
    * @param string $default_font_path the path to the TrueType font .ttf
    */
    function set_default_font($default_font_path)
    {
        global $default_font;
        $default_font = $default_font_path;
    }
    
    /**
    * Draw all text data into the image file
    */
    function draw_text_to_image()
    {
        global $image_obj, $text_list;
        
        // have content
        if(isset($text_list[0]))
        {
            // loop text
            foreach($text_list as $text_list_data)
            {
                $color = imagecolorallocate($image_obj, $text_list_data["color_r"], $text_list_data["color_g"], $text_list_data["color_b"]);
                $text = $text_list_data["string"];
                $xcord = $text_list_data["xcord"];
                if($xcord == "center")
                {
                    $xcord = $this->ImageTTFCenter($image_obj, $text, $text_list_data["font"], $text_list_data["fontsize"], $text_list_data["fontangle"]);
                }
                
                imagettftext($image_obj, $text_list_data["fontsize"], $text_list_data["fontangle"], $xcord, $text_list_data["ycord"], $color, $text_list_data["font"], $text);
            }
        }
    }
    
    /**
    * Draw circle shape into the image file
    *
    * @param int $xcord the x-ordinate sets the position of the fonts baseline
    * @param int $ycord the y-ordinate sets the position of the fonts baseline
     * 
    * @param string $string the text value
    * @param int $text_size an integer of the text font size in points
    * @param int $color_rgb allocate a color for the text
    * @param string $font the path to the TrueType font .ttf
    * @param float $text_angle the text angle in degrees
    */
    function draw_circle($xcord = 0, $ycord = 0, $width = 0, $height = 0, $background_color_rgb = array(255,255,255), $shape_color_rgb = array(0,0,0))
    {
        global $image_obj;
        
        // color background
        $color_background_r = 0;
        $color_background_g = 0;
        $color_background_b = 0;
        if(count($background_color_rgb) == 3)
        {
            $color_background_r = $background_color_rgb[0];
            $color_background_g = $background_color_rgb[1];
            $color_background_b = $background_color_rgb[2];
        }
        
        // shape color
        $color_shape_r = 0;
        $color_shape_g = 0;
        $color_shape_b = 0;
        if(count($shape_color_rgb) == 3)
        {
            $color_shape_r = $shape_color_rgb[0];
            $color_shape_g = $shape_color_rgb[1];
            $color_shape_b = $shape_color_rgb[2];
        }
        
        // Select the background color.
        $bg = imagecolorallocate($image_obj, $color_background_r, $color_background_g, $color_background_b);

        // Fill the background with the color selected above.
        imagefill($image_obj, 0, 0, $bg);

        // Choose a color for the ellipse.
        $col_ellipse = imagecolorallocate($image_obj, $color_shape_r, $color_shape_g, $color_shape_b);

        // Draw the ellipse.
        imageellipse($image_obj, $xcord, $ycord, $width, $height, $col_ellipse);
    }
    
    /**
    * Draw rectangle shape into the image file
    */
    function draw_rectangle($xcord = 0, $ycord = 0, $width = 0, $height = 0, $background_color_rgb = array(255,255,255), $shape_color_rgb = array(0,0,0))
    {
        global $image_obj;
        
        // color background
        $color_background_r = 0;
        $color_background_g = 0;
        $color_background_b = 0;
        if(count($background_color_rgb) == 3)
        {
            $color_background_r = $background_color_rgb[0];
            $color_background_g = $background_color_rgb[1];
            $color_background_b = $background_color_rgb[2];
        }
        
        // shape color
        $color_shape_r = 0;
        $color_shape_g = 0;
        $color_shape_b = 0;
        if(count($shape_color_rgb) == 3)
        {
            $color_shape_r = $shape_color_rgb[0];
            $color_shape_g = $shape_color_rgb[1];
            $color_shape_b = $shape_color_rgb[2];
        }
        
        // Select the background color.
        $bg = imagecolorallocate($image_obj, $color_background_r, $color_background_g, $color_background_b);

        // Fill the background with the color selected above.
        imagefill($image_obj, 0, 0, $bg);

        // Choose a color for the ellipse.
        $col_ellipse = imagecolorallocate($image_obj, $color_shape_r, $color_shape_g, $color_shape_b);

        // Draw the ellipse.
        imageellipse($image_obj, $xcord, $ycord, $width, $height, $col_ellipse);
    }
    
    /**
    * Preview the image to the browser
    * @return object
    */
    function preview()
    {
        global $image_obj;
		
        //Set the Content Type
        header('Content-type: image/jpeg');
                
        $this->draw_text_to_image();
        
        // Send Image to Browser
        imagejpeg($image_obj);

        // Clear Memory
        imagedestroy($image_obj);
    }
    
    /**
    * Save the image to a file
    * @return object
    */
    function save($image_output)
    {
        global $image_obj;
        
        $this->image_output = $image_output;
                
        $this->draw_text_to_image();
        
        // Save Image to file
        imagejpeg($image_obj, $this->image_output, 100);

        // Clear Memory
        imagedestroy($image_obj);
    }
    
    /**
    * Calculate image center point
    * @return int
    */
    protected function ImageTTFCenter($image, $text, $font, $size, $angle = 0)
    {
        $xi = imagesx($image);
        $box = imagettfbbox($size, $angle, $font, $text);
        $xr = abs(max($box[2], $box[4]));
        $x = intval(($xi - $xr) / 2);

        return $x;
    }

    /**
    * Calculate image right point
    * @return int
    */
    protected function ImageTTFRight($image, $text, $font, $size, $angle = 0, $right = 0)
    {
        $xi = imagesx($image);
        $box = imagettfbbox($size, $angle, $font, $text);
        $xr = abs(max($box[2], $box[4]));
        $x = intval(($xi - $xr)- $right);

        return $x;
    }
    
    /**
    * Convert Arabic string info a unicode encoding
    * @return string
    */
    protected function text2uni($text)
    {
        if (preg_match("/(^(?=.*[a-zA-Z])(?=.*[a-zA-Z]?)[ a-zA-Z]+$)/", $text))
        {
            $out = $text;
        }
        else
        {
            $arr = explode(' ', $text);
            $last = array();
            foreach ($arr as &$word)
            {
                if (preg_match("/(^(?=.*[\x{0600}-\x{06ff}])(?=.*[\x{0600}-\x{06ff}]?)[\x{0600}-\x{06ff}]+$)/u", $word))
                {
                    $last[] = $this->word2uni($word);
                }
                else
                {
                    $last[] = $word;
                }

            }
            $out = implode(' ', array_reverse($last));
        }
        return $out;
    }

    /**
    * Convert Arabic word info a unicode encoding
    * @return string
    */
    protected function word2uni($word)
    {
        if (strlen($word) <= 2)
        {
            return $word;
        }
        
        $new_word = array();
        $char_type = array();
        $isolated_chars = array('ا', 'د', 'ذ', 'أ', 'آ', 'ر', 'ؤ', 'ء', 'ز', 'و', 'ى', 'ة');

        $all_chars = array
        (
            'ا' => array(
    'middle'		=>   '&#xFE8E;',
    'end'		=>   '&#xFE8E;',
                    'isolated'		=>   'ا'
                    ),
            'ؤ' => array(

                    'middle'		=>   '&#xFE85;',
    'end'		=>   '&#xFE85;',
                    'isolated'		=>   'ؤ'
                    ),
            'ء' => array(
                    'middle'		=>   '&#xFE80;',
                    'end'		=>   '&#xFE80;',
                    'isolated'		=>   'ء'
                    ),
            'أ' => array(

                    'middle'		=>   '&#xFE84;',
    'end'		=>   '&#xFE84;',
                    'isolated'		=>   'أ'
                    ),
            'آ' => array(
                    'middle'		=>   '&#xFE82;',
                    'end'		=>   '&#xFE82;',
                    'isolated'		=>   'آ'
                    ),
            'ى' => array(
    'middle'		=>   '&#xFEF0;',
    'end'		=>   '&#xFEF0;',
                    'isolated'		=>   'ى'
                    ),
            'ب' => array(
                    'beginning'		=>   '&#xFE91;',
                    'middle'		=>   '&#xFE92;',
                    'end'			=>   '&#xFE90;',
                    'isolated'		=>   'ب'
                    ),
            'ت' => array(
                    'beginning'		=>   '&#xFE97;',
                    'middle'		=>   '&#xFE98;',
                    'end'			=>   '&#xFE96;',
                    'isolated'		=>   'ت'
                    ),
            'ث' => array(
                    'beginning'		=>   '&#xFE9B;',
                    'middle'		=>   '&#xFE9C;',
                    'end'			=>   '&#xFE9A;',
                    'isolated'		=>   'ث'
                    ),
            'ج' => array(
                    'beginning'		=>   '&#xFE9F;',
                    'middle'		=>   '&#xFEA0;',
                    'end'			=>   '&#xFE9E;',
                    'isolated'		=>   'ج'
                    ),
            'ح' => array(
                    'beginning'		=>   '&#xFEA3;',
                    'middle'		=>   '&#xFEA4;',
                    'end'			=>   '&#xFEA2;',
                    'isolated'		=>   'ح'
                    ),
            'خ' => array(
                    'beginning'		=>   '&#xFEA7;',
                    'middle'		=>   '&#xFEA8;',
                    'end'			=>   '&#xFEA6;',
                    'isolated'		=>   'خ'
                    ),
            'د' => array(
                    'middle'		=>   '&#xFEAA;',
                    'end'		    =>   '&#xFEAA;',
                    'isolated'		=>   'د'
                    ),
            'ذ' => array(
                    'middle'		=>   '&#xFEAC;',
                    'end'		    =>   '&#xFEAC;',
                    'isolated'		=>   'ذ'
                    ),
            'ر' => array(
                    'middle'		=>   '&#xFEAE;',
                    'end'		    =>   '&#xFEAE;',
                    'isolated'		=>   'ر'
                    ),
            'ز' => array(
                    'middle'		=>   '&#xFEB0;',
                    'end'		    =>   '&#xFEB0;',
                    'isolated'		=>   'ز'
                    ),
            'س' => array(
                    'beginning'		=>   '&#xFEB3;',
                    'middle'		=>   '&#xFEB4;',
                    'end'			=>   '&#xFEB2;',
                    'isolated'		=>   'س'
                    ),
            'ش' => array(
                    'beginning'		=>   '&#xFEB7;',
                    'middle'		=>   '&#xFEB8;',
                    'end'			=>   '&#xFEB6;',
                    'isolated'		=>   'ش'
                    ),
            'ص' => array(
                    'beginning'		=>   '&#xFEBB;',
                    'middle'		=>   '&#xFEBC;',
                    'end'			=>   '&#xFEBA;',
                    'isolated'		=>   'ص'
                    ),
            'ض' => array(
                    'beginning'		=>   '&#xFEBF;',
                    'middle'		=>   '&#xFEC0;',
                    'end'			=>   '&#xFEBE;',
                    'isolated'		=>   'ض'
                    ),
            'ط' => array(
                    'beginning'		=>   '&#xFEC3;',
                    'middle'		=>   '&#xFEC4;',
                    'end'			=>   '&#xFEC2;',
                    'isolated'		=>   'ط'
                    ),
            'ظ' => array(
                    'beginning'		=>   '&#xFEC7;',
                    'middle'		=>   '&#xFEC8;',
                    'end'			=>   '&#xFEC6;',
                    'isolated'		=>   'ظ'
                    ),
            'ع' => array(
                    'beginning'		=>   '&#xFECB;',
                    'middle'		=>   '&#xFECC;',
                    'end'			=>   '&#xFECA;',
                    'isolated'		=>   'ع'
                    ),
            'غ' => array(
                    'beginning'		=>   '&#xFECF;',
                    'middle'		=>   '&#xFED0;',
                    'end'			=>   '&#xFECE;',
                    'isolated'		=>   'غ'
                    ),
            'ف' => array(
                    'beginning'		=>   '&#xFED3;',
                    'middle'		=>   '&#xFED4;',
                    'end'			=>   '&#xFED2;',
                    'isolated'		=>   'ف'
                    ),
            'ق' => array(
                    'beginning'		=>   '&#xFED7;',
                    'middle'		=>   '&#xFED8;',
                    'end'			=>   '&#xFED6;',
                    'isolated'		=>   'ق'
                    ),
            'ك' => array(
                    'beginning'		=>   '&#xFEDB;',
                    'middle'		=>   '&#xFEDC;',
                    'end'			=>   '&#xFEDA;',
                    'isolated'		=>   'ك'
                    ),
            'ل' => array(
                    'beginning'		=>   '&#xFEDF;',
                    'middle'		=>   '&#xFEE0;',
                    'end'			=>   '&#xFEDE;',
                    'isolated'		=>   'ل'
                    ),
            'م' => array(
                    'beginning'		=>   '&#xFEE3;',
                    'middle'		=>   '&#xFEE4;',
                    'end'			=>   '&#xFEE2;',
                    'isolated'		=>   'م'
                    ),
            'ن' => array(
                    'beginning'		=>   '&#xFEE7;',
                    'middle'		=>   '&#xFEE8;',
                    'end'			=>   '&#xFEE6;',
                    'isolated'		=>   'ن'
                    ),
            'ه' => array(
                    'beginning'		=>   '&#xFEEB;',
                    'middle'		=>   '&#xFEEC;',
                    'end'			=>   '&#xFEEA;',
                    'isolated'		=>   'ه'
                    ),
            'و' => array(
                    'middle'		=>   '&#xFEEE;',
                    'end'		=>   '&#xFEEE;',
                    'isolated'		=>   'و'
                    ),
            'ي' => array(
                    'beginning'		=>   '&#xFEF3;',
                    'middle'		=>   '&#xFEF4;',
                    'end'			=>   '&#xFEF2;',
                    'isolated'		=>   'ي'
                    ),
            'ئ' => array(
                    'beginning'		=>   '&#xFE8B;',
                    'middle'		=>   '&#xFE8C;',
                    'end'			=>   '&#xFE8A;',
                    'isolated'		=>   'ئ'
                    ),
            'ة' => array(
                    'middle'		=>   '&#xFE94;',
                    'end'		=>   '&#xFE94;',
                    'isolated'		=>   'ة'
                    )
        );

        if(in_array($word[0].$word[1], $isolated_chars))
        {
            $new_word[] = $word[0].$word[1];
            $char_type[] = 'not_normal';
        }
        else
        {
            $new_word[] = $all_chars[$word[0].$word[1]]['beginning'];
            $char_type[] = 'normal';
        }

        if(strlen($word) > 4)
        {
            if($char_type[0] == 'not_normal')
            {
                if(in_array($word[2].$word[3], $isolated_chars))
                {
                    $new_word[] = $word[2].$word[3];
                    $char_type[] = 'not_normal';
                }
                else
                {
                    $new_word[] = $all_chars[$word[2].$word[3]]['beginning'];
                    $char_type[] = 'normal';
                }
            }
            else
            {
                $new_word[] = $all_chars[$word[2].$word[3]]['middle'];
                $chars_statue[] = 'middle';

                if(in_array($word[2].$word[3], $isolated_chars))
                {
                    $char_type[] = 'not_normal';
                }
                else
                {
                    $char_type[] = 'normal';
                }
            }
            $x = 4;
        }
        else
        {
            if (strlen($word) == 4)
            {
                $new_word = [];
                if($word[0].$word[1] == 'ل' and $word[2].$word[3] == 'ا')
                {
                    $new_word[] = '&#xFEFB;';
                }
                else
                {
                    if(in_array($word[0].$word[1], $isolated_chars))
                    {
                        $new_word[] = $all_chars[$word[0].$word[1]]['isolated'];
                        $new_word[] = $all_chars[$word[2].$word[3]]['isolated'];
                    }
                    else
                    {
                        if($word[2].$word[3] == 'ء')
                        {
                            $new_word[] = $all_chars[$word[0].$word[1]]['isolated'];
                            $new_word[] = 'ء';
                        }
                        else
                        {
                            $new_word[] = $all_chars[$word[0].$word[1]]['beginning'];
                            $new_word[] = $all_chars[$word[2].$word[3]]['end'];
                        }
                    }
                }

                return implode('',array_reverse($new_word));
            }
            $x = 2;	
        }

        for($x=4;$x< (strlen($word)-4) ;$x++)
        {
            if($char_type[count($char_type)-1] == 'not_normal' AND $x %2 == 0)
            {
                if(in_array($word[$x].$word[$x+1], $isolated_chars))
                {
                    $new_word[] = $word[$x].$word[$x+1];
                    $char_type[] = 'not_normal';
                }
                else
                {
                    $new_word[] = $all_chars[$word[$x].$word[$x+1]]['beginning'];
                    $char_type[] = 'normal';
                }
            }
            elseif($char_type[count($char_type)-1] == 'normal' AND $x %2 == 0)
            {
                if(in_array($word[$x].$word[$x+1], $isolated_chars))
                {
                    $new_word[] = $all_chars[$word[$x].$word[$x+1]]['middle'];
                    $char_type[] = 'not_normal';
                }
                else
                {
                    $new_word[] = $all_chars[$word[$x].$word[$x+1]]['middle'];
                    $char_type[] = 'normal';
                }
            }
        }
        if(strlen($word)>6)
        {
            if($char_type[count($char_type)-1] == 'not_normal')
            {
                if(in_array($word[$x].$word[$x+1], $isolated_chars))
                {
                    $new_word[] = $word[$x].$word[$x+1];
                    $char_type[] = 'not_normal';
                }
                else
                {
                    if($word[strlen($word)-2].$word[strlen($word)-1] == 'ء')
                    {
                        $new_word[] = $word[$x].$word[$x+1];
                        $char_type[] = 'normal';
                    }
                    else
                    {
                        $new_word[] = $all_chars[$word[$x].$word[$x+1]]['beginning'];
                        $char_type[] = 'normal';
                    }
                }

                $x += 2;
            }
            elseif($char_type[count($char_type)-1] == 'normal')
            {
                    if(in_array($word[$x].$word[$x+1], $isolated_chars))
                    {
                            if($word[$x-2].$word[$x-1] == 'ل' and $word[$x].$word[$x+1] == 'ا') {
                $new_word[count($new_word) - 1] = '&#xFEFC;';
            } else {
                $new_word[] = $all_chars[$word[$x].$word[$x+1]]['middle'];
            }
                            $char_type[] = 'not_normal';
                    }
                    else
                    {
                            $new_word[] = $all_chars[$word[$x].$word[$x+1]]['middle'];
                            $char_type[] = 'normal';
                    }

                    $x += 2;
            }
        }

        if($char_type[count($char_type)-1] == 'not_normal')
        {
            if(in_array($word[$x].$word[$x+1], $isolated_chars))
            {
                $new_word[] = $word[$x].$word[$x+1];
            }
            else
            {
                $new_word[] = $word[$x].$word[$x+1];
            }
        }
        else
        {
            if(in_array($word[$x].$word[$x+1], $isolated_chars))
            {
                if($word[$x-2].$word[$x-1] == 'ل' and $word[$x].$word[$x+1] == 'ا')
                {
                    $new_word[count($new_word) - 1] = '&#xFEFC;';
                }
                else
                {
                    $new_word[] = $all_chars[$word[$x].$word[$x+1]]['middle'];
                }
            }
            else
            {
                $new_word[] = $all_chars[$word[$x].$word[$x+1]]['end'];
            }
        }

        return implode('',array_reverse($new_word));
    }
}
?>