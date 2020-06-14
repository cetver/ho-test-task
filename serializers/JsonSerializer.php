<?php declare(strict_types=1);

namespace app\serializers;

use yii\helpers\Json;

/**
 * The "JsonSerializer" trait
 */
trait JsonSerializer
{
    public function encode(array $data, int $options = 320)
    {
        return Json::encode($data, $options);
    }

    public function decode(string $string)
    {
        return Json::decode($string, true);
    }
}