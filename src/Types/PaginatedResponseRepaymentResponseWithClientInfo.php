<?php

namespace Voltaria\Types;

use Voltaria\Core\Json\JsonSerializableType;
use Voltaria\Core\Json\JsonProperty;
use Voltaria\Core\Types\ArrayType;

class PaginatedResponseRepaymentResponseWithClientInfo extends JsonSerializableType
{
    /**
     * @var array<RepaymentResponseWithClientInfo> $items
     */
    #[JsonProperty('items'), ArrayType([RepaymentResponseWithClientInfo::class])]
    public array $items;

    /**
     * @var ?int $page Current page number
     */
    #[JsonProperty('page')]
    public ?int $page;

    /**
     * @var ?int $pageSize Number of items per page
     */
    #[JsonProperty('page_size')]
    public ?int $pageSize;

    /**
     * @var ?int $itemsInPage Number of items in the current page
     */
    #[JsonProperty('items_in_page')]
    public ?int $itemsInPage;

    /**
     * @var ?int $totalItems Total number of items across all pages
     */
    #[JsonProperty('total_items')]
    public ?int $totalItems;

    /**
     * @var ?int $totalPages Total number of pages available
     */
    #[JsonProperty('total_pages')]
    public ?int $totalPages;

    /**
     * @var ?bool $hasNext Indicates if there is a next page
     */
    #[JsonProperty('has_next')]
    public ?bool $hasNext;

    /**
     * @var ?bool $hasPrevious Indicates if there is a previous page
     */
    #[JsonProperty('has_previous')]
    public ?bool $hasPrevious;

    /**
     * @param array{
     *   items: array<RepaymentResponseWithClientInfo>,
     *   page?: ?int,
     *   pageSize?: ?int,
     *   itemsInPage?: ?int,
     *   totalItems?: ?int,
     *   totalPages?: ?int,
     *   hasNext?: ?bool,
     *   hasPrevious?: ?bool,
     * } $values
     */
    public function __construct(
        array $values,
    ) {
        $this->items = $values['items'];
        $this->page = $values['page'] ?? null;
        $this->pageSize = $values['pageSize'] ?? null;
        $this->itemsInPage = $values['itemsInPage'] ?? null;
        $this->totalItems = $values['totalItems'] ?? null;
        $this->totalPages = $values['totalPages'] ?? null;
        $this->hasNext = $values['hasNext'] ?? null;
        $this->hasPrevious = $values['hasPrevious'] ?? null;
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        return $this->toJson();
    }
}
