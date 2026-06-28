<?php

namespace Voltaria\Installments\Requests;

use Voltaria\Core\Json\JsonSerializableType;
use Voltaria\Core\Json\JsonProperty;
use Voltaria\Types\LoanInstallmentCreatePayload;
use Voltaria\Core\Types\ArrayType;

class InstallmentCreatePayload extends JsonSerializableType
{
    /**
     * @var string $loanId The loan ID to add the installments to
     */
    #[JsonProperty('loan_id')]
    public string $loanId;

    /**
     * @var array<LoanInstallmentCreatePayload> $installments List of installments to add to the loan
     */
    #[JsonProperty('installments'), ArrayType([LoanInstallmentCreatePayload::class])]
    public array $installments;

    /**
     * @param array{
     *   loanId: string,
     *   installments: array<LoanInstallmentCreatePayload>,
     * } $values
     */
    public function __construct(
        array $values,
    ) {
        $this->loanId = $values['loanId'];
        $this->installments = $values['installments'];
    }
}
