<?php

namespace Voltaria\Types;

use Voltaria\Core\Json\JsonSerializableType;
use Voltaria\Core\Json\JsonProperty;

/**
 * Address structure for account holder (used for USD accounts).
 */
class AccountAddress extends JsonSerializableType
{
    /**
     * @var string $country ISO 3166-1 alpha-2 country code.
     */
    #[JsonProperty('country')]
    public string $country;

    /**
     * @var string $city City.
     */
    #[JsonProperty('city')]
    public string $city;

    /**
     * @var string $postalCode Postal / ZIP code.
     */
    #[JsonProperty('postal_code')]
    public string $postalCode;

    /**
     * @var ?string $state State or province code (required for USD).
     */
    #[JsonProperty('state')]
    public ?string $state;

    /**
     * @var string $line1 Street address, line 1.
     */
    #[JsonProperty('line1')]
    public string $line1;

    /**
     * @param array{
     *   country: string,
     *   city: string,
     *   postalCode: string,
     *   line1: string,
     *   state?: ?string,
     * } $values
     */
    public function __construct(
        array $values,
    ) {
        $this->country = $values['country'];
        $this->city = $values['city'];
        $this->postalCode = $values['postalCode'];
        $this->state = $values['state'] ?? null;
        $this->line1 = $values['line1'];
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        return $this->toJson();
    }
}
