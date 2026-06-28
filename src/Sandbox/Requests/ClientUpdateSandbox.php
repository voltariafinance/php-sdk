<?php

namespace Voltaria\Sandbox\Requests;

use Voltaria\Core\Json\JsonSerializableType;
use Voltaria\Types\ClientStatusEnum;
use Voltaria\Core\Json\JsonProperty;
use Voltaria\Core\Types\Union;

class ClientUpdateSandbox extends JsonSerializableType
{
    /**
     * @var ?value-of<ClientStatusEnum> $status The status of the client. One of the following: `active, rejected, deactivated, pending, pending_onboarding, pre_approved, deleted, inactive`
     */
    #[JsonProperty('status')]
    public ?string $status;

    /**
     * @var (
     *    float
     *   |string
     * )|null $limit The limit to set for the client. This will override the existing limit.
     */
    #[JsonProperty('limit'), Union('float', 'string', 'null')]
    public float|string|null $limit;

    /**
     * @param array{
     *   status?: ?value-of<ClientStatusEnum>,
     *   limit?: (
     *    float
     *   |string
     * )|null,
     * } $values
     */
    public function __construct(
        array $values = [],
    ) {
        $this->status = $values['status'] ?? null;
        $this->limit = $values['limit'] ?? null;
    }
}
