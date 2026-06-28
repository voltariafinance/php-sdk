<?php

namespace Voltaria\Installments;

use Psr\Http\Client\ClientInterface;
use Voltaria\Core\Client\RawClient;
use Voltaria\Installments\Requests\ListInstallmentsRequest;
use Voltaria\Types\PaginatedResponseInstallmentResponseWithClientInfo;
use Voltaria\Exceptions\VoltariaException;
use Voltaria\Exceptions\VoltariaApiException;
use Voltaria\Core\Json\JsonApiRequest;
use Voltaria\Environments;
use Voltaria\Core\Client\HttpMethod;
use JsonException;
use Psr\Http\Client\ClientExceptionInterface;
use Voltaria\Installments\Requests\InstallmentCreatePayload;
use Voltaria\Types\InstallmentResponse;
use Voltaria\Core\Json\JsonDecoder;
use Voltaria\Installments\Requests\ListPaymentPromisesRequest;
use Voltaria\Types\PaginatedResponsePaymentPromiseResponse;
use Voltaria\Installments\Requests\PaymentPromiseCreatePayload;
use Voltaria\Types\PaymentPromiseResponse;
use Voltaria\Installments\Requests\InstallmentEditPayload;

class InstallmentsClient
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
     * Retrieve a list of all loan installments under your partner account. Supports optional filtering by loan or client.
     *
     * @param ListInstallmentsRequest $request
     * @param ?array{
     *   baseUrl?: string,
     *   maxRetries?: int,
     *   timeout?: float,
     *   headers?: array<string, string>,
     *   queryParameters?: array<string, mixed>,
     *   bodyProperties?: array<string, mixed>,
     * } $options
     * @return ?PaginatedResponseInstallmentResponseWithClientInfo
     * @throws VoltariaException
     * @throws VoltariaApiException
     */
    public function listInstallments(ListInstallmentsRequest $request = new ListInstallmentsRequest(), ?array $options = null): ?PaginatedResponseInstallmentResponseWithClientInfo
    {
        $options = array_merge($this->options, $options ?? []);
        $query = [];
        if ($request->page != null) {
            $query['page'] = $request->page;
        }
        if ($request->pageSize != null) {
            $query['page_size'] = $request->pageSize;
        }
        if ($request->clientId != null) {
            $query['client_id'] = $request->clientId;
        }
        if ($request->loanId != null) {
            $query['loan_id'] = $request->loanId;
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
                    path: "v2/installments",
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
                return PaginatedResponseInstallmentResponseWithClientInfo::fromJson($json);
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
     * Add new installments to a loan with its specific loan ID. This endpoint is available to select partners and will trigger the recalculation of the IRR and interest amounts for all installments of the loan.
     *
     * @param InstallmentCreatePayload $request
     * @param ?array{
     *   baseUrl?: string,
     *   maxRetries?: int,
     *   timeout?: float,
     *   headers?: array<string, string>,
     *   queryParameters?: array<string, mixed>,
     *   bodyProperties?: array<string, mixed>,
     * } $options
     * @return ?array<InstallmentResponse>
     * @throws VoltariaException
     * @throws VoltariaApiException
     */
    public function addInstallment(InstallmentCreatePayload $request, ?array $options = null): ?array
    {
        $options = array_merge($this->options, $options ?? []);
        try {
            $response = $this->client->sendRequest(
                new JsonApiRequest(
                    baseUrl: $options['baseUrl'] ?? $this->client->options['baseUrl'] ?? Environments::Sandbox->value,
                    path: "v2/installments",
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
                return JsonDecoder::decodeArray($json, [InstallmentResponse::class]); // @phpstan-ignore-line
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
     * Retrieve a list of payment promises recorded for installments under your partner account. Supports optional filtering by loan or client.
     *
     * @param ListPaymentPromisesRequest $request
     * @param ?array{
     *   baseUrl?: string,
     *   maxRetries?: int,
     *   timeout?: float,
     *   headers?: array<string, string>,
     *   queryParameters?: array<string, mixed>,
     *   bodyProperties?: array<string, mixed>,
     * } $options
     * @return ?PaginatedResponsePaymentPromiseResponse
     * @throws VoltariaException
     * @throws VoltariaApiException
     */
    public function listPaymentPromises(ListPaymentPromisesRequest $request = new ListPaymentPromisesRequest(), ?array $options = null): ?PaginatedResponsePaymentPromiseResponse
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
        if ($request->loanId != null) {
            $query['loan_id'] = $request->loanId;
        }
        if ($request->clientId != null) {
            $query['client_id'] = $request->clientId;
        }
        try {
            $response = $this->client->sendRequest(
                new JsonApiRequest(
                    baseUrl: $options['baseUrl'] ?? $this->client->options['baseUrl'] ?? Environments::Sandbox->value,
                    path: "v2/installments/payment-promises",
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
                return PaginatedResponsePaymentPromiseResponse::fromJson($json);
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
     * Record a payment promise made by a client for one of their installments. The promised date must be today or in the future.
     *
     * @param PaymentPromiseCreatePayload $request
     * @param ?array{
     *   baseUrl?: string,
     *   maxRetries?: int,
     *   timeout?: float,
     *   headers?: array<string, string>,
     *   queryParameters?: array<string, mixed>,
     *   bodyProperties?: array<string, mixed>,
     * } $options
     * @return ?PaymentPromiseResponse
     * @throws VoltariaException
     * @throws VoltariaApiException
     */
    public function createPaymentPromise(PaymentPromiseCreatePayload $request, ?array $options = null): ?PaymentPromiseResponse
    {
        $options = array_merge($this->options, $options ?? []);
        try {
            $response = $this->client->sendRequest(
                new JsonApiRequest(
                    baseUrl: $options['baseUrl'] ?? $this->client->options['baseUrl'] ?? Environments::Sandbox->value,
                    path: "v2/installments/payment-promises",
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
                return PaymentPromiseResponse::fromJson($json);
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
     * Retrieve detailed information for a specific installment using its installment ID.
     *
     * @param string $installmentId
     * @param ?array{
     *   baseUrl?: string,
     *   maxRetries?: int,
     *   timeout?: float,
     *   headers?: array<string, string>,
     *   queryParameters?: array<string, mixed>,
     *   bodyProperties?: array<string, mixed>,
     * } $options
     * @return ?InstallmentResponse
     * @throws VoltariaException
     * @throws VoltariaApiException
     */
    public function getInstallmentById(string $installmentId, ?array $options = null): ?InstallmentResponse
    {
        $options = array_merge($this->options, $options ?? []);
        try {
            $response = $this->client->sendRequest(
                new JsonApiRequest(
                    baseUrl: $options['baseUrl'] ?? $this->client->options['baseUrl'] ?? Environments::Sandbox->value,
                    path: "v2/installments/{$installmentId}",
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
                return InstallmentResponse::fromJson($json);
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
     * Update an installment's amount and expected repayment date with its specific installment ID. This endpoint is available to select partners and will trigger the recalculation of the IRR and interest amounts for all installments of the loan.
     *
     * @param string $installmentId
     * @param InstallmentEditPayload $request
     * @param ?array{
     *   baseUrl?: string,
     *   maxRetries?: int,
     *   timeout?: float,
     *   headers?: array<string, string>,
     *   queryParameters?: array<string, mixed>,
     *   bodyProperties?: array<string, mixed>,
     * } $options
     * @return ?InstallmentResponse
     * @throws VoltariaException
     * @throws VoltariaApiException
     */
    public function editInstallment(string $installmentId, InstallmentEditPayload $request, ?array $options = null): ?InstallmentResponse
    {
        $options = array_merge($this->options, $options ?? []);
        try {
            $response = $this->client->sendRequest(
                new JsonApiRequest(
                    baseUrl: $options['baseUrl'] ?? $this->client->options['baseUrl'] ?? Environments::Sandbox->value,
                    path: "v2/installments/{$installmentId}",
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
                return InstallmentResponse::fromJson($json);
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
     * Delete an installment with its specific installment ID. This endpoint is available to select partners and will trigger the recalculation of the IRR and interest amounts for all installments of the loan.
     *
     * @param string $installmentId
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
    public function deleteInstallment(string $installmentId, ?array $options = null): ?array
    {
        $options = array_merge($this->options, $options ?? []);
        try {
            $response = $this->client->sendRequest(
                new JsonApiRequest(
                    baseUrl: $options['baseUrl'] ?? $this->client->options['baseUrl'] ?? Environments::Sandbox->value,
                    path: "v2/installments/{$installmentId}",
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
}
