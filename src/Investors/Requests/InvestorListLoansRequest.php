<?php

namespace Voltaria\Investors\Requests;

use Voltaria\Core\Json\JsonSerializableType;

class InvestorListLoansRequest extends JsonSerializableType
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
     * @var ?string $clientId
     */
    public ?string $clientId;

    /**
     * @var ?string $orderBy
     */
    public ?string $orderBy;

    /**
     * @var ?string $q Query string for filtering. Format: "field:operator:value;...". Supported fields: id, partner_id, client_id, status, loan_date, currency, partner.name, client.name. Supported operators: is, in, not_in, contains, not_contains, like, not_like, ilike, not_ilike, gt, gte, lt, lte, starts_with, ends_with, is_null, is_not_null.
     */
    public ?string $q;

    /**
     * @param array{
     *   page?: ?int,
     *   pageSize?: ?int,
     *   clientId?: ?string,
     *   orderBy?: ?string,
     *   q?: ?string,
     * } $values
     */
    public function __construct(
        array $values = [],
    ) {
        $this->page = $values['page'] ?? null;
        $this->pageSize = $values['pageSize'] ?? null;
        $this->clientId = $values['clientId'] ?? null;
        $this->orderBy = $values['orderBy'] ?? null;
        $this->q = $values['q'] ?? null;
    }
}
