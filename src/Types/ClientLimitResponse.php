<?php

namespace Voltaria\Types;

use Voltaria\Core\Json\JsonSerializableType;
use Voltaria\Core\Json\JsonProperty;
use DateTime;
use Voltaria\Core\Types\Date;

class ClientLimitResponse extends JsonSerializableType
{
    /**
     * @var value-of<CurrencyEnum> $currency
     */
    #[JsonProperty('currency')]
    public string $currency;

    /**
     * @var int $maxMaturityDays
     */
    #[JsonProperty('max_maturity_days')]
    public int $maxMaturityDays;

    /**
     * @var string $limit
     */
    #[JsonProperty('limit')]
    public string $limit;

    /**
     * @var string $rate
     */
    #[JsonProperty('rate')]
    public string $rate;

    /**
     * @var string $outstanding
     */
    #[JsonProperty('outstanding')]
    public string $outstanding;

    /**
     * @var string $available
     */
    #[JsonProperty('available')]
    public string $available;

    /**
     * @var DateTime $createdAt
     */
    #[JsonProperty('created_at'), Date(Date::TYPE_DATETIME)]
    public DateTime $createdAt;

    /**
     * @var DateTime $updatedAt
     */
    #[JsonProperty('updated_at'), Date(Date::TYPE_DATETIME)]
    public DateTime $updatedAt;

    /**
     * @param array{
     *   currency: value-of<CurrencyEnum>,
     *   maxMaturityDays: int,
     *   limit: string,
     *   rate: string,
     *   outstanding: string,
     *   available: string,
     *   createdAt: DateTime,
     *   updatedAt: DateTime,
     * } $values
     */
    public function __construct(
        array $values,
    ) {
        $this->currency = $values['currency'];
        $this->maxMaturityDays = $values['maxMaturityDays'];
        $this->limit = $values['limit'];
        $this->rate = $values['rate'];
        $this->outstanding = $values['outstanding'];
        $this->available = $values['available'];
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
