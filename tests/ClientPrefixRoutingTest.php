<?php

namespace Voltaria\Tests;

use PHPUnit\Framework\TestCase;
use Voltaria\Client;
use Voltaria\ClientOptions;
use Voltaria\Environments;
use Voltaria\InvalidApiKeyException;

class ClientPrefixRoutingTest extends TestCase
{
    public function testLivePrefixRoutesToProduction(): void
    {
        $client = new Client('live_abc123');

        $this->assertSame('https://api.voltaria.io', $client->baseUrl);
        $this->assertSame(Environments::Production->value, $client->baseUrl);
    }

    public function testSandboxPrefixRoutesToSandbox(): void
    {
        $client = new Client('sandbox_abc123');

        $this->assertSame('https://api.sandbox.voltaria.io', $client->baseUrl);
        $this->assertSame(Environments::Sandbox->value, $client->baseUrl);
    }

    public function testUnknownPrefixThrows(): void
    {
        $this->expectException(InvalidApiKeyException::class);

        new Client('totally_unknown_key');
    }

    public function testEmptyApiKeyThrows(): void
    {
        $this->expectException(InvalidApiKeyException::class);

        new Client('');
    }

    public function testExplicitBaseUrlOverridesPrefix(): void
    {
        // Prefix would route to Production, but the explicit base URL wins.
        $client = new Client('live_abc123', new ClientOptions(
            baseUrl: 'https://localhost:8080'
        ));

        $this->assertSame('https://localhost:8080', $client->baseUrl);
    }

    public function testExplicitEnvironmentOverridesPrefix(): void
    {
        // Prefix would route to Production, but the explicit environment wins.
        $client = new Client('live_abc123', new ClientOptions(
            environment: Environments::Sandbox
        ));

        $this->assertSame(Environments::Sandbox->value, $client->baseUrl);
    }

    public function testExplicitEnvironmentOverridesExplicitBaseUrl(): void
    {
        // Environment takes precedence over baseUrl when both are supplied.
        $client = new Client('sandbox_abc123', new ClientOptions(
            environment: Environments::Production,
            baseUrl: 'https://localhost:8080'
        ));

        $this->assertSame(Environments::Production->value, $client->baseUrl);
    }

    public function testExplicitBaseUrlRescuesUnknownPrefix(): void
    {
        // An unknown prefix would normally throw, but an explicit base URL
        // overrides prefix routing entirely.
        $client = new Client('unknown_key', new ClientOptions(
            baseUrl: 'https://localhost:8080'
        ));

        $this->assertSame('https://localhost:8080', $client->baseUrl);
    }

    public function testExposesGeneratedSubClients(): void
    {
        $client = new Client('sandbox_abc123');

        $this->assertSame($client->client->loans, $client->loans);
        $this->assertSame($client->client->clients, $client->clients);
        $this->assertSame($client->client->webhooks, $client->webhooks);
    }
}
