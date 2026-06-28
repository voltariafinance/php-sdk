<?php

namespace Voltaria\Types;

enum InstallmentStatusEnum: string
{
    case Active = "active";
    case Overdue = "overdue";
    case Default_ = "default";
    case Sold = "sold";
    case Restructured = "restructured";
    case Repaid = "repaid";
    case Pending = "pending";
    case Deleted = "deleted";
    case Inactive = "inactive";
}
