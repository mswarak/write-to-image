<?php

class Write_To_Image
{
    /**
     * Image link
     *
     * @var mixed
     */
    protected $file;

    /**
     * Image MIME Content media type
     *
     * @var mixed
     */
    protected $image_type;
    
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
    
    function file()
    {
        if (isset($this)) {
            echo '$this is defined (';
            echo get_class($this);
            echo ")\n";
        } else {
            echo "\$this is not defined.\n";
        }
    }
}

?>