<?php

namespace Voltaria\Types;

use Voltaria\Core\Json\JsonSerializableType;
use Voltaria\Core\Json\JsonProperty;
use DateTime;
use Voltaria\Core\Types\Date;

class ClientUserResponse extends JsonSerializableType
{
    /**
     * @var string $id Unique client user identifier.
     */
    #[JsonProperty('id')]
    public string $id;

    /**
     * @var string $partnerId ID of the partner this user belongs to.
     */
    #[JsonProperty('partner_id')]
    public string $partnerId;

    /**
     * @var string $clientId ID of the client this user belongs to.
     */
    #[JsonProperty('client_id')]
    public string $clientId;

    /**
     * @var string $email Email address of the portal user.
     */
    #[JsonProperty('email')]
    public string $email;

    /**
     * @var string $roleId ID of the role assigned to the user.
     */
    #[JsonProperty('role_id')]
    public string $roleId;

    /**
     * @var ?RoleResponse $role Role assigned to the user.
     */
    #[JsonProperty('role')]
    public ?RoleResponse $role;

    /**
     * @var value-of<ClientUserStatusEnum> $status Account status. One of: `pending`, `active`, `inactive`.
     */
    #[JsonProperty('status')]
    public string $status;

    /**
     * @var bool $isEmailVerified Whether the user has verified their email address.
     */
    #[JsonProperty('is_email_verified')]
    public bool $isEmailVerified;

    /**
     * @var value-of<KycStatusEnum> $kycStatus KYC verification status of the user.
     */
    #[JsonProperty('kyc_status')]
    public string $kycStatus;

    /**
     * @var ?string $firstName First name of the user.
     */
    #[JsonProperty('first_name')]
    public ?string $firstName;

    /**
     * @var ?string $lastName Last name of the user.
     */
    #[JsonProperty('last_name')]
    public ?string $lastName;

    /**
     * @var ?string $phone Phone number of the user.
     */
    #[JsonProperty('phone')]
    public ?string $phone;

    /**
     * @var ?bool $is2FaEnabled Whether two-factor authentication is enabled for this user.
     */
    #[JsonProperty('is_2fa_enabled')]
    public ?bool $is2FaEnabled;

    /**
     * @var ?bool $is2FaRequired Whether two-factor authentication is required for this user.
     */
    #[JsonProperty('is_2fa_required')]
    public ?bool $is2FaRequired;

    /**
     * @var DateTime $createdAt Timestamp when the user was created.
     */
    #[JsonProperty('created_at'), Date(Date::TYPE_DATETIME)]
    public DateTime $createdAt;

    /**
     * @var DateTime $updatedAt Timestamp when the user was last updated.
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
