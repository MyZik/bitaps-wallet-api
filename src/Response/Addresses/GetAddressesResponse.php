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

namespace Bitaps\WalletAPI\Response\Addresses;

use Bitaps\WalletAPI\Response\AbstractResponse;
use Bitaps\WalletAPI\Response\Addresses\Model\Address;
use JMS\Serializer\Annotation as Serializer;

class GetAddressesResponse extends AbstractResponse
{
    /**
     * @Serializer\SerializedName("address_list")
     * @Serializer\Type("array<Bitaps\WalletAPI\Response\Addresses\Model\Address>")
     *
     * @var Address[]
     */
    private array $txList;

    /**
     * @Serializer\SerializedName("next_page")
     * @Serializer\Type("bool")
     *
     * @var bool
     */
    private bool $nextPage;

    /**
     * @return Address[]
     */
    public function getTxList(): array
    {
        return $this->txList;
    }

    /**
     * @return bool
     */
    public function isNextPage(): bool
    {
        return $this->nextPage;
    }
}
