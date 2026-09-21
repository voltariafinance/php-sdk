<?php

namespace Voltaria\Tasks\Requests;

use Voltaria\Core\Json\JsonSerializableType;
use Voltaria\Types\TaskStatusEnum;

class ListTasksRequest extends JsonSerializableType
{
    /**
     * @var ?value-of<TaskStatusEnum> $status Filter by task status.
     */
    public ?string $status;

    /**
     * @var ?string $clientId Filter by client.
     */
    public ?string $clientId;

    /**
     * @var ?string $loanId Filter by loan.
     */
    public ?string $loanId;

    /**
     * @var ?string $installmentId Filter by installment.
     */
    public ?string $installmentId;

    /**
     * @var ?string $waterfallId Filter by waterfall.
     */
    public ?string $waterfallId;

    /**
     * @var ?int $page
     */
    public ?int $page;

    /**
     * @var ?int $pageSize
     */
    public ?int $pageSize;

    /**
     * @var ?string $orderBy Field to order the results by, e.g., 'due_at:asc,created_at:desc'.
     */
    public ?string $orderBy;

    /**
     * @var ?string $q Query string for filtering. Format: "field:operator:value;...". Supported fields: id, status, priority, due_at, created_at, client_id, loan_id, installment_id, waterfall_id. Supported operators: is, in, not_in, contains, not_contains, like, not_like, ilike, not_ilike, gt, gte, lt, lte, starts_with, ends_with, is_null, is_not_null.
     */
    public ?string $q;

    /**
     * @param array{
     *   status?: ?value-of<TaskStatusEnum>,
     *   clientId?: ?string,
     *   loanId?: ?string,
     *   installmentId?: ?string,
     *   waterfallId?: ?string,
     *   page?: ?int,
     *   pageSize?: ?int,
     *   orderBy?: ?string,
     *   q?: ?string,
     * } $values
     */
    public function __construct(
        array $values = [],
    ) {
        $this->status = $values['status'] ?? null;
        $this->clientId = $values['clientId'] ?? null;
        $this->loanId = $values['loanId'] ?? null;
        $this->installmentId = $values['installmentId'] ?? null;
        $this->waterfallId = $values['waterfallId'] ?? null;
        $this->page = $values['page'] ?? null;
        $this->pageSize = $values['pageSize'] ?? null;
        $this->orderBy = $values['orderBy'] ?? null;
        $this->q = $values['q'] ?? null;
    }
}
