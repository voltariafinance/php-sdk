<?php

namespace Voltaria\Types;

enum LoanPaymentStatusEnum: string
{
    case Pending = "pending";
    case Sent = "sent";
}
