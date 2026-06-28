<?php

namespace Voltaria\Types;

use Voltaria\Core\Json\JsonSerializableType;
use Voltaria\Core\Json\JsonProperty;
use DateTime;
use Voltaria\Core\Types\Date;

class LoanInstallmentResponse extends JsonSerializableType
{
    /**
     * @var string $id The ID of the installment
     */
    #[JsonProperty('id')]
    public string $id;

    /**
     * @var string $amount The amount of the installment
     */
    #[JsonProperty('amount')]
    public string $amount;

    /**
     * @var int $installmentNumber The installment number in sequence
     */
    #[JsonProperty('installment_number')]
    public int $installmentNumber;

    /**
     * @var DateTime $expectedRepaymentAt The expected repayment date of the installment
     */
    #[JsonProperty('expected_repayment_at'), Date(Date::TYPE_DATETIME)]
    public DateTime $expectedRepaymentAt;

    /**
     * @var value-of<LoanStatusEnum> $status The status of the installment
     */
    #[JsonProperty('status')]
    public string $status;

    /**
     * @var DateTime $createdAt The creation date of the installment
     */
    #[JsonProperty('created_at'), Date(Date::TYPE_DATETIME)]
    public DateTime $createdAt;

    /**
     * @var DateTime $updatedAt The last update date of the installment
     */
    #[JsonProperty('updated_at'), Date(Date::TYPE_DATETIME)]
    public DateTime $updatedAt;

    /**
     * @param array{
     *   id: string,
     *   amount: string,
     *   installmentNumber: int,
     *   expectedRepaymentAt: DateTime,
     *   status: value-of<LoanStatusEnum>,
     *   createdAt: DateTime,
     *   updatedAt: DateTime,
     * } $values
     */
    public function __construct(
        array $values,
    ) {
        $this->id = $values['id'];
        $this->amount = $values['amount'];
        $this->installmentNumber = $values['installmentNumber'];
        $this->expectedRepaymentAt = $values['expectedRepaymentAt'];
        $this->status = $values['status'];
        $this->createdAt = $values['createdAt'];
        $this->updatedAt = $values['updatedAt'];
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        return $this->toJson();
    }
}
