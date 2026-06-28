<?php

namespace Voltaria\Types;

use Voltaria\Core\Json\JsonSerializableType;
use Voltaria\Core\Json\JsonProperty;
use DateTime;
use Voltaria\Core\Types\Date;
use Voltaria\Core\Types\ArrayType;

class RepaymentResponseWithClientInfo extends JsonSerializableType
{
    /**
     * @var string $id The ID of the repayment log
     */
    #[JsonProperty('id')]
    public string $id;

    /**
     * @var DateTime $createdAt The creation date of the repayment log
     */
    #[JsonProperty('created_at'), Date(Date::TYPE_DATETIME)]
    public DateTime $createdAt;

    /**
     * @var string $clientId The ID of the client who made the payment
     */
    #[JsonProperty('client_id')]
    public string $clientId;

    /**
     * @var string $loanId The ID of the loan for which the payment was made
     */
    #[JsonProperty('loan_id')]
    public string $loanId;

    /**
     * @var string $installmentId The ID of the installment for which the payment was made
     */
    #[JsonProperty('installment_id')]
    public string $installmentId;

    /**
     * @var string $amount The amount of payment made for installment
     */
    #[JsonProperty('amount')]
    public string $amount;

    /**
     * @var ?DateTime $repaymentDate The date of the payment made for installment
     */
    #[JsonProperty('repayment_date'), Date(Date::TYPE_DATETIME)]
    public ?DateTime $repaymentDate;

    /**
     * @var ?string $type The type of repayment sent in data field
     */
    #[JsonProperty('type')]
    public ?string $type;

    /**
     * @var ?array<string, mixed> $data Additional metadata related to the repayment
     */
    #[JsonProperty('data'), ArrayType(['string' => 'mixed'])]
    public ?array $data;

    /**
     * @var ?bool $isEarlySettlement Indicates if this repayment is for early settlement
     */
    #[JsonProperty('is_early_settlement')]
    public ?bool $isEarlySettlement;

    /**
     * @var ?string $principalAmount Principal portion of the repayment, when the partner provides a breakdown of the payment components
     */
    #[JsonProperty('principal_amount')]
    public ?string $principalAmount;

    /**
     * @var ?string $interestAmount Interest portion of the repayment, when the partner provides a breakdown of the payment components
     */
    #[JsonProperty('interest_amount')]
    public ?string $interestAmount;

    /**
     * @var ?string $lateFeeAmount Late fee portion of the repayment, when the partner provides a breakdown of the payment components
     */
    #[JsonProperty('late_fee_amount')]
    public ?string $lateFeeAmount;

    /**
     * @var ?ClientBaseInfo $client The client information associated with the repayment
     */
    #[JsonProperty('client')]
    public ?ClientBaseInfo $client;

    /**
     * @param array{
     *   id: string,
     *   createdAt: DateTime,
     *   clientId: string,
     *   loanId: string,
     *   installmentId: string,
     *   amount: string,
     *   repaymentDate?: ?DateTime,
     *   type?: ?string,
     *   data?: ?array<string, mixed>,
     *   isEarlySettlement?: ?bool,
     *   principalAmount?: ?string,
     *   interestAmount?: ?string,
     *   lateFeeAmount?: ?string,
     *   client?: ?ClientBaseInfo,
     * } $values
     */
    public function __construct(
        array $values,
    ) {
        $this->id = $values['id'];
        $this->createdAt = $values['createdAt'];
        $this->clientId = $values['clientId'];
        $this->loanId = $values['loanId'];
        $this->installmentId = $values['installmentId'];
        $this->amount = $values['amount'];
        $this->repaymentDate = $values['repaymentDate'] ?? null;
        $this->type = $values['type'] ?? null;
        $this->data = $values['data'] ?? null;
        $this->isEarlySettlement = $values['isEarlySettlement'] ?? null;
        $this->principalAmount = $values['principalAmount'] ?? null;
        $this->interestAmount = $values['interestAmount'] ?? null;
        $this->lateFeeAmount = $values['lateFeeAmount'] ?? null;
        $this->client = $values['client'] ?? null;
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        return $this->toJson();
    }
}
