<?php

namespace Voltaria\Types;

use Voltaria\Core\Json\JsonSerializableType;
use Voltaria\Core\Json\JsonProperty;
use DateTime;
use Voltaria\Core\Types\Date;

class WaiverResponse extends JsonSerializableType
{
    /**
     * @var string $id The ID of the waiver
     */
    #[JsonProperty('id')]
    public string $id;

    /**
     * @var string $clientId The ID of the client associated with the waiver
     */
    #[JsonProperty('client_id')]
    public string $clientId;

    /**
     * @var ?string $loanId The ID of the loan associated with the waiver
     */
    #[JsonProperty('loan_id')]
    public ?string $loanId;

    /**
     * @var ?string $limitRequestId The ID of the limit request associated with the waiver
     */
    #[JsonProperty('limit_request_id')]
    public ?string $limitRequestId;

    /**
     * @var value-of<WaiverStatusEnum> $status The status of the waiver. One of: pending, active, paid, rejected
     */
    #[JsonProperty('status')]
    public string $status;

    /**
     * @var DateTime $waiverDate The date of the waiver
     */
    #[JsonProperty('waiver_date'), Date(Date::TYPE_DATE)]
    public DateTime $waiverDate;

    /**
     * @var value-of<CurrencyEnum> $currency The currency of the waiver amount
     */
    #[JsonProperty('currency')]
    public string $currency;

    /**
     * @var string $amount The waiver amount
     */
    #[JsonProperty('amount')]
    public string $amount;

    /**
     * @var ?string $notes Additional notes about the waiver
     */
    #[JsonProperty('notes')]
    public ?string $notes;

    /**
     * @var DateTime $createdAt The timestamp when the waiver was created
     */
    #[JsonProperty('created_at'), Date(Date::TYPE_DATETIME)]
    public DateTime $createdAt;

    /**
     * @param array{
     *   id: string,
     *   clientId: string,
     *   status: value-of<WaiverStatusEnum>,
     *   waiverDate: DateTime,
     *   currency: value-of<CurrencyEnum>,
     *   amount: string,
     *   createdAt: DateTime,
     *   loanId?: ?string,
     *   limitRequestId?: ?string,
     *   notes?: ?string,
     * } $values
     */
    public function __construct(
        array $values,
    ) {
        $this->id = $values['id'];
        $this->clientId = $values['clientId'];
        $this->loanId = $values['loanId'] ?? null;
        $this->limitRequestId = $values['limitRequestId'] ?? null;
        $this->status = $values['status'];
        $this->waiverDate = $values['waiverDate'];
        $this->currency = $values['currency'];
        $this->amount = $values['amount'];
        $this->notes = $values['notes'] ?? null;
        $this->createdAt = $values['createdAt'];
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        return $this->toJson();
    }
}
