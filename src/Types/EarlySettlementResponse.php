<?php

namespace Voltaria\Types;

use Voltaria\Core\Json\JsonSerializableType;
use Voltaria\Core\Json\JsonProperty;
use DateTime;
use Voltaria\Core\Types\Date;

class EarlySettlementResponse extends JsonSerializableType
{
    /**
     * @var string $loanId The ID of the loan
     */
    #[JsonProperty('loan_id')]
    public string $loanId;

    /**
     * @var DateTime $settlementDate The date of early settlement
     */
    #[JsonProperty('settlement_date'), Date(Date::TYPE_DATE)]
    public DateTime $settlementDate;

    /**
     * @var string $settlementAmount The settlement amount at early settlement
     */
    #[JsonProperty('settlement_amount')]
    public string $settlementAmount;

    /**
     * @var string $settlementIrr The internal rate of return at early settlement
     */
    #[JsonProperty('settlement_irr')]
    public string $settlementIrr;

    /**
     * @var ?string $originalIrr The original internal rate of return before early settlement
     */
    #[JsonProperty('original_irr')]
    public ?string $originalIrr;

    /**
     * @var ?string $minimumFee The minimum fee applicable at early settlement
     */
    #[JsonProperty('minimum_fee')]
    public ?string $minimumFee;

    /**
     * @param array{
     *   loanId: string,
     *   settlementDate: DateTime,
     *   settlementAmount: string,
     *   settlementIrr: string,
     *   originalIrr?: ?string,
     *   minimumFee?: ?string,
     * } $values
     */
    public function __construct(
        array $values,
    ) {
        $this->loanId = $values['loanId'];
        $this->settlementDate = $values['settlementDate'];
        $this->settlementAmount = $values['settlementAmount'];
        $this->settlementIrr = $values['settlementIrr'];
        $this->originalIrr = $values['originalIrr'] ?? null;
        $this->minimumFee = $values['minimumFee'] ?? null;
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        return $this->toJson();
    }
}
