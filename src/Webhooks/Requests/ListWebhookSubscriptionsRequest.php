<?php

namespace Voltaria\Webhooks\Requests;

use Voltaria\Core\Json\JsonSerializableType;
use Voltaria\Types\WebhookEventTypeEnum;

class ListWebhookSubscriptionsRequest extends JsonSerializableType
{
    /**
     * @var ?int $page
     */
    public ?int $page;

    /**
     * @var ?int $pageSize
     */
    public ?int $pageSize;

    /**
     * @var ?value-of<WebhookEventTypeEnum> $eventType
     */
    public ?string $eventType;

    /**
     * @param array{
     *   page?: ?int,
     *   pageSize?: ?int,
     *   eventType?: ?value-of<WebhookEventTypeEnum>,
     * } $values
     */
    public function __construct(
        array $values = [],
    ) {
        $this->page = $values['page'] ?? null;
        $this->pageSize = $values['pageSize'] ?? null;
        $this->eventType = $values['eventType'] ?? null;
    }
}
