<?php

namespace Voltaria\Tests\Core\Json;

use PHPUnit\Framework\TestCase;
use Voltaria\Core\Json\JsonEncoder;
use Voltaria\Core\Json\JsonSerializableType;
use Voltaria\Core\Json\JsonProperty;

class Invalid extends JsonSerializableType
{
    /**
     * @var int $integerProperty
     */
    #[JsonProperty('integer_property')]
    public int $integerProperty;

    /**
     * @param array{
     *   integerProperty: int,
     * } $values
     */
    public function __construct(
        array $values,
    ) {
        $this->integerProperty = $values['integerProperty'];
    }
}

class InvalidTest extends TestCase
{
    public function testInvalidJsonThrowsException(): void
    {
        $this->expectException(\TypeError::class);
        $json = JsonEncoder::encode(
            [
                'integer_property' => 'not_an_integer'
            ],
        );
        Invalid::fromJson($json);
    }
}
