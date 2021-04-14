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

namespace Bitaps\WalletAPI\Response\SendCommitmentPayment;

use Bitaps\WalletAPI\Response\AbstractResponse;

class SendCommitmentPaymentResponse extends AbstractResponse
{
    /**
     * @var string
     */
    private string $commitment;

    /**
     * @var int|null
     */
    private ?int $out;

    /**
     * Transaction type [commitment or internal]
     *
     * @var string
     */
    private string $type;

    /**
     * Commitment status
     *
     * @var string
     */
    private string $status;

    /**
     * @var int
     */
    private int $amount;

    /**
     * @var string
     */
    private string $address;

    /**
     * @return string
     */
    public function getCommitment(): string
    {
        return $this->commitment;
    }

    /**
     * @return int|null
     */
    public function getOut(): ?int
    {
        return $this->out;
    }

    /**
     * @return string
     */
    public function getType(): string
    {
        return $this->type;
    }

    /**
     * @return string
     */
    public function getStatus(): string
    {
        return $this->status;
    }

    /**
     * @return int
     */
    public function getAmount(): int
    {
        return $this->amount;
    }

    /**
     * @return string
     */
    public function getAddress(): string
    {
        return $this->address;
    }
}
