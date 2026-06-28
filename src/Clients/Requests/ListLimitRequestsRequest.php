<?php

namespace Voltaria\Clients\Requests;

use Voltaria\Core\Json\JsonSerializableType;

class ListLimitRequestsRequest extends JsonSerializableType
{
    /**
     * @var ?string $clientId Filter by client ID
     */
    public ?string $clientId;

    /**
     * @var ?int $page
     */
    public ?int $page;

    /**
     * @var ?int $pageSize
     */
    public ?int $pageSize;

    /**
     * @var ?string $orderBy Field to order the results by, e.g., 'created_at:desc,updated_at:asc'
     */
    public ?string $orderBy;

    /**
     * @var ?string $q Query string for filtering. Format: "field:operator:value;...". Supported fields: id, client_id. Supported operators: is, in, not_in, contains, not_contains, like, not_like, ilike, not_ilike, gt, gte, lt, lte, starts_with, ends_with, is_null, is_not_null.
     */
    public ?string $q;

    /**
     * @param array{
     *   clientId?: ?string,
     *   page?: ?int,
     *   pageSize?: ?int,
     *   orderBy?: ?string,
     *   q?: ?string,
     * } $values
     */
    public function __construct(
        array $values = [],
    ) {
        $this->clientId = $values['clientId'] ?? null;
        $this->page = $values['page'] ?? null;
        $this->pageSize = $values['pageSize'] ?? null;
        $this->orderBy = $values['orderBy'] ?? null;
        $this->q = $values['q'] ?? null;
    }
}
