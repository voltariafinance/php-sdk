<?php

namespace Voltaria\Types;

use Voltaria\Core\Json\JsonSerializableType;
use Voltaria\Core\Json\JsonProperty;
use Voltaria\Core\Types\ArrayType;

class HttpValidationError extends JsonSerializableType
{
    /**
     * @var ?array<ValidationError> $detail
     */
    #[JsonProperty('detail'), ArrayType([ValidationError::class])]
    public ?array $detail;

    /**
     * @param array{
     *   detail?: ?array<ValidationError>,
     * } $values
     */
    public function __construct(
        array $values = [],
    ) {
        $this->detail = $values['detail'] ?? null;
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        return $this->toJson();
    }
}
