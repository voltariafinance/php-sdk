<?php

namespace Voltaria\Tasks\Requests;

use Voltaria\Core\Json\JsonSerializableType;
use Voltaria\Core\Json\JsonProperty;
use Voltaria\Types\TaskPriorityEnum;
use DateTime;
use Voltaria\Core\Types\Date;

class TaskPartnerCreatePayload extends JsonSerializableType
{
    /**
     * @var string $title Short title of the task.
     */
    #[JsonProperty('title')]
    public string $title;

    /**
     * @var ?string $description Optional longer description of what needs to be done.
     */
    #[JsonProperty('description')]
    public ?string $description;

    /**
     * @var ?value-of<TaskPriorityEnum> $priority Task priority. One of the following: low, medium, high, urgent
     */
    #[JsonProperty('priority')]
    public ?string $priority;

    /**
     * @var ?DateTime $dueAt Optional due date for the task.
     */
    #[JsonProperty('due_at'), Date(Date::TYPE_DATETIME)]
    public ?DateTime $dueAt;

    /**
     * @var ?string $clientId Client this task relates to. Must belong to your partner account.
     */
    #[JsonProperty('client_id')]
    public ?string $clientId;

    /**
     * @var ?string $loanId Loan this task relates to. Must belong to your partner account.
     */
    #[JsonProperty('loan_id')]
    public ?string $loanId;

    /**
     * @var ?string $installmentId Installment this task relates to. Must belong to your partner account.
     */
    #[JsonProperty('installment_id')]
    public ?string $installmentId;

    /**
     * @var ?string $waterfallId Waterfall this task relates to. Must belong to your partner account.
     */
    #[JsonProperty('waterfall_id')]
    public ?string $waterfallId;

    /**
     * @param array{
     *   title: string,
     *   description?: ?string,
     *   priority?: ?value-of<TaskPriorityEnum>,
     *   dueAt?: ?DateTime,
     *   clientId?: ?string,
     *   loanId?: ?string,
     *   installmentId?: ?string,
     *   waterfallId?: ?string,
     * } $values
     */
    public function __construct(
        array $values,
    ) {
        $this->title = $values['title'];
        $this->description = $values['description'] ?? null;
        $this->priority = $values['priority'] ?? null;
        $this->dueAt = $values['dueAt'] ?? null;
        $this->clientId = $values['clientId'] ?? null;
        $this->loanId = $values['loanId'] ?? null;
        $this->installmentId = $values['installmentId'] ?? null;
        $this->waterfallId = $values['waterfallId'] ?? null;
    }
}
