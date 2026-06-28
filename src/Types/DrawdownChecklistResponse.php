<?php

namespace Voltaria\Types;

use Voltaria\Core\Json\JsonSerializableType;
use Voltaria\Core\Json\JsonProperty;
use DateTime;
use Voltaria\Core\Types\Date;

class DrawdownChecklistResponse extends JsonSerializableType
{
    /**
     * @var string $id The unique identifier of the drawdown checklist item.
     */
    #[JsonProperty('id')]
    public string $id;

    /**
     * @var DateTime $createdAt The creation timestamp of the checklist item.
     */
    #[JsonProperty('created_at'), Date(Date::TYPE_DATETIME)]
    public DateTime $createdAt;

    /**
     * @var DateTime $updatedAt The last update timestamp of the checklist item.
     */
    #[JsonProperty('updated_at'), Date(Date::TYPE_DATETIME)]
    public DateTime $updatedAt;

    /**
     * @var string $drawdownId The ID of the associated drawdown.
     */
    #[JsonProperty('drawdown_id')]
    public string $drawdownId;

    /**
     * @var string $name The name of the checklist item.
     */
    #[JsonProperty('name')]
    public string $name;

    /**
     * @var ?string $description A detailed description of the checklist item.
     */
    #[JsonProperty('description')]
    public ?string $description;

    /**
     * @var int $priority The priority level of the checklist item.
     */
    #[JsonProperty('priority')]
    public int $priority;

    /**
     * @var bool $isChecked Indicates whether the checklist item has been completed.
     */
    #[JsonProperty('is_checked')]
    public bool $isChecked;

    /**
     * @param array{
     *   id: string,
     *   createdAt: DateTime,
     *   updatedAt: DateTime,
     *   drawdownId: string,
     *   name: string,
     *   priority: int,
     *   isChecked: bool,
     *   description?: ?string,
     * } $values
     */
    public function __construct(
        array $values,
    ) {
        $this->id = $values['id'];
        $this->createdAt = $values['createdAt'];
        $this->updatedAt = $values['updatedAt'];
        $this->drawdownId = $values['drawdownId'];
        $this->name = $values['name'];
        $this->description = $values['description'] ?? null;
        $this->priority = $values['priority'];
        $this->isChecked = $values['isChecked'];
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        return $this->toJson();
    }
}
