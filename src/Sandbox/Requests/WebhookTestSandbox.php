<?php

namespace Voltaria\Sandbox\Requests;

use Voltaria\Core\Json\JsonSerializableType;
use Voltaria\Core\Json\JsonProperty;
use Voltaria\Types\WebhookEventTypeEnum;

class WebhookTestSandbox extends JsonSerializableType
{
    /**
     * @var ?string $webhookId The ID of the webhook subscription. Only this webhook will be triggered if provided.
     */
    #[JsonProperty('webhook_id')]
    public ?string $webhookId;

    /**
     * @var value-of<WebhookEventTypeEnum> $eventType Event type to trigger for the test. All subscriptions for this event type will be triggered if webhook_id is not provided.Possible values: loan_updated, installment_updated, client_updated, client_limit_updated, partner_limit_updated
     */
    #[JsonProperty('event_type')]
    public string $eventType;

    /**
     * @param array{
     *   eventType: value-of<WebhookEventTypeEnum>,
     *   webhookId?: ?string,
     * } $values
     */
    public function __construct(
        array $values,
    ) {
        $this->webhookId = $values['webhookId'] ?? null;
        $this->eventType = $values['eventType'];
    }
}
