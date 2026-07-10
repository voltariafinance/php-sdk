<?php

namespace Voltaria\Types;

enum LoanReviewRequestStatusEnum: string
{
    case Pending = "pending";
    case Approved = "approved";
    case Rejected = "rejected";
}
