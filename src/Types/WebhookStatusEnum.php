<?php

namespace Voltaria\Types;

enum WebhookStatusEnum: string
{
    case Active = "active";
    case Paused = "paused";
    case Disabled = "disabled";
}
