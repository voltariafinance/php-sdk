<?php

namespace Voltaria\Types;

use Voltaria\Core\Json\JsonSerializableType;
use Voltaria\Core\Json\JsonProperty;
use Voltaria\Core\Types\ArrayType;

class CurrencyFieldSpec extends JsonSerializableType
{
    /**
     * @var array<string> $required Fields that must be provided for this currency.
     */
    #[JsonProperty('required'), ArrayType(['string'])]
    public array $required;

    /**
     * @var ?array<string> $optional Fields that are accepted but not required.
     */
    #[JsonProperty('optional'), ArrayType(['string'])]
    public ?array $optional;

    /**
     * @param array{
     *   required: array<string>,
     *   optional?: ?array<string>,
     * } $values
     */
    public function __construct(
        array $values,
    ) {
        $this->required = $values['required'];
        $this->optional = $values['optional'] ?? null;
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        return $this->toJson();
    }
}
