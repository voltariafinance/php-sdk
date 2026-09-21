<?php

namespace Voltaria\Tasks\Requests;

use Voltaria\Core\Json\JsonSerializableType;
use Voltaria\Tasks\Types\TaskPartnerStatusUpdatePayloadStatus;
use Voltaria\Core\Json\JsonProperty;

class TaskPartnerStatusUpdatePayload extends JsonSerializableType
{
    /**
     * @var value-of<TaskPartnerStatusUpdatePayloadStatus> $status The new status of the task. One of the following: active, in_progress, blocked, done. You can move a task to any of these at any time, so one closed by mistake can be reopened. Every change is kept in the task's status history.
     */
    #[JsonProperty('status')]
    public string $status;

    /**
     * @param array{
     *   status: value-of<TaskPartnerStatusUpdatePayloadStatus>,
     * } $values
     */
    public function __construct(
        array $values,
    ) {
        $this->status = $values['status'];
    }
}
