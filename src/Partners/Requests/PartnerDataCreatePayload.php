<?php

namespace Voltaria\Partners\Requests;

use Voltaria\Core\Json\JsonSerializableType;
use Voltaria\Core\Json\JsonProperty;
use Voltaria\Core\Types\ArrayType;

class PartnerDataCreatePayload extends JsonSerializableType
{
    /**
     * @var array<string, mixed> $data
     */
    #[JsonProperty('data'), ArrayType(['string' => 'mixed'])]
    public array $data;

    /**
     * @param array{
     *   data: array<string, mixed>,
     * } $values
     */
    public function __construct(
        array $values,
    ) {
        $this->data = $values['data'];
    }
}
