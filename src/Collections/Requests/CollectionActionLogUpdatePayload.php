<?php

namespace Voltaria\Collections\Requests;

use Voltaria\Core\Json\JsonSerializableType;
use Voltaria\Collections\Types\CollectionActionLogUpdatePayloadStatus;
use Voltaria\Core\Json\JsonProperty;

class CollectionActionLogUpdatePayload extends JsonSerializableType
{
    /**
     * @var value-of<CollectionActionLogUpdatePayloadStatus> $status The updated status of the action: 'completed' or 'failed'
     */
    #[JsonProperty('status')]
    public string $status;

    /**
     * @var ?string $notes Notes about this action
     */
    #[JsonProperty('notes')]
    public ?string $notes;

    /**
     * @param array{
     *   status: value-of<CollectionActionLogUpdatePayloadStatus>,
     *   notes?: ?string,
     * } $values
     */
    public function __construct(
        array $values,
    ) {
        $this->status = $values['status'];
        $this->notes = $values['notes'] ?? null;
    }
}
