<?php

namespace Voltaria\Webhooks\Requests;

use Voltaria\Core\Json\JsonSerializableType;
use Voltaria\Core\Json\JsonProperty;
use Voltaria\Types\WebhookEventTypeEnum;
use Voltaria\Types\WebhookStatusEnum;

class WebhookCreatePayload extends JsonSerializableType
{
    /**
     * @var string $url The URL to send webhooks to
     */
    #[JsonProperty('url')]
    public string $url;

    /**
     * @var ?string $description Optional description of this webhook endpoint
     */
    #[JsonProperty('description')]
    public ?string $description;

    /**
     * @var value-of<WebhookEventTypeEnum> $eventType Event type to subscribe toPossible values: loan_updated, installment_updated, client_updated, client_limit_updated, partner_limit_updated
     */
    #[JsonProperty('event_type')]
    public string $eventType;

    /**
     * @var string $secret Secret for signing webhook payloads
     */
    #[JsonProperty('secret')]
    public string $secret;

    /**
     * @var ?bool $retry Whether to retry failed webhooks
     */
    #[JsonProperty('retry')]
    public ?bool $retry;

    /**
     * @var ?value-of<WebhookStatusEnum> $status Status of the webhook subscription. Defaults to 'active'.Possible values: active, paused, disabled
     */
    #[JsonProperty('status')]
    public ?string $status;

    /**
     * @param array{
     *   url: string,
     *   eventType: value-of<WebhookEventTypeEnum>,
     *   secret: string,
     *   description?: ?string,
     *   retry?: ?bool,
     *   status?: ?value-of<WebhookStatusEnum>,
     * } $values
     */
    public function __construct(
        array $values,
    ) {
        $this->url = $values['url'];
        $this->description = $values['description'] ?? null;
        $this->eventType = $values['eventType'];
        $this->secret = $values['secret'];
        $this->retry = $values['retry'] ?? null;
        $this->status = $values['status'] ?? null;
    }
}
