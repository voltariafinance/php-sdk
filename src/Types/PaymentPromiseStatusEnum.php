<?php

namespace Voltaria\Types;

enum PaymentPromiseStatusEnum: string
{
    case Active = "active";
    case Paid = "paid";
    case NotPaid = "not_paid";
    case Cancelled = "cancelled";
}
