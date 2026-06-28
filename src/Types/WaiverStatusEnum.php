<?php

namespace Voltaria\Types;

enum WaiverStatusEnum: string
{
    case Pending = "pending";
    case Active = "active";
    case Paid = "paid";
    case Rejected = "rejected";
}
