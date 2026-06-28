<?php

namespace Voltaria\Types;

use Voltaria\Core\Json\JsonSerializableType;
use Voltaria\Core\Json\JsonProperty;
use DateTime;
use Voltaria\Core\Types\Date;

class DocumentResponse extends JsonSerializableType
{
    /**
     * @var string $id The ID of the document
     */
    #[JsonProperty('id')]
    public string $id;

    /**
     * @var string $category The category of the document (kyc, financial, etc.)
     */
    #[JsonProperty('category')]
    public string $category;

    /**
     * @var string $fileName The name of the uploaded file
     */
    #[JsonProperty('file_name')]
    public string $fileName;

    /**
     * @var string $fileType The content type of the file
     */
    #[JsonProperty('file_type')]
    public string $fileType;

    /**
     * @var ?string $clientId The associated client ID
     */
    #[JsonProperty('client_id')]
    public ?string $clientId;

    /**
     * @var ?string $fileUrl The Presigned URL of the file. This is a temporary URL that allows you to download the file.
     */
    #[JsonProperty('file_url')]
    public ?string $fileUrl;

    /**
     * @var ?string $loanId The ID of the associated loan, if applicable
     */
    #[JsonProperty('loan_id')]
    public ?string $loanId;

    /**
     * @var ?string $installmentId The ID of the associated installment, if applicable
     */
    #[JsonProperty('installment_id')]
    public ?string $installmentId;

    /**
     * @var ?string $folderPath Slash-delimited folder path used to organise the document, e.g. 'Legal/Contracts'. Null means the document is unfiled (at the root).
     */
    #[JsonProperty('folder_path')]
    public ?string $folderPath;

    /**
     * @var ?DateTime $documentDate Optional document date (e.g. the date an investment document was issued)
     */
    #[JsonProperty('document_date'), Date(Date::TYPE_DATE)]
    public ?DateTime $documentDate;

    /**
     * @var ?DateTime $expiryDate Optional expiry date of the document
     */
    #[JsonProperty('expiry_date'), Date(Date::TYPE_DATE)]
    public ?DateTime $expiryDate;

    /**
     * @var DateTime $createdAt The date and time when the document was created
     */
    #[JsonProperty('created_at'), Date(Date::TYPE_DATETIME)]
    public DateTime $createdAt;

    /**
     * @param array{
     *   id: string,
     *   category: string,
     *   fileName: string,
     *   fileType: string,
     *   createdAt: DateTime,
     *   clientId?: ?string,
     *   fileUrl?: ?string,
     *   loanId?: ?string,
     *   installmentId?: ?string,
     *   folderPath?: ?string,
     *   documentDate?: ?DateTime,
     *   expiryDate?: ?DateTime,
     * } $values
     */
    public function __construct(
        array $values,
    ) {
        $this->id = $values['id'];
        $this->category = $values['category'];
        $this->fileName = $values['fileName'];
        $this->fileType = $values['fileType'];
        $this->clientId = $values['clientId'] ?? null;
        $this->fileUrl = $values['fileUrl'] ?? null;
        $this->loanId = $values['loanId'] ?? null;
        $this->installmentId = $values['installmentId'] ?? null;
        $this->folderPath = $values['folderPath'] ?? null;
        $this->documentDate = $values['documentDate'] ?? null;
        $this->expiryDate = $values['expiryDate'] ?? null;
        $this->createdAt = $values['createdAt'];
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        return $this->toJson();
    }
}
