<?php

namespace Voltaria\Types;

use Voltaria\Core\Json\JsonSerializableType;
use Voltaria\Core\Json\JsonProperty;
use DateTime;
use Voltaria\Core\Types\Date;

class WaterfallResponse extends JsonSerializableType
{
    /**
     * @var string $id The ID of the waterfall
     */
    #[JsonProperty('id')]
    public string $id;

    /**
     * @var string $partnerId The partner ID
     */
    #[JsonProperty('partner_id')]
    public string $partnerId;

    /**
     * @var string $name The name of the waterfall
     */
    #[JsonProperty('name')]
    public string $name;

    /**
     * @var DateTime $date The date of the waterfall
     */
    #[JsonProperty('date'), Date(Date::TYPE_DATE)]
    public DateTime $date;

    /**
     * @var value-of<WaterfallStatusEnum> $status The status of the waterfall
     */
    #[JsonProperty('status')]
    public string $status;

    /**
     * @var ?string $cashBalance The cash balance associated with the waterfall
     */
    #[JsonProperty('cash_balance')]
    public ?string $cashBalance;

    /**
     * @var ?string $cashBalanceCurrency The currency of the cash balance
     */
    #[JsonProperty('cash_balance_currency')]
    public ?string $cashBalanceCurrency;

    /**
     * @var ?DateTime $cashBalanceDate The date of the cash balance
     */
    #[JsonProperty('cash_balance_date'), Date(Date::TYPE_DATE)]
    public ?DateTime $cashBalanceDate;

    /**
     * @var ?string $fileUrl The Presigned URL of the file. This is a temporary URL that allows you to download the file.
     */
    #[JsonProperty('file_url')]
    public ?string $fileUrl;

    /**
     * @var DateTime $createdAt The date and time when the waterfall was created
     */
    #[JsonProperty('created_at'), Date(Date::TYPE_DATETIME)]
    public DateTime $createdAt;

    /**
     * @var DateTime $updatedAt The date and time when the waterfall was last updated
     */
    #[JsonProperty('updated_at'), Date(Date::TYPE_DATETIME)]
    public DateTime $updatedAt;

    /**
     * @param array{
     *   id: string,
     *   partnerId: string,
     *   name: string,
     *   date: DateTime,
     *   status: value-of<WaterfallStatusEnum>,
     *   createdAt: DateTime,
     *   updatedAt: DateTime,
     *   cashBalance?: ?string,
     *   cashBalanceCurrency?: ?string,
     *   cashBalanceDate?: ?DateTime,
     *   fileUrl?: ?string,
     * } $values
     */
    public function __construct(
        array $values,
    ) {
        $this->id = $values['id'];
        $this->partnerId = $values['partnerId'];
        $this->name = $values['name'];
        $this->date = $values['date'];
        $this->status = $values['status'];
        $this->cashBalance = $values['cashBalance'] ?? null;
        $this->cashBalanceCurrency = $values['cashBalanceCurrency'] ?? null;
        $this->cashBalanceDate = $values['cashBalanceDate'] ?? null;
        $this->fileUrl = $values['fileUrl'] ?? null;
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
