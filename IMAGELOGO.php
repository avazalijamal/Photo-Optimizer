<?php

/*
    Xeta cixar ve ya calismazsa

    Step 1:  <C:\xampp\php\php.ini> fayili ac
    Step 2:  <;extension=gd> bu hisseni <extension=gd> bu formada deyisdir
    Step 3: Restart XAMP
*/

// namespace App\Helper;

class IMAGELOGO
{
    protected $logoUrl;
    protected $photo;
    protected $sizeLogo;
    protected $sizePhoto;
    private $tempLogo;
    private $tempImg;
    private $ctx;
    protected $left = 0;
    protected $top = 0;
    protected $width;
    protected $height;
    protected $WIDTH;
    protected $HEIGHT;
    protected $newUri;
    protected $fileCount = 0;

    protected const colors = [
        'black' => '0;30',
        'red' => '0;31',
        'green' => '0;32',
        'yellow' => '0;33',
        'blue' => '0;34',
        'magenta' => '0;35',
        'cyan' => '0;36',
        'white' => '0;37',
        'bold_black' => '1;30',
        'bold_red' => '1;31',
        'bold_green' => '1;32',
        'bold_yellow' => '1;33',
        'bold_blue' => '1;34',
        'bold_magenta' => '1;35',
        'bold_cyan' => '1;36',
        'bold_white' => '1;37',
    ];


    function __construct($url)
    {
        $this->logoUrl = $url;
        $this->sizeLogo = getimagesize($this->logoUrl);
        $this->tempLogo = imagecreatefrompng($this->logoUrl);

        $this->width = $this->sizeLogo[0];
        $this->height = $this->sizeLogo[1];

    }

