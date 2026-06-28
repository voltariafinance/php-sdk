<?php

namespace Voltaria\Types;

use Voltaria\Core\Json\JsonSerializableType;
use Voltaria\Core\Json\JsonProperty;
use DateTime;
use Voltaria\Core\Types\Date;

class PaymentPromiseResponse extends JsonSerializableType
{
    /**
     * @var string $id The ID of the payment promise
     */
    #[JsonProperty('id')]
    public string $id;

    /**
     * @var DateTime $createdAt When the promise was created
     */
    #[JsonProperty('created_at'), Date(Date::TYPE_DATETIME)]
    public DateTime $createdAt;

    /**
     * @var DateTime $updatedAt When the promise was last updated
     */
    #[JsonProperty('updated_at'), Date(Date::TYPE_DATETIME)]
    public DateTime $updatedAt;

    /**
     * @var string $installmentId The ID of the installment this promise relates to
     */
    #[JsonProperty('installment_id')]
    public string $installmentId;

    /**
     * @var string $partnerId The ID of the partner the installment belongs to
     */
    #[JsonProperty('partner_id')]
    public string $partnerId;

    /**
     * @var string $clientId The ID of the client the installment belongs to
     */
    #[JsonProperty('client_id')]
    public string $clientId;

    /**
     * @var string $loanId The ID of the loan the installment belongs to
     */
    #[JsonProperty('loan_id')]
    public string $loanId;

    /**
     * @var string $amount The amount the client has promised to pay
     */
    #[JsonProperty('amount')]
    public string $amount;

    /**
     * @var DateTime $promisedDate The date the client has committed to pay by
     */
    #[JsonProperty('promised_date'), Date(Date::TYPE_DATE)]
    public DateTime $promisedDate;

    /**
     * @var value-of<PaymentPromiseStatusEnum> $status The status of the promise
     */
    #[JsonProperty('status')]
    public string $status;

    /**
     * @var ?string $notes Optional notes captured during the collections interaction
     */
    #[JsonProperty('notes')]
    public ?string $notes;

    /**
     * @param array{
     *   id: string,
     *   createdAt: DateTime,
     *   updatedAt: DateTime,
     *   installmentId: string,
     *   partnerId: string,
     *   clientId: string,
     *   loanId: string,
     *   amount: string,
     *   promisedDate: DateTime,
     *   status: value-of<PaymentPromiseStatusEnum>,
     *   notes?: ?string,
     * } $values
     */
    public function __construct(
        array $values,
    ) {
        $this->id = $values['id'];
        $this->createdAt = $values['createdAt'];
        $this->updatedAt = $values['updatedAt'];
        $this->installmentId = $values['installmentId'];
        $this->partnerId = $values['partnerId'];
        $this->clientId = $values['clientId'];
        $this->loanId = $values['loanId'];
        $this->amount = $values['amount'];
        $this->promisedDate = $values['promisedDate'];
        $this->status = $values['status'];
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
