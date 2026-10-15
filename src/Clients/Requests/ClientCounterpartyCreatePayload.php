<?php

namespace Voltaria\Clients\Requests;

use Voltaria\Core\Json\JsonSerializableType;
use Voltaria\Core\Json\JsonProperty;

class ClientCounterpartyCreatePayload extends JsonSerializableType
{
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
     * @var ?string $notes Free-text notes about the counterparty
     */
    #[JsonProperty('notes')]
    public ?string $notes;

    /**
     * @param array{
     *   name: string,
     *   country?: ?string,
     *   companyNumber?: ?string,
     *   notes?: ?string,
     * } $values
     */
    public function __construct(
        array $values,
    ) {
        $this->name = $values['name'];
        $this->country = $values['country'] ?? null;
        $this->companyNumber = $values['companyNumber'] ?? null;
        $this->notes = $values['notes'] ?? null;
    }
}
