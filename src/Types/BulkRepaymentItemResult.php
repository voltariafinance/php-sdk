<?php

namespace Voltaria\Types;

use Voltaria\Core\Json\JsonSerializableType;
use Voltaria\Core\Json\JsonProperty;

class BulkRepaymentItemResult extends JsonSerializableType
{
    /**
     * @var int $index Index of the repayment in the original request
     */
    #[JsonProperty('index')]
    public int $index;

    /**
     * @var bool $success Whether the repayment was processed successfully
     */
    #[JsonProperty('success')]
    public bool $success;

    /**
     * @var ?string $repaymentLogId ID of the created repayment log if successful
     */
    #[JsonProperty('repayment_log_id')]
    public ?string $repaymentLogId;

    /**
     * @var ?string $error Error message if processing failed
     */
    #[JsonProperty('error')]
    public ?string $error;

    /**
     * @var ?string $installmentId ID of the associated installment
     */
    #[JsonProperty('installment_id')]
    public ?string $installmentId;

    /**
     * @var ?string $loanId ID of the associated loan
     */
    #[JsonProperty('loan_id')]
    public ?string $loanId;

    /**
     * @var ?string $amount Amount of the repayment
     */
    #[JsonProperty('amount')]
    public ?string $amount;

    /**
     * @param array{
     *   index: int,
     *   success: bool,
     *   repaymentLogId?: ?string,
     *   error?: ?string,
     *   installmentId?: ?string,
     *   loanId?: ?string,
     *   amount?: ?string,
     * } $values
     */
    public function __construct(
        array $values,
    ) {
        $this->index = $values['index'];
        $this->success = $values['success'];
        $this->repaymentLogId = $values['repaymentLogId'] ?? null;
        $this->error = $values['error'] ?? null;
        $this->installmentId = $values['installmentId'] ?? null;
        $this->loanId = $values['loanId'] ?? null;
        $this->amount = $values['amount'] ?? null;
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        return $this->toJson();
    }
}
