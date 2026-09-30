<?php

namespace Voltaria\Types;

use Voltaria\Core\Json\JsonSerializableType;
use Voltaria\Core\Json\JsonProperty;
use DateTime;
use Voltaria\Core\Types\Date;

class ClientLimitHistoryResponse extends JsonSerializableType
{
    /**
     * @var string $id The unique identifier of the limit record
     */
    #[JsonProperty('id')]
    public string $id;

    /**
     * @var DateTime $createdAt When the limit was granted
     */
    #[JsonProperty('created_at'), Date(Date::TYPE_DATETIME)]
    public DateTime $createdAt;

    /**
     * @var value-of<CurrencyEnum> $currency The currency the limit is denominated in
     */
    #[JsonProperty('currency')]
    public string $currency;

    /**
     * @var string $limit The credit limit granted to the client
     */
    #[JsonProperty('limit')]
    public string $limit;

    /**
     * @param array{
     *   id: string,
     *   createdAt: DateTime,
     *   currency: value-of<CurrencyEnum>,
     *   limit: string,
     * } $values
     */
    public function __construct(
        array $values,
    ) {
        $this->id = $values['id'];
        $this->createdAt = $values['createdAt'];
        $this->currency = $values['currency'];
        $this->limit = $values['limit'];
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        return $this->toJson();
    }
}
