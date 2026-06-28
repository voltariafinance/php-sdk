<?php

namespace Voltaria\Types;

enum KycStatusEnum: string
{
    case NotStarted = "not_started";
    case Triggered = "triggered";
    case Verified = "verified";
    case Rejected = "rejected";
}
