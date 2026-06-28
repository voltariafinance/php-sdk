<?php

namespace Voltaria\Types;

enum LoanStatusEnum: string
{
    case Pending = "pending";
    case Overdue = "overdue";
    case Active = "active";
    case Default_ = "default";
    case Sold = "sold";
    case Restructured = "restructured";
    case Repaid = "repaid";
    case PreApproved = "pre_approved";
    case Rejected = "rejected";
    case Deleted = "deleted";
    case Inactive = "inactive";
}
