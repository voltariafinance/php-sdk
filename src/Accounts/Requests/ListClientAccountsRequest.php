<?php

namespace Voltaria\Accounts\Requests;

use Voltaria\Core\Json\JsonSerializableType;

class ListClientAccountsRequest extends JsonSerializableType
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
     * @var ?string $orderBy
     */
    public ?string $orderBy;

    /**
     * @param array{
     *   page?: ?int,
     *   pageSize?: ?int,
     *   orderBy?: ?string,
     * } $values
     */
    public function __construct(
        array $values = [],
    ) {
        $this->page = $values['page'] ?? null;
        $this->pageSize = $values['pageSize'] ?? null;
        $this->orderBy = $values['orderBy'] ?? null;
    }
}
