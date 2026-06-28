<?php

namespace Voltaria\Types;

use Voltaria\Core\Json\JsonSerializableType;
use Voltaria\Core\Json\JsonProperty;

class BulkLoanTaskResponse extends JsonSerializableType
{
    /**
     * @var string $taskId Task ID for tracking progress
     */
    #[JsonProperty('task_id')]
    public string $taskId;

    /**
     * @var int $totalLoans Number of loans to process
     */
    #[JsonProperty('total_loans')]
    public int $totalLoans;

    /**
     * @var string $estimatedCompletionTime Estimated completion time
     */
    #[JsonProperty('estimated_completion_time')]
    public string $estimatedCompletionTime;

    /**
     * @param array{
     *   taskId: string,
     *   totalLoans: int,
     *   estimatedCompletionTime: string,
     * } $values
     */
    public function __construct(
        array $values,
    ) {
        $this->taskId = $values['taskId'];
        $this->totalLoans = $values['totalLoans'];
        $this->estimatedCompletionTime = $values['estimatedCompletionTime'];
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        return $this->toJson();
    }
}
