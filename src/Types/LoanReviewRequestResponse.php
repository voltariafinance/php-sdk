<?php

namespace Voltaria\Types;

use Voltaria\Core\Json\JsonSerializableType;
use Voltaria\Core\Json\JsonProperty;
use DateTime;
use Voltaria\Core\Types\Date;

class LoanReviewRequestResponse extends JsonSerializableType
{
    /**
     * @var string $id The ID of the loan review request
     */
    #[JsonProperty('id')]
    public string $id;

    /**
     * @var string $loanId The ID of the loan associated with the review request
     */
    #[JsonProperty('loan_id')]
    public string $loanId;

    /**
     * @var string $clientId The ID of the client associated with the review request
     */
    #[JsonProperty('client_id')]
    public string $clientId;

    /**
     * @var value-of<LoanReviewRequestStatusEnum> $status The status of the review request. One of the following: pending, approved, rejected
     */
    #[JsonProperty('status')]
    public string $status;

    /**
     * @var ?string $notes The requester's note for the review request
     */
    #[JsonProperty('notes')]
    public ?string $notes;

    /**
     * @var ?string $response The reviewer's note explaining the approval or rejection
     */
    #[JsonProperty('response')]
    public ?string $response;

    /**
     * @var ?DateTime $reviewedAt The timestamp when the review request was approved or rejected
     */
    #[JsonProperty('reviewed_at'), Date(Date::TYPE_DATETIME)]
    public ?DateTime $reviewedAt;

    /**
     * @var DateTime $createdAt The timestamp when the review request was created
     */
    #[JsonProperty('created_at'), Date(Date::TYPE_DATETIME)]
    public DateTime $createdAt;

    /**
     * @var DateTime $updatedAt The timestamp when the review request was last updated
     */
    #[JsonProperty('updated_at'), Date(Date::TYPE_DATETIME)]
    public DateTime $updatedAt;

    /**
     * @param array{
     *   id: string,
     *   loanId: string,
     *   clientId: string,
     *   status: value-of<LoanReviewRequestStatusEnum>,
     *   createdAt: DateTime,
     *   updatedAt: DateTime,
     *   notes?: ?string,
     *   response?: ?string,
     *   reviewedAt?: ?DateTime,
     * } $values
     */
    public function __construct(
        array $values,
    ) {
        $this->id = $values['id'];
        $this->loanId = $values['loanId'];
        $this->clientId = $values['clientId'];
        $this->status = $values['status'];
        $this->notes = $values['notes'] ?? null;
        $this->response = $values['response'] ?? null;
        $this->reviewedAt = $values['reviewedAt'] ?? null;
        $this->createdAt = $values['createdAt'];
        $this->updatedAt = $values['updatedAt'];
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        return $this->toJson();
    }
}
