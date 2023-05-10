<?php
namespace locng\TextClassification;
class TextClassification
{
    public static function event(string $name, float $val,?string $dimension=null)
    {
        return $name ." - ".$val;
    }
}