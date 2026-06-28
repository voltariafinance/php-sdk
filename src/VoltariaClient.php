<?php

namespace Voltaria;

use Voltaria\Clients\ClientsClient;
use Voltaria\Sandbox\SandboxClient;
use Voltaria\Accounts\AccountsClient;
use Voltaria\Documents\DocumentsClient;
use Voltaria\Investors\InvestorsClient;
use Voltaria\Installments\InstallmentsClient;
use Voltaria\Loans\LoansClient;
use Voltaria\Partners\PartnersClient;
use Voltaria\Webhooks\WebhooksClient;
use Voltaria\Repayments\RepaymentsClient;
use Voltaria\Drawdowns\DrawdownsClient;
use Psr\Http\Client\ClientInterface;
use Voltaria\Core\Client\RawClient;

class VoltariaClient
{
    /**
     * @var ClientsClient $clients
     */
    public ClientsClient $clients;

    /**
     * @var SandboxClient $sandbox
     */
    public SandboxClient $sandbox;

    /**
     * @var AccountsClient $accounts
     */
    public AccountsClient $accounts;

    /**
     * @var DocumentsClient $documents
     */
    public DocumentsClient $documents;

    /**
     * @var InvestorsClient $investors
     */
    public InvestorsClient $investors;

    /**
     * @var InstallmentsClient $installments
     */
    public InstallmentsClient $installments;

    /**
     * @var LoansClient $loans
     */
    public LoansClient $loans;

    /**
     * @var PartnersClient $partners
     */
    public PartnersClient $partners;

    /**
     * @var WebhooksClient $webhooks
     */
    public WebhooksClient $webhooks;

    /**
     * @var RepaymentsClient $repayments
     */
    public RepaymentsClient $repayments;

    /**
     * @var DrawdownsClient $drawdowns
     */
    public DrawdownsClient $drawdowns;

    /**
     * @var array{
     *   baseUrl?: string,
     *   client?: ClientInterface,
     *   maxRetries?: int,
     *   timeout?: float,
     *   headers?: array<string, string>,
     * } $options @phpstan-ignore-next-line Property is used in endpoint methods via HttpEndpointGenerator
     */
    private array $options;

    /**
     * @var RawClient $client
     */
    private RawClient $client;

    /**
     * @param string $token The token to use for authentication.
     * @param ?array{
     *   baseUrl?: string,
     *   client?: ClientInterface,
     *   maxRetries?: int,
     *   timeout?: float,
     *   headers?: array<string, string>,
     * } $options
     */
    public function __construct(
        string $token,
        ?array $options = null,
    ) {
        $defaultHeaders = [
            'Authorization' => "Bearer $token",
            'X-Fern-Language' => 'PHP',
            'X-Fern-SDK-Name' => 'Voltaria',
        ];

        $this->options = $options ?? [];

        $this->options['headers'] = array_merge(
            $defaultHeaders,
            $this->options['headers'] ?? [],
        );

        $this->client = new RawClient(
            options: $this->options,
        );

        $this->clients = new ClientsClient($this->client, $this->options);
        $this->sandbox = new SandboxClient($this->client, $this->options);
        $this->accounts = new AccountsClient($this->client, $this->options);
        $this->documents = new DocumentsClient($this->client, $this->options);
        $this->investors = new InvestorsClient($this->client, $this->options);
        $this->installments = new InstallmentsClient($this->client, $this->options);
        $this->loans = new LoansClient($this->client, $this->options);
        $this->partners = new PartnersClient($this->client, $this->options);
        $this->webhooks = new WebhooksClient($this->client, $this->options);
        $this->repayments = new RepaymentsClient($this->client, $this->options);
        $this->drawdowns = new DrawdownsClient($this->client, $this->options);
    }
}
