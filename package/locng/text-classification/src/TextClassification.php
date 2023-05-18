<?php
namespace locng\TextClassification;

use GuzzleHttp\Client;
use Illuminate\Support\Facades\Http;

class TextClassification
{
    public static function event(string $name, float $val, ?string $dimension = null)
    {
        return $name . " - " . $val;
    }
    public static function predict($text)
    {
        $response = Http::asForm()->post(API_PREICT, [
            'text' => $text,
           
        ]);
        return $response;
    }
}