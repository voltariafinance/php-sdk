<?php

namespace Voltaria\Types;

use Voltaria\Core\Json\JsonSerializableType;
use Voltaria\Core\Json\JsonProperty;

class ClientBaseInfo extends JsonSerializableType
{
    /**
     * @var string $name The name of the client
     */
    #[JsonProperty('name')]
    public string $name;

    /**
     * @var value-of<ClientTypeEnum> $type The type of the client, must be one of `individual`, `corporate`
     */
    #[JsonProperty('type')]
    public string $type;

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
     * @var value-of<ClientStatusEnum> $status The status of the client. One of the following: `active, rejected, deactivated, pending, pending_onboarding, pre_approved, deleted, inactive`
     */
    #[JsonProperty('status')]
    public string $status;

    /**
     * @param array{
     *   name: string,
     *   type: value-of<ClientTypeEnum>,
     *   jurisdiction: value-of<JurisdictionEnum>,
     *   status: value-of<ClientStatusEnum>,
     *   companyNumber?: ?string,
     * } $values
     */
    public function __construct(
        array $values,
    ) {
        $this->name = $values['name'];
        $this->type = $values['type'];
        $this->jurisdiction = $values['jurisdiction'];
        $this->companyNumber = $values['companyNumber'] ?? null;
        $this->status = $values['status'];
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        return $this->toJson();
    }
}
