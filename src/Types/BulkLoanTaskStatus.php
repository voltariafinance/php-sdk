<?php

namespace Voltaria\Types;

use Voltaria\Core\Json\JsonSerializableType;
use Voltaria\Core\Json\JsonProperty;

class BulkLoanTaskStatus extends JsonSerializableType
{
    /**
     * @var string $taskId Task ID
     */
    #[JsonProperty('task_id')]
    public string $taskId;

    /**
     * @var string $status Task status (PENDING, PROGRESS, SUCCESS, FAILURE)
     */
    #[JsonProperty('status')]
    public string $status;

    /**
     * @var ?int $current Current loan being processed
     */
    #[JsonProperty('current')]
    public ?int $current;

    /**
     * @var ?int $total Total loans to process
     */
    #[JsonProperty('total')]
    public ?int $total;

    /**
     * @var ?BulkLoanResult $result Final result if completed
     */
    #[JsonProperty('result')]
    public ?BulkLoanResult $result;

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
     *   result?: ?BulkLoanResult,
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
