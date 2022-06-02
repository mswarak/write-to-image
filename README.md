# write-to-image
- Clone this repository
```
$ git clone https://github.com/msWarak/write-to-image.git
```

- Install
```
require_once '../src/Write_To_Image.php';
```

- Run
```
// load Write_To_
use msWarak\Write_To_Image;
$image = new Write_To_Image('img.jpg');

// add text
$image->text_ltr("test 01", 25, 50, 50, array(0,0,0), dirname(__FILE__) . "/arial.ttf");
$image->text_ltr("test 02", 25, 250, 250, array(0,0,0), dirname(__FILE__) . "/arial.ttf");

// preview image on browser
$image->preview();
```

### Credits :
- [***Intervention / image***](https://github.com/Intervention/image)
- [***word2uni***](https://github.com/Null78/word2uni/blob/main/word2uni.php)
