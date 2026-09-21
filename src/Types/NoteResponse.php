<?php

namespace Voltaria\Types;

use Voltaria\Core\Json\JsonSerializableType;
use Voltaria\Core\Json\JsonProperty;
use DateTime;
use Voltaria\Core\Types\Date;

/**
 * A note, with the name and email of whoever wrote it.
 */
class NoteResponse extends JsonSerializableType
{
    /**
     * @var string $id Note ID.
     */
    #[JsonProperty('id')]
    public string $id;

    /**
     * @var DateTime $createdAt When the note was created.
     */
    #[JsonProperty('created_at'), Date(Date::TYPE_DATETIME)]
    public DateTime $createdAt;

    /**
     * @var DateTime $updatedAt When the note was last updated.
     */
    #[JsonProperty('updated_at'), Date(Date::TYPE_DATETIME)]
    public DateTime $updatedAt;

    /**
     * @var string $content The note content.
     */
    #[JsonProperty('content')]
    public string $content;

    /**
     * @var ?string $loanId Related loan ID, if applicable.
     */
    #[JsonProperty('loan_id')]
    public ?string $loanId;

    /**
     * @var ?string $installmentId Related installment ID, if applicable.
     */
    #[JsonProperty('installment_id')]
    public ?string $installmentId;

    /**
     * @var ?string $authorFirstName First name of the note author.
     */
    #[JsonProperty('author_first_name')]
    public ?string $authorFirstName;

    /**
     * @var ?string $authorLastName Last name of the note author.
     */
    #[JsonProperty('author_last_name')]
    public ?string $authorLastName;

    /**
     * @var ?string $authorEmail Email of the note author. Null if the author was deleted.
     */
    #[JsonProperty('author_email')]
    public ?string $authorEmail;

    /**
     * @param array{
     *   id: string,
     *   createdAt: DateTime,
     *   updatedAt: DateTime,
     *   content: string,
     *   loanId?: ?string,
     *   installmentId?: ?string,
     *   authorFirstName?: ?string,
     *   authorLastName?: ?string,
     *   authorEmail?: ?string,
     * } $values
     */
    public function __construct(
        array $values,
    ) {
        $this->id = $values['id'];
        $this->createdAt = $values['createdAt'];
        $this->updatedAt = $values['updatedAt'];
        $this->content = $values['content'];
        $this->loanId = $values['loanId'] ?? null;
        $this->installmentId = $values['installmentId'] ?? null;
        $this->authorFirstName = $values['authorFirstName'] ?? null;
        $this->authorLastName = $values['authorLastName'] ?? null;
        $this->authorEmail = $values['authorEmail'] ?? null;
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        return $this->toJson();
    }
}
