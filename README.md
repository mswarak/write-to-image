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

// add default font
$image->set_default_font(dirname(__FILE__) . "/arial.ttf");

// add text
$image->text_ltr("hi 01", 25, 50, 50);
$image->text_ltr("hi 02", 25, 250, 250);

// preview image on browser
$image->preview();
```

## Changelog
**1.2.4 ( 2022/06/26 )**
- Support drawing lines.
- Support switch color from hex to RGB.

**1.2.3 ( 2022/06/17 )**
- Support drawing rectangles.
- Fix bugs.

**1.2.2 ( 2022/06/13 )**
- Support adding default font.
- Support drawing circles.

**1.2.1 ( 2022/06/09 )**
- Support multi-output file using text_clear function.
- Fix bugs.

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

## Credits
- [***Intervention / image***](https://github.com/Intervention/image)
- [***word2uni***](https://github.com/Null78/word2uni/blob/main/word2uni.php)
