<?php

/**
 * Package: PHP Bitaps API
 *
 * (c) Eldar Gazaliev <eldarqa@gmx.de>
 *
 * Link: <https://github.com/MyZik>
 *
 * For the full copyright and license information, please view the LICENSE file
 * that was distributed with this source code.
 */

declare(strict_types=1);

namespace Bitaps\WalletAPI\Response;

use JMS\Serializer\SerializerBuilder;

abstract class AbstractResponse
{
    /**
     * @param string $json
     *
     * @return mixed
     */
    public static function fromJson(string $json)
    {
        $object = new static();

        $serializer = SerializerBuilder::create()->build();

        return $serializer->deserialize($json, get_class($object), 'json');
    }

    /**
     * @param string $string
     *
     * @return string|string[]
     */
    protected static function toCamelCase(string $string)
    {
        return str_replace(" ", "", ucwords(str_replace("_", " ", $string)));
    }
}
