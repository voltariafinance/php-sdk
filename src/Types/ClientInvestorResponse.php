<?php

namespace Voltaria\Types;

use Voltaria\Core\Json\JsonSerializableType;
use Voltaria\Core\Json\JsonProperty;
use DateTime;
use Voltaria\Core\Types\Date;

class ClientInvestorResponse extends JsonSerializableType
{
    /**
     * @var string $id The ID of the client
     */
    #[JsonProperty('id')]
    public string $id;

    /**
     * @var DateTime $createdAt The creation date of the client
     */
    #[JsonProperty('created_at'), Date(Date::TYPE_DATETIME)]
    public DateTime $createdAt;

    /**
     * @var DateTime $updatedAt The last update date of the client
     */
    #[JsonProperty('updated_at'), Date(Date::TYPE_DATETIME)]
    public DateTime $updatedAt;

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
     *   id: string,
     *   createdAt: DateTime,
     *   updatedAt: DateTime,
     *   name: string,
     *   type: value-of<ClientTypeEnum>,
     *   jurisdiction: value-of<JurisdictionEnum>,
     *   status: value-of<ClientStatusEnum>,
     *   correlationId?: ?string,
     *   companyNumber?: ?string,
     * } $values
     */
    public function __construct(
        array $values,
    ) {
        $this->id = $values['id'];
        $this->createdAt = $values['createdAt'];
        $this->updatedAt = $values['updatedAt'];
        $this->correlationId = $values['correlationId'] ?? null;
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
