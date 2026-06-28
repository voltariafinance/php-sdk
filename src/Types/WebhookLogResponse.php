<?php

namespace Voltaria\Types;

use Voltaria\Core\Json\JsonSerializableType;
use Voltaria\Core\Json\JsonProperty;
use DateTime;
use Voltaria\Core\Types\Date;
use Voltaria\Core\Types\Union;

class WebhookLogResponse extends JsonSerializableType
{
    /**
     * @var string $id The ID of the webhook log
     */
    #[JsonProperty('id')]
    public string $id;

    /**
     * @var string $webhookId The ID of the webhook subscription
     */
    #[JsonProperty('webhook_id')]
    public string $webhookId;

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
     * @var value-of<WebhookEventTypeEnum> $eventType The type of event
     */
    #[JsonProperty('event_type')]
    public string $eventType;

    /**
     * @var string $webhookUrl The URL of the webhook subscription
     */
    #[JsonProperty('webhook_url')]
    public string $webhookUrl;

    /**
     * @var bool $success Whether the webhook was delivered successfully
     */
    #[JsonProperty('success')]
    public bool $success;

    /**
     * @var ?int $statusCode The HTTP status code returned by the server
     */
    #[JsonProperty('status_code')]
    public ?int $statusCode;

    /**
     * @var ?string $errorMessage Error message if the webhook failed
     */
    #[JsonProperty('error_message')]
    public ?string $errorMessage;

    /**
     * @var ?int $requestDurationMs The time taken to deliver the webhook in milliseconds
     */
    #[JsonProperty('request_duration_ms')]
    public ?int $requestDurationMs;

    /**
     * @var (
     *    array<string, mixed>
     *   |array<mixed>
     * )|null $requestBody The request body sent to the webhook URL
     */
    #[JsonProperty('request_body'), Union(['string' => 'mixed'], ['mixed'], 'null')]
    public array|null $requestBody;

    /**
     * @param array{
     *   id: string,
     *   webhookId: string,
     *   createdAt: DateTime,
     *   updatedAt: DateTime,
     *   eventType: value-of<WebhookEventTypeEnum>,
     *   webhookUrl: string,
     *   success: bool,
     *   statusCode?: ?int,
     *   errorMessage?: ?string,
     *   requestDurationMs?: ?int,
     *   requestBody?: (
     *    array<string, mixed>
     *   |array<mixed>
     * )|null,
     * } $values
     */
    public function __construct(
        array $values,
    ) {
        $this->id = $values['id'];
        $this->webhookId = $values['webhookId'];
        $this->createdAt = $values['createdAt'];
        $this->updatedAt = $values['updatedAt'];
        $this->eventType = $values['eventType'];
        $this->webhookUrl = $values['webhookUrl'];
        $this->success = $values['success'];
        $this->statusCode = $values['statusCode'] ?? null;
        $this->errorMessage = $values['errorMessage'] ?? null;
        $this->requestDurationMs = $values['requestDurationMs'] ?? null;
        $this->requestBody = $values['requestBody'] ?? null;
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        return $this->toJson();
    }
}
