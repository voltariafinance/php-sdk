<?php

namespace Voltaria\Loans;

use Psr\Http\Client\ClientInterface;
use Voltaria\Core\Client\RawClient;
use Voltaria\Loans\Requests\ListLoanReviewRequestsRequest;
use Voltaria\Types\PaginatedResponseLoanReviewRequestResponse;
use Voltaria\Exceptions\VoltariaException;
use Voltaria\Exceptions\VoltariaApiException;
use Voltaria\Core\Json\JsonApiRequest;
use Voltaria\Environments;
use Voltaria\Core\Client\HttpMethod;
use JsonException;
use Psr\Http\Client\ClientExceptionInterface;
use Voltaria\Loans\Requests\LoanReviewRequestCreatePayload;
use Voltaria\Types\LoanReviewRequestResponse;
use Voltaria\Loans\Requests\ListLoansRequest;
use Voltaria\Types\PaginatedResponseLoanResponseWithClientInfo;
use Voltaria\Loans\Requests\LoanCreatePayload;
use Voltaria\Types\LoanResponseWithInstallments;
use Voltaria\Core\Json\JsonDecoder;
use Voltaria\Loans\Requests\EarlySettlementPayload;
use Voltaria\Types\EarlySettlementResponse;
use Voltaria\Loans\Requests\BulkLoanCreatePayload;
use Voltaria\Types\BulkLoanTaskResponse;
use Voltaria\Types\BulkLoanTaskStatus;
use Voltaria\Loans\Requests\LoanDefaultPayload;

