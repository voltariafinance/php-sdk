<?php

namespace Voltaria\Repayments\Requests;

use Voltaria\Core\Json\JsonSerializableType;
use Voltaria\Types\BulkRepaymentItemPayload;
use Voltaria\Core\Json\JsonProperty;
use Voltaria\Core\Types\ArrayType;

class BulkRepaymentCreatePayload extends JsonSerializableType
{
    /**
     * @var array<BulkRepaymentItemPayload> $repayments List of repayments to create (max 10000)
     */
    #[JsonProperty('repayments'), ArrayType([BulkRepaymentItemPayload::class])]
    public array $repayments;

    /**
     * @param array{
     *   repayments: array<BulkRepaymentItemPayload>,
     * } $values
     */
    public function __construct(
        array $values,
    ) {
        $this->repayments = $values['repayments'];
    }
}
