<?php

namespace Voltaria\Loans\Requests;

use Voltaria\Core\Json\JsonSerializableType;
use Voltaria\Core\Json\JsonProperty;

class LoanReviewRequestCreatePayload extends JsonSerializableType
{
    /**
     * @var string $loanId The ID of the loan to be reviewed. Must be a not-yet-disbursed (pending or pre-approved) loan belonging to the current partner
     */
    #[JsonProperty('loan_id')]
    public string $loanId;

    /**
     * @var ?string $notes Optional note from the requester explaining the review request
     */
    #[JsonProperty('notes')]
    public ?string $notes;

    /**
     * @param array{
     *   loanId: string,
     *   notes?: ?string,
     * } $values
     */
    public function __construct(
        array $values,
    ) {
        $this->loanId = $values['loanId'];
        $this->notes = $values['notes'] ?? null;
    }
}
