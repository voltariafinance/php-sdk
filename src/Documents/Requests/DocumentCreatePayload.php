<?php

namespace Voltaria\Documents\Requests;

use Voltaria\Core\Json\JsonSerializableType;
use Voltaria\Core\Json\JsonProperty;
use Voltaria\Utils\File;

class DocumentCreatePayload extends JsonSerializableType
{
    /**
     * @var ?string $clientId
     */
    public ?string $clientId;

    /**
     * @var ?string $clientCounterpartyId The ID of the client counterparty this document belongs to, if any. Requires `client_id`; the counterparty must belong to that client.
     */
    public ?string $clientCounterpartyId;

    /**
     * @var ?string $loanId
     */
    public ?string $loanId;

    /**
     * @var ?string $installmentId
     */
    public ?string $installmentId;

    /**
     * @var ?string $waterfallId
     */
    public ?string $waterfallId;

    /**
     * @var ?string $taskId The task this document answers, if any.
     */
    public ?string $taskId;

    /**
     * @var string $category The category of the document. Available options can be fetched from the available categories endpoint. '.../documents/available-categories'.
     */
    #[JsonProperty('category')]
    public string $category;

    /**
     * @var string $fileName The name of the file
     */
    #[JsonProperty('file_name')]
    public string $fileName;

    /**
     * @var File $file
     */
    public File $file;

    /**
     * @param array{
     *   category: string,
     *   fileName: string,
     *   file: File,
     *   clientId?: ?string,
     *   clientCounterpartyId?: ?string,
     *   loanId?: ?string,
     *   installmentId?: ?string,
     *   waterfallId?: ?string,
     *   taskId?: ?string,
     * } $values
     */
    public function __construct(
        array $values,
    ) {
        $this->clientId = $values['clientId'] ?? null;
        $this->clientCounterpartyId = $values['clientCounterpartyId'] ?? null;
        $this->loanId = $values['loanId'] ?? null;
        $this->installmentId = $values['installmentId'] ?? null;
        $this->waterfallId = $values['waterfallId'] ?? null;
        $this->taskId = $values['taskId'] ?? null;
        $this->category = $values['category'];
        $this->fileName = $values['fileName'];
        $this->file = $values['file'];
    }
}
