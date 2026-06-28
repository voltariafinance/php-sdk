<?php

namespace Voltaria\Types;

use Voltaria\Core\Json\JsonSerializableType;
use Voltaria\Core\Json\JsonProperty;
use DateTime;
use Voltaria\Core\Types\Date;

class DrawdownResponse extends JsonSerializableType
{
    /**
     * @var string $id The unique identifier of the drawdown.
     */
    #[JsonProperty('id')]
    public string $id;

    /**
     * @var DateTime $createdAt The creation timestamp of the drawdown.
     */
    #[JsonProperty('created_at'), Date(Date::TYPE_DATETIME)]
    public DateTime $createdAt;

    /**
     * @var DateTime $updatedAt The last update timestamp of the drawdown.
     */
    #[JsonProperty('updated_at'), Date(Date::TYPE_DATETIME)]
    public DateTime $updatedAt;

    /**
     * @var value-of<CurrencyEnum> $currency The currency of the drawdown.
     */
    #[JsonProperty('currency')]
    public string $currency;

    /**
     * @var string $amount The amount of the drawdown.
     */
    #[JsonProperty('amount')]
    public string $amount;

    /**
     * @var value-of<DrawdownStatusEnum> $status The status of the drawdown.
     */
    #[JsonProperty('status')]
    public string $status;

    /**
     * @var DateTime $drawdownDate The date of the drawdown.
     */
    #[JsonProperty('drawdown_date'), Date(Date::TYPE_DATETIME)]
    public DateTime $drawdownDate;

    /**
     * @param array{
     *   id: string,
     *   createdAt: DateTime,
     *   updatedAt: DateTime,
     *   currency: value-of<CurrencyEnum>,
     *   amount: string,
     *   status: value-of<DrawdownStatusEnum>,
     *   drawdownDate: DateTime,
     * } $values
     */
    public function __construct(
        array $values,
    ) {
        $this->id = $values['id'];
        $this->createdAt = $values['createdAt'];
        $this->updatedAt = $values['updatedAt'];
        $this->currency = $values['currency'];
        $this->amount = $values['amount'];
        $this->status = $values['status'];
        $this->drawdownDate = $values['drawdownDate'];
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        return $this->toJson();
    }
}
