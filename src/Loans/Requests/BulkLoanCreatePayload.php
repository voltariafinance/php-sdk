<?php

namespace Voltaria\Loans\Requests;

use Voltaria\Core\Json\JsonSerializableType;
use Voltaria\Types\BulkLoanItemPayload;
use Voltaria\Core\Json\JsonProperty;
use Voltaria\Core\Types\ArrayType;

class BulkLoanCreatePayload extends JsonSerializableType
{
    /**
     * @var array<BulkLoanItemPayload> $loans List of loans to create (max 1000)
     */
    #[JsonProperty('loans'), ArrayType([BulkLoanItemPayload::class])]
    public array $loans;

    /**
     * @param array{
     *   loans: array<BulkLoanItemPayload>,
     * } $values
     */
    public function __construct(
        array $values,
    ) {
        $this->loans = $values['loans'];
    }
}
