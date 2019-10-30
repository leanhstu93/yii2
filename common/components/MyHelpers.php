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

    public static function buildDeepPrefix(&$data,$parent_id = 0,$level = 0,$prefix = '↵')
    {

        foreach ($data as $key => $item) {
            if ($item['parent_id'] == $parent_id) {
                $data[$key]['name'] = str_repeat($prefix,$level).' '.$item['name'];
                $level = $level + 1;
                self::buildDeepPrefix($data,$item['id'] ,$level,$prefix = '↵');
                $level = 0;
            }
        }
    }
}