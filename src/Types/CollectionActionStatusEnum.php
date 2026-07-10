<?php

namespace Voltaria\Types;

enum CollectionActionStatusEnum: string
{
    case Pending = "pending";
    case Completed = "completed";
    case Failed = "failed";
    case Skipped = "skipped";
}
