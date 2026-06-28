<?php

namespace Voltaria\Clients\Requests;

use Voltaria\Core\Json\JsonSerializableType;
use Voltaria\Core\Json\JsonProperty;
use Voltaria\Types\ClientTypeEnum;
use Voltaria\Types\JurisdictionEnum;
use Voltaria\Core\Types\ArrayType;

class ClientCreatePayload extends JsonSerializableType
{
    /**
     * @var ?string $correlationId The correlation ID you provided at the creation of the client
     */
    #[JsonProperty('correlation_id')]
    public ?string $correlationId;

    /**
     * @var string $name The name of the client
     */
    #[JsonProperty('name')]
    public string $name;

    /**
     * @var ?value-of<ClientTypeEnum> $type The type of the client, must be one of `individual`,`corporate`. Default is `corporate` if not provided.
     */
    #[JsonProperty('type')]
    public ?string $type;

    /**
     * @var value-of<JurisdictionEnum> $jurisdiction The jurisdiction of the client, must be one of `eu`, `us`, `uk`
     */
    #[JsonProperty('jurisdiction')]
    public string $jurisdiction;

    /**
     * @var ?string $companyNumber The company number of the client if type is `corporate`
     */
    #[JsonProperty('company_number')]
    public ?string $companyNumber;

    /**
     * @var ?array<string, mixed> $data Additional data associated with the client
     */
    #[JsonProperty('data'), ArrayType(['string' => 'mixed'])]
    public ?array $data;

    /**
     * @param array{
     *   name: string,
     *   jurisdiction: value-of<JurisdictionEnum>,
     *   correlationId?: ?string,
     *   type?: ?value-of<ClientTypeEnum>,
     *   companyNumber?: ?string,
     *   data?: ?array<string, mixed>,
     * } $values
     */
    public function __construct(
        array $values,
    ) {
        $this->correlationId = $values['correlationId'] ?? null;
        $this->name = $values['name'];
        $this->type = $values['type'] ?? null;
        $this->jurisdiction = $values['jurisdiction'];
        $this->companyNumber = $values['companyNumber'] ?? null;
        $this->data = $values['data'] ?? null;
    }
}
