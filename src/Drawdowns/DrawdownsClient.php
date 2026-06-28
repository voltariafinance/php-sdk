<?php

namespace Voltaria\Drawdowns;

use Psr\Http\Client\ClientInterface;
use Voltaria\Core\Client\RawClient;
use Voltaria\Drawdowns\Requests\ListDrawdownsRequest;
use Voltaria\Types\PaginatedResponseDrawdownResponse;
use Voltaria\Exceptions\VoltariaException;
use Voltaria\Exceptions\VoltariaApiException;
use Voltaria\Core\Json\JsonApiRequest;
use Voltaria\Environments;
use Voltaria\Core\Client\HttpMethod;
use JsonException;
use Psr\Http\Client\ClientExceptionInterface;
use Voltaria\Drawdowns\Requests\DrawdownCreatePayload;
use Voltaria\Types\DrawdownResponse;
use Voltaria\Drawdowns\Requests\ListDrawdownChecklistsRequest;
use Voltaria\Types\PaginatedResponseDrawdownChecklistResponse;

class DrawdownsClient
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
     * Retrieve a list of drawdowns.
     *
     * @param ListDrawdownsRequest $request
     * @param ?array{
     *   baseUrl?: string,
     *   maxRetries?: int,
     *   timeout?: float,
     *   headers?: array<string, string>,
     *   queryParameters?: array<string, mixed>,
     *   bodyProperties?: array<string, mixed>,
     * } $options
     * @return ?PaginatedResponseDrawdownResponse
     * @throws VoltariaException
     * @throws VoltariaApiException
     */
    public function listDrawdowns(ListDrawdownsRequest $request = new ListDrawdownsRequest(), ?array $options = null): ?PaginatedResponseDrawdownResponse
    {
        $options = array_merge($this->options, $options ?? []);
        $query = [];
        if ($request->page != null) {
            $query['page'] = $request->page;
        }
        if ($request->pageSize != null) {
            $query['page_size'] = $request->pageSize;
        }
        if ($request->orderBy != null) {
            $query['order_by'] = $request->orderBy;
        }
        if ($request->q != null) {
            $query['q'] = $request->q;
        }
        try {
            $response = $this->client->sendRequest(
                new JsonApiRequest(
                    baseUrl: $options['baseUrl'] ?? $this->client->options['baseUrl'] ?? Environments::Sandbox->value,
                    path: "v2/drawdowns",
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
                return PaginatedResponseDrawdownResponse::fromJson($json);
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
     * Create a new drawdown request.
     *
     * @param DrawdownCreatePayload $request
     * @param ?array{
     *   baseUrl?: string,
     *   maxRetries?: int,
     *   timeout?: float,
     *   headers?: array<string, string>,
     *   queryParameters?: array<string, mixed>,
     *   bodyProperties?: array<string, mixed>,
     * } $options
     * @return ?DrawdownResponse
     * @throws VoltariaException
     * @throws VoltariaApiException
     */
    public function createDrawdownRequest(DrawdownCreatePayload $request, ?array $options = null): ?DrawdownResponse
    {
        $options = array_merge($this->options, $options ?? []);
        try {
            $response = $this->client->sendRequest(
                new JsonApiRequest(
                    baseUrl: $options['baseUrl'] ?? $this->client->options['baseUrl'] ?? Environments::Sandbox->value,
                    path: "v2/drawdowns",
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
                return DrawdownResponse::fromJson($json);
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
     * Retrieve all checklist items for a specific drawdown
     *
     * @param string $drawdownId
     * @param ListDrawdownChecklistsRequest $request
     * @param ?array{
     *   baseUrl?: string,
     *   maxRetries?: int,
     *   timeout?: float,
     *   headers?: array<string, string>,
     *   queryParameters?: array<string, mixed>,
     *   bodyProperties?: array<string, mixed>,
     * } $options
     * @return ?PaginatedResponseDrawdownChecklistResponse
     * @throws VoltariaException
     * @throws VoltariaApiException
     */
    public function listDrawdownChecklists(string $drawdownId, ListDrawdownChecklistsRequest $request = new ListDrawdownChecklistsRequest(), ?array $options = null): ?PaginatedResponseDrawdownChecklistResponse
    {
        $options = array_merge($this->options, $options ?? []);
        $query = [];
        if ($request->page != null) {
            $query['page'] = $request->page;
        }
        if ($request->pageSize != null) {
            $query['page_size'] = $request->pageSize;
        }
        if ($request->orderBy != null) {
            $query['order_by'] = $request->orderBy;
        }
        if ($request->q != null) {
            $query['q'] = $request->q;
        }
        try {
            $response = $this->client->sendRequest(
                new JsonApiRequest(
                    baseUrl: $options['baseUrl'] ?? $this->client->options['baseUrl'] ?? Environments::Sandbox->value,
                    path: "v2/drawdowns/{$drawdownId}/checklists",
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
                return PaginatedResponseDrawdownChecklistResponse::fromJson($json);
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
