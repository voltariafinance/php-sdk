<?php

namespace Voltaria\Types;

use Voltaria\Core\Json\JsonSerializableType;
use Voltaria\Core\Json\JsonProperty;
use DateTime;
use Voltaria\Core\Types\Date;
use Voltaria\Core\Types\ArrayType;

class PartnerDataResponse extends JsonSerializableType
{
    /**
     * @var string $id The unique identifier for the partner data entry
     */
    #[JsonProperty('id')]
    public string $id;

    /**
     * @var DateTime $createdAt The timestamp when the partner data entry was created
     */
    #[JsonProperty('created_at'), Date(Date::TYPE_DATETIME)]
    public DateTime $createdAt;

    /**
     * @var ?array<string, mixed> $data The actual data associated with the partner
     */
    #[JsonProperty('data'), ArrayType(['string' => 'mixed'])]
    public ?array $data;

    /**
     * @param array{
     *   id: string,
     *   createdAt: DateTime,
     *   data?: ?array<string, mixed>,
     * } $values
     */
    public function __construct(
        array $values,
    ) {
        $this->id = $values['id'];
        $this->createdAt = $values['createdAt'];
        $this->data = $values['data'] ?? null;
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        return $this->toJson();
    }
}
