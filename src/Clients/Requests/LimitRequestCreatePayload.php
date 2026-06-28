<?php

namespace Voltaria\Clients\Requests;

use Voltaria\Core\Json\JsonSerializableType;
use Voltaria\Core\Json\JsonProperty;
use Voltaria\Core\Types\Union;

class LimitRequestCreatePayload extends JsonSerializableType
{
    /**
     * @var string $clientId The ID of the client for which the limit request is being created
     */
    #[JsonProperty('client_id')]
    public string $clientId;

    /**
     * @var (
     *    float
     *   |string
     * ) $requestedLimit The requested credit limit amount
     */
    #[JsonProperty('requested_limit'), Union('float', 'string')]
    public float|string $requestedLimit;

    /**
     * @var string $reason The reason for the limit request
     */
    #[JsonProperty('reason')]
    public string $reason;

    /**
     * @var ?bool $waiverRequest Whether a special waiver is requested alongside this limit request
     */
    #[JsonProperty('waiver_request')]
    public ?bool $waiverRequest;

    /**
     * @param array{
     *   clientId: string,
     *   requestedLimit: (
     *    float
     *   |string
     * ),
     *   reason: string,
     *   waiverRequest?: ?bool,
     * } $values
     */
    public function __construct(
        array $values,
    ) {
        $this->clientId = $values['clientId'];
        $this->requestedLimit = $values['requestedLimit'];
        $this->reason = $values['reason'];
        $this->waiverRequest = $values['waiverRequest'] ?? null;
    }
}
