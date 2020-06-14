<?php declare(strict_types=1);

namespace app\serializers;

/**
 * The "JsonSerializerInterface" interface
 */
interface JsonSerializerInterface
{
    /**
     * @param array $data
     *
     * @param int $options
     *
     * @return string
     */
    public function encode(array $data, int $options);

    /**
     * @param string $string
     *
     * @return array
     */
    public function decode(string $string);
}