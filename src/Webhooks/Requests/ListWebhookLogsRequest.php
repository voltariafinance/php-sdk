<?php

namespace Voltaria\Webhooks\Requests;

use Voltaria\Core\Json\JsonSerializableType;

class ListWebhookLogsRequest extends JsonSerializableType
{
    /**
     * @var ?string $webhookId
     */
    public ?string $webhookId;

    /**
     * @var ?int $page
     */
    public ?int $page;

    /**
     * @var ?int $pageSize
     */
    public ?int $pageSize;

    /**
     * @param array{
     *   webhookId?: ?string,
     *   page?: ?int,
     *   pageSize?: ?int,
     * } $values
     */
    public function __construct(
        array $values = [],
    ) {
        $this->webhookId = $values['webhookId'] ?? null;
        $this->page = $values['page'] ?? null;
        $this->pageSize = $values['pageSize'] ?? null;
    }
}
