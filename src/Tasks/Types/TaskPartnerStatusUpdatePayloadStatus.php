<?php

namespace Voltaria\Tasks\Types;

enum TaskPartnerStatusUpdatePayloadStatus: string
{
    case Active = "active";
    case InProgress = "in_progress";
    case Blocked = "blocked";
    case Done = "done";
}
