<?php


namespace controller\util;

class Util
{

    public static function generateId()
    {
        return rand(1, 100000);
    }


    public static function isLettersOnly($data)
    {
        $pattern = "[abc]";
    }
}
