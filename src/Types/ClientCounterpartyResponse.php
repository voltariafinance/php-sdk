<?php

namespace Voltaria\Types;

use Voltaria\Core\Json\JsonSerializableType;
use Voltaria\Core\Json\JsonProperty;
use DateTime;
use Voltaria\Core\Types\Date;

class ClientCounterpartyResponse extends JsonSerializableType
{
    /**
     * @var string $id The ID of the counterparty
     */
    #[JsonProperty('id')]
    public string $id;

    /**
     * @var string $name The counterparty's legal or trading name
     */
    #[JsonProperty('name')]
    public string $name;

    /**
     * @var ?string $country ISO 3166-1 alpha-2 code of the country the counterparty is registered in
     */
    #[JsonProperty('country')]
    public ?string $country;

    /**
     * @var ?string $companyNumber The counterparty's company registration number
     */
    #[JsonProperty('company_number')]
    public ?string $companyNumber;

    /**
     * @var value-of<ClientCounterpartyStatusEnum> $status The review status of the counterparty. One of: pending, active, inactive
     */
    #[JsonProperty('status')]
    public string $status;

    /**
     * @var DateTime $createdAt The date and time the counterparty was created
     */
    #[JsonProperty('created_at'), Date(Date::TYPE_DATETIME)]
    public DateTime $createdAt;

    /**
     * @var DateTime $updatedAt The date and time the counterparty was last updated
     */
    #[JsonProperty('updated_at'), Date(Date::TYPE_DATETIME)]
    public DateTime $updatedAt;

    /**
     * @var string $clientId The ID of the client the counterparty belongs to
     */
    #[JsonProperty('client_id')]
    public string $clientId;

    /**
     * @var ?string $notes Free-text notes about the counterparty
     */
    #[JsonProperty('notes')]
    public ?string $notes;

    /**
     * @param array{
     *   id: string,
     *   name: string,
     *   status: value-of<ClientCounterpartyStatusEnum>,
     *   createdAt: DateTime,
     *   updatedAt: DateTime,
     *   clientId: string,
     *   country?: ?string,
     *   companyNumber?: ?string,
     *   notes?: ?string,
     * } $values
     */
    public function __construct(
        array $values,
    ) {
        $this->id = $values['id'];
        $this->name = $values['name'];
        $this->country = $values['country'] ?? null;
        $this->companyNumber = $values['companyNumber'] ?? null;
        $this->status = $values['status'];
        $this->createdAt = $values['createdAt'];
        $this->updatedAt = $values['updatedAt'];
        $this->clientId = $values['clientId'];
        $this->notes = $values['notes'] ?? null;
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        return $this->toJson();
    }
}
