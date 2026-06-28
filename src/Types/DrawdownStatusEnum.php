<?php

namespace Voltaria\Types;

enum DrawdownStatusEnum: string
{
    case Requested = "requested";
    case Active = "active";
    case Cancelled = "cancelled";
}
