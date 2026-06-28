<?php

namespace Voltaria\Types;

use Voltaria\Core\Json\JsonSerializableType;
use Voltaria\Core\Json\JsonProperty;
use Voltaria\Core\Types\ArrayType;
use Voltaria\Core\Types\Union;

class ValidationError extends JsonSerializableType
{
    /**
     * @var array<(
     *    string
     *   |int
     * )> $loc
     */
    #[JsonProperty('loc'), ArrayType([new Union('string', 'integer')])]
    public array $loc;

    /**
     * @var string $msg
     */
    #[JsonProperty('msg')]
    public string $msg;

    /**
     * @var string $type
     */
    #[JsonProperty('type')]
    public string $type;

    /**
     * @var mixed $input
     */
    #[JsonProperty('input')]
    public mixed $input;

    /**
     * @var ?array<string, mixed> $ctx
     */
    #[JsonProperty('ctx'), ArrayType(['string' => 'mixed'])]
    public ?array $ctx;

    /**
     * @param array{
     *   loc: array<(
     *    string
     *   |int
     * )>,
     *   msg: string,
     *   type: string,
     *   input?: mixed,
     *   ctx?: ?array<string, mixed>,
     * } $values
     */
    public function __construct(
        array $values,
    ) {
        $this->loc = $values['loc'];
        $this->msg = $values['msg'];
        $this->type = $values['type'];
        $this->input = $values['input'] ?? null;
        $this->ctx = $values['ctx'] ?? null;
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        return $this->toJson();
    }
}
