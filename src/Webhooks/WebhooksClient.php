<?php

namespace Voltaria\Webhooks;

use Psr\Http\Client\ClientInterface;
use Voltaria\Core\Client\RawClient;
use Voltaria\Webhooks\Requests\ListWebhookSubscriptionsRequest;
use Voltaria\Types\PaginatedResponseWebhookSubscriptionResponse;
use Voltaria\Exceptions\VoltariaException;
use Voltaria\Exceptions\VoltariaApiException;
use Voltaria\Core\Json\JsonApiRequest;
use Voltaria\Environments;
use Voltaria\Core\Client\HttpMethod;
use JsonException;
use Psr\Http\Client\ClientExceptionInterface;
use Voltaria\Webhooks\Requests\WebhookCreatePayload;
use Voltaria\Types\WebhookSubscriptionResponse;
use Voltaria\Webhooks\Requests\WebhookUpdatePayload;
use Voltaria\Core\Json\JsonDecoder;
use Voltaria\Webhooks\Requests\ListWebhookLogsRequest;
use Voltaria\Types\PaginatedResponseWebhookLogResponse;

class WebhooksClient
{
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
     * @param RawClient $client
     * @param ?array{
     *   baseUrl?: string,
     *   client?: ClientInterface,
     *   maxRetries?: int,
     *   timeout?: float,
     *   headers?: array<string, string>,
     * } $options
     */
    public function __construct(
        RawClient $client,
        ?array $options = null,
    ) {
        $this->client = $client;
        $this->options = $options ?? [];
    }

    /**
     * List all webhook subscriptions for your partner account.
     *
     * @param ListWebhookSubscriptionsRequest $request
     * @param ?array{
     *   baseUrl?: string,
     *   maxRetries?: int,
     *   timeout?: float,
     *   headers?: array<string, string>,
     *   queryParameters?: array<string, mixed>,
     *   bodyProperties?: array<string, mixed>,
     * } $options
     * @return ?PaginatedResponseWebhookSubscriptionResponse
     * @throws VoltariaException
     * @throws VoltariaApiException
     */
    public function listWebhookSubscriptions(ListWebhookSubscriptionsRequest $request = new ListWebhookSubscriptionsRequest(), ?array $options = null): ?PaginatedResponseWebhookSubscriptionResponse
    {
        $options = array_merge($this->options, $options ?? []);
        $query = [];
        if ($request->page != null) {
            $query['page'] = $request->page;
        }
        if ($request->pageSize != null) {
            $query['page_size'] = $request->pageSize;
        }
        if ($request->eventType != null) {
            $query['event_type'] = $request->eventType;
        }
        try {
            $response = $this->client->sendRequest(
                new JsonApiRequest(
                    baseUrl: $options['baseUrl'] ?? $this->client->options['baseUrl'] ?? Environments::Sandbox->value,
                    path: "v2/webhooks/subscriptions",
                    method: HttpMethod::GET,
                    query: $query,
                ),
                $options,
            );
            $statusCode = $response->getStatusCode();
            if ($statusCode >= 200 && $statusCode < 400) {
                $json = $response->getBody()->getContents();
                if (empty($json)) {
                    return null;
                }
                return PaginatedResponseWebhookSubscriptionResponse::fromJson($json);
            }
        } catch (JsonException $e) {
            throw new VoltariaException(message: "Failed to deserialize response: {$e->getMessage()}", previous: $e);
        } catch (ClientExceptionInterface $e) {
            throw new VoltariaException(message: $e->getMessage(), previous: $e);
        }
        throw new VoltariaApiException(
            message: 'API request failed',
            statusCode: $statusCode,
            body: $response->getBody()->getContents(),
        );
    }

