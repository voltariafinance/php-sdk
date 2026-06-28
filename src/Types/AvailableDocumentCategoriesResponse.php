<?php

namespace Voltaria\Types;

use Voltaria\Core\Json\JsonSerializableType;
use Voltaria\Core\Json\JsonProperty;
use Voltaria\Core\Types\ArrayType;

class AvailableDocumentCategoriesResponse extends JsonSerializableType
{
    /**
     * @var ?array<string> $categories Document categories available for upload.
     */
    #[JsonProperty('categories'), ArrayType(['string'])]
    public ?array $categories;

    /**
     * @param array{
     *   categories?: ?array<string>,
     * } $values
     */
    public function __construct(
        array $values = [],
    ) {
        $this->categories = $values['categories'] ?? null;
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        return $this->toJson();
    }
}
