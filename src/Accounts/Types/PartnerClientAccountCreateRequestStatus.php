<?php

namespace Voltaria\Accounts\Types;

enum PartnerClientAccountCreateRequestStatus: string
{
    case Active = "active";
    case Passive = "passive";
}
