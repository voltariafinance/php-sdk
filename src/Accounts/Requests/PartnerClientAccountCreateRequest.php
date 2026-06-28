<?php

namespace Voltaria\Accounts\Requests;

use Voltaria\Core\Json\JsonSerializableType;
use Voltaria\Core\Json\JsonProperty;
use Voltaria\Types\AccountHolderTypeEnum;
use Voltaria\Types\CurrencyEnum;
use Voltaria\Types\AccountAddress;
use Voltaria\Accounts\Types\PartnerClientAccountCreateRequestStatus;

class PartnerClientAccountCreateRequest extends JsonSerializableType
{
    /**
     * @var string $accountHolderName Full name of the account holder.
     */
    #[JsonProperty('account_holder_name')]
    public string $accountHolderName;

    /**
     * @var ?string $label Optional label / nickname for the account (max 50 characters).
     */
    #[JsonProperty('label')]
    public ?string $label;

    /**
     * @var value-of<AccountHolderTypeEnum> $accountHolderType Account holder type. One of: `business`, `private`.
     */
    #[JsonProperty('account_holder_type')]
    public string $accountHolderType;

    /**
     * @var value-of<CurrencyEnum> $currency ISO 4217 currency code. Use `/accounts/fields` to get required fields per currency.
     */
    #[JsonProperty('currency')]
    public string $currency;

    /**
     * @var ?string $sortCode Sort code (required for GBP).
     */
    #[JsonProperty('sort_code')]
    public ?string $sortCode;

    /**
     * @var ?string $accountNumber Account number (required for GBP and USD).
     */
    #[JsonProperty('account_number')]
    public ?string $accountNumber;

    /**
     * @var ?string $iban IBAN (required for EUR, CZK, PLN).
     */
    #[JsonProperty('iban')]
    public ?string $iban;

    /**
     * @var ?string $bic BIC / SWIFT code (optional for EUR).
     */
    #[JsonProperty('bic')]
    public ?string $bic;

    /**
     * @var ?string $routingNumber ABA routing number (required for USD).
     */
    #[JsonProperty('routing_number')]
    public ?string $routingNumber;

    /**
     * @var ?string $accountType Account type (required for USD). E.g. `checking` or `savings`.
     */
    #[JsonProperty('account_type')]
    public ?string $accountType;

    /**
     * @var ?AccountAddress $address Account holder address (required for USD).
     */
    #[JsonProperty('address')]
    public ?AccountAddress $address;

    /**
     * @var ?value-of<PartnerClientAccountCreateRequestStatus> $status Account status. `active` demotes any existing active account in the same currency to `passive`; `passive` is added as a backup. Defaults to `active`.
     */
    #[JsonProperty('status')]
    public ?string $status;

    /**
     * @param array{
     *   accountHolderName: string,
     *   accountHolderType: value-of<AccountHolderTypeEnum>,
     *   currency: value-of<CurrencyEnum>,
     *   label?: ?string,
     *   sortCode?: ?string,
     *   accountNumber?: ?string,
     *   iban?: ?string,
     *   bic?: ?string,
     *   routingNumber?: ?string,
     *   accountType?: ?string,
     *   address?: ?AccountAddress,
     *   status?: ?value-of<PartnerClientAccountCreateRequestStatus>,
     * } $values
     */
    public function __construct(
        array $values,
    ) {
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
        $this->status = $values['status'] ?? null;
    }
}
