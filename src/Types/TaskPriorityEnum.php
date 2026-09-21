<?php

namespace Voltaria\Types;

enum TaskPriorityEnum: string
{
    case Low = "low";
    case Medium = "medium";
    case High = "high";
    case Urgent = "urgent";
}