    /**
     * Create a new webhook subscription for a specific event type.
     *
     * @param WebhookCreatePayload $request
     * @param ?array{
     *   baseUrl?: string,
     *   maxRetries?: int,
     *   timeout?: float,
     *   headers?: array<string, string>,
     *   queryParameters?: array<string, mixed>,
     *   bodyProperties?: array<string, mixed>,
     * } $options
     * @return ?WebhookSubscriptionResponse
     * @throws VoltariaException
     * @throws VoltariaApiException
     */
    public function createWebhookSubscription(WebhookCreatePayload $request, ?array $options = null): ?WebhookSubscriptionResponse
    {
        $options = array_merge($this->options, $options ?? []);
        try {
            $response = $this->client->sendRequest(
                new JsonApiRequest(
                    baseUrl: $options['baseUrl'] ?? $this->client->options['baseUrl'] ?? Environments::Sandbox->value,
                    path: "v2/webhooks/subscriptions",
                    method: HttpMethod::POST,
                    body: $request,
                ),
                $options,
            );
            $statusCode = $response->getStatusCode();
            if ($statusCode >= 200 && $statusCode < 400) {
                $json = $response->getBody()->getContents();
                if (empty($json)) {
                    return null;
                }
                return WebhookSubscriptionResponse::fromJson($json);
            }
        } catch (JsonException $e) {
            throw new VoltariaException(message: "Failed to deserialize response: {$e->getMessage()}", previous: $e);
        } catch (ClientExceptionInterface $e) {
            throw new VoltariaException(message: $e->getMessage(), previous: $e);
        }
        throw new VoltariaApiException(
            message: 'API request failed',
            statusCode: $statusCode,
            body: $response->getBody()->getContents(),
        );
    }

    /**
     * Retrieve details for a specific webhook subscription with its webhook ID.
     *
     * @param string $webhookId
     * @param ?array{
     *   baseUrl?: string,
     *   maxRetries?: int,
     *   timeout?: float,
     *   headers?: array<string, string>,
     *   queryParameters?: array<string, mixed>,
     *   bodyProperties?: array<string, mixed>,
     * } $options
     * @return ?WebhookSubscriptionResponse
     * @throws VoltariaException
     * @throws VoltariaApiException
     */
    public function getWebhookSubscription(string $webhookId, ?array $options = null): ?WebhookSubscriptionResponse
    {
        $options = array_merge($this->options, $options ?? []);
        try {
            $response = $this->client->sendRequest(
                new JsonApiRequest(
                    baseUrl: $options['baseUrl'] ?? $this->client->options['baseUrl'] ?? Environments::Sandbox->value,
                    path: "v2/webhooks/subscriptions/{$webhookId}",
                    method: HttpMethod::GET,
                ),
                $options,
            );
            $statusCode = $response->getStatusCode();
            if ($statusCode >= 200 && $statusCode < 400) {
                $json = $response->getBody()->getContents();
                if (empty($json)) {
                    return null;
                }
                return WebhookSubscriptionResponse::fromJson($json);
            }
        } catch (JsonException $e) {
            throw new VoltariaException(message: "Failed to deserialize response: {$e->getMessage()}", previous: $e);
        } catch (ClientExceptionInterface $e) {
            throw new VoltariaException(message: $e->getMessage(), previous: $e);
        }
        throw new VoltariaApiException(
            message: 'API request failed',
            statusCode: $statusCode,
            body: $response->getBody()->getContents(),
        );
    }

    /**
     * Update a webhook subscription with its specific webhook ID.
     *
     * @param string $webhookId
     * @param WebhookUpdatePayload $request
     * @param ?array{
     *   baseUrl?: string,
     *   maxRetries?: int,
     *   timeout?: float,
     *   headers?: array<string, string>,
     *   queryParameters?: array<string, mixed>,
     *   bodyProperties?: array<string, mixed>,
     * } $options
     * @return ?WebhookSubscriptionResponse
     * @throws VoltariaException
     * @throws VoltariaApiException
     */
    public function updateWebhookSubscription(string $webhookId, WebhookUpdatePayload $request = new WebhookUpdatePayload(), ?array $options = null): ?WebhookSubscriptionResponse
    {
        $options = array_merge($this->options, $options ?? []);
        try {
            $response = $this->client->sendRequest(
                new JsonApiRequest(
                    baseUrl: $options['baseUrl'] ?? $this->client->options['baseUrl'] ?? Environments::Sandbox->value,
                    path: "v2/webhooks/subscriptions/{$webhookId}",
                    method: HttpMethod::PUT,
                    body: $request,
                ),
                $options,
            );
            $statusCode = $response->getStatusCode();
            if ($statusCode >= 200 && $statusCode < 400) {
                $json = $response->getBody()->getContents();
                if (empty($json)) {
                    return null;
                }
                return WebhookSubscriptionResponse::fromJson($json);
            }
        } catch (JsonException $e) {
            throw new VoltariaException(message: "Failed to deserialize response: {$e->getMessage()}", previous: $e);
        } catch (ClientExceptionInterface $e) {
            throw new VoltariaException(message: $e->getMessage(), previous: $e);
        }
        throw new VoltariaApiException(
            message: 'API request failed',
            statusCode: $statusCode,
            body: $response->getBody()->getContents(),
        );
    }

