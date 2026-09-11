<?php

namespace Voltaria\Loans\Requests;

use Voltaria\Core\Json\JsonSerializableType;
use DateTime;
use Voltaria\Core\Json\JsonProperty;
use Voltaria\Core\Types\Date;

class EarlySettlementPayload extends JsonSerializableType
{
    /**
     * @var ?DateTime $settlementDate Date the loan would be settled. Must be today or later. Defaults to today when omitted.
     */
    #[JsonProperty('settlement_date'), Date(Date::TYPE_DATE)]
    public ?DateTime $settlementDate;

    /**
     * @param array{
     *   settlementDate?: ?DateTime,
     * } $values
     */
    public function __construct(
        array $values = [],
    ) {
        $this->settlementDate = $values['settlementDate'] ?? null;
    }
}
