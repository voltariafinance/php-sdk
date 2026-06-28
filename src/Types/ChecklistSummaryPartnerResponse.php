<?php

namespace Voltaria\Types;

use Voltaria\Core\Json\JsonSerializableType;
use Voltaria\Core\Json\JsonProperty;
use DateTime;
use Voltaria\Core\Types\Date;

class ChecklistSummaryPartnerResponse extends JsonSerializableType
{
    /**
     * @var string $id Unique checklist summary identifier.
     */
    #[JsonProperty('id')]
    public string $id;

    /**
     * @var DateTime $createdAt When the summary was generated.
     */
    #[JsonProperty('created_at'), Date(Date::TYPE_DATETIME)]
    public DateTime $createdAt;

    /**
     * @var value-of<ChecklistTypeEnum> $type Checklist type.
     */
    #[JsonProperty('type')]
    public string $type;

    /**
     * @var ?string $aiDescription AI-generated summary of the checklist.
     */
    #[JsonProperty('ai_description')]
    public ?string $aiDescription;

    /**
     * @var int $totalItems Total number of checklist items.
     */
    #[JsonProperty('total_items')]
    public int $totalItems;

    /**
     * @var int $completedItems Number of completed checklist items.
     */
    #[JsonProperty('completed_items')]
    public int $completedItems;

    /**
     * @param array{
     *   id: string,
     *   createdAt: DateTime,
     *   type: value-of<ChecklistTypeEnum>,
     *   totalItems: int,
     *   completedItems: int,
     *   aiDescription?: ?string,
     * } $values
     */
    public function __construct(
        array $values,
    ) {
        $this->id = $values['id'];
        $this->createdAt = $values['createdAt'];
        $this->type = $values['type'];
        $this->aiDescription = $values['aiDescription'] ?? null;
        $this->totalItems = $values['totalItems'];
        $this->completedItems = $values['completedItems'];
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        return $this->toJson();
    }
}
