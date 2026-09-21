<?php

namespace Voltaria\Types;

enum CopStatusEnum: string
{
    case Matched = "matched";
    case CloseMatch = "close_match";
    case NotMatched = "not_matched";
    case AccountNotFound = "account_not_found";
    case Unavailable = "unavailable";
}
