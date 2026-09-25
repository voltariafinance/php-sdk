<?php

namespace Voltaria\Types;

enum TaskStatusEnum: string
{
    case Active = "active";
    case InProgress = "in_progress";
    case Blocked = "blocked";
    case ReviewNeeded = "review_needed";
    case Done = "done";
    case Cancelled = "cancelled";
}
