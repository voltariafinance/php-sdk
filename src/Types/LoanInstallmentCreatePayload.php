<?php

namespace Voltaria\Types;

use Voltaria\Core\Json\JsonSerializableType;
use DateTime;
use Voltaria\Core\Json\JsonProperty;
use Voltaria\Core\Types\Date;
use Voltaria\Core\Types\Union;

class LoanInstallmentCreatePayload extends JsonSerializableType
{
    /**
     * @var DateTime $expectedRepaymentAt The expected repayment date for this installment
     */
    #[JsonProperty('expected_repayment_at'), Date(Date::TYPE_DATE)]
    public DateTime $expectedRepaymentAt;

    /**
     * @var (
     *    float
     *   |string
     * ) $amount The amount due for this installment
     */
    #[JsonProperty('amount'), Union('float', 'string')]
    public float|string $amount;

    /**
     * @param array{
     *   expectedRepaymentAt: DateTime,
     *   amount: (
     *    float
     *   |string
     * ),
     * } $values
     */
    public function __construct(
        array $values,
    ) {
        $this->expectedRepaymentAt = $values['expectedRepaymentAt'];
        $this->amount = $values['amount'];
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        return $this->toJson();
    }
}
