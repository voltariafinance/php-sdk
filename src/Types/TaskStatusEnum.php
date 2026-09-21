<?php

namespace Voltaria\Types;

enum TaskStatusEnum: string
{
    case Active = "active";
    case InProgress = "in_progress";
    case Blocked = "blocked";
    case Done = "done";
    case Cancelled = "cancelled";
}
