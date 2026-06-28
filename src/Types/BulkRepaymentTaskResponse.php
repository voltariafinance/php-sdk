<?php

namespace Voltaria\Types;

use Voltaria\Core\Json\JsonSerializableType;
use Voltaria\Core\Json\JsonProperty;

class BulkRepaymentTaskResponse extends JsonSerializableType
{
    /**
     * @var string $taskId Task ID for tracking progress
     */
    #[JsonProperty('task_id')]
    public string $taskId;

    /**
     * @var int $totalRepayments Number of repayments to process
     */
    #[JsonProperty('total_repayments')]
    public int $totalRepayments;

    /**
     * @var string $estimatedCompletionTime Estimated completion time
     */
    #[JsonProperty('estimated_completion_time')]
    public string $estimatedCompletionTime;

    /**
     * @param array{
     *   taskId: string,
     *   totalRepayments: int,
     *   estimatedCompletionTime: string,
     * } $values
     */
    public function __construct(
        array $values,
    ) {
        $this->taskId = $values['taskId'];
        $this->totalRepayments = $values['totalRepayments'];
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
