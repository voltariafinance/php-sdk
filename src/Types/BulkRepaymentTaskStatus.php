<?php

namespace Voltaria\Types;

use Voltaria\Core\Json\JsonSerializableType;
use Voltaria\Core\Json\JsonProperty;

class BulkRepaymentTaskStatus extends JsonSerializableType
{
    /**
     * @var string $taskId Task ID
     */
    #[JsonProperty('task_id')]
    public string $taskId;

    /**
     * @var string $status Task status
     */
    #[JsonProperty('status')]
    public string $status;

    /**
     * @var ?int $current Current progress count
     */
    #[JsonProperty('current')]
    public ?int $current;

    /**
     * @var ?int $total Total items to process
     */
    #[JsonProperty('total')]
    public ?int $total;

    /**
     * @var ?BulkRepaymentResult $result Final result when task is completed
     */
    #[JsonProperty('result')]
    public ?BulkRepaymentResult $result;

    /**
     * @var ?string $error Error message if task failed
     */
    #[JsonProperty('error')]
    public ?string $error;

    /**
     * @param array{
     *   taskId: string,
     *   status: string,
     *   current?: ?int,
     *   total?: ?int,
     *   result?: ?BulkRepaymentResult,
     *   error?: ?string,
     * } $values
     */
    public function __construct(
        array $values,
    ) {
        $this->taskId = $values['taskId'];
        $this->status = $values['status'];
        $this->current = $values['current'] ?? null;
        $this->total = $values['total'] ?? null;
        $this->result = $values['result'] ?? null;
        $this->error = $values['error'] ?? null;
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        return $this->toJson();
    }
}
