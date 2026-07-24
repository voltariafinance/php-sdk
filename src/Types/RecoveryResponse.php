<?php

namespace Voltaria\Types;

use Voltaria\Core\Json\JsonSerializableType;
use Voltaria\Core\Json\JsonProperty;
use DateTime;
use Voltaria\Core\Types\Date;

class RecoveryResponse extends JsonSerializableType
{
    /**
     * @var string $id The ID of the recovery.
     */
    #[JsonProperty('id')]
    public string $id;

    /**
     * @var DateTime $createdAt When the recovery record was created.
     */
    #[JsonProperty('created_at'), Date(Date::TYPE_DATETIME)]
    public DateTime $createdAt;

    /**
     * @var DateTime $updatedAt When the recovery record was last updated.
     */
    #[JsonProperty('updated_at'), Date(Date::TYPE_DATETIME)]
    public DateTime $updatedAt;

    /**
     * @var string $partnerId The ID of the partner this recovery belongs to.
     */
    #[JsonProperty('partner_id')]
    public string $partnerId;

    /**
     * @var string $clientId The ID of the client this recovery is associated with.
     */
    #[JsonProperty('client_id')]
    public string $clientId;

    /**
     * @var string $loanId The ID of the loan this recovery is associated with.
     */
    #[JsonProperty('loan_id')]
    public string $loanId;

    /**
     * @var string $amount The amount recovered.
     */
    #[JsonProperty('amount')]
    public string $amount;

    /**
     * @var value-of<CurrencyEnum> $currency The currency of the recovered amount.
     */
    #[JsonProperty('currency')]
    public string $currency;

    /**
     * @var DateTime $recoveryDate The date the recovery was made.
     */
    #[JsonProperty('recovery_date'), Date(Date::TYPE_DATE)]
    public DateTime $recoveryDate;

    /**
     * @var ?string $notes Optional notes about the recovery.
     */
    #[JsonProperty('notes')]
    public ?string $notes;

    /**
     * @param array{
     *   id: string,
     *   createdAt: DateTime,
     *   updatedAt: DateTime,
     *   partnerId: string,
     *   clientId: string,
     *   loanId: string,
     *   amount: string,
     *   currency: value-of<CurrencyEnum>,
     *   recoveryDate: DateTime,
     *   notes?: ?string,
     * } $values
     */
    public function __construct(
        array $values,
    ) {
        $this->id = $values['id'];
        $this->createdAt = $values['createdAt'];
        $this->updatedAt = $values['updatedAt'];
        $this->partnerId = $values['partnerId'];
        $this->clientId = $values['clientId'];
        $this->loanId = $values['loanId'];
        $this->amount = $values['amount'];
        $this->currency = $values['currency'];
        $this->recoveryDate = $values['recoveryDate'];
        $this->notes = $values['notes'] ?? null;
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        return $this->toJson();
    }
}
