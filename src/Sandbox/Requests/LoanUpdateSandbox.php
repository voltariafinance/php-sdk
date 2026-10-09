<?php

namespace Voltaria\Sandbox\Requests;

use Voltaria\Core\Json\JsonSerializableType;
use Voltaria\Types\LoanStatusEnum;
use Voltaria\Core\Json\JsonProperty;

class LoanUpdateSandbox extends JsonSerializableType
{
    /**
     * @var ?value-of<LoanStatusEnum> $status The status of the loan. One of the following: `pending, overdue, active, default, sold, restructured, repaid, pre_approved, rejected, inactive`. Use the delete loan endpoint to delete a loan.
     */
    #[JsonProperty('status')]
    public ?string $status;

    /**
     * @param array{
     *   status?: ?value-of<LoanStatusEnum>,
     * } $values
     */
    public function __construct(
        array $values = [],
    ) {
        $this->status = $values['status'] ?? null;
    }
}
