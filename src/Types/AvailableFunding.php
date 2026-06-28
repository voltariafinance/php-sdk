<?php

namespace Voltaria\Types;

use Voltaria\Core\Json\JsonSerializableType;
use Voltaria\Core\Json\JsonProperty;

class AvailableFunding extends JsonSerializableType
{
    /**
     * @var value-of<CurrencyEnum> $currency Currency of the limit
     */
    #[JsonProperty('currency')]
    public string $currency;

    /**
     * @var string $limit
     */
    #[JsonProperty('limit')]
    public string $limit;

    /**
     * @var ?string $later
     */
    #[JsonProperty('later')]
    public ?string $later;

    /**
     * @var int $maxMaturityDays
     */
    #[JsonProperty('max_maturity_days')]
    public int $maxMaturityDays;

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
     * @param array{
     *   currency: value-of<CurrencyEnum>,
     *   limit: string,
     *   maxMaturityDays: int,
     *   rate: string,
     *   outstanding: string,
     *   available: string,
     *   later?: ?string,
     * } $values
     */
    public function __construct(
        array $values,
    ) {
        $this->currency = $values['currency'];
        $this->limit = $values['limit'];
        $this->later = $values['later'] ?? null;
        $this->maxMaturityDays = $values['maxMaturityDays'];
        $this->rate = $values['rate'];
        $this->outstanding = $values['outstanding'];
        $this->available = $values['available'];
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        return $this->toJson();
    }
}
