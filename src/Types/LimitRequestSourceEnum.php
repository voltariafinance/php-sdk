<?php

namespace Voltaria\Types;

enum LimitRequestSourceEnum: string
{
    case Partner = "partner";
    case Internal = "internal";
}
