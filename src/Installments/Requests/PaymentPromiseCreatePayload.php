<?php

namespace Voltaria\Installments\Requests;

use Voltaria\Core\Json\JsonSerializableType;
use Voltaria\Core\Json\JsonProperty;
use Voltaria\Core\Types\Union;
use DateTime;
use Voltaria\Core\Types\Date;

class PaymentPromiseCreatePayload extends JsonSerializableType
{
    /**
     * @var string $installmentId The ID of the installment this promise relates to
     */
    #[JsonProperty('installment_id')]
    public string $installmentId;

    /**
     * @var (
     *    float
     *   |string
     * ) $amount The amount the client has promised to pay (must be > 0)
     */
    #[JsonProperty('amount'), Union('float', 'string')]
    public float|string $amount;

    /**
     * @var DateTime $promisedDate The date the client has committed to pay by (today or future)
     */
    #[JsonProperty('promised_date'), Date(Date::TYPE_DATE)]
    public DateTime $promisedDate;

    /**
     * @var ?string $notes Optional notes captured during the collections interaction
     */
    #[JsonProperty('notes')]
    public ?string $notes;

    /**
     * @param array{
     *   installmentId: string,
     *   amount: (
     *    float
     *   |string
     * ),
     *   promisedDate: DateTime,
     *   notes?: ?string,
     * } $values
     */
    public function __construct(
        array $values,
    ) {
        $this->installmentId = $values['installmentId'];
        $this->amount = $values['amount'];
        $this->promisedDate = $values['promisedDate'];
        $this->notes = $values['notes'] ?? null;
    }
}