class LoansClient
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
     * List loan review requests for your partner account, optionally filtered by loan ID or client ID.
     *
     * @param ListLoanReviewRequestsRequest $request
     * @param ?array{
     *   baseUrl?: string,
     *   maxRetries?: int,
     *   timeout?: float,
     *   headers?: array<string, string>,
     *   queryParameters?: array<string, mixed>,
     *   bodyProperties?: array<string, mixed>,
     * } $options
     * @return ?PaginatedResponseLoanReviewRequestResponse
     * @throws VoltariaException
     * @throws VoltariaApiException
     */
    public function listLoanReviewRequests(ListLoanReviewRequestsRequest $request = new ListLoanReviewRequestsRequest(), ?array $options = null): ?PaginatedResponseLoanReviewRequestResponse
    {
        $options = array_merge($this->options, $options ?? []);
        $query = [];
        if ($request->loanId != null) {
            $query['loan_id'] = $request->loanId;
        }
        if ($request->clientId != null) {
            $query['client_id'] = $request->clientId;
        }
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
                    path: "v2/loans/review-requests",
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
                return PaginatedResponseLoanReviewRequestResponse::fromJson($json);
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
     * Ask Voltaria to review a not-yet-disbursed (pending or pre-approved) loan before disbursement.
     *
     * @param LoanReviewRequestCreatePayload $request
     * @param ?array{
     *   baseUrl?: string,
     *   maxRetries?: int,
     *   timeout?: float,
     *   headers?: array<string, string>,
     *   queryParameters?: array<string, mixed>,
     *   bodyProperties?: array<string, mixed>,
     * } $options
     * @return ?LoanReviewRequestResponse
     * @throws VoltariaException
     * @throws VoltariaApiException
     */
    public function createLoanReviewRequest(LoanReviewRequestCreatePayload $request, ?array $options = null): ?LoanReviewRequestResponse
    {
        $options = array_merge($this->options, $options ?? []);
        try {
            $response = $this->client->sendRequest(
                new JsonApiRequest(
                    baseUrl: $options['baseUrl'] ?? $this->client->options['baseUrl'] ?? Environments::Sandbox->value,
                    path: "v2/loans/review-requests",
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
                return LoanReviewRequestResponse::fromJson($json);
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
     * Retrieve a specific loan review request by its ID.
     *
     * @param string $requestId
     * @param ?array{
     *   baseUrl?: string,
     *   maxRetries?: int,
     *   timeout?: float,
     *   headers?: array<string, string>,
     *   queryParameters?: array<string, mixed>,
     *   bodyProperties?: array<string, mixed>,
     * } $options
     * @return ?LoanReviewRequestResponse
     * @throws VoltariaException
     * @throws VoltariaApiException
     */
    public function getLoanReviewRequest(string $requestId, ?array $options = null): ?LoanReviewRequestResponse
    {
        $options = array_merge($this->options, $options ?? []);
        try {
            $response = $this->client->sendRequest(
                new JsonApiRequest(
                    baseUrl: $options['baseUrl'] ?? $this->client->options['baseUrl'] ?? Environments::Sandbox->value,
                    path: "v2/loans/review-requests/{$requestId}",
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
                return LoanReviewRequestResponse::fromJson($json);
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
     * Retrieve all loans associated with your partner account. Supports optional filtering by client ID.
     *
     * @param ListLoansRequest $request
     * @param ?array{
     *   baseUrl?: string,
     *   maxRetries?: int,
     *   timeout?: float,
     *   headers?: array<string, string>,
     *   queryParameters?: array<string, mixed>,
     *   bodyProperties?: array<string, mixed>,
     * } $options
     * @return ?PaginatedResponseLoanResponseWithClientInfo
     * @throws VoltariaException
     * @throws VoltariaApiException
     */
    public function listLoans(ListLoansRequest $request = new ListLoansRequest(), ?array $options = null): ?PaginatedResponseLoanResponseWithClientInfo
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
                    path: "v2/loans",
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
                return PaginatedResponseLoanResponseWithClientInfo::fromJson($json);
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
     * Create a new loan for an approved client with an active credit limit.
     *
     * @param LoanCreatePayload $request
     * @param ?array{
     *   baseUrl?: string,
     *   maxRetries?: int,
     *   timeout?: float,
     *   headers?: array<string, string>,
     *   queryParameters?: array<string, mixed>,
     *   bodyProperties?: array<string, mixed>,
     * } $options
     * @return ?LoanResponseWithInstallments
     * @throws VoltariaException
     * @throws VoltariaApiException
     */
    public function createLoan(LoanCreatePayload $request, ?array $options = null): ?LoanResponseWithInstallments
    {
        $options = array_merge($this->options, $options ?? []);
        try {
            $response = $this->client->sendRequest(
                new JsonApiRequest(
                    baseUrl: $options['baseUrl'] ?? $this->client->options['baseUrl'] ?? Environments::Sandbox->value,
                    path: "v2/loans",
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
                return LoanResponseWithInstallments::fromJson($json);
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
     * Retrieve detailed information about a specific loan by its loan ID.
     *
     * @param string $loanId
     * @param ?array{
     *   baseUrl?: string,
     *   maxRetries?: int,
     *   timeout?: float,
     *   headers?: array<string, string>,
     *   queryParameters?: array<string, mixed>,
     *   bodyProperties?: array<string, mixed>,
     * } $options
     * @return ?LoanResponseWithInstallments
     * @throws VoltariaException
     * @throws VoltariaApiException
     */
    public function getLoanById(string $loanId, ?array $options = null): ?LoanResponseWithInstallments
    {
        $options = array_merge($this->options, $options ?? []);
        try {
            $response = $this->client->sendRequest(
                new JsonApiRequest(
                    baseUrl: $options['baseUrl'] ?? $this->client->options['baseUrl'] ?? Environments::Sandbox->value,
                    path: "v2/loans/{$loanId}",
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
                return LoanResponseWithInstallments::fromJson($json);
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
     * Delete a loan by ID. Only loans with 'pending' status can be deleted.
     *
     * @param string $loanId
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
    public function deleteLoan(string $loanId, ?array $options = null): ?array
    {
        $options = array_merge($this->options, $options ?? []);
        try {
            $response = $this->client->sendRequest(
                new JsonApiRequest(
                    baseUrl: $options['baseUrl'] ?? $this->client->options['baseUrl'] ?? Environments::Sandbox->value,
                    path: "v2/loans/{$loanId}",
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
     * Calculate the indicative early settlement figure for a loan as of the given settlement date. The amount is indicative only, not a binding quote, and has no validity period — it changes as repayments are recorded and as the settlement date moves. Confirm the final amount with Voltaria before collecting from the borrower.
     *
     * @param string $loanId
     * @param EarlySettlementPayload $request
     * @param ?array{
     *   baseUrl?: string,
     *   maxRetries?: int,
     *   timeout?: float,
     *   headers?: array<string, string>,
     *   queryParameters?: array<string, mixed>,
     *   bodyProperties?: array<string, mixed>,
     * } $options
     * @return ?EarlySettlementResponse
     * @throws VoltariaException
     * @throws VoltariaApiException
     */
    public function calculateSettlement(string $loanId, EarlySettlementPayload $request = new EarlySettlementPayload(), ?array $options = null): ?EarlySettlementResponse
    {
        $options = array_merge($this->options, $options ?? []);
        try {
            $response = $this->client->sendRequest(
                new JsonApiRequest(
                    baseUrl: $options['baseUrl'] ?? $this->client->options['baseUrl'] ?? Environments::Sandbox->value,
                    path: "v2/loans/{$loanId}/calculate-settlement",
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
                return EarlySettlementResponse::fromJson($json);
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
     * Create multiple loans in a single request. Processing happens asynchronously. Returns a task ID for tracking progress.
     *
     * @param BulkLoanCreatePayload $request
     * @param ?array{
     *   baseUrl?: string,
     *   maxRetries?: int,
     *   timeout?: float,
     *   headers?: array<string, string>,
     *   queryParameters?: array<string, mixed>,
     *   bodyProperties?: array<string, mixed>,
     * } $options
     * @return ?BulkLoanTaskResponse
     * @throws VoltariaException
     * @throws VoltariaApiException
     */
    public function createBulkLoans(BulkLoanCreatePayload $request, ?array $options = null): ?BulkLoanTaskResponse
    {
        $options = array_merge($this->options, $options ?? []);
        try {
            $response = $this->client->sendRequest(
                new JsonApiRequest(
                    baseUrl: $options['baseUrl'] ?? $this->client->options['baseUrl'] ?? Environments::Sandbox->value,
                    path: "v2/loans/bulk",
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
                return BulkLoanTaskResponse::fromJson($json);
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
     * Check the status of a bulk loan creation task and retrieve results when completed.
     *
     * @param string $taskId
     * @param ?array{
     *   baseUrl?: string,
     *   maxRetries?: int,
     *   timeout?: float,
     *   headers?: array<string, string>,
     *   queryParameters?: array<string, mixed>,
     *   bodyProperties?: array<string, mixed>,
     * } $options
     * @return ?BulkLoanTaskStatus
     * @throws VoltariaException
     * @throws VoltariaApiException
     */
    public function getBulkLoanStatus(string $taskId, ?array $options = null): ?BulkLoanTaskStatus
    {
        $options = array_merge($this->options, $options ?? []);
        try {
            $response = $this->client->sendRequest(
                new JsonApiRequest(
                    baseUrl: $options['baseUrl'] ?? $this->client->options['baseUrl'] ?? Environments::Sandbox->value,
                    path: "v2/loans/bulk/{$taskId}",
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
                return BulkLoanTaskStatus::fromJson($json);
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
     * Mark a loan as defaulted, recording the default date and the amount recovered from selling it. Defaults the loan's active and overdue installments and updates the loan status accordingly.
     *
     * @param string $loanId
     * @param LoanDefaultPayload $request
     * @param ?array{
     *   baseUrl?: string,
     *   maxRetries?: int,
     *   timeout?: float,
     *   headers?: array<string, string>,
     *   queryParameters?: array<string, mixed>,
     *   bodyProperties?: array<string, mixed>,
     * } $options
     * @return ?LoanResponseWithInstallments
     * @throws VoltariaException
     * @throws VoltariaApiException
     */
    public function setLoanDefault(string $loanId, LoanDefaultPayload $request, ?array $options = null): ?LoanResponseWithInstallments
    {
        $options = array_merge($this->options, $options ?? []);
        try {
            $response = $this->client->sendRequest(
                new JsonApiRequest(
                    baseUrl: $options['baseUrl'] ?? $this->client->options['baseUrl'] ?? Environments::Sandbox->value,
                    path: "v2/loans/{$loanId}/set-default",
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
                return LoanResponseWithInstallments::fromJson($json);
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
