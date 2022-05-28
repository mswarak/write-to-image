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
    
    function text_ltr()
    {
        //
    }
    
    function save()
    {
        //
    }
    
    function encode()
    {
        //
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