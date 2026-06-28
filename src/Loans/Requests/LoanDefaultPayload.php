<?php

namespace Voltaria\Loans\Requests;

use Voltaria\Core\Json\JsonSerializableType;
use DateTime;
use Voltaria\Core\Json\JsonProperty;
use Voltaria\Core\Types\Date;
use Voltaria\Core\Types\Union;

class LoanDefaultPayload extends JsonSerializableType
{
    /**
     * @var DateTime $defaultDate Date the loan is marked as defaulted.
     */
    #[JsonProperty('default_date'), Date(Date::TYPE_DATE)]
    public DateTime $defaultDate;

    /**
     * @var (
     *    float
     *   |string
     * ) $soldAmount Amount recovered when the defaulted loan is sold.
     */
    #[JsonProperty('sold_amount'), Union('float', 'string')]
    public float|string $soldAmount;

    /**
     * @param array{
     *   defaultDate: DateTime,
     *   soldAmount: (
     *    float
     *   |string
     * ),
     * } $values
     */
    public function __construct(
        array $values,
    ) {
        $this->defaultDate = $values['defaultDate'];
        $this->soldAmount = $values['soldAmount'];
    }
}
