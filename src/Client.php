<?php

namespace Voltaria;

use Voltaria\Clients\ClientsClient;
use Voltaria\Sandbox\SandboxClient;
use Voltaria\Documents\DocumentsClient;
use Voltaria\Investors\InvestorsClient;
use Voltaria\Installments\InstallmentsClient;
use Voltaria\Loans\LoansClient;
use Voltaria\Partners\PartnersClient;
use Voltaria\Webhooks\WebhooksClient;
use Voltaria\Repayments\RepaymentsClient;
use Voltaria\Drawdowns\DrawdownsClient;

/**
 * Prefix-routing wrapper around the generated {@see VoltariaClient}.
 *
 * The base URL is derived automatically from the API key prefix unless an
 * explicit environment or base URL is supplied:
 *
 *   - "live_"    -> Production (https://api.voltaria.io)
 *   - "sandbox_" -> Sandbox    (https://api.sandbox.voltaria.io)
 *   - anything else (including empty) -> {@see InvalidApiKeyException}
 *
 * An explicit {@see ClientOptions::$environment} or {@see ClientOptions::$baseUrl}
 * always overrides prefix routing. This class is named `Client` to avoid
 * colliding with the generated `VoltariaClient`; it composes (does not extend)
 * the generated client and re-exposes its resource sub-clients.
 */
class Client
{
    public ClientsClient $clients;
    public SandboxClient $sandbox;
    public DocumentsClient $documents;
    public InvestorsClient $investors;
    public InstallmentsClient $installments;
    public LoansClient $loans;
    public PartnersClient $partners;
    public WebhooksClient $webhooks;
    public RepaymentsClient $repayments;
    public DrawdownsClient $drawdowns;

    /**
     * The generated client this wrapper delegates to.
     */
    public readonly VoltariaClient $client;

    /**
     * The base URL resolved for this instance.
     */
    public readonly string $baseUrl;

    /**
     * @param string $apiKey API key used for authentication. Its prefix selects
     *        the environment unless overridden by $options.
     * @param ?ClientOptions $options Optional routing/transport overrides.
     *
     * @throws InvalidApiKeyException If the environment cannot be resolved.
     */
    public function __construct(string $apiKey, ?ClientOptions $options = null)
    {
        $options ??= new ClientOptions();

        $this->baseUrl = self::resolveBaseUrl($apiKey, $options);
        $this->client = new VoltariaClient(
            token: $apiKey,
            options: $options->toGeneratedOptions($this->baseUrl),
        );

        $this->clients = $this->client->clients;
        $this->sandbox = $this->client->sandbox;
        $this->documents = $this->client->documents;
        $this->investors = $this->client->investors;
        $this->installments = $this->client->installments;
        $this->loans = $this->client->loans;
        $this->partners = $this->client->partners;
        $this->webhooks = $this->client->webhooks;
        $this->repayments = $this->client->repayments;
        $this->drawdowns = $this->client->drawdowns;
    }

    /**
     * Resolve the base URL using the documented precedence:
     *   1. explicit environment
     *   2. explicit base URL
     *   3. API key prefix ("live_" / "sandbox_")
     *
     * @throws InvalidApiKeyException If none of the above resolve.
     */
    private static function resolveBaseUrl(string $apiKey, ClientOptions $options): string
    {
        if ($options->environment !== null) {
            return $options->environment->value;
        }

        if ($options->baseUrl !== null) {
            return $options->baseUrl;
        }

        if (str_starts_with($apiKey, 'live_')) {
            return Environments::Production->value;
        }

        if (str_starts_with($apiKey, 'sandbox_')) {
            return Environments::Sandbox->value;
        }

        throw new InvalidApiKeyException(
            'Unable to resolve environment from API key prefix. Expected the key '
            . 'to start with "live_" or "sandbox_", or an explicit environment / '
            . 'base URL to be supplied via ClientOptions.'
        );
    }
}
