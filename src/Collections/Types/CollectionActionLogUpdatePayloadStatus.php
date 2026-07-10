<?php

namespace Voltaria\Collections\Types;

enum CollectionActionLogUpdatePayloadStatus: string
{
    case Completed = "completed";
    case Failed = "failed";
}
