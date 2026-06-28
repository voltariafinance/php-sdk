<?php

namespace Voltaria\Types;

use Voltaria\Core\Json\JsonSerializableType;
use Voltaria\Core\Json\JsonProperty;
use DateTime;
use Voltaria\Core\Types\Date;

class InstallmentResponseWithClientInfo extends JsonSerializableType
{
    /**
     * @var string $id The ID of the installment
     */
    #[JsonProperty('id')]
    public string $id;

    /**
     * @var DateTime $createdAt The creation date of the installment
     */
    #[JsonProperty('created_at'), Date(Date::TYPE_DATETIME)]
    public DateTime $createdAt;

    /**
     * @var DateTime $updatedAt The last update date of the installment
     */
    #[JsonProperty('updated_at'), Date(Date::TYPE_DATETIME)]
    public DateTime $updatedAt;

    /**
     * @var string $partnerId The partner ID
     */
    #[JsonProperty('partner_id')]
    public string $partnerId;

    /**
     * @var string $clientId The client ID
     */
    #[JsonProperty('client_id')]
    public string $clientId;

    /**
     * @var value-of<CurrencyEnum> $currency The currency of the installment
     */
    #[JsonProperty('currency')]
    public string $currency;

    /**
     * @var value-of<InstallmentStatusEnum> $status The status of the installment (possible values: active, overdue, default, sold, restructured, repaid, pending)
     */
    #[JsonProperty('status')]
    public string $status;

    /**
     * @var string $loanId The associated loan ID
     */
    #[JsonProperty('loan_id')]
    public string $loanId;

    /**
     * @var string $amount The total amount of the installment
     */
    #[JsonProperty('amount')]
    public string $amount;

    /**
     * @var DateTime $expectedRepaymentAt The expected repayment date
     */
    #[JsonProperty('expected_repayment_at'), Date(Date::TYPE_DATETIME)]
    public DateTime $expectedRepaymentAt;

    /**
     * @var int $installmentNumber The installment number in sequence
     */
    #[JsonProperty('installment_number')]
    public int $installmentNumber;

    /**
     * @var int $installments The total number of installments
     */
    #[JsonProperty('installments')]
    public int $installments;

    /**
     * @var string $principal The principal amount of the installment
     */
    #[JsonProperty('principal')]
    public string $principal;

    /**
     * @var string $interest The interest amount of the installment
     */
    #[JsonProperty('interest')]
    public string $interest;

    /**
     * @var ?string $repaymentAmount The amount repaid so far for this installment
     */
    #[JsonProperty('repayment_amount')]
    public ?string $repaymentAmount;

    /**
     * @var ?DateTime $repaymentAt The actual repayment date
     */
    #[JsonProperty('repayment_at'), Date(Date::TYPE_DATETIME)]
    public ?DateTime $repaymentAt;

    /**
     * @var ?ClientBaseInfo $client The client details associated with the installment
     */
    #[JsonProperty('client')]
    public ?ClientBaseInfo $client;

    /**
     * @param array{
     *   id: string,
     *   createdAt: DateTime,
     *   updatedAt: DateTime,
     *   partnerId: string,
     *   clientId: string,
     *   currency: value-of<CurrencyEnum>,
     *   status: value-of<InstallmentStatusEnum>,
     *   loanId: string,
     *   amount: string,
     *   expectedRepaymentAt: DateTime,
     *   installmentNumber: int,
     *   installments: int,
     *   principal: string,
     *   interest: string,
     *   repaymentAmount?: ?string,
     *   repaymentAt?: ?DateTime,
     *   client?: ?ClientBaseInfo,
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
        $this->currency = $values['currency'];
        $this->status = $values['status'];
        $this->loanId = $values['loanId'];
        $this->amount = $values['amount'];
        $this->expectedRepaymentAt = $values['expectedRepaymentAt'];
        $this->installmentNumber = $values['installmentNumber'];
        $this->installments = $values['installments'];
        $this->principal = $values['principal'];
        $this->interest = $values['interest'];
        $this->repaymentAmount = $values['repaymentAmount'] ?? null;
        $this->repaymentAt = $values['repaymentAt'] ?? null;
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
