<?php

namespace Voltaria;

/**
 * Thrown when the supplied API key has no recognised environment prefix
 * (e.g. "live_" or "sandbox_") and no explicit environment or base URL was
 * provided to override prefix-based routing.
 */
class InvalidApiKeyException extends \InvalidArgumentException
{
}
