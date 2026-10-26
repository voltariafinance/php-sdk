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
     * @var (
     *    float
     *   |string
     * )|null $principal The principal part of the installment amount. Only when creating a loan with repayment_method custom, together with interest
     */
    #[JsonProperty('principal'), Union('float', 'string', 'null')]
    public float|string|null $principal;

    /**
     * @var (
     *    float
     *   |string
     * )|null $interest The interest part of the installment amount. Only when creating a loan with repayment_method custom, together with principal
     */
    #[JsonProperty('interest'), Union('float', 'string', 'null')]
    public float|string|null $interest;

    /**
     * @param array{
     *   expectedRepaymentAt: DateTime,
     *   amount: (
     *    float
     *   |string
     * ),
     *   principal?: (
     *    float
     *   |string
     * )|null,
     *   interest?: (
     *    float
     *   |string
     * )|null,
     * } $values
     */
    public function __construct(
        array $values,
    ) {
        $this->expectedRepaymentAt = $values['expectedRepaymentAt'];
        $this->amount = $values['amount'];
        $this->principal = $values['principal'] ?? null;
        $this->interest = $values['interest'] ?? null;
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        return $this->toJson();
    }
}
