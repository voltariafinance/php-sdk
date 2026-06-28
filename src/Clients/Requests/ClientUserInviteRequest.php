<?php

namespace Voltaria\Clients\Requests;

use Voltaria\Core\Json\JsonSerializableType;
use Voltaria\Core\Json\JsonProperty;

class ClientUserInviteRequest extends JsonSerializableType
{
    /**
     * @var string $firstName
     */
    #[JsonProperty('first_name')]
    public string $firstName;

    /**
     * @var string $lastName
     */
    #[JsonProperty('last_name')]
    public string $lastName;

    /**
     * @var string $email
     */
    #[JsonProperty('email')]
    public string $email;

    /**
     * @var ?string $phone
     */
    #[JsonProperty('phone')]
    public ?string $phone;

    /**
     * @var string $roleType
     */
    #[JsonProperty('role_type')]
    public string $roleType;

    /**
     * @param array{
     *   firstName: string,
     *   lastName: string,
     *   email: string,
     *   roleType: string,
     *   phone?: ?string,
     * } $values
     */
    public function __construct(
        array $values,
    ) {
        $this->firstName = $values['firstName'];
        $this->lastName = $values['lastName'];
        $this->email = $values['email'];
        $this->phone = $values['phone'] ?? null;
        $this->roleType = $values['roleType'];
    }
}
