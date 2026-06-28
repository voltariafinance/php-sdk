<?php

namespace Voltaria\Types;

use Voltaria\Core\Json\JsonSerializableType;
use Voltaria\Core\Json\JsonProperty;

class ClientAccountResponse extends JsonSerializableType
{
    /**
     * @var string $id Unique account identifier.
     */
    #[JsonProperty('id')]
    public string $id;

    /**
     * @var string $accountHolderName Name of the account holder.
     */
    #[JsonProperty('account_holder_name')]
    public string $accountHolderName;

    /**
     * @var ?string $label Optional label / nickname for the account.
     */
    #[JsonProperty('label')]
    public ?string $label;

    /**
     * @var value-of<AccountHolderTypeEnum> $accountHolderType Account holder type. One of: `business`, `private`.
     */
    #[JsonProperty('account_holder_type')]
    public string $accountHolderType;

    /**
     * @var value-of<CurrencyEnum> $currency ISO 4217 currency code.
     */
    #[JsonProperty('currency')]
    public string $currency;

    /**
     * @var ?string $sortCode Sort code (GBP accounts).
     */
    #[JsonProperty('sort_code')]
    public ?string $sortCode;

    /**
     * @var ?string $accountNumber Account number (GBP / USD accounts).
     */
    #[JsonProperty('account_number')]
    public ?string $accountNumber;

    /**
     * @var ?string $iban IBAN (EUR / CZK / PLN accounts).
     */
    #[JsonProperty('iban')]
    public ?string $iban;

    /**
     * @var ?string $bic BIC / SWIFT code (EUR accounts).
     */
    #[JsonProperty('bic')]
    public ?string $bic;

    /**
     * @var ?string $routingNumber Routing number (USD accounts).
     */
    #[JsonProperty('routing_number')]
    public ?string $routingNumber;

    /**
     * @var ?string $accountType Account type (USD accounts). E.g. `checking` or `savings`.
     */
    #[JsonProperty('account_type')]
    public ?string $accountType;

    /**
     * @var ?AccountAddress $address Account holder address (USD accounts).
     */
    #[JsonProperty('address')]
    public ?AccountAddress $address;

    /**
     * @var value-of<AccountStatusEnum> $status Account status. One of: `pending`, `active`, `passive`.
     */
    #[JsonProperty('status')]
    public string $status;

    /**
     * @param array{
     *   id: string,
     *   accountHolderName: string,
     *   accountHolderType: value-of<AccountHolderTypeEnum>,
     *   currency: value-of<CurrencyEnum>,
     *   status: value-of<AccountStatusEnum>,
     *   label?: ?string,
     *   sortCode?: ?string,
     *   accountNumber?: ?string,
     *   iban?: ?string,
     *   bic?: ?string,
     *   routingNumber?: ?string,
     *   accountType?: ?string,
     *   address?: ?AccountAddress,
     * } $values
     */
    public function __construct(
        array $values,
    ) {
        $this->id = $values['id'];
        $this->accountHolderName = $values['accountHolderName'];
        $this->label = $values['label'] ?? null;
        $this->accountHolderType = $values['accountHolderType'];
        $this->currency = $values['currency'];
        $this->sortCode = $values['sortCode'] ?? null;
        $this->accountNumber = $values['accountNumber'] ?? null;
        $this->iban = $values['iban'] ?? null;
        $this->bic = $values['bic'] ?? null;
        $this->routingNumber = $values['routingNumber'] ?? null;
        $this->accountType = $values['accountType'] ?? null;
        $this->address = $values['address'] ?? null;
        $this->status = $values['status'];
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        return $this->toJson();
    }
}
