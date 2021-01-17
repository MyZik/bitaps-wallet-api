<?php

declare(strict_types=1);

/*
 * Package: PHP Bitaps API
 *
 * (c) Eldar Gazaliev <eldarqa@gmx.de>
 *
 *  Link: <https://github.com/MyZik>
 *
 * For the full copyright and license information, please view the LICENSE file
 * that was distributed with this source code.
 */

namespace Bitaps\WalletAPI\Response\AddressTransactions;

use Bitaps\WalletAPI\Model\Transaction;
use JMS\Serializer\Annotation as Serializer;

class Transactions
{
    /**
     * @Serializer\SerializedName("tx_list")
     * @Serializer\Type("array<Bitaps\WalletAPI\Model\Transaction>")
     *
     * @var Transaction[]
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
     * @return Transaction[]
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
