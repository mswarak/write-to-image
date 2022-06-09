# write-to-image
- Clone this repository
```
$ git clone https://github.com/mswarak/write-to-image.git
```

## Installation
This project using composer
```
composer require mswarak/write-to-image
```

OR

```
require_once '../src/Write_To_Image.php';
```

## Usage
```
// load Write_To_Image
use mswarak\Write_To_Image;
$image = new Write_To_Image('img.jpg');

// add text
$image->text_ltr("test 01", 25, 50, 50, array(0,0,0), dirname(__FILE__) . "/arial.ttf");
$image->text_ltr("test 02", 25, 250, 250, array(0,0,0), dirname(__FILE__) . "/arial.ttf");

// preview image on browser
$image->preview();
```

## Changelog
**1.2.0 ( 2022/06/05 )**
- Fix bugs.

**1.1 ( 2022/06/02 )**
- Support rtl.
- Improve Arabic encoding.
- Fix bugs.

**1.0 ( 2022/06/01 )**
- The first stable version.

**0.1-beta ( 2022/05/26 )**
- First release.

### Credits
- [***Intervention / image***](https://github.com/Intervention/image)
- [***word2uni***](https://github.com/Null78/word2uni/blob/main/word2uni.php)
