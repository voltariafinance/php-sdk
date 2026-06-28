<?php

namespace Voltaria\Types;

use Voltaria\Core\Json\JsonSerializableType;
use Voltaria\Core\Json\JsonProperty;
use DateTime;
use Voltaria\Core\Types\Date;
use Voltaria\Core\Types\ArrayType;

class LoanResponseWithClientInfo extends JsonSerializableType
{
    /**
     * @var string $id The ID of the loan
     */
    #[JsonProperty('id')]
    public string $id;

    /**
     * @var DateTime $createdAt The creation date of the loan
     */
    #[JsonProperty('created_at'), Date(Date::TYPE_DATETIME)]
    public DateTime $createdAt;

    /**
     * @var DateTime $updatedAt The last update date of the loan
     */
    #[JsonProperty('updated_at'), Date(Date::TYPE_DATETIME)]
    public DateTime $updatedAt;

    /**
     * @var string $partnerId The ID of the partner
     */
    #[JsonProperty('partner_id')]
    public string $partnerId;

    /**
     * @var string $clientId The ID of the client
     */
    #[JsonProperty('client_id')]
    public string $clientId;

    /**
     * @var value-of<CurrencyEnum> $currency The currency of the loan
     */
    #[JsonProperty('currency')]
    public string $currency;

    /**
     * @var string $amount The amount of the loan
     */
    #[JsonProperty('amount')]
    public string $amount;

    /**
     * @var value-of<LoanStatusEnum> $status The status of the loan
     */
    #[JsonProperty('status')]
    public string $status;

    /**
     * @var ?string $irr The internal rate of return
     */
    #[JsonProperty('irr')]
    public ?string $irr;

    /**
     * @var ?DateTime $loanDate The date of the loan
     */
    #[JsonProperty('loan_date'), Date(Date::TYPE_DATE)]
    public ?DateTime $loanDate;

    /**
     * @var string $currencyRate The currency rate conversion to EUR at the time of the loan
     */
    #[JsonProperty('currency_rate')]
    public string $currencyRate;

    /**
     * @var ?string $correlationId The correlation ID provided at the creation of the loan
     */
    #[JsonProperty('correlation_id')]
    public ?string $correlationId;

    /**
     * @var ?value-of<LoanPaymentStatusEnum> $paymentStatus The payment status of the loan
     */
    #[JsonProperty('payment_status')]
    public ?string $paymentStatus;

    /**
     * @var ?string $paymentReference The payment reference for the loan
     */
    #[JsonProperty('payment_reference')]
    public ?string $paymentReference;

    /**
     * @var ?DateTime $earlySettlementDate The date of early settlement if the loan was settled early
     */
    #[JsonProperty('early_settlement_date'), Date(Date::TYPE_DATE)]
    public ?DateTime $earlySettlementDate;

    /**
     * @var ?string $earlySettlementAmount The settlement amount at early settlement if applicable
     */
    #[JsonProperty('early_settlement_amount')]
    public ?string $earlySettlementAmount;

    /**
     * @var ?array<string, mixed> $data Additional data related to the loan
     */
    #[JsonProperty('data'), ArrayType(['string' => 'mixed'])]
    public ?array $data;

    /**
     * @var ClientBaseInfo $client The client details associated with the loan
     */
    #[JsonProperty('client')]
    public ClientBaseInfo $client;

    /**
     * @param array{
     *   id: string,
     *   createdAt: DateTime,
     *   updatedAt: DateTime,
     *   partnerId: string,
     *   clientId: string,
     *   currency: value-of<CurrencyEnum>,
     *   amount: string,
     *   status: value-of<LoanStatusEnum>,
     *   currencyRate: string,
     *   client: ClientBaseInfo,
     *   irr?: ?string,
     *   loanDate?: ?DateTime,
     *   correlationId?: ?string,
     *   paymentStatus?: ?value-of<LoanPaymentStatusEnum>,
     *   paymentReference?: ?string,
     *   earlySettlementDate?: ?DateTime,
     *   earlySettlementAmount?: ?string,
     *   data?: ?array<string, mixed>,
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
        $this->amount = $values['amount'];
        $this->status = $values['status'];
        $this->irr = $values['irr'] ?? null;
        $this->loanDate = $values['loanDate'] ?? null;
        $this->currencyRate = $values['currencyRate'];
        $this->correlationId = $values['correlationId'] ?? null;
        $this->paymentStatus = $values['paymentStatus'] ?? null;
        $this->paymentReference = $values['paymentReference'] ?? null;
        $this->earlySettlementDate = $values['earlySettlementDate'] ?? null;
        $this->earlySettlementAmount = $values['earlySettlementAmount'] ?? null;
        $this->data = $values['data'] ?? null;
        $this->client = $values['client'];
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        return $this->toJson();
    }
}
