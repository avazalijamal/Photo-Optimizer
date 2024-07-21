# IMAGELOGO PHP Sinfi

`IMAGELOGO` sinfi, bir loqonu şəkilə yerləşdirmək, görüntüləri yenidən ölçüləndirmək və fərqli formatlarda saxlamaq üçün istifadə olunan bir PHP sinfidir. Həmçinin, bir qovluqdakı bütün görüntü fayllarını optimizə edə bilər.

## Xüsusiyyətlər
- **protected $logoUrl;**: Loqonun URL-sini saxlayır.
- **protected $photo;**: Şəkli saxlayır.
- **protected $sizeLogo;**: Loqonun ölçüsünü saxlayır.
- **protected $sizePhoto;**: Şəklin ölçüsünü saxlayır.
- **private $tempLogo;**: Müvəqqəti loqo şəkli.
- **private $tempImg;**: Müvəqqəti şəkil.
- **private $ctx;**: Görüntü konteksi.
- **protected $left = 0;**: Loqonun sol mövqeyi.
- **protected $top = 0;**: Loqonun üst mövqeyi.
- **protected $width;**: Loqonun eni.
- **protected $height;**: Loqonun hündürlüyü.
- **protected $WIDTH;**: Şəklin eni.
- **protected $HEIGHT;**: Şəklin hündürlüyü.
- **protected $newUri;**: Yeni faylın URI-sı.
- **protected $fileCount = 0;**: İşlənmiş fayl sayı.
- **protected const colors;**: Rənglər üçün ANSI kodları.
- **protected $photoUrl;**: Şəklin URL-sini saxlayır.
- **protected $fileStatus = true;**: Fayl vəziyyəti (etibarlı ya etibarsız).
- **protected $src = "./src";**: Mənbə qovluğu.
- **protected $dist = "./dist";**: Təyinat qovluğu.
- **protected $problem = "./problem";**: Problemli fayllar qovluğu.

## Metodlar
- **__construct($url)**: Qurucu metod, loqonu yükləyir və ölçüsünü təyin edir.
- **readImage($uri)**: Şəkli oxuyur və müvəqqəti şəkil yaradır.
- **deleteImage()**: Şəkli silir.
- **createCtx()**: Yeni bir görüntü konteksi yaradır.
- **writeImage()**: Şəkli təyin olunmuş mövqedə yaradır.
- **writeLogo()**: Loqonu təyin olunmuş mövqedə yaradır.
- **ResizeLogo($width, $height)**: Loqonu yenidən ölçüləndirir.
- **ResizeImg($width, $height)**: Şəkli yenidən ölçüləndirir.
- **Position($left, $top)**: Loqonun mövqeyini təyin edir.
- **convertWebp($newUri)**: Şəkli WebP formatına çevirir.
- **writeWebp($newUri)**: Şəkli və loqonu WebP formatında saxlayır.
- **writeWebpOptimization($newUri)**: Optimizə edilmiş WebP formatında saxlayır.
- **writePng($newUri)**: Şəkli və loqonu PNG formatında saxlayır.
- **writeGif($newUri)**: Şəkli və loqonu GIF formatında saxlayır.
- **writeBmp($newUri)**: Şəkli və loqonu BMP formatında saxlayır.
- **writeJpeg($newUri)**: Şəkli və loqonu JPEG formatında saxlayır.
- **getNewUri()**: Yeni faylın URI-sini qaytarır.
- **removeCtx()**: Görüntü konteksini məhv edir.
- **Right()**: Loqonu sağa hizalayır.
- **Left()**: Loqonu sola hizalayır.
- **Center()**: Loqonu ortalayır.
- **Top()**: Loqonu yuxarı hizalayır.
- **Bottom()**: Loqonu aşağı hizalayır.
- **Middle()**: Loqonu mərkəzə hizalayır.
- **autoResizeLogo()**: Loqonu avtomatik olaraq yenidən ölçüləndirir.
- **checkAccess()**: Loqonun şəkilə sığıb-sığmadığını yoxlayır.
- **directoryContentOptimization($directory, $level)**: Təyin olunmuş qovluqdakı faylları optimizə edir.
- **colorize($text, $color)**: Mətni müəyyən bir rəngdə qaytarır.
- **isImage($filePath)**: Faylın görüntü olub-olmadığını yoxlayır.
- **moveFileToDirectory($filePath, $newFilePath, $newDirectoryPath)**: Faylı yeni qovluğa köçürür.
- **copyFileToDirectory($filePath, $newFilePath, $newDirectoryPath)**: Faylı yeni qovluğa kopyalayır.
- **createDirectoryIfNotExists($path)**: Qovluq mövcud deyilsə, yaradır.
- **isNotFileCorrupted($filePath)**: Faylın korlanmış olub-olmadığını yoxlayır.

## İstifadə Nümunəsi
```php
<?php
require 'IMAGELOGO.php';

// Loqo URL-sı
$logoUrl = 'path/to/logo.png';

// IMAGELOGO obyektini yaratma
$imageLogo = new IMAGELOGO($logoUrl);

// Şəklin URL-sı
$photoUrl = 'path/to/photo.jpg';

// Şəkli oxuma və loqonu şəkilə əlavə etmə
$imageLogo->readImage($photoUrl)
          ->Position(10, 10) // Loqonun mövqeyini təyin etmə
          ->writeWebp('path/to/output.webp'); // Yeni faylın yeri

echo "Yeni fayl yaradıldı: " . $imageLogo->getNewUri();
?>
