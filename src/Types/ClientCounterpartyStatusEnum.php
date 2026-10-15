<?php

namespace Voltaria\Types;

enum ClientCounterpartyStatusEnum: string
{
    case Pending = "pending";
    case Active = "active";
    case Inactive = "inactive";
}
