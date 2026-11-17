<?php

namespace Voltaria\Sandbox\Requests;

use Voltaria\Core\Json\JsonSerializableType;
use Voltaria\Types\LoanStatusEnum;
use Voltaria\Core\Json\JsonProperty;
use DateTime;
use Voltaria\Core\Types\Date;

class LoanUpdateSandbox extends JsonSerializableType
{
    /**
     * @var ?value-of<LoanStatusEnum> $status The status of the loan. One of the following: `pending, overdue, active, default, sold, restructured, repaid, pre_approved, rejected, inactive`. Use the delete loan endpoint to delete a loan.
     */
    #[JsonProperty('status')]
    public ?string $status;

    /**
     * @var ?DateTime $soldAt The date the loan was sold. Required when the status changes to `sold`; can't be later than today or earlier than the loan date
     */
    #[JsonProperty('sold_at'), Date(Date::TYPE_DATETIME)]
    public ?DateTime $soldAt;

    /**
     * @var ?DateTime $restructuredAt The date the loan was restructured. Required when the status changes to `restructured`; can't be later than today or earlier than the loan date
     */
    #[JsonProperty('restructured_at'), Date(Date::TYPE_DATETIME)]
    public ?DateTime $restructuredAt;

    /**
     * @var ?DateTime $defaultedAt The date the loan defaulted. Required when the status changes to `default`; can't be later than today or earlier than the loan date
     */
    #[JsonProperty('defaulted_at'), Date(Date::TYPE_DATETIME)]
    public ?DateTime $defaultedAt;

    /**
     * @param array{
     *   status?: ?value-of<LoanStatusEnum>,
     *   soldAt?: ?DateTime,
     *   restructuredAt?: ?DateTime,
     *   defaultedAt?: ?DateTime,
     * } $values
     */
    public function __construct(
        array $values = [],
    ) {
        $this->status = $values['status'] ?? null;
        $this->soldAt = $values['soldAt'] ?? null;
        $this->restructuredAt = $values['restructuredAt'] ?? null;
        $this->defaultedAt = $values['defaultedAt'] ?? null;
    }
}
