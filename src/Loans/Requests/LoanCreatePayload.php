<?php

namespace Voltaria\Loans\Requests;

use Voltaria\Core\Json\JsonSerializableType;
use Voltaria\Core\Json\JsonProperty;
use Voltaria\Types\CurrencyEnum;
use Voltaria\Core\Types\Union;
use DateTime;
use Voltaria\Core\Types\Date;
use Voltaria\Types\LoanInstallmentCreatePayload;
use Voltaria\Core\Types\ArrayType;

class LoanCreatePayload extends JsonSerializableType
{
    /**
     * @var string $clientId The ID of the client for this loan
     */
    #[JsonProperty('client_id')]
    public string $clientId;

    /**
     * @var value-of<CurrencyEnum> $currency The currency of the loan, must be one of the supported currencies: eur, gbp, usd, czk, pln, isk
     */
    #[JsonProperty('currency')]
    public string $currency;

    /**
     * @var (
     *    float
     *   |string
     * ) $amount The amount of the loan
     */
    #[JsonProperty('amount'), Union('float', 'string')]
    public float|string $amount;

    /**
     * @var ?string $correlationId The correlation ID you provided at the creation of the loan
     */
    #[JsonProperty('correlation_id')]
    public ?string $correlationId;

    /**
     * @var ?DateTime $loanDate Please provide the loan_date if it differs from the loan creation time (created_at). Otherwise, it will be automatically set.
     */
    #[JsonProperty('loan_date'), Date(Date::TYPE_DATE)]
    public ?DateTime $loanDate;

    /**
     * @var array<LoanInstallmentCreatePayload> $installments List of installments for the loan, each with a due date and amount
     */
    #[JsonProperty('installments'), ArrayType([LoanInstallmentCreatePayload::class])]
    public array $installments;

    /**
     * @var ?array<string, mixed> $data Additional data related to the loan
     */
    #[JsonProperty('data'), ArrayType(['string' => 'mixed'])]
    public ?array $data;

    /**
     * @param array{
     *   clientId: string,
     *   currency: value-of<CurrencyEnum>,
     *   amount: (
     *    float
     *   |string
     * ),
     *   installments: array<LoanInstallmentCreatePayload>,
     *   correlationId?: ?string,
     *   loanDate?: ?DateTime,
     *   data?: ?array<string, mixed>,
     * } $values
     */
    public function __construct(
        array $values,
    ) {
        $this->clientId = $values['clientId'];
        $this->currency = $values['currency'];
        $this->amount = $values['amount'];
        $this->correlationId = $values['correlationId'] ?? null;
        $this->loanDate = $values['loanDate'] ?? null;
        $this->installments = $values['installments'];
        $this->data = $values['data'] ?? null;
    }
}
