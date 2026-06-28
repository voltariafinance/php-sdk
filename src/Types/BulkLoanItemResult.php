<?php

namespace Voltaria\Types;

use Voltaria\Core\Json\JsonSerializableType;
use Voltaria\Core\Json\JsonProperty;

class BulkLoanItemResult extends JsonSerializableType
{
    /**
     * @var int $index Index of loan in original request
     */
    #[JsonProperty('index')]
    public int $index;

    /**
     * @var bool $success Whether loan was created successfully
     */
    #[JsonProperty('success')]
    public bool $success;

    /**
     * @var ?string $loanId ID of created loan if successful
     */
    #[JsonProperty('loan_id')]
    public ?string $loanId;

    /**
     * @var ?string $error Error message if creation failed
     */
    #[JsonProperty('error')]
    public ?string $error;

    /**
     * @var ?string $clientId ID of associated client
     */
    #[JsonProperty('client_id')]
    public ?string $clientId;

    /**
     * @var ?string $correlationId Correlation ID if provided
     */
    #[JsonProperty('correlation_id')]
    public ?string $correlationId;

    /**
     * @var ?string $amount Loan amount
     */
    #[JsonProperty('amount')]
    public ?string $amount;

    /**
     * @param array{
     *   index: int,
     *   success: bool,
     *   loanId?: ?string,
     *   error?: ?string,
     *   clientId?: ?string,
     *   correlationId?: ?string,
     *   amount?: ?string,
     * } $values
     */
    public function __construct(
        array $values,
    ) {
        $this->index = $values['index'];
        $this->success = $values['success'];
        $this->loanId = $values['loanId'] ?? null;
        $this->error = $values['error'] ?? null;
        $this->clientId = $values['clientId'] ?? null;
        $this->correlationId = $values['correlationId'] ?? null;
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
