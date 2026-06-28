<?php

namespace Voltaria\Webhooks\Requests;

use Voltaria\Core\Json\JsonSerializableType;
use Voltaria\Core\Json\JsonProperty;
use Voltaria\Types\WebhookEventTypeEnum;
use Voltaria\Types\WebhookStatusEnum;

class WebhookUpdatePayload extends JsonSerializableType
{
    /**
     * @var ?string $url The URL to send webhooks to
     */
    #[JsonProperty('url')]
    public ?string $url;

    /**
     * @var ?string $description Description of this webhook endpoint
     */
    #[JsonProperty('description')]
    public ?string $description;

    /**
     * @var ?value-of<WebhookEventTypeEnum> $eventType Event type to subscribe toPossible values: loan_updated, installment_updated, client_updated, client_limit_updated, partner_limit_updated
     */
    #[JsonProperty('event_type')]
    public ?string $eventType;

    /**
     * @var ?value-of<WebhookStatusEnum> $status Status of the webhook subscriptionPossible values: active, paused, disabled
     */
    #[JsonProperty('status')]
    public ?string $status;

    /**
     * @var ?bool $retry Whether to retry failed webhooks
     */
    #[JsonProperty('retry')]
    public ?bool $retry;

    /**
     * @var ?string $secret Secret for signing webhook payloads
     */
    #[JsonProperty('secret')]
    public ?string $secret;

    /**
     * @param array{
     *   url?: ?string,
     *   description?: ?string,
     *   eventType?: ?value-of<WebhookEventTypeEnum>,
     *   status?: ?value-of<WebhookStatusEnum>,
     *   retry?: ?bool,
     *   secret?: ?string,
     * } $values
     */
    public function __construct(
        array $values = [],
    ) {
        $this->url = $values['url'] ?? null;
        $this->description = $values['description'] ?? null;
        $this->eventType = $values['eventType'] ?? null;
        $this->status = $values['status'] ?? null;
        $this->retry = $values['retry'] ?? null;
        $this->secret = $values['secret'] ?? null;
    }
}
