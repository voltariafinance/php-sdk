<?php

namespace Voltaria\Types;

use Voltaria\Core\Json\JsonSerializableType;
use DateTime;
use Voltaria\Core\Json\JsonProperty;
use Voltaria\Core\Types\Date;

/**
 * One status change on a task: when it happened, what it moved from and to, and
 * who made it.
 */
class TaskPartnerStatusHistoryResponse extends JsonSerializableType
{
    /**
     * @var DateTime $createdAt When the status changed.
     */
    #[JsonProperty('created_at'), Date(Date::TYPE_DATETIME)]
    public DateTime $createdAt;

    /**
     * @var ?value-of<TaskStatusEnum> $oldStatus The status before the change.
     */
    #[JsonProperty('old_status')]
    public ?string $oldStatus;

    /**
     * @var value-of<TaskStatusEnum> $newStatus The status after the change.
     */
    #[JsonProperty('new_status')]
    public string $newStatus;

    /**
     * @var value-of<TaskPublicActorTypeEnum> $actorType Who made the change. One of the following: partner, support
     */
    #[JsonProperty('actor_type')]
    public string $actorType;

    /**
     * @param array{
     *   createdAt: DateTime,
     *   newStatus: value-of<TaskStatusEnum>,
     *   actorType: value-of<TaskPublicActorTypeEnum>,
     *   oldStatus?: ?value-of<TaskStatusEnum>,
     * } $values
     */
    public function __construct(
        array $values,
    ) {
        $this->createdAt = $values['createdAt'];
        $this->oldStatus = $values['oldStatus'] ?? null;
        $this->newStatus = $values['newStatus'];
        $this->actorType = $values['actorType'];
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        return $this->toJson();
    }
}
