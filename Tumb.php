<?php

namespace swods\tumbgenerator;

/**
 * "How to use" can be found in README.md file
 * @author SSU (SwoDs) <etc@swods.ru>
 */
class Tumb
{
    private $tumb_width = 150;

    private $img_path;

    private $tumb_dir = 'tumb';
    private $tumb_name = 'tumb.jpg';

    public static function generate($config) 
    {  
        $self = new self($config);
        return $self->start();
    }

    public function __construct($config) 
    {
        foreach ($config as $key => $value) {
            if (property_exists($this, $key)) {
                $this->$key = $value;
            }
        }

        if (empty($this->img_path)) {
            throw new \Exception('`img_path` must be set');
        } else {
            if (!is_file($this->img_path)) {
                throw new \Exception('`img_path` must be a file');
            }
        }
    }

    public function start() 
    {
        $size = getimagesize($this->img_path);

        switch ($size[2]) {
            case IMG_JPG:
                return $this->fromJpg($size);
                break;
            
            default:
                throw new \Exception('image type unknown, only jpg and png allowed');
                break;
        }
    }

    public function fromJpg($size)
    {
        $width = $size[0];
        $height = $size[1];

        $tumb_height = $this->calcHeight($width, $height);

        $src = imagecreatefromjpeg($this->img_path);
        $tumb = imagecreatetruecolor($this->tumb_width, $tumb_height);

        imagecopyresampled($tumb, $src, 0, 0, 0, 0, $this->tumb_width, $tumb_height, $width, $height);

        $this->checkFolder($this->tumb_dir);

        imagejpeg($tumb, sprintf('%s/%s', $this->tumb_dir, $this->tumb_name));
        imagedestroy($src);
        imagedestroy($tumb);
    }

    public function calcHeight($width, $height) 
    {
        $ratio = $width / $this->tumb_width;
        return ceil($height / $ratio);
    }

    public function checkFolder($tumb_dir) 
    {
        if (!is_dir($tumb_dir)) {
            mkdir($tumb_dir, 0777, true);
        }
    }
}
