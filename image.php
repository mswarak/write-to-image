<?php

class Write_To_Image
{
    /**
     * Creates a new instance
     *
     * @param mixed $file
     * @param mixed $image_type
     */
    public function __construct($file = null, $image_type = "image/jpeg")
    {
        $this->driver = $driver;
        $this->core = $core;
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