    /**
     * Delete a specific webhook subscription.
     *
     * @param string $webhookId
     * @param ?array{
     *   baseUrl?: string,
     *   maxRetries?: int,
     *   timeout?: float,
     *   headers?: array<string, string>,
     *   queryParameters?: array<string, mixed>,
     *   bodyProperties?: array<string, mixed>,
     * } $options
     * @return ?array<string, mixed>
     * @throws VoltariaException
     * @throws VoltariaApiException
     */
    public function deleteWebhookSubscription(string $webhookId, ?array $options = null): ?array
    {
        $options = array_merge($this->options, $options ?? []);
        try {
            $response = $this->client->sendRequest(
                new JsonApiRequest(
                    baseUrl: $options['baseUrl'] ?? $this->client->options['baseUrl'] ?? Environments::Sandbox->value,
                    path: "v2/webhooks/subscriptions/{$webhookId}",
                    method: HttpMethod::DELETE,
                ),
                $options,
            );
            $statusCode = $response->getStatusCode();
            if ($statusCode >= 200 && $statusCode < 400) {
                $json = $response->getBody()->getContents();
                if (empty($json)) {
                    return null;
                }
                return JsonDecoder::decodeArray($json, ['string' => 'mixed']); // @phpstan-ignore-line
            }
        } catch (JsonException $e) {
            throw new VoltariaException(message: "Failed to deserialize response: {$e->getMessage()}", previous: $e);
        } catch (ClientExceptionInterface $e) {
            throw new VoltariaException(message: $e->getMessage(), previous: $e);
        }
        throw new VoltariaApiException(
            message: 'API request failed',
            statusCode: $statusCode,
            body: $response->getBody()->getContents(),
        );
    }

    /**
     * Retrieve all webhook logs linked to your partner account.
     *
     * @param ListWebhookLogsRequest $request
     * @param ?array{
     *   baseUrl?: string,
     *   maxRetries?: int,
     *   timeout?: float,
     *   headers?: array<string, string>,
     *   queryParameters?: array<string, mixed>,
     *   bodyProperties?: array<string, mixed>,
     * } $options
     * @return ?PaginatedResponseWebhookLogResponse
     * @throws VoltariaException
     * @throws VoltariaApiException
     */
    public function listWebhookLogs(ListWebhookLogsRequest $request = new ListWebhookLogsRequest(), ?array $options = null): ?PaginatedResponseWebhookLogResponse
    {
        $options = array_merge($this->options, $options ?? []);
        $query = [];
        if ($request->webhookId != null) {
            $query['webhook_id'] = $request->webhookId;
        }
        if ($request->page != null) {
            $query['page'] = $request->page;
        }
        if ($request->pageSize != null) {
            $query['page_size'] = $request->pageSize;
        }
        try {
            $response = $this->client->sendRequest(
                new JsonApiRequest(
                    baseUrl: $options['baseUrl'] ?? $this->client->options['baseUrl'] ?? Environments::Sandbox->value,
                    path: "v2/webhooks/logs",
                    method: HttpMethod::GET,
                    query: $query,
                ),
                $options,
            );
            $statusCode = $response->getStatusCode();
            if ($statusCode >= 200 && $statusCode < 400) {
                $json = $response->getBody()->getContents();
                if (empty($json)) {
                    return null;
                }
                return PaginatedResponseWebhookLogResponse::fromJson($json);
            }
        } catch (JsonException $e) {
            throw new VoltariaException(message: "Failed to deserialize response: {$e->getMessage()}", previous: $e);
        } catch (ClientExceptionInterface $e) {
            throw new VoltariaException(message: $e->getMessage(), previous: $e);
        }
        throw new VoltariaApiException(
            message: 'API request failed',
            statusCode: $statusCode,
            body: $response->getBody()->getContents(),
        );
    }
}
