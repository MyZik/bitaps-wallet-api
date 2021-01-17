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

use Bitaps\WalletAPI\Response\AbstractResponse;
use JMS\Serializer\Annotation as Serializer;

class AddressTransactionsResponse extends AbstractResponse
{
    /**
     * @Serializer\SerializedName("transactions")
     * @Serializer\Type("Bitaps\WalletAPI\Response\AddressTransactions\Transactions")
     *
     * @var Transactions
     */
    private Transactions $transactions;

    /**
     * @Serializer\SerializedName("pending_transactions")
     * @Serializer\Type("Bitaps\WalletAPI\Response\AddressTransactions\PendingTransactions")
     *
     * @var PendingTransactions
     */
    private PendingTransactions $pendingTransactions;

    /**
     * @return Transactions
     */
    public function getTransactions(): Transactions
    {
        return $this->transactions;
    }

    /**
     * @return PendingTransactions
     */
    public function getPendingTransactions(): PendingTransactions
    {
        return $this->pendingTransactions;
    }
}
