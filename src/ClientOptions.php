<?php

namespace Voltaria;

use Psr\Http\Client\ClientInterface;

/**
 * Options for the prefix-routing {@see Client} wrapper.
 *
 * Routing precedence (highest first):
 *   1. {@see $environment} — explicit environment always wins.
 *   2. {@see $baseUrl}     — explicit base URL wins over prefix routing.
 *   3. API key prefix      — "live_" -> Production, "sandbox_" -> Sandbox.
 *
 * The remaining fields mirror the option keys accepted by the generated
 * {@see VoltariaClient} and are passed straight through.
 */
class ClientOptions
{
    /**
     * @param ?Environments $environment Explicit environment; overrides prefix routing and $baseUrl.
     * @param ?string $baseUrl Explicit base URL; overrides prefix routing (but not $environment).
     * @param ?ClientInterface $client PSR-18 HTTP client implementation.
     * @param ?int $maxRetries Maximum number of retries for failed requests.
     * @param ?float $timeout Request timeout in seconds.
     * @param array<string, string> $headers Additional headers sent with every request.
     */
    public function __construct(
        public ?Environments $environment = null,
        public ?string $baseUrl = null,
        public ?ClientInterface $client = null,
        public ?int $maxRetries = null,
        public ?float $timeout = null,
        public array $headers = [],
    ) {
    }

    /**
     * Build the option array consumed by the generated {@see VoltariaClient}.
     *
     * The resolved base URL is injected under the "baseUrl" key; the generated
     * client and its sub-clients read from there.
     *
     * @return array{
     *   baseUrl?: string,
     *   client?: ClientInterface,
     *   maxRetries?: int,
     *   timeout?: float,
     *   headers?: array<string, string>,
     * }
     */
    public function toGeneratedOptions(string $resolvedBaseUrl): array
    {
        $options = ['baseUrl' => $resolvedBaseUrl];

        if ($this->client !== null) {
            $options['client'] = $this->client;
        }
        if ($this->maxRetries !== null) {
            $options['maxRetries'] = $this->maxRetries;
        }
        if ($this->timeout !== null) {
            $options['timeout'] = $this->timeout;
        }
        if ($this->headers !== []) {
            $options['headers'] = $this->headers;
        }

        return $options;
    }
}
