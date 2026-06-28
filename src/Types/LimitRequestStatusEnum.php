<?php

namespace Voltaria\Types;

enum LimitRequestStatusEnum: string
{
    case Pending = "pending";
    case Approved = "approved";
    case Rejected = "rejected";
}
