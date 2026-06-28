<?php

namespace Voltaria\Types;

use Voltaria\Core\Json\JsonSerializableType;
use Voltaria\Core\Json\JsonProperty;
use Voltaria\Core\Types\ArrayType;

class BulkRepaymentResult extends JsonSerializableType
{
    /**
     * @var int $successCount Number of successfully processed repayments
     */
    #[JsonProperty('success_count')]
    public int $successCount;

    /**
     * @var int $failureCount Number of failed repayments
     */
    #[JsonProperty('failure_count')]
    public int $failureCount;

    /**
     * @var int $totalProcessed Total number of repayments processed
     */
    #[JsonProperty('total_processed')]
    public int $totalProcessed;

    /**
     * @var float $processingTimeSeconds Time taken to process all repayments
     */
    #[JsonProperty('processing_time_seconds')]
    public float $processingTimeSeconds;

    /**
     * @var array<BulkRepaymentItemResult> $results Detailed results for each repayment
     */
    #[JsonProperty('results'), ArrayType([BulkRepaymentItemResult::class])]
    public array $results;

    /**
     * @param array{
     *   successCount: int,
     *   failureCount: int,
     *   totalProcessed: int,
     *   processingTimeSeconds: float,
     *   results: array<BulkRepaymentItemResult>,
     * } $values
     */
    public function __construct(
        array $values,
    ) {
        $this->successCount = $values['successCount'];
        $this->failureCount = $values['failureCount'];
        $this->totalProcessed = $values['totalProcessed'];
        $this->processingTimeSeconds = $values['processingTimeSeconds'];
        $this->results = $values['results'];
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        return $this->toJson();
    }
}
