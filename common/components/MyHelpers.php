<?php
namespace common\components;

class MyHelpers
{
    public static function hello($name) {
        return "Hello $name";
    }

    public function getImageDecode()
    {
        $imageEx = explode('/',$this->image);
        $nameImage = array_pop($imageEx);
        $nameImage = urlencode($nameImage);
        $linkFolder =implode("/",$imageEx);

        return $linkFolder. '/'.$nameImage;
    }
}