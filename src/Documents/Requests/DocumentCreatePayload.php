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
     *   loanId?: ?string,
     *   installmentId?: ?string,
     *   waterfallId?: ?string,
     * } $values
     */
    public function __construct(
        array $values,
    ) {
        $this->clientId = $values['clientId'] ?? null;
        $this->loanId = $values['loanId'] ?? null;
        $this->installmentId = $values['installmentId'] ?? null;
        $this->waterfallId = $values['waterfallId'] ?? null;
        $this->category = $values['category'];
        $this->fileName = $values['fileName'];
        $this->file = $values['file'];
    }
}
