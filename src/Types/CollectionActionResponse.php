<?php

namespace Voltaria\Types;

use Voltaria\Core\Json\JsonSerializableType;
use Voltaria\Core\Json\JsonProperty;

class CollectionActionResponse extends JsonSerializableType
{
    /**
     * @var string $id The ID of the collection action
     */
    #[JsonProperty('id')]
    public string $id;

    /**
     * @var string $name The name of the collection action
     */
    #[JsonProperty('name')]
    public string $name;

    /**
     * @var value-of<CollectionActionTypeEnum> $actionType The channel used for this action
     */
    #[JsonProperty('action_type')]
    public string $actionType;

    /**
     * @var bool $isActive Whether this action is currently active
     */
    #[JsonProperty('is_active')]
    public bool $isActive;

    /**
     * @var ?string $description A description of the collection action
     */
    #[JsonProperty('description')]
    public ?string $description;

    /**
     * @var string $timing Timing offset relative to the installment due date, e.g. 'd-5' (5 days before) or 'd+3' (3 days after)
     */
    #[JsonProperty('timing')]
    public string $timing;

    /**
     * @param array{
     *   id: string,
     *   name: string,
     *   actionType: value-of<CollectionActionTypeEnum>,
     *   isActive: bool,
     *   timing: string,
     *   description?: ?string,
     * } $values
     */
    public function __construct(
        array $values,
    ) {
        $this->id = $values['id'];
        $this->name = $values['name'];
        $this->actionType = $values['actionType'];
        $this->isActive = $values['isActive'];
        $this->description = $values['description'] ?? null;
        $this->timing = $values['timing'];
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        return $this->toJson();
    }
}
