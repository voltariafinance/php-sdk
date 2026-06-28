<?php

namespace Voltaria\Types;

enum ClientUserStatusEnum: string
{
    case Pending = "pending";
    case Active = "active";
    case Inactive = "inactive";
}