    public function readImage($uri)
    {
        $this->photoUrl = $uri;
        $this->sizePhoto = getimagesize($this->photoUrl);
        $this->WIDTH = $this->sizePhoto[0];
        $this->HEIGHT = $this->sizePhoto[1];
        $this->tempImg = imagecreatefromstring(file_get_contents($this->photoUrl));
        /*
            $photoTemp=imagecreatefromwebp($photo);//webp+
            $photoTemp=imagecreatefromjpeg($photo);//jpeg,jpg+
            $photoTemp=imagecreatefrompng($photo);//png+
            $photoTemp=imagecreatefromgif($photo);//gif+
            $photoTemp=imageCreateFromBmp($photo);//bmp+
        */

        return $this;
    }
    public function deleteImage()
    {

        unlink($this->photoUrl);

        return $this;
    }
    protected function createCtx()
    {

        $this->ctx = imagecreatetruecolor($this->WIDTH, $this->HEIGHT);

        return $this;
    }
    protected function writeImage()
    {

        imagecopyresampled($this->ctx, $this->tempImg, 0, 0, 0, 0, $this->WIDTH, $this->HEIGHT, $this->sizePhoto[0], $this->sizePhoto[1]);

        return $this;

    }
    protected function writeLogo()
    {

        imagecopyresampled($this->ctx, $this->tempLogo, $this->left, $this->top, 0, 0, $this->width, $this->height, $this->sizeLogo[0], $this->sizeLogo[1]);

        return $this;
    }
    public function ResizeLogo($width = null, $height = null)
    {
        if ($width)
            $this->width = $width;

        if ($height)
            $this->height = $height;

        return $this;
    }
    public function ResizeImg($width = null, $height = null)
    {
        if ($width)
            $this->WIDTH = $width;

        if ($height)
            $this->HEIGHT = $height;

        return $this;
    }
    public function Position($left, $top)
    {
        $this->left = $left;
        $this->top = $top;

        return $this;
    }
    public function convertWebp($newUri)
    {

        $this->newUri = $newUri;
        $this->createCtx()->writeImage();

        imagewebp($this->ctx, $this->newUri);

        $this->removeCtx();

        return $this;

    }
    public function writeWebp($newUri)
    {

        $this->newUri = $newUri;
        $this->createCtx()->writeImage()->writeLogo();


        imagewebp($this->ctx, $this->newUri);

        $this->removeCtx();

        return $this;

    }
    public function writeWebpOptimization($newUri)
    {

        $this->newUri = $newUri;
        $this->createCtx()->writeImage();


        imagewebp($this->ctx, $this->newUri);

        $this->removeCtx();

        return $this;

    }
    public function writePng($newUri)
    {

        $this->newUri = $newUri;
        $this->createCtx()->writeImage()->writeLogo();


        imagepng($this->ctx, $this->newUri);

        $this->removeCtx();

        return $this;

    }
    public function writeGif($newUri)
    {

        $this->newUri = $newUri;
        $this->createCtx()->writeImage()->writeLogo();


        imagegif($this->ctx, $this->newUri);

        $this->removeCtx();

        return $this;

    }
    public function writeBmp($newUri)
    {

        $this->newUri = $newUri;
        $this->createCtx()->writeImage()->writeLogo();


        imagebmp($this->ctx, $this->newUri);

        $this->removeCtx();

        return $this;

    }
    public function writeJpeg($newUri)
    {

        $this->newUri = $newUri;
        $this->createCtx()->writeImage()->writeLogo();


        imagejpeg($this->ctx, $this->newUri);

        $this->removeCtx();

        return $this;

    }
    public function getNewUri()
    {
        return $this->newUri;
    }
    protected function removeCtx()
    {

        imagedestroy($this->ctx);

        return $this;
    }
    public function Right()
    {

        $this->left = ($this->WIDTH - $this->width);

        $this->Position($this->left, $this->top);

        return $this;
    }
    public function Left()
    {

        $this->left = 0;

        $this->Position($this->left, $this->top);

        return $this;
    }
    public function Center()
    {

        $this->left = ($this->WIDTH - $this->width) / 2;

        $this->Position($this->left, $this->top);

        return $this;
    }
    public function Top()
    {

        $this->top = 0;

        $this->Position($this->left, $this->top);

        return $this;
    }
    public function Bottom()
    {

        $this->top = ($this->HEIGHT - $this->height);

        $this->Position($this->left, $this->top);

        return $this;
    }
    public function Middle()
    {

        $this->top = ($this->HEIGHT - $this->height) / 2;

        $this->Position($this->left, $this->top);

        return $this;
    }
    public function autoResizeLogo()
    {

        if ($this->WIDTH < $this->width)
            $this->width = $this->WIDTH;


        if ($this->HEIGHT < $this->height)
            $this->height = $this->HEIGHT;

        return $this;
    }
    public function checkAccess()
    {
        if ($this->WIDTH < $this->width || $this->HEIGHT < $this->height) {
            return false;
        } else {
            return true;
        }
    }
    public function directoryContentOptimization($directory, $level = 0)
    {
        if (is_dir($directory)) {
            if ($dh = opendir($directory)) {
                while (($file = readdir($dh)) !== false) {
                    if ($file != '.' && $file != '..') {
                        $filePath = $directory . DIRECTORY_SEPARATOR . $file;
                        $directoryPath = dirname($filePath);

                        $newDirectoryPath = (strpos($directoryPath, './src') === 0) ? str_replace('./src', './dist', $directoryPath) : $directoryPath;

                        $newFilePath = $newDirectoryPath . DIRECTORY_SEPARATOR . $file . '.webp';

                        if (is_dir($filePath))
                            $this->directoryContentOptimization($filePath, $level + 1);
                        else {
                            if (!is_dir($newDirectoryPath))
                                mkdir($newDirectoryPath, 0777, true);
                            // echo $filePath;
                            // echo "&nbsp;&nbsp;&nbsp;&nbsp;&nbsp";
                            // echo $directoryPath;
                            // echo "&nbsp;&nbsp;&nbsp;&nbsp;&nbsp";
                            // echo "&nbsp;&nbsp;&nbsp;&nbsp;&nbsp";
                            // echo $newDirectoryPath;
                            // echo "&nbsp;&nbsp;&nbsp;&nbsp;&nbsp";
                            // echo "<br/>";
                            $this->fileCount++;
                            if (file_exists($newFilePath)) {
                                echo $this->colorize("File exists: $this->fileCount ) $newFilePath \n", "red");
                            } else {
                                // echo $this->colorize("Warning : $this->fileCount ) $newFilePath \n", "yellow");
                                $this->readImage($filePath)->writeWebpOptimization($newFilePath);
                                echo $this->colorize("File does not exist: $this->fileCount ) $newFilePath \n", "green");
                            }

                        }
                    }
                }
                closedir($dh);
            } else {
                echo "Qovluq açılamadı: $directory<br/>";
            }
        } else {
            echo "Qovluq mevcut deyil: $directory<br/>";
        }
    }
    protected function colorize($text, $color)
    {
        return "\033[" . self::colors[$color] . "m" . $text . "\033[0m";
    }

}
