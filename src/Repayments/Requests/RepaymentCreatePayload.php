<?php

namespace Voltaria\Repayments\Requests;

use Voltaria\Core\Json\JsonSerializableType;
use Voltaria\Core\Json\JsonProperty;
use Voltaria\Core\Types\Union;
use DateTime;
use Voltaria\Core\Types\Date;
use Voltaria\Core\Types\ArrayType;

class RepaymentCreatePayload extends JsonSerializableType
{
    /**
     * @var ?string $installmentId ID of the installment
     */
    public ?string $installmentId;

    /**
     * @var ?string $loanId ID of the associated Loan
     */
    public ?string $loanId;

    /**
     * @var ?string $correlationId Correlation ID of associated loan
     */
    public ?string $correlationId;

    /**
     * @var (
     *    float
     *   |string
     * ) $amount The amount of payment made for installment
     */
    #[JsonProperty('amount'), Union('float', 'string')]
    public float|string $amount;

    /**
     * @var ?DateTime $repaymentDate Please provide the repayment_date if it differs from the time you log this repayment. Otherwise, it will be automatically set.
     */
    #[JsonProperty('repayment_date'), Date(Date::TYPE_DATETIME)]
    public ?DateTime $repaymentDate;

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
     * @param array{
     *   amount: (
     *    float
     *   |string
     * ),
     *   installmentId?: ?string,
     *   loanId?: ?string,
     *   correlationId?: ?string,
     *   repaymentDate?: ?DateTime,
     *   data?: ?array<string, mixed>,
     *   isEarlySettlement?: ?bool,
     * } $values
     */
    public function __construct(
        array $values,
    ) {
        $this->installmentId = $values['installmentId'] ?? null;
        $this->loanId = $values['loanId'] ?? null;
        $this->correlationId = $values['correlationId'] ?? null;
        $this->amount = $values['amount'];
        $this->repaymentDate = $values['repaymentDate'] ?? null;
        $this->data = $values['data'] ?? null;
        $this->isEarlySettlement = $values['isEarlySettlement'] ?? null;
    }
}
