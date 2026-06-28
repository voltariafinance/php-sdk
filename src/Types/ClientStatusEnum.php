<?php

namespace Voltaria\Types;

enum ClientStatusEnum: string
{
    case Active = "active";
    case Rejected = "rejected";
    case Deactivated = "deactivated";
    case Pending = "pending";
    case PendingOnboarding = "pending_onboarding";
    case PreApproved = "pre_approved";
    case Deleted = "deleted";
    case Inactive = "inactive";
}
