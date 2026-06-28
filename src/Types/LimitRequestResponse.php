<?php

namespace Voltaria\Types;

use Voltaria\Core\Json\JsonSerializableType;
use Voltaria\Core\Json\JsonProperty;
use DateTime;
use Voltaria\Core\Types\Date;

class LimitRequestResponse extends JsonSerializableType
{
    /**
     * @var string $id The ID of the limit request
     */
    #[JsonProperty('id')]
    public string $id;

    /**
     * @var string $clientId The ID of the client associated with the limit request
     */
    #[JsonProperty('client_id')]
    public string $clientId;

    /**
     * @var value-of<LimitRequestStatusEnum> $status The status of the limit request. One of the following: pending, approved, rejected
     */
    #[JsonProperty('status')]
    public string $status;

    /**
     * @var string $requestedLimit The requested limit amount
     */
    #[JsonProperty('requested_limit')]
    public string $requestedLimit;

    /**
     * @var string $reason The reason for the limit request
     */
    #[JsonProperty('reason')]
    public string $reason;

    /**
     * @var ?string $response The response to the limit request
     */
    #[JsonProperty('response')]
    public ?string $response;

    /**
     * @var ?string $waiverId The ID of the waiver associated with this limit request
     */
    #[JsonProperty('waiver_id')]
    public ?string $waiverId;

    /**
     * @var DateTime $createdAt The timestamp when the limit request was created
     */
    #[JsonProperty('created_at'), Date(Date::TYPE_DATETIME)]
    public DateTime $createdAt;

    /**
     * @param array{
     *   id: string,
     *   clientId: string,
     *   status: value-of<LimitRequestStatusEnum>,
     *   requestedLimit: string,
     *   reason: string,
     *   createdAt: DateTime,
     *   response?: ?string,
     *   waiverId?: ?string,
     * } $values
     */
    public function __construct(
        array $values,
    ) {
        $this->id = $values['id'];
        $this->clientId = $values['clientId'];
        $this->status = $values['status'];
        $this->requestedLimit = $values['requestedLimit'];
        $this->reason = $values['reason'];
        $this->response = $values['response'] ?? null;
        $this->waiverId = $values['waiverId'] ?? null;
        $this->createdAt = $values['createdAt'];
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        return $this->toJson();
    }
}
