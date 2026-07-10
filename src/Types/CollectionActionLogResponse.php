<?php

namespace Voltaria\Types;

use Voltaria\Core\Json\JsonSerializableType;
use Voltaria\Core\Json\JsonProperty;
use DateTime;
use Voltaria\Core\Types\Date;

class CollectionActionLogResponse extends JsonSerializableType
{
    /**
     * @var string $id The ID of the collection action log
     */
    #[JsonProperty('id')]
    public string $id;

    /**
     * @var string $collectionActionId The ID of the collection action this log belongs to
     */
    #[JsonProperty('collection_action_id')]
    public string $collectionActionId;

    /**
     * @var value-of<CollectionActionTypeEnum> $actionType The channel used for this action
     */
    #[JsonProperty('action_type')]
    public string $actionType;

    /**
     * @var string $actionName The name of the action at the time it was triggered
     */
    #[JsonProperty('action_name')]
    public string $actionName;

    /**
     * @var value-of<CollectionActionStatusEnum> $status The current status of the action
     */
    #[JsonProperty('status')]
    public string $status;

    /**
     * @var string $clientId The ID of the client this action targets
     */
    #[JsonProperty('client_id')]
    public string $clientId;

    /**
     * @var string $loanId The ID of the loan this action targets
     */
    #[JsonProperty('loan_id')]
    public string $loanId;

    /**
     * @var string $installmentId The ID of the installment this action targets
     */
    #[JsonProperty('installment_id')]
    public string $installmentId;

    /**
     * @var bool $flag Whether this action needs manual follow-up
     */
    #[JsonProperty('flag')]
    public bool $flag;

    /**
     * @var ?string $notes Notes about this action
     */
    #[JsonProperty('notes')]
    public ?string $notes;

    /**
     * @var DateTime $scheduledFor When this action is/was scheduled to run
     */
    #[JsonProperty('scheduled_for'), Date(Date::TYPE_DATETIME)]
    public DateTime $scheduledFor;

    /**
     * @param array{
     *   id: string,
     *   collectionActionId: string,
     *   actionType: value-of<CollectionActionTypeEnum>,
     *   actionName: string,
     *   status: value-of<CollectionActionStatusEnum>,
     *   clientId: string,
     *   loanId: string,
     *   installmentId: string,
     *   flag: bool,
     *   scheduledFor: DateTime,
     *   notes?: ?string,
     * } $values
     */
    public function __construct(
        array $values,
    ) {
        $this->id = $values['id'];
        $this->collectionActionId = $values['collectionActionId'];
        $this->actionType = $values['actionType'];
        $this->actionName = $values['actionName'];
        $this->status = $values['status'];
        $this->clientId = $values['clientId'];
        $this->loanId = $values['loanId'];
        $this->installmentId = $values['installmentId'];
        $this->flag = $values['flag'];
        $this->notes = $values['notes'] ?? null;
        $this->scheduledFor = $values['scheduledFor'];
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        return $this->toJson();
    }
}
