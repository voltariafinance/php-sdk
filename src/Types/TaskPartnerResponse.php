<?php

namespace Voltaria\Types;

use Voltaria\Core\Json\JsonSerializableType;
use Voltaria\Core\Json\JsonProperty;
use DateTime;
use Voltaria\Core\Types\Date;

/**
 * A task shared with your partner account.
 */
class TaskPartnerResponse extends JsonSerializableType
{
    /**
     * @var string $id The ID of the task.
     */
    #[JsonProperty('id')]
    public string $id;

    /**
     * @var string $title Short title of the task.
     */
    #[JsonProperty('title')]
    public string $title;

    /**
     * @var ?string $description Longer description of what needs to be done.
     */
    #[JsonProperty('description')]
    public ?string $description;

    /**
     * @var value-of<TaskStatusEnum> $status The status of the task. One of the following: active, in_progress, blocked, review_needed, done, cancelled
     */
    #[JsonProperty('status')]
    public string $status;

    /**
     * @var ?value-of<TaskPriorityEnum> $priority Task priority. One of the following: low, medium, high, urgent
     */
    #[JsonProperty('priority')]
    public ?string $priority;

    /**
     * @var ?string $assigneeId The user on your team this task is assigned to. Null when nobody on your team has it — either it is unassigned, or Voltaria is handling it.
     */
    #[JsonProperty('assignee_id')]
    public ?string $assigneeId;

    /**
     * @var ?DateTime $dueAt When the task is due.
     */
    #[JsonProperty('due_at'), Date(Date::TYPE_DATETIME)]
    public ?DateTime $dueAt;

    /**
     * @var ?DateTime $completedAt When the task was completed.
     */
    #[JsonProperty('completed_at'), Date(Date::TYPE_DATETIME)]
    public ?DateTime $completedAt;

    /**
     * @var DateTime $createdAt When the task was created.
     */
    #[JsonProperty('created_at'), Date(Date::TYPE_DATETIME)]
    public DateTime $createdAt;

    /**
     * @var DateTime $updatedAt When the task was last updated.
     */
    #[JsonProperty('updated_at'), Date(Date::TYPE_DATETIME)]
    public DateTime $updatedAt;

    /**
     * @var ?string $partnerId Your partner account the task belongs to.
     */
    #[JsonProperty('partner_id')]
    public ?string $partnerId;

    /**
     * @var ?string $clientId Client this task relates to.
     */
    #[JsonProperty('client_id')]
    public ?string $clientId;

    /**
     * @var ?string $loanId Loan this task relates to.
     */
    #[JsonProperty('loan_id')]
    public ?string $loanId;

    /**
     * @var ?string $installmentId Installment this task relates to.
     */
    #[JsonProperty('installment_id')]
    public ?string $installmentId;

    /**
     * @var ?string $waterfallId Waterfall this task relates to.
     */
    #[JsonProperty('waterfall_id')]
    public ?string $waterfallId;

    /**
     * @param array{
     *   id: string,
     *   title: string,
     *   status: value-of<TaskStatusEnum>,
     *   createdAt: DateTime,
     *   updatedAt: DateTime,
     *   description?: ?string,
     *   priority?: ?value-of<TaskPriorityEnum>,
     *   assigneeId?: ?string,
     *   dueAt?: ?DateTime,
     *   completedAt?: ?DateTime,
     *   partnerId?: ?string,
     *   clientId?: ?string,
     *   loanId?: ?string,
     *   installmentId?: ?string,
     *   waterfallId?: ?string,
     * } $values
     */
    public function __construct(
        array $values,
    ) {
        $this->id = $values['id'];
        $this->title = $values['title'];
        $this->description = $values['description'] ?? null;
        $this->status = $values['status'];
        $this->priority = $values['priority'] ?? null;
        $this->assigneeId = $values['assigneeId'] ?? null;
        $this->dueAt = $values['dueAt'] ?? null;
        $this->completedAt = $values['completedAt'] ?? null;
        $this->createdAt = $values['createdAt'];
        $this->updatedAt = $values['updatedAt'];
        $this->partnerId = $values['partnerId'] ?? null;
        $this->clientId = $values['clientId'] ?? null;
        $this->loanId = $values['loanId'] ?? null;
        $this->installmentId = $values['installmentId'] ?? null;
        $this->waterfallId = $values['waterfallId'] ?? null;
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        return $this->toJson();
    }
}
