<?php

namespace Voltaria\Types;

use Voltaria\Core\Json\JsonSerializableType;
use Voltaria\Core\Json\JsonProperty;
use DateTime;
use Voltaria\Core\Types\Date;

class WebhookSubscriptionResponse extends JsonSerializableType
{
    /**
     * @var string $id The ID of the webhook subscription
     */
    #[JsonProperty('id')]
    public string $id;

    /**
     * @var string $url The URL to send webhooks to
     */
    #[JsonProperty('url')]
    public string $url;

    /**
     * @var ?string $description Description of this webhook endpoint
     */
    #[JsonProperty('description')]
    public ?string $description;

    /**
     * @var value-of<WebhookEventTypeEnum> $eventType Event type subscribed toPossible values: loan_updated, installment_updated, client_updated, client_limit_updated, partner_limit_updated
     */
    #[JsonProperty('event_type')]
    public string $eventType;

    /**
     * @var value-of<WebhookStatusEnum> $status Status of the webhook subscriptionPossible values: active, paused, disabled
     */
    #[JsonProperty('status')]
    public string $status;

    /**
     * @var bool $retry Whether to retry failed webhooks
     */
    #[JsonProperty('retry')]
    public bool $retry;

    /**
     * @var string $secret Secret for signing webhook payloads
     */
    #[JsonProperty('secret')]
    public string $secret;

    /**
     * @var DateTime $createdAt Creation timestamp
     */
    #[JsonProperty('created_at'), Date(Date::TYPE_DATETIME)]
    public DateTime $createdAt;

    /**
     * @var DateTime $updatedAt Last update timestamp
     */
    #[JsonProperty('updated_at'), Date(Date::TYPE_DATETIME)]
    public DateTime $updatedAt;

    /**
     * @param array{
     *   id: string,
     *   url: string,
     *   eventType: value-of<WebhookEventTypeEnum>,
     *   status: value-of<WebhookStatusEnum>,
     *   retry: bool,
     *   secret: string,
     *   createdAt: DateTime,
     *   updatedAt: DateTime,
     *   description?: ?string,
     * } $values
     */
    public function __construct(
        array $values,
    ) {
        $this->id = $values['id'];
        $this->url = $values['url'];
        $this->description = $values['description'] ?? null;
        $this->eventType = $values['eventType'];
        $this->status = $values['status'];
        $this->retry = $values['retry'];
        $this->secret = $values['secret'];
        $this->createdAt = $values['createdAt'];
        $this->updatedAt = $values['updatedAt'];
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        return $this->toJson();
    }
}
