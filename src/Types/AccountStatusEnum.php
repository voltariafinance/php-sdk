<?php

namespace Voltaria\Types;

enum AccountStatusEnum: string
{
    case Active = "active";
    case Passive = "passive";
    case Pending = "pending";
}
