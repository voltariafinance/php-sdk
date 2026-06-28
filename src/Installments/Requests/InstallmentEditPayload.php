<?php

namespace Voltaria\Installments\Requests;

use Voltaria\Core\Json\JsonSerializableType;
use Voltaria\Core\Json\JsonProperty;
use Voltaria\Core\Types\Union;
use DateTime;
use Voltaria\Core\Types\Date;

class InstallmentEditPayload extends JsonSerializableType
{
    /**
     * @var (
     *    float
     *   |string
     * ) $amount The new amount for the installment
     */
    #[JsonProperty('amount'), Union('float', 'string')]
    public float|string $amount;

    /**
     * @var DateTime $expectedRepaymentAt The new expected repayment date
     */
    #[JsonProperty('expected_repayment_at'), Date(Date::TYPE_DATE)]
    public DateTime $expectedRepaymentAt;

    /**
     * @param array{
     *   amount: (
     *    float
     *   |string
     * ),
     *   expectedRepaymentAt: DateTime,
     * } $values
     */
    public function __construct(
        array $values,
    ) {
        $this->amount = $values['amount'];
        $this->expectedRepaymentAt = $values['expectedRepaymentAt'];
    }
}
