<?php

namespace Voltaria\Types;

use Voltaria\Core\Json\JsonSerializableType;
use Voltaria\Core\Json\JsonProperty;
use DateTime;
use Voltaria\Core\Types\Date;

class ClientUserResponse extends JsonSerializableType
{
    /**
     * @var string $id
     */
    #[JsonProperty('id')]
    public string $id;

    /**
     * @var string $partnerId
     */
    #[JsonProperty('partner_id')]
    public string $partnerId;

    /**
     * @var string $clientId
     */
    #[JsonProperty('client_id')]
    public string $clientId;

    /**
     * @var string $email
     */
    #[JsonProperty('email')]
    public string $email;

    /**
     * @var string $roleId
     */
    #[JsonProperty('role_id')]
    public string $roleId;

    /**
     * @var ?RoleResponse $role
     */
    #[JsonProperty('role')]
    public ?RoleResponse $role;

    /**
     * @var value-of<ClientUserStatusEnum> $status
     */
    #[JsonProperty('status')]
    public string $status;

    /**
     * @var bool $isEmailVerified
     */
    #[JsonProperty('is_email_verified')]
    public bool $isEmailVerified;

    /**
     * @var value-of<KycStatusEnum> $kycStatus
     */
    #[JsonProperty('kyc_status')]
    public string $kycStatus;

    /**
     * @var ?string $firstName
     */
    #[JsonProperty('first_name')]
    public ?string $firstName;

    /**
     * @var ?string $lastName
     */
    #[JsonProperty('last_name')]
    public ?string $lastName;

    /**
     * @var ?string $phone
     */
    #[JsonProperty('phone')]
    public ?string $phone;

    /**
     * @var ?bool $is2FaEnabled
     */
    #[JsonProperty('is_2fa_enabled')]
    public ?bool $is2FaEnabled;

    /**
     * @var ?bool $is2FaRequired
     */
    #[JsonProperty('is_2fa_required')]
    public ?bool $is2FaRequired;

    /**
     * @var DateTime $createdAt
     */
    #[JsonProperty('created_at'), Date(Date::TYPE_DATETIME)]
    public DateTime $createdAt;

    /**
     * @var DateTime $updatedAt
     */
    #[JsonProperty('updated_at'), Date(Date::TYPE_DATETIME)]
    public DateTime $updatedAt;

    /**
     * @param array{
     *   id: string,
     *   partnerId: string,
     *   clientId: string,
     *   email: string,
     *   roleId: string,
     *   status: value-of<ClientUserStatusEnum>,
     *   isEmailVerified: bool,
     *   kycStatus: value-of<KycStatusEnum>,
     *   createdAt: DateTime,
     *   updatedAt: DateTime,
     *   role?: ?RoleResponse,
     *   firstName?: ?string,
     *   lastName?: ?string,
     *   phone?: ?string,
     *   is2FaEnabled?: ?bool,
     *   is2FaRequired?: ?bool,
     * } $values
     */
    public function __construct(
        array $values,
    ) {
        $this->id = $values['id'];
        $this->partnerId = $values['partnerId'];
        $this->clientId = $values['clientId'];
        $this->email = $values['email'];
        $this->roleId = $values['roleId'];
        $this->role = $values['role'] ?? null;
        $this->status = $values['status'];
        $this->isEmailVerified = $values['isEmailVerified'];
        $this->kycStatus = $values['kycStatus'];
        $this->firstName = $values['firstName'] ?? null;
        $this->lastName = $values['lastName'] ?? null;
        $this->phone = $values['phone'] ?? null;
        $this->is2FaEnabled = $values['is2FaEnabled'] ?? null;
        $this->is2FaRequired = $values['is2FaRequired'] ?? null;
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
