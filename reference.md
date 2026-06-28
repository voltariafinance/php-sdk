# Reference
## Clients
<details><summary><code>$client-&gt;clients-&gt;listClients($request) -> ?PaginatedResponseClientResponse</code></summary>
<dl>
<dd>

#### 📝 Description

<dl>
<dd>

<dl>
<dd>

Retrieve a list of all clients associated with your partner account.
</dd>
</dl>
</dd>
</dl>

#### 🔌 Usage

<dl>
<dd>

<dl>
<dd>

```php
$client->clients->listClients(
    new ListClientsRequest([]),
);
```
</dd>
</dl>
</dd>
</dl>

#### ⚙️ Parameters

<dl>
<dd>

<dl>
<dd>

**$page:** `?int` 
    
</dd>
</dl>

<dl>
<dd>

**$pageSize:** `?int` 
    
</dd>
</dl>

<dl>
<dd>

**$orderBy:** `?string` — Field to order the results by, e.g., 'created_at:desc,updated_at:asc'
    
</dd>
</dl>

<dl>
<dd>

**$q:** `?string` — Query string for filtering. Format: "field:operator:value;...". Supported fields: id, name, correlation_id, company_number, status. Supported operators: is, in, not_in, contains, not_contains, like, not_like, ilike, not_ilike, gt, gte, lt, lte, starts_with, ends_with, is_null, is_not_null.
    
</dd>
</dl>
</dd>
</dl>


</dd>
</dl>
</details>

<details><summary><code>$client-&gt;clients-&gt;createClient($request) -> ?ClientResponse</code></summary>
<dl>
<dd>

#### 📝 Description

<dl>
<dd>

<dl>
<dd>

Create a new client under your partner account. The client will remain in a pending state until reviewed by Winyield.
</dd>
</dl>
</dd>
</dl>

#### 🔌 Usage

<dl>
<dd>

<dl>
<dd>

```php
$client->clients->createClient(
    new ClientCreatePayload([
        'name' => 'ACME Corp',
        'jurisdiction' => JurisdictionEnum::Eu->value,
    ]),
);
```
</dd>
</dl>
</dd>
</dl>

#### ⚙️ Parameters

<dl>
<dd>

<dl>
<dd>

**$correlationId:** `?string` — The correlation ID you provided at the creation of the client
    
</dd>
</dl>

<dl>
<dd>

**$name:** `string` — The name of the client
    
</dd>
</dl>

<dl>
<dd>

**$type:** `?string` — The type of the client, must be one of `individual`,`corporate`. Default is `corporate` if not provided.
    
</dd>
</dl>

<dl>
<dd>

**$jurisdiction:** `string` — The jurisdiction of the client, must be one of `eu`, `us`, `uk`
    
</dd>
</dl>

<dl>
<dd>

**$companyNumber:** `?string` — The company number of the client if type is `corporate`
    
</dd>
</dl>

<dl>
<dd>

**$data:** `?array` — Additional data associated with the client
    
</dd>
</dl>
</dd>
</dl>


</dd>
</dl>
</details>

<details><summary><code>$client-&gt;clients-&gt;createClientData($request) -> ?ClientDataResponse</code></summary>
<dl>
<dd>

#### 📝 Description

<dl>
<dd>

<dl>
<dd>

Upload supplementary client information, such as bank account balance, accounting figures, or other relevant details.
</dd>
</dl>
</dd>
</dl>

#### 🔌 Usage

<dl>
<dd>

<dl>
<dd>

```php
$client->clients->createClientData(
    new ClientDataCreatePayload([
        'clientId' => 'client_123',
        'data' => [
            'key1' => "value1",
            'key2' => "value2",
        ],
    ]),
);
```
</dd>
</dl>
</dd>
</dl>

#### ⚙️ Parameters

<dl>
<dd>

<dl>
<dd>

**$clientId:** `string` 
    
</dd>
</dl>

<dl>
<dd>

**$data:** `array` 
    
</dd>
</dl>
</dd>
</dl>


</dd>
</dl>
</details>

<details><summary><code>$client-&gt;clients-&gt;listLimitRequests($request) -> ?PaginatedResponseLimitRequestResponse</code></summary>
<dl>
<dd>

#### 📝 Description

<dl>
<dd>

<dl>
<dd>

Retrieve a list of all limit requests associated with your partner account.
</dd>
</dl>
</dd>
</dl>

#### 🔌 Usage

<dl>
<dd>

<dl>
<dd>

```php
$client->clients->listLimitRequests(
    new ListLimitRequestsRequest([]),
);
```
</dd>
</dl>
</dd>
</dl>

#### ⚙️ Parameters

<dl>
<dd>

<dl>
<dd>

**$clientId:** `?string` — Filter by client ID
    
</dd>
</dl>

<dl>
<dd>

**$page:** `?int` 
    
</dd>
</dl>

<dl>
<dd>

**$pageSize:** `?int` 
    
</dd>
</dl>

<dl>
<dd>

**$orderBy:** `?string` — Field to order the results by, e.g., 'created_at:desc,updated_at:asc'
    
</dd>
</dl>

<dl>
<dd>

**$q:** `?string` — Query string for filtering. Format: "field:operator:value;...". Supported fields: id, client_id. Supported operators: is, in, not_in, contains, not_contains, like, not_like, ilike, not_ilike, gt, gte, lt, lte, starts_with, ends_with, is_null, is_not_null.
    
</dd>
</dl>
</dd>
</dl>


</dd>
</dl>
</details>

<details><summary><code>$client-&gt;clients-&gt;createLimitRequest($request) -> ?LimitRequestResponse</code></summary>
<dl>
<dd>

#### 📝 Description

<dl>
<dd>

<dl>
<dd>

Create a limit review request for a client. The request will remain in a pending state until reviewed by Winyield.
</dd>
</dl>
</dd>
</dl>

#### 🔌 Usage

<dl>
<dd>

<dl>
<dd>

```php
$client->clients->createLimitRequest(
    new LimitRequestCreatePayload([
        'clientId' => 'client_1234567890abcdef',
        'requestedLimit' => 1.1,
        'reason' => 'Need more credit for business expansion',
    ]),
);
```
</dd>
</dl>
</dd>
</dl>

#### ⚙️ Parameters

<dl>
<dd>

<dl>
<dd>

**$clientId:** `string` — The ID of the client for which the limit request is being created
    
</dd>
</dl>

<dl>
<dd>

**$requestedLimit:** `float|string` — The requested credit limit amount
    
</dd>
</dl>

<dl>
<dd>

**$reason:** `string` — The reason for the limit request
    
</dd>
</dl>

<dl>
<dd>

**$waiverRequest:** `?bool` — Whether a special waiver is requested alongside this limit request
    
</dd>
</dl>
</dd>
</dl>


</dd>
</dl>
</details>

<details><summary><code>$client-&gt;clients-&gt;getLimitRequest($requestId) -> ?LimitRequestResponse</code></summary>
<dl>
<dd>

#### 📝 Description

<dl>
<dd>

<dl>
<dd>

Retrieve a specific limit request by its ID.
</dd>
</dl>
</dd>
</dl>

#### 🔌 Usage

<dl>
<dd>

<dl>
<dd>

```php
$client->clients->getLimitRequest(
    'request_id',
);
```
</dd>
</dl>
</dd>
</dl>

#### ⚙️ Parameters

<dl>
<dd>

<dl>
<dd>

**$requestId:** `string` 
    
</dd>
</dl>
</dd>
</dl>


</dd>
</dl>
</details>

<details><summary><code>$client-&gt;clients-&gt;listOnboardingClients($request) -> ?PaginatedResponseClientResponse</code></summary>
<dl>
<dd>

#### 📝 Description

<dl>
<dd>

<dl>
<dd>

Retrieve all clients that have self-registered via the portal and are awaiting partner approval.
</dd>
</dl>
</dd>
</dl>

#### 🔌 Usage

<dl>
<dd>

<dl>
<dd>

```php
$client->clients->listOnboardingClients(
    new ListOnboardingClientsRequest([]),
);
```
</dd>
</dl>
</dd>
</dl>

#### ⚙️ Parameters

<dl>
<dd>

<dl>
<dd>

**$page:** `?int` 
    
</dd>
</dl>

<dl>
<dd>

**$pageSize:** `?int` 
    
</dd>
</dl>
</dd>
</dl>


</dd>
</dl>
</details>

<details><summary><code>$client-&gt;clients-&gt;approveOnboarding($clientId) -> ?ClientResponse</code></summary>
<dl>
<dd>

#### 📝 Description

<dl>
<dd>

<dl>
<dd>

Accept a self-onboarded client. The client status moves to 'pending' and the owner's portal account is activated so they can begin submitting documents.
</dd>
</dl>
</dd>
</dl>

#### 🔌 Usage

<dl>
<dd>

<dl>
<dd>

```php
$client->clients->approveOnboarding(
    'client_id',
);
```
</dd>
</dl>
</dd>
</dl>

#### ⚙️ Parameters

<dl>
<dd>

<dl>
<dd>

**$clientId:** `string` 
    
</dd>
</dl>
</dd>
</dl>


</dd>
</dl>
</details>

<details><summary><code>$client-&gt;clients-&gt;rejectOnboarding($clientId) -> ?ClientResponse</code></summary>
<dl>
<dd>

#### 📝 Description

<dl>
<dd>

<dl>
<dd>

Reject a self-onboarded client. The client record is kept with 'rejected' status for audit history and is not deleted.
</dd>
</dl>
</dd>
</dl>

#### 🔌 Usage

<dl>
<dd>

<dl>
<dd>

```php
$client->clients->rejectOnboarding(
    'client_id',
);
```
</dd>
</dl>
</dd>
</dl>

#### ⚙️ Parameters

<dl>
<dd>

<dl>
<dd>

**$clientId:** `string` 
    
</dd>
</dl>
</dd>
</dl>


</dd>
</dl>
</details>

<details><summary><code>$client-&gt;clients-&gt;addClientPortalUser($clientId, $request) -> ?ClientUserResponse</code></summary>
<dl>
<dd>

#### 📝 Description

<dl>
<dd>

<dl>
<dd>

Invite a new user to a client's portal account. The invited user will receive an email with a one-time link to set their password. Partner can assign any role: 'owner', 'admin', or 'viewer'.
</dd>
</dl>
</dd>
</dl>

#### 🔌 Usage

<dl>
<dd>

<dl>
<dd>

```php
$client->clients->addClientPortalUser(
    'client_id',
    new ClientUserInviteRequest([
        'firstName' => 'first_name',
        'lastName' => 'last_name',
        'email' => 'email',
        'roleType' => 'role_type',
    ]),
);
```
</dd>
</dl>
</dd>
</dl>

#### ⚙️ Parameters

<dl>
<dd>

<dl>
<dd>

**$clientId:** `string` 
    
</dd>
</dl>

<dl>
<dd>

**$firstName:** `string` 
    
</dd>
</dl>

<dl>
<dd>

**$lastName:** `string` 
    
</dd>
</dl>

<dl>
<dd>

**$email:** `string` 
    
</dd>
</dl>

<dl>
<dd>

**$phone:** `?string` 
    
</dd>
</dl>

<dl>
<dd>

**$roleType:** `string` 
    
</dd>
</dl>
</dd>
</dl>


</dd>
</dl>
</details>

<details><summary><code>$client-&gt;clients-&gt;listClientWaivers($clientId, $request) -> ?PaginatedResponseWaiverResponse</code></summary>
<dl>
<dd>

#### 📝 Description

<dl>
<dd>

<dl>
<dd>

Retrieve all waivers associated with a specific client.
</dd>
</dl>
</dd>
</dl>

#### 🔌 Usage

<dl>
<dd>

<dl>
<dd>

```php
$client->clients->listClientWaivers(
    'client_id',
    new ListClientWaiversRequest([]),
);
```
</dd>
</dl>
</dd>
</dl>

#### ⚙️ Parameters

<dl>
<dd>

<dl>
<dd>

**$clientId:** `string` 
    
</dd>
</dl>

<dl>
<dd>

**$page:** `?int` 
    
</dd>
</dl>

<dl>
<dd>

**$pageSize:** `?int` 
    
</dd>
</dl>

<dl>
<dd>

**$orderBy:** `?string` — Field to order the results by, e.g., 'created_at:desc'
    
</dd>
</dl>

<dl>
<dd>

**$q:** `?string` — Query string for filtering. Format: "field:operator:value;...". Supported fields: id, client_id, status. Supported operators: is, in, not_in, contains, not_contains, like, not_like, ilike, not_ilike, gt, gte, lt, lte, starts_with, ends_with, is_null, is_not_null.
    
</dd>
</dl>
</dd>
</dl>


</dd>
</dl>
</details>

<details><summary><code>$client-&gt;clients-&gt;getClientById($clientId) -> ?ClientResponse</code></summary>
<dl>
<dd>

#### 📝 Description

<dl>
<dd>

<dl>
<dd>

Retrieve detailed information for a specific client using their client ID.
</dd>
</dl>
</dd>
</dl>

#### 🔌 Usage

<dl>
<dd>

<dl>
<dd>

```php
$client->clients->getClientById(
    'client_id',
);
```
</dd>
</dl>
</dd>
</dl>

#### ⚙️ Parameters

<dl>
<dd>

<dl>
<dd>

**$clientId:** `string` 
    
</dd>
</dl>
</dd>
</dl>


</dd>
</dl>
</details>

<details><summary><code>$client-&gt;clients-&gt;deleteClient($clientId) -> ?array</code></summary>
<dl>
<dd>

#### 📝 Description

<dl>
<dd>

<dl>
<dd>

Delete a client by ID. Only clients with 'pending' status can be deleted. All client's loans must also be in 'pending' status.
</dd>
</dl>
</dd>
</dl>

#### 🔌 Usage

<dl>
<dd>

<dl>
<dd>

```php
$client->clients->deleteClient(
    'client_id',
);
```
</dd>
</dl>
</dd>
</dl>

#### ⚙️ Parameters

<dl>
<dd>

<dl>
<dd>

**$clientId:** `string` 
    
</dd>
</dl>
</dd>
</dl>


</dd>
</dl>
</details>

<details><summary><code>$client-&gt;clients-&gt;listClientChecklistSummaries($clientId, $request) -> ?PaginatedResponseChecklistSummaryPartnerResponse</code></summary>
<dl>
<dd>

#### 📝 Description

<dl>
<dd>

<dl>
<dd>

Retrieve the checklist summaries for one of your clients, including the AI description and item completion counts.
</dd>
</dl>
</dd>
</dl>

#### 🔌 Usage

<dl>
<dd>

<dl>
<dd>

```php
$client->clients->listClientChecklistSummaries(
    'client_id',
    new ListClientChecklistSummariesRequest([]),
);
```
</dd>
</dl>
</dd>
</dl>

#### ⚙️ Parameters

<dl>
<dd>

<dl>
<dd>

**$clientId:** `string` 
    
</dd>
</dl>

<dl>
<dd>

**$page:** `?int` 
    
</dd>
</dl>

<dl>
<dd>

**$pageSize:** `?int` 
    
</dd>
</dl>
</dd>
</dl>


</dd>
</dl>
</details>

## Sandbox
<details><summary><code>$client-&gt;sandbox-&gt;updateClient($clientId, $request) -> ?ClientResponse</code></summary>
<dl>
<dd>

#### 📝 Description

<dl>
<dd>

<dl>
<dd>

Update an existing client's status or credit limit using their client ID.
</dd>
</dl>
</dd>
</dl>

#### 🔌 Usage

<dl>
<dd>

<dl>
<dd>

```php
$client->sandbox->updateClient(
    'client_id',
    new ClientUpdateSandbox([]),
);
```
</dd>
</dl>
</dd>
</dl>

#### ⚙️ Parameters

<dl>
<dd>

<dl>
<dd>

**$clientId:** `string` 
    
</dd>
</dl>

<dl>
<dd>

**$status:** `?string` — The status of the client. One of the following: `active, rejected, deactivated, pending, pending_onboarding, pre_approved, deleted, inactive`
    
</dd>
</dl>

<dl>
<dd>

**$limit:** `float|string|null` — The limit to set for the client. This will override the existing limit.
    
</dd>
</dl>
</dd>
</dl>


</dd>
</dl>
</details>

<details><summary><code>$client-&gt;sandbox-&gt;updateLoan($loanId, $request) -> ?LoanResponseWithInstallments</code></summary>
<dl>
<dd>

#### 📝 Description

<dl>
<dd>

<dl>
<dd>

Update the status of a specific loan using its unique loan ID.
</dd>
</dl>
</dd>
</dl>

#### 🔌 Usage

<dl>
<dd>

<dl>
<dd>

```php
$client->sandbox->updateLoan(
    'loan_id',
    new LoanUpdateSandbox([]),
);
```
</dd>
</dl>
</dd>
</dl>

#### ⚙️ Parameters

<dl>
<dd>

<dl>
<dd>

**$loanId:** `string` 
    
</dd>
</dl>

<dl>
<dd>

**$status:** `?string` — The status of the client. One of the following: `pending, overdue, active, default, sold, restructured, repaid, pre_approved, rejected, deleted, inactive`
    
</dd>
</dl>
</dd>
</dl>


</dd>
</dl>
</details>

<details><summary><code>$client-&gt;sandbox-&gt;webhookTest($request) -> ?array</code></summary>
<dl>
<dd>

#### 📝 Description

<dl>
<dd>

<dl>
<dd>

Test a webhook subscription by ID or trigger all by event type.
</dd>
</dl>
</dd>
</dl>

#### 🔌 Usage

<dl>
<dd>

<dl>
<dd>

```php
$client->sandbox->webhookTest(
    new WebhookTestSandbox([
        'eventType' => WebhookEventTypeEnum::LoanUpdated->value,
    ]),
);
```
</dd>
</dl>
</dd>
</dl>

#### ⚙️ Parameters

<dl>
<dd>

<dl>
<dd>

**$webhookId:** `?string` — The ID of the webhook subscription. Only this webhook will be triggered if provided.
    
</dd>
</dl>

<dl>
<dd>

**$eventType:** `string` — Event type to trigger for the test. All subscriptions for this event type will be triggered if webhook_id is not provided.Possible values: loan_updated, installment_updated, client_updated, client_limit_updated, partner_limit_updated
    
</dd>
</dl>
</dd>
</dl>


</dd>
</dl>
</details>

## Accounts
<details><summary><code>$client-&gt;accounts-&gt;listClientAccountFields($clientId) -> ?array</code></summary>
<dl>
<dd>

#### 📝 Description

<dl>
<dd>

<dl>
<dd>

Return the required and optional bank account fields for each supported currency. Fetch once and cache; use it to build the create-account request.
</dd>
</dl>
</dd>
</dl>

#### 🔌 Usage

<dl>
<dd>

<dl>
<dd>

```php
$client->accounts->listClientAccountFields(
    'client_id',
);
```
</dd>
</dl>
</dd>
</dl>

#### ⚙️ Parameters

<dl>
<dd>

<dl>
<dd>

**$clientId:** `string` 
    
</dd>
</dl>
</dd>
</dl>


</dd>
</dl>
</details>

<details><summary><code>$client-&gt;accounts-&gt;listClientAccounts($clientId, $request) -> ?PaginatedResponseClientAccountResponse</code></summary>
<dl>
<dd>

#### 📝 Description

<dl>
<dd>

<dl>
<dd>

Retrieve all bank accounts for one of your clients.
</dd>
</dl>
</dd>
</dl>

#### 🔌 Usage

<dl>
<dd>

<dl>
<dd>

```php
$client->accounts->listClientAccounts(
    'client_id',
    new ListClientAccountsRequest([]),
);
```
</dd>
</dl>
</dd>
</dl>

#### ⚙️ Parameters

<dl>
<dd>

<dl>
<dd>

**$clientId:** `string` 
    
</dd>
</dl>

<dl>
<dd>

**$page:** `?int` 
    
</dd>
</dl>

<dl>
<dd>

**$pageSize:** `?int` 
    
</dd>
</dl>

<dl>
<dd>

**$orderBy:** `?string` 
    
</dd>
</dl>
</dd>
</dl>


</dd>
</dl>
</details>

<details><summary><code>$client-&gt;accounts-&gt;createClientAccount($clientId, $request) -> ?ClientAccountResponse</code></summary>
<dl>
<dd>

#### 📝 Description

<dl>
<dd>

<dl>
<dd>

Create a bank account for one of your clients. The account is registered with the payment provider immediately. Use the `status` field to create it as `active` (default; demotes any existing active account in the same currency to `passive`) or `passive`.
</dd>
</dl>
</dd>
</dl>

#### 🔌 Usage

<dl>
<dd>

<dl>
<dd>

```php
$client->accounts->createClientAccount(
    'client_id',
    new PartnerClientAccountCreateRequest([
        'accountHolderName' => 'Acme Ltd',
        'accountHolderType' => AccountHolderTypeEnum::Business->value,
        'currency' => CurrencyEnum::Gbp->value,
        'sortCode' => '40-47-84',
        'accountNumber' => '12345678',
    ]),
);
```
</dd>
</dl>
</dd>
</dl>

#### ⚙️ Parameters

<dl>
<dd>

<dl>
<dd>

**$clientId:** `string` 
    
</dd>
</dl>

<dl>
<dd>

**$accountHolderName:** `string` — Full name of the account holder.
    
</dd>
</dl>

<dl>
<dd>

**$label:** `?string` — Optional label / nickname for the account (max 50 characters).
    
</dd>
</dl>

<dl>
<dd>

**$accountHolderType:** `string` — Account holder type. One of: `business`, `private`.
    
</dd>
</dl>

<dl>
<dd>

**$currency:** `string` — ISO 4217 currency code. Use `/accounts/fields` to get required fields per currency.
    
</dd>
</dl>

<dl>
<dd>

**$sortCode:** `?string` — Sort code (required for GBP).
    
</dd>
</dl>

<dl>
<dd>

**$accountNumber:** `?string` — Account number (required for GBP and USD).
    
</dd>
</dl>

<dl>
<dd>

**$iban:** `?string` — IBAN (required for EUR, CZK, PLN).
    
</dd>
</dl>

<dl>
<dd>

**$bic:** `?string` — BIC / SWIFT code (optional for EUR).
    
</dd>
</dl>

<dl>
<dd>

**$routingNumber:** `?string` — ABA routing number (required for USD).
    
</dd>
</dl>

<dl>
<dd>

**$accountType:** `?string` — Account type (required for USD). E.g. `checking` or `savings`.
    
</dd>
</dl>

<dl>
<dd>

**$address:** `?AccountAddress` — Account holder address (required for USD).
    
</dd>
</dl>

<dl>
<dd>

**$status:** `?string` — Account status. `active` demotes any existing active account in the same currency to `passive`; `passive` is added as a backup. Defaults to `active`.
    
</dd>
</dl>
</dd>
</dl>


</dd>
</dl>
</details>

<details><summary><code>$client-&gt;accounts-&gt;getClientAccount($clientId, $accountId) -> ?ClientAccountResponse</code></summary>
<dl>
<dd>

#### 📝 Description

<dl>
<dd>

<dl>
<dd>

Retrieve a specific bank account for one of your clients.
</dd>
</dl>
</dd>
</dl>

#### 🔌 Usage

<dl>
<dd>

<dl>
<dd>

```php
$client->accounts->getClientAccount(
    'client_id',
    'account_id',
);
```
</dd>
</dl>
</dd>
</dl>

#### ⚙️ Parameters

<dl>
<dd>

<dl>
<dd>

**$clientId:** `string` 
    
</dd>
</dl>

<dl>
<dd>

**$accountId:** `string` 
    
</dd>
</dl>
</dd>
</dl>


</dd>
</dl>
</details>

## Documents
<details><summary><code>$client-&gt;documents-&gt;listDocuments($request) -> ?PaginatedResponseDocumentResponse</code></summary>
<dl>
<dd>

#### 📝 Description

<dl>
<dd>

<dl>
<dd>

Retrieve all documents linked to a client.
</dd>
</dl>
</dd>
</dl>

#### 🔌 Usage

<dl>
<dd>

<dl>
<dd>

```php
$client->documents->listDocuments(
    new ListDocumentsRequest([]),
);
```
</dd>
</dl>
</dd>
</dl>

#### ⚙️ Parameters

<dl>
<dd>

<dl>
<dd>

**$clientId:** `?string` 
    
</dd>
</dl>

<dl>
<dd>

**$loanId:** `?string` 
    
</dd>
</dl>

<dl>
<dd>

**$installmentId:** `?string` 
    
</dd>
</dl>

<dl>
<dd>

**$waterfallId:** `?string` 
    
</dd>
</dl>

<dl>
<dd>

**$page:** `?int` 
    
</dd>
</dl>

<dl>
<dd>

**$pageSize:** `?int` 
    
</dd>
</dl>

<dl>
<dd>

**$orderBy:** `?string` — Field to order the results by, e.g., 'created_at:desc,updated_at:asc'
    
</dd>
</dl>

<dl>
<dd>

**$q:** `?string` — Query string for filtering. Format: "field:operator:value;...". Supported fields: id, client_id, loan_id, installment_id, waterfall_id, category, file_name, document_date, folder_path. Supported operators: is, in, not_in, contains, not_contains, like, not_like, ilike, not_ilike, gt, gte, lt, lte, starts_with, ends_with, is_null, is_not_null.
    
</dd>
</dl>
</dd>
</dl>


</dd>
</dl>
</details>

<details><summary><code>$client-&gt;documents-&gt;uploadDocument($request) -> ?DocumentResponse</code></summary>
<dl>
<dd>

#### 📝 Description

<dl>
<dd>

<dl>
<dd>

Upload a new document related to a client or loan, such as financial statements or KYC files.
</dd>
</dl>
</dd>
</dl>

#### 🔌 Usage

<dl>
<dd>

<dl>
<dd>

```php
$client->documents->uploadDocument(
    new DocumentCreatePayload([
        'file' => File::createFromString("example_file", "example_file"),
        'category' => 'category',
        'fileName' => 'file_name',
    ]),
);
```
</dd>
</dl>
</dd>
</dl>

#### ⚙️ Parameters

<dl>
<dd>

<dl>
<dd>

**$clientId:** `?string` 
    
</dd>
</dl>

<dl>
<dd>

**$loanId:** `?string` 
    
</dd>
</dl>

<dl>
<dd>

**$installmentId:** `?string` 
    
</dd>
</dl>

<dl>
<dd>

**$waterfallId:** `?string` 
    
</dd>
</dl>
</dd>
</dl>


</dd>
</dl>
</details>

<details><summary><code>$client-&gt;documents-&gt;getAvailableDocumentCategories() -> ?AvailableDocumentCategoriesResponse</code></summary>
<dl>
<dd>

#### 📝 Description

<dl>
<dd>

<dl>
<dd>

Retrieve all available document categories.
</dd>
</dl>
</dd>
</dl>

#### 🔌 Usage

<dl>
<dd>

<dl>
<dd>

```php
$client->documents->getAvailableDocumentCategories();
```
</dd>
</dl>
</dd>
</dl>


</dd>
</dl>
</details>

<details><summary><code>$client-&gt;documents-&gt;getDocumentById($documentId) -> ?DocumentResponse</code></summary>
<dl>
<dd>

#### 📝 Description

<dl>
<dd>

<dl>
<dd>

Retrieve details for a specific document using its document ID.
</dd>
</dl>
</dd>
</dl>

#### 🔌 Usage

<dl>
<dd>

<dl>
<dd>

```php
$client->documents->getDocumentById(
    'document_id',
);
```
</dd>
</dl>
</dd>
</dl>

#### ⚙️ Parameters

<dl>
<dd>

<dl>
<dd>

**$documentId:** `string` 
    
</dd>
</dl>
</dd>
</dl>


</dd>
</dl>
</details>

<details><summary><code>$client-&gt;documents-&gt;deleteDocument($documentId)</code></summary>
<dl>
<dd>

#### 📝 Description

<dl>
<dd>

<dl>
<dd>

Delete a specific document by using its document ID.
</dd>
</dl>
</dd>
</dl>

#### 🔌 Usage

<dl>
<dd>

<dl>
<dd>

```php
$client->documents->deleteDocument(
    'document_id',
);
```
</dd>
</dl>
</dd>
</dl>

#### ⚙️ Parameters

<dl>
<dd>

<dl>
<dd>

**$documentId:** `string` 
    
</dd>
</dl>
</dd>
</dl>


</dd>
</dl>
</details>

## Investors
<details><summary><code>$client-&gt;investors-&gt;investorListClients($request) -> ?PaginatedResponseClientInvestorResponse</code></summary>
<dl>
<dd>

#### 📝 Description

<dl>
<dd>

<dl>
<dd>

Retrieve all clients with at least one loan funded by this investor.
</dd>
</dl>
</dd>
</dl>

#### 🔌 Usage

<dl>
<dd>

<dl>
<dd>

```php
$client->investors->investorListClients(
    new InvestorListClientsRequest([]),
);
```
</dd>
</dl>
</dd>
</dl>

#### ⚙️ Parameters

<dl>
<dd>

<dl>
<dd>

**$page:** `?int` 
    
</dd>
</dl>

<dl>
<dd>

**$pageSize:** `?int` 
    
</dd>
</dl>

<dl>
<dd>

**$orderBy:** `?string` 
    
</dd>
</dl>

<dl>
<dd>

**$q:** `?string` — Query string for filtering. Format: "field:operator:value;...". Supported fields: id, name, correlation_id, company_number, status. Supported operators: is, in, not_in, contains, not_contains, like, not_like, ilike, not_ilike, gt, gte, lt, lte, starts_with, ends_with, is_null, is_not_null.
    
</dd>
</dl>
</dd>
</dl>


</dd>
</dl>
</details>

<details><summary><code>$client-&gt;investors-&gt;investorGetClient($clientId) -> ?ClientInvestorResponse</code></summary>
<dl>
<dd>

#### 📝 Description

<dl>
<dd>

<dl>
<dd>

Retrieve a specific client that has a loan funded by this investor.
</dd>
</dl>
</dd>
</dl>

#### 🔌 Usage

<dl>
<dd>

<dl>
<dd>

```php
$client->investors->investorGetClient(
    'client_id',
);
```
</dd>
</dl>
</dd>
</dl>

#### ⚙️ Parameters

<dl>
<dd>

<dl>
<dd>

**$clientId:** `string` 
    
</dd>
</dl>
</dd>
</dl>


</dd>
</dl>
</details>

<details><summary><code>$client-&gt;investors-&gt;investorListLoans($request) -> ?PaginatedResponseLoanInvestorResponse</code></summary>
<dl>
<dd>

#### 📝 Description

<dl>
<dd>

<dl>
<dd>

Retrieve all loans funded by the current investor.
</dd>
</dl>
</dd>
</dl>

#### 🔌 Usage

<dl>
<dd>

<dl>
<dd>

```php
$client->investors->investorListLoans(
    new InvestorListLoansRequest([]),
);
```
</dd>
</dl>
</dd>
</dl>

#### ⚙️ Parameters

<dl>
<dd>

<dl>
<dd>

**$page:** `?int` 
    
</dd>
</dl>

<dl>
<dd>

**$pageSize:** `?int` 
    
</dd>
</dl>

<dl>
<dd>

**$clientId:** `?string` 
    
</dd>
</dl>

<dl>
<dd>

**$orderBy:** `?string` 
    
</dd>
</dl>

<dl>
<dd>

**$q:** `?string` — Query string for filtering. Format: "field:operator:value;...". Supported fields: id, partner_id, client_id, status, loan_date, currency, partner.name, client.name. Supported operators: is, in, not_in, contains, not_contains, like, not_like, ilike, not_ilike, gt, gte, lt, lte, starts_with, ends_with, is_null, is_not_null.
    
</dd>
</dl>
</dd>
</dl>


</dd>
</dl>
</details>

<details><summary><code>$client-&gt;investors-&gt;investorGetLoan($loanId) -> ?LoanResponseWithInstallments</code></summary>
<dl>
<dd>

#### 📝 Description

<dl>
<dd>

<dl>
<dd>

Retrieve a specific loan funded by the current investor, with its installments.
</dd>
</dl>
</dd>
</dl>

#### 🔌 Usage

<dl>
<dd>

<dl>
<dd>

```php
$client->investors->investorGetLoan(
    'loan_id',
);
```
</dd>
</dl>
</dd>
</dl>

#### ⚙️ Parameters

<dl>
<dd>

<dl>
<dd>

**$loanId:** `string` 
    
</dd>
</dl>
</dd>
</dl>


</dd>
</dl>
</details>

<details><summary><code>$client-&gt;investors-&gt;investorListInstallments($request) -> ?PaginatedResponseInstallmentResponseWithClientInfo</code></summary>
<dl>
<dd>

#### 📝 Description

<dl>
<dd>

<dl>
<dd>

Retrieve all installments for loans funded by the current investor.
</dd>
</dl>
</dd>
</dl>

#### 🔌 Usage

<dl>
<dd>

<dl>
<dd>

```php
$client->investors->investorListInstallments(
    new InvestorListInstallmentsRequest([]),
);
```
</dd>
</dl>
</dd>
</dl>

#### ⚙️ Parameters

<dl>
<dd>

<dl>
<dd>

**$page:** `?int` 
    
</dd>
</dl>

<dl>
<dd>

**$pageSize:** `?int` 
    
</dd>
</dl>

<dl>
<dd>

**$clientId:** `?string` 
    
</dd>
</dl>

<dl>
<dd>

**$loanId:** `?string` 
    
</dd>
</dl>

<dl>
<dd>

**$orderBy:** `?string` 
    
</dd>
</dl>

<dl>
<dd>

**$q:** `?string` — Query string for filtering. Format: "field:operator:value;...". Supported fields: id, client_id, loan_id, status, client.name, expected_repayment_at. Supported operators: is, in, not_in, contains, not_contains, like, not_like, ilike, not_ilike, gt, gte, lt, lte, starts_with, ends_with, is_null, is_not_null.
    
</dd>
</dl>
</dd>
</dl>


</dd>
</dl>
</details>

<details><summary><code>$client-&gt;investors-&gt;investorGetInstallment($installmentId) -> ?InstallmentResponse</code></summary>
<dl>
<dd>

#### 📝 Description

<dl>
<dd>

<dl>
<dd>

Retrieve a specific installment for a loan funded by the current investor.
</dd>
</dl>
</dd>
</dl>

#### 🔌 Usage

<dl>
<dd>

<dl>
<dd>

```php
$client->investors->investorGetInstallment(
    'installment_id',
);
```
</dd>
</dl>
</dd>
</dl>

#### ⚙️ Parameters

<dl>
<dd>

<dl>
<dd>

**$installmentId:** `string` 
    
</dd>
</dl>
</dd>
</dl>


</dd>
</dl>
</details>

<details><summary><code>$client-&gt;investors-&gt;investorListRepayments($request) -> ?PaginatedResponseRepaymentResponseWithClientInfo</code></summary>
<dl>
<dd>

#### 📝 Description

<dl>
<dd>

<dl>
<dd>

Retrieve all repayment logs for loans funded by the current investor.
</dd>
</dl>
</dd>
</dl>

#### 🔌 Usage

<dl>
<dd>

<dl>
<dd>

```php
$client->investors->investorListRepayments(
    new InvestorListRepaymentsRequest([]),
);
```
</dd>
</dl>
</dd>
</dl>

#### ⚙️ Parameters

<dl>
<dd>

<dl>
<dd>

**$clientId:** `?string` 
    
</dd>
</dl>

<dl>
<dd>

**$loanId:** `?string` 
    
</dd>
</dl>

<dl>
<dd>

**$installmentId:** `?string` 
    
</dd>
</dl>

<dl>
<dd>

**$page:** `?int` 
    
</dd>
</dl>

<dl>
<dd>

**$pageSize:** `?int` 
    
</dd>
</dl>

<dl>
<dd>

**$orderBy:** `?string` 
    
</dd>
</dl>

<dl>
<dd>

**$q:** `?string` — Query string for filtering. Format: "field:operator:value;...". Supported fields: id, client_id, loan_id, installment_id, created_at, client.name, client.correlation_id. Supported operators: is, in, not_in, contains, not_contains, like, not_like, ilike, not_ilike, gt, gte, lt, lte, starts_with, ends_with, is_null, is_not_null.
    
</dd>
</dl>
</dd>
</dl>


</dd>
</dl>
</details>

## Installments
<details><summary><code>$client-&gt;installments-&gt;listInstallments($request) -> ?PaginatedResponseInstallmentResponseWithClientInfo</code></summary>
<dl>
<dd>

#### 📝 Description

<dl>
<dd>

<dl>
<dd>

Retrieve a list of all loan installments under your partner account. Supports optional filtering by loan or client.
</dd>
</dl>
</dd>
</dl>

#### 🔌 Usage

<dl>
<dd>

<dl>
<dd>

```php
$client->installments->listInstallments(
    new ListInstallmentsRequest([]),
);
```
</dd>
</dl>
</dd>
</dl>

#### ⚙️ Parameters

<dl>
<dd>

<dl>
<dd>

**$page:** `?int` 
    
</dd>
</dl>

<dl>
<dd>

**$pageSize:** `?int` 
    
</dd>
</dl>

<dl>
<dd>

**$clientId:** `?string` 
    
</dd>
</dl>

<dl>
<dd>

**$loanId:** `?string` 
    
</dd>
</dl>

<dl>
<dd>

**$orderBy:** `?string` — Field to order the results by, e.g., 'created_at:desc,updated_at:asc'
    
</dd>
</dl>

<dl>
<dd>

**$q:** `?string` — Query string for filtering. Format: "field:operator:value;...". Supported fields: id, client_id, loan_id, status, client.name, expected_repayment_at. Supported operators: is, in, not_in, contains, not_contains, like, not_like, ilike, not_ilike, gt, gte, lt, lte, starts_with, ends_with, is_null, is_not_null.
    
</dd>
</dl>
</dd>
</dl>


</dd>
</dl>
</details>

<details><summary><code>$client-&gt;installments-&gt;addInstallment($request) -> ?array</code></summary>
<dl>
<dd>

#### 📝 Description

<dl>
<dd>

<dl>
<dd>

Add new installments to a loan with its specific loan ID. This endpoint is available to select partners and will trigger the recalculation of the IRR and interest amounts for all installments of the loan.
</dd>
</dl>
</dd>
</dl>

#### 🔌 Usage

<dl>
<dd>

<dl>
<dd>

```php
$client->installments->addInstallment(
    new InstallmentCreatePayload([
        'loanId' => 'loan_12345',
        'installments' => [
            new LoanInstallmentCreatePayload([
                'expectedRepaymentAt' => new DateTime('2025-12-01'),
                'amount' => '1000.00',
            ]),
            new LoanInstallmentCreatePayload([
                'expectedRepaymentAt' => new DateTime('2026-01-01'),
                'amount' => '1000.00',
            ]),
        ],
    ]),
);
```
</dd>
</dl>
</dd>
</dl>

#### ⚙️ Parameters

<dl>
<dd>

<dl>
<dd>

**$loanId:** `string` — The loan ID to add the installments to
    
</dd>
</dl>

<dl>
<dd>

**$installments:** `array` — List of installments to add to the loan
    
</dd>
</dl>
</dd>
</dl>


</dd>
</dl>
</details>

<details><summary><code>$client-&gt;installments-&gt;listPaymentPromises($request) -> ?PaginatedResponsePaymentPromiseResponse</code></summary>
<dl>
<dd>

#### 📝 Description

<dl>
<dd>

<dl>
<dd>

Retrieve a list of payment promises recorded for installments under your partner account. Supports optional filtering by loan or client.
</dd>
</dl>
</dd>
</dl>

#### 🔌 Usage

<dl>
<dd>

<dl>
<dd>

```php
$client->installments->listPaymentPromises(
    new ListPaymentPromisesRequest([]),
);
```
</dd>
</dl>
</dd>
</dl>

#### ⚙️ Parameters

<dl>
<dd>

<dl>
<dd>

**$page:** `?int` 
    
</dd>
</dl>

<dl>
<dd>

**$pageSize:** `?int` 
    
</dd>
</dl>

<dl>
<dd>

**$orderBy:** `?string` — Field to order the results by, e.g., 'created_at:desc,updated_at:asc'
    
</dd>
</dl>

<dl>
<dd>

**$q:** `?string` — Query string for filtering. Format: "field:operator:value;...". Supported fields: id, installment_id, status, promised_date, created_at. Supported operators: is, in, not_in, contains, not_contains, like, not_like, ilike, not_ilike, gt, gte, lt, lte, starts_with, ends_with, is_null, is_not_null.
    
</dd>
</dl>

<dl>
<dd>

**$loanId:** `?string` 
    
</dd>
</dl>

<dl>
<dd>

**$clientId:** `?string` 
    
</dd>
</dl>
</dd>
</dl>


</dd>
</dl>
</details>

<details><summary><code>$client-&gt;installments-&gt;createPaymentPromise($request) -> ?PaymentPromiseResponse</code></summary>
<dl>
<dd>

#### 📝 Description

<dl>
<dd>

<dl>
<dd>

Record a payment promise made by a client for one of their installments. The promised date must be today or in the future.
</dd>
</dl>
</dd>
</dl>

#### 🔌 Usage

<dl>
<dd>

<dl>
<dd>

```php
$client->installments->createPaymentPromise(
    new PaymentPromiseCreatePayload([
        'installmentId' => 'inst_12345',
        'amount' => 1.1,
        'promisedDate' => new DateTime('2026-05-15'),
    ]),
);
```
</dd>
</dl>
</dd>
</dl>

#### ⚙️ Parameters

<dl>
<dd>

<dl>
<dd>

**$installmentId:** `string` — The ID of the installment this promise relates to
    
</dd>
</dl>

<dl>
<dd>

**$amount:** `float|string` — The amount the client has promised to pay (must be > 0)
    
</dd>
</dl>

<dl>
<dd>

**$promisedDate:** `DateTime` — The date the client has committed to pay by (today or future)
    
</dd>
</dl>

<dl>
<dd>

**$notes:** `?string` — Optional notes captured during the collections interaction
    
</dd>
</dl>
</dd>
</dl>


</dd>
</dl>
</details>

<details><summary><code>$client-&gt;installments-&gt;getInstallmentById($installmentId) -> ?InstallmentResponse</code></summary>
<dl>
<dd>

#### 📝 Description

<dl>
<dd>

<dl>
<dd>

Retrieve detailed information for a specific installment using its installment ID.
</dd>
</dl>
</dd>
</dl>

#### 🔌 Usage

<dl>
<dd>

<dl>
<dd>

```php
$client->installments->getInstallmentById(
    'installment_id',
);
```
</dd>
</dl>
</dd>
</dl>

#### ⚙️ Parameters

<dl>
<dd>

<dl>
<dd>

**$installmentId:** `string` 
    
</dd>
</dl>
</dd>
</dl>


</dd>
</dl>
</details>

<details><summary><code>$client-&gt;installments-&gt;editInstallment($installmentId, $request) -> ?InstallmentResponse</code></summary>
<dl>
<dd>

#### 📝 Description

<dl>
<dd>

<dl>
<dd>

Update an installment's amount and expected repayment date with its specific installment ID. This endpoint is available to select partners and will trigger the recalculation of the IRR and interest amounts for all installments of the loan.
</dd>
</dl>
</dd>
</dl>

#### 🔌 Usage

<dl>
<dd>

<dl>
<dd>

```php
$client->installments->editInstallment(
    'installment_id',
    new InstallmentEditPayload([
        'amount' => 1.1,
        'expectedRepaymentAt' => new DateTime('2025-12-01'),
    ]),
);
```
</dd>
</dl>
</dd>
</dl>

#### ⚙️ Parameters

<dl>
<dd>

<dl>
<dd>

**$installmentId:** `string` 
    
</dd>
</dl>

<dl>
<dd>

**$amount:** `float|string` — The new amount for the installment
    
</dd>
</dl>

<dl>
<dd>

**$expectedRepaymentAt:** `DateTime` — The new expected repayment date
    
</dd>
</dl>
</dd>
</dl>


</dd>
</dl>
</details>

<details><summary><code>$client-&gt;installments-&gt;deleteInstallment($installmentId) -> ?array</code></summary>
<dl>
<dd>

#### 📝 Description

<dl>
<dd>

<dl>
<dd>

Delete an installment with its specific installment ID. This endpoint is available to select partners and will trigger the recalculation of the IRR and interest amounts for all installments of the loan.
</dd>
</dl>
</dd>
</dl>

#### 🔌 Usage

<dl>
<dd>

<dl>
<dd>

```php
$client->installments->deleteInstallment(
    'installment_id',
);
```
</dd>
</dl>
</dd>
</dl>

#### ⚙️ Parameters

<dl>
<dd>

<dl>
<dd>

**$installmentId:** `string` 
    
</dd>
</dl>
</dd>
</dl>


</dd>
</dl>
</details>

## Loans
<details><summary><code>$client-&gt;loans-&gt;listLoans($request) -> ?PaginatedResponseLoanResponseWithClientInfo</code></summary>
<dl>
<dd>

#### 📝 Description

<dl>
<dd>

<dl>
<dd>

Retrieve all loans associated with your partner account. Supports optional filtering by client ID.
</dd>
</dl>
</dd>
</dl>

#### 🔌 Usage

<dl>
<dd>

<dl>
<dd>

```php
$client->loans->listLoans(
    new ListLoansRequest([]),
);
```
</dd>
</dl>
</dd>
</dl>

#### ⚙️ Parameters

<dl>
<dd>

<dl>
<dd>

**$page:** `?int` 
    
</dd>
</dl>

<dl>
<dd>

**$pageSize:** `?int` 
    
</dd>
</dl>

<dl>
<dd>

**$clientId:** `?string` 
    
</dd>
</dl>

<dl>
<dd>

**$orderBy:** `?string` — Field to order the results by, e.g., 'created_at:desc,updated_at:asc'
    
</dd>
</dl>

<dl>
<dd>

**$q:** `?string` — Query string for filtering. Format: "field:operator:value;...". Supported fields: id, client_id, status, client.name, correlation_id. Supported operators: is, in, not_in, contains, not_contains, like, not_like, ilike, not_ilike, gt, gte, lt, lte, starts_with, ends_with, is_null, is_not_null.
    
</dd>
</dl>
</dd>
</dl>


</dd>
</dl>
</details>

<details><summary><code>$client-&gt;loans-&gt;createLoan($request) -> ?LoanResponseWithInstallments</code></summary>
<dl>
<dd>

#### 📝 Description

<dl>
<dd>

<dl>
<dd>

Create a new loan for an approved client with an active credit limit.
</dd>
</dl>
</dd>
</dl>

#### 🔌 Usage

<dl>
<dd>

<dl>
<dd>

```php
$client->loans->createLoan(
    new LoanCreatePayload([
        'clientId' => 'client_ACME',
        'currency' => CurrencyEnum::Eur->value,
        'amount' => 1.1,
        'installments' => [
            new LoanInstallmentCreatePayload([
                'expectedRepaymentAt' => new DateTime('2025-12-01'),
                'amount' => 1.1,
            ]),
        ],
    ]),
);
```
</dd>
</dl>
</dd>
</dl>

#### ⚙️ Parameters

<dl>
<dd>

<dl>
<dd>

**$clientId:** `string` — The ID of the client for this loan
    
</dd>
</dl>

<dl>
<dd>

**$currency:** `string` — The currency of the loan, must be one of the supported currencies: eur, gbp, usd, czk, pln, isk
    
</dd>
</dl>

<dl>
<dd>

**$amount:** `float|string` — The amount of the loan
    
</dd>
</dl>

<dl>
<dd>

**$correlationId:** `?string` — The correlation ID you provided at the creation of the loan
    
</dd>
</dl>

<dl>
<dd>

**$loanDate:** `?DateTime` — Please provide the loan_date if it differs from the loan creation time (created_at). Otherwise, it will be automatically set.
    
</dd>
</dl>

<dl>
<dd>

**$installments:** `array` — List of installments for the loan, each with a due date and amount
    
</dd>
</dl>

<dl>
<dd>

**$data:** `?array` — Additional data related to the loan
    
</dd>
</dl>
</dd>
</dl>


</dd>
</dl>
</details>

<details><summary><code>$client-&gt;loans-&gt;getLoanById($loanId) -> ?LoanResponseWithInstallments</code></summary>
<dl>
<dd>

#### 📝 Description

<dl>
<dd>

<dl>
<dd>

Retrieve detailed information about a specific loan by its loan ID.
</dd>
</dl>
</dd>
</dl>

#### 🔌 Usage

<dl>
<dd>

<dl>
<dd>

```php
$client->loans->getLoanById(
    'loan_id',
);
```
</dd>
</dl>
</dd>
</dl>

#### ⚙️ Parameters

<dl>
<dd>

<dl>
<dd>

**$loanId:** `string` 
    
</dd>
</dl>
</dd>
</dl>


</dd>
</dl>
</details>

<details><summary><code>$client-&gt;loans-&gt;deleteLoan($loanId) -> ?array</code></summary>
<dl>
<dd>

#### 📝 Description

<dl>
<dd>

<dl>
<dd>

Delete a loan by ID. Only loans with 'pending' status can be deleted.
</dd>
</dl>
</dd>
</dl>

#### 🔌 Usage

<dl>
<dd>

<dl>
<dd>

```php
$client->loans->deleteLoan(
    'loan_id',
);
```
</dd>
</dl>
</dd>
</dl>

#### ⚙️ Parameters

<dl>
<dd>

<dl>
<dd>

**$loanId:** `string` 
    
</dd>
</dl>
</dd>
</dl>


</dd>
</dl>
</details>

<details><summary><code>$client-&gt;loans-&gt;createBulkLoans($request) -> ?BulkLoanTaskResponse</code></summary>
<dl>
<dd>

#### 📝 Description

<dl>
<dd>

<dl>
<dd>

Create multiple loans in a single request. Processing happens asynchronously. Returns a task ID for tracking progress.
</dd>
</dl>
</dd>
</dl>

#### 🔌 Usage

<dl>
<dd>

<dl>
<dd>

```php
$client->loans->createBulkLoans(
    new BulkLoanCreatePayload([
        'loans' => [
            new BulkLoanItemPayload([
                'clientId' => 'client_123',
                'currency' => CurrencyEnum::Eur->value,
                'amount' => '50000.00',
                'correlationId' => 'LOAN_001',
                'loanDate' => new DateTime('2023-05-01'),
                'installments' => [
                    new LoanInstallmentCreatePayload([
                        'expectedRepaymentAt' => new DateTime('2023-06-01'),
                        'amount' => '26000.00',
                    ]),
                    new LoanInstallmentCreatePayload([
                        'expectedRepaymentAt' => new DateTime('2023-07-01'),
                        'amount' => '26000.00',
                    ]),
                ],
                'data' => [
                    'loan_type' => "business",
                    'purpose' => "expansion",
                ],
            ]),
        ],
    ]),
);
```
</dd>
</dl>
</dd>
</dl>

#### ⚙️ Parameters

<dl>
<dd>

<dl>
<dd>

**$loans:** `array` — List of loans to create (max 1000)
    
</dd>
</dl>
</dd>
</dl>


</dd>
</dl>
</details>

<details><summary><code>$client-&gt;loans-&gt;getBulkLoanStatus($taskId) -> ?BulkLoanTaskStatus</code></summary>
<dl>
<dd>

#### 📝 Description

<dl>
<dd>

<dl>
<dd>

Check the status of a bulk loan creation task and retrieve results when completed.
</dd>
</dl>
</dd>
</dl>

#### 🔌 Usage

<dl>
<dd>

<dl>
<dd>

```php
$client->loans->getBulkLoanStatus(
    'task_id',
);
```
</dd>
</dl>
</dd>
</dl>

#### ⚙️ Parameters

<dl>
<dd>

<dl>
<dd>

**$taskId:** `string` 
    
</dd>
</dl>
</dd>
</dl>


</dd>
</dl>
</details>

<details><summary><code>$client-&gt;loans-&gt;setLoanDefault($loanId, $request) -> ?LoanResponseWithInstallments</code></summary>
<dl>
<dd>

#### 📝 Description

<dl>
<dd>

<dl>
<dd>

Mark a loan as defaulted, recording the default date and the amount recovered from selling it. Defaults the loan's active and overdue installments and updates the loan status accordingly.
</dd>
</dl>
</dd>
</dl>

#### 🔌 Usage

<dl>
<dd>

<dl>
<dd>

```php
$client->loans->setLoanDefault(
    'loan_id',
    new LoanDefaultPayload([
        'defaultDate' => new DateTime('2026-06-23'),
        'soldAmount' => 1.1,
    ]),
);
```
</dd>
</dl>
</dd>
</dl>

#### ⚙️ Parameters

<dl>
<dd>

<dl>
<dd>

**$loanId:** `string` 
    
</dd>
</dl>

<dl>
<dd>

**$defaultDate:** `DateTime` — Date the loan is marked as defaulted.
    
</dd>
</dl>

<dl>
<dd>

**$soldAmount:** `float|string` — Amount recovered when the defaulted loan is sold.
    
</dd>
</dl>
</dd>
</dl>


</dd>
</dl>
</details>

## Partners
<details><summary><code>$client-&gt;partners-&gt;getAvailableFunding() -> ?array</code></summary>
<dl>
<dd>

#### 📝 Description

<dl>
<dd>

<dl>
<dd>

Use this endpoint to check the available funding capacity in your dedicated lending account before initiating a new loan or submitting a drawdown request.
</dd>
</dl>
</dd>
</dl>

#### 🔌 Usage

<dl>
<dd>

<dl>
<dd>

```php
$client->partners->getAvailableFunding();
```
</dd>
</dl>
</dd>
</dl>


</dd>
</dl>
</details>

<details><summary><code>$client-&gt;partners-&gt;createPartnerData($request) -> ?PartnerDataResponse</code></summary>
<dl>
<dd>

#### 📝 Description

<dl>
<dd>

<dl>
<dd>

Upload supplementary partner information, such as bank account balance, accounting figures, or other relevant details.
</dd>
</dl>
</dd>
</dl>

#### 🔌 Usage

<dl>
<dd>

<dl>
<dd>

```php
$client->partners->createPartnerData(
    new PartnerDataCreatePayload([
        'data' => [
            'key1' => "value1",
            'key2' => "value2",
        ],
    ]),
);
```
</dd>
</dl>
</dd>
</dl>

#### ⚙️ Parameters

<dl>
<dd>

<dl>
<dd>

**$data:** `array` 
    
</dd>
</dl>
</dd>
</dl>


</dd>
</dl>
</details>

<details><summary><code>$client-&gt;partners-&gt;listPartnerWaterfalls($request) -> ?PaginatedResponseWaterfallResponse</code></summary>
<dl>
<dd>

#### 📝 Description

<dl>
<dd>

<dl>
<dd>

Use this endpoint to get the list of waterfalls for your dedicated lending account.
</dd>
</dl>
</dd>
</dl>

#### 🔌 Usage

<dl>
<dd>

<dl>
<dd>

```php
$client->partners->listPartnerWaterfalls(
    new ListPartnerWaterfallsRequest([]),
);
```
</dd>
</dl>
</dd>
</dl>

#### ⚙️ Parameters

<dl>
<dd>

<dl>
<dd>

**$page:** `?int` 
    
</dd>
</dl>

<dl>
<dd>

**$pageSize:** `?int` 
    
</dd>
</dl>

<dl>
<dd>

**$orderBy:** `?string` — Field to order the results by, e.g., 'created_at:desc,updated_at:asc'
    
</dd>
</dl>

<dl>
<dd>

**$q:** `?string` — Query string for filtering. Format: "field:operator:value;...". Supported fields: id, name, date, status, created_at, updated_at. Supported operators: is, in, not_in, contains, not_contains, like, not_like, ilike, not_ilike, gt, gte, lt, lte, starts_with, ends_with, is_null, is_not_null.
    
</dd>
</dl>
</dd>
</dl>


</dd>
</dl>
</details>

## Webhooks
<details><summary><code>$client-&gt;webhooks-&gt;listWebhookSubscriptions($request) -> ?PaginatedResponseWebhookSubscriptionResponse</code></summary>
<dl>
<dd>

#### 📝 Description

<dl>
<dd>

<dl>
<dd>

List all webhook subscriptions for your partner account.
</dd>
</dl>
</dd>
</dl>

#### 🔌 Usage

<dl>
<dd>

<dl>
<dd>

```php
$client->webhooks->listWebhookSubscriptions(
    new ListWebhookSubscriptionsRequest([]),
);
```
</dd>
</dl>
</dd>
</dl>

#### ⚙️ Parameters

<dl>
<dd>

<dl>
<dd>

**$page:** `?int` 
    
</dd>
</dl>

<dl>
<dd>

**$pageSize:** `?int` 
    
</dd>
</dl>

<dl>
<dd>

**$eventType:** `?string` 
    
</dd>
</dl>
</dd>
</dl>


</dd>
</dl>
</details>

<details><summary><code>$client-&gt;webhooks-&gt;createWebhookSubscription($request) -> ?WebhookSubscriptionResponse</code></summary>
<dl>
<dd>

#### 📝 Description

<dl>
<dd>

<dl>
<dd>

Create a new webhook subscription for a specific event type.
</dd>
</dl>
</dd>
</dl>

#### 🔌 Usage

<dl>
<dd>

<dl>
<dd>

```php
$client->webhooks->createWebhookSubscription(
    new WebhookCreatePayload([
        'url' => 'https://example.com/webhooks',
        'description' => 'Loan update event',
        'eventType' => WebhookEventTypeEnum::LoanUpdated->value,
        'secret' => 'whsec_f3o9p8h7g6j5k4l3m2n1o0p9i8u7y6t5',
        'retry' => false,
        'status' => WebhookStatusEnum::Active->value,
    ]),
);
```
</dd>
</dl>
</dd>
</dl>

#### ⚙️ Parameters

<dl>
<dd>

<dl>
<dd>

**$url:** `string` — The URL to send webhooks to
    
</dd>
</dl>

<dl>
<dd>

**$description:** `?string` — Optional description of this webhook endpoint
    
</dd>
</dl>

<dl>
<dd>

**$eventType:** `string` — Event type to subscribe toPossible values: loan_updated, installment_updated, client_updated, client_limit_updated, partner_limit_updated
    
</dd>
</dl>

<dl>
<dd>

**$secret:** `string` — Secret for signing webhook payloads
    
</dd>
</dl>

<dl>
<dd>

**$retry:** `?bool` — Whether to retry failed webhooks
    
</dd>
</dl>

<dl>
<dd>

**$status:** `?string` — Status of the webhook subscription. Defaults to 'active'.Possible values: active, paused, disabled
    
</dd>
</dl>
</dd>
</dl>


</dd>
</dl>
</details>

<details><summary><code>$client-&gt;webhooks-&gt;getWebhookSubscription($webhookId) -> ?WebhookSubscriptionResponse</code></summary>
<dl>
<dd>

#### 📝 Description

<dl>
<dd>

<dl>
<dd>

Retrieve details for a specific webhook subscription with its webhook ID.
</dd>
</dl>
</dd>
</dl>

#### 🔌 Usage

<dl>
<dd>

<dl>
<dd>

```php
$client->webhooks->getWebhookSubscription(
    'webhook_id',
);
```
</dd>
</dl>
</dd>
</dl>

#### ⚙️ Parameters

<dl>
<dd>

<dl>
<dd>

**$webhookId:** `string` 
    
</dd>
</dl>
</dd>
</dl>


</dd>
</dl>
</details>

<details><summary><code>$client-&gt;webhooks-&gt;updateWebhookSubscription($webhookId, $request) -> ?WebhookSubscriptionResponse</code></summary>
<dl>
<dd>

#### 📝 Description

<dl>
<dd>

<dl>
<dd>

Update a webhook subscription with its specific webhook ID.
</dd>
</dl>
</dd>
</dl>

#### 🔌 Usage

<dl>
<dd>

<dl>
<dd>

```php
$client->webhooks->updateWebhookSubscription(
    'webhook_id',
    new WebhookUpdatePayload([
        'url' => 'https://example.com/webhooks/v2',
        'description' => 'Updated webhook endpoint',
        'eventType' => WebhookEventTypeEnum::InstallmentUpdated->value,
        'status' => WebhookStatusEnum::Paused->value,
        'retry' => true,
        'secret' => 'whsec_updated_secret_here',
    ]),
);
```
</dd>
</dl>
</dd>
</dl>

#### ⚙️ Parameters

<dl>
<dd>

<dl>
<dd>

**$webhookId:** `string` 
    
</dd>
</dl>

<dl>
<dd>

**$url:** `?string` — The URL to send webhooks to
    
</dd>
</dl>

<dl>
<dd>

**$description:** `?string` — Description of this webhook endpoint
    
</dd>
</dl>

<dl>
<dd>

**$eventType:** `?string` — Event type to subscribe toPossible values: loan_updated, installment_updated, client_updated, client_limit_updated, partner_limit_updated
    
</dd>
</dl>

<dl>
<dd>

**$status:** `?string` — Status of the webhook subscriptionPossible values: active, paused, disabled
    
</dd>
</dl>

<dl>
<dd>

**$retry:** `?bool` — Whether to retry failed webhooks
    
</dd>
</dl>

<dl>
<dd>

**$secret:** `?string` — Secret for signing webhook payloads
    
</dd>
</dl>
</dd>
</dl>


</dd>
</dl>
</details>

<details><summary><code>$client-&gt;webhooks-&gt;deleteWebhookSubscription($webhookId) -> ?array</code></summary>
<dl>
<dd>

#### 📝 Description

<dl>
<dd>

<dl>
<dd>

Delete a specific webhook subscription.
</dd>
</dl>
</dd>
</dl>

#### 🔌 Usage

<dl>
<dd>

<dl>
<dd>

```php
$client->webhooks->deleteWebhookSubscription(
    'webhook_id',
);
```
</dd>
</dl>
</dd>
</dl>

#### ⚙️ Parameters

<dl>
<dd>

<dl>
<dd>

**$webhookId:** `string` 
    
</dd>
</dl>
</dd>
</dl>


</dd>
</dl>
</details>

<details><summary><code>$client-&gt;webhooks-&gt;listWebhookLogs($request) -> ?PaginatedResponseWebhookLogResponse</code></summary>
<dl>
<dd>

#### 📝 Description

<dl>
<dd>

<dl>
<dd>

Retrieve all webhook logs linked to your partner account.
</dd>
</dl>
</dd>
</dl>

#### 🔌 Usage

<dl>
<dd>

<dl>
<dd>

```php
$client->webhooks->listWebhookLogs(
    new ListWebhookLogsRequest([]),
);
```
</dd>
</dl>
</dd>
</dl>

#### ⚙️ Parameters

<dl>
<dd>

<dl>
<dd>

**$webhookId:** `?string` 
    
</dd>
</dl>

<dl>
<dd>

**$page:** `?int` 
    
</dd>
</dl>

<dl>
<dd>

**$pageSize:** `?int` 
    
</dd>
</dl>
</dd>
</dl>


</dd>
</dl>
</details>

## Repayments
<details><summary><code>$client-&gt;repayments-&gt;listRepaymentLogs($request) -> ?PaginatedResponseRepaymentResponseWithClientInfo</code></summary>
<dl>
<dd>

#### 📝 Description

<dl>
<dd>

<dl>
<dd>

Retrieve all repayments made under your partner account. Supports filtering by client, loan, or installments.
</dd>
</dl>
</dd>
</dl>

#### 🔌 Usage

<dl>
<dd>

<dl>
<dd>

```php
$client->repayments->listRepaymentLogs(
    new ListRepaymentLogsRequest([]),
);
```
</dd>
</dl>
</dd>
</dl>

#### ⚙️ Parameters

<dl>
<dd>

<dl>
<dd>

**$clientId:** `?string` 
    
</dd>
</dl>

<dl>
<dd>

**$loanId:** `?string` 
    
</dd>
</dl>

<dl>
<dd>

**$installmentId:** `?string` 
    
</dd>
</dl>

<dl>
<dd>

**$page:** `?int` 
    
</dd>
</dl>

<dl>
<dd>

**$pageSize:** `?int` 
    
</dd>
</dl>

<dl>
<dd>

**$orderBy:** `?string` — Field to order the results by, e.g., 'created_at:desc,updated_at:asc'
    
</dd>
</dl>

<dl>
<dd>

**$q:** `?string` — Query string for filtering. Format: "field:operator:value;...". Supported fields: id, client_id, loan_id, installment_id, created_at, client.name, client.correlation_id. Supported operators: is, in, not_in, contains, not_contains, like, not_like, ilike, not_ilike, gt, gte, lt, lte, starts_with, ends_with, is_null, is_not_null.
    
</dd>
</dl>
</dd>
</dl>


</dd>
</dl>
</details>

<details><summary><code>$client-&gt;repayments-&gt;createRepayment($request) -> ?RepaymentResponse</code></summary>
<dl>
<dd>

#### 📝 Description

<dl>
<dd>

<dl>
<dd>

Create a new repayment log for an installment. Requires the installment ID, loan ID or loan correlation ID.
</dd>
</dl>
</dd>
</dl>

#### 🔌 Usage

<dl>
<dd>

<dl>
<dd>

```php
$client->repayments->createRepayment(
    new RepaymentCreatePayload([
        'amount' => 1.1,
    ]),
);
```
</dd>
</dl>
</dd>
</dl>

#### ⚙️ Parameters

<dl>
<dd>

<dl>
<dd>

**$installmentId:** `?string` — ID of the installment
    
</dd>
</dl>

<dl>
<dd>

**$loanId:** `?string` — ID of the associated Loan
    
</dd>
</dl>

<dl>
<dd>

**$correlationId:** `?string` — Correlation ID of associated loan
    
</dd>
</dl>

<dl>
<dd>

**$amount:** `float|string` — The amount of payment made for installment
    
</dd>
</dl>

<dl>
<dd>

**$repaymentDate:** `?DateTime` — Please provide the repayment_date if it differs from the time you log this repayment. Otherwise, it will be automatically set.
    
</dd>
</dl>

<dl>
<dd>

**$data:** `?array` — Additional metadata related to the repayment
    
</dd>
</dl>

<dl>
<dd>

**$isEarlySettlement:** `?bool` — Indicates if this repayment is for early settlement
    
</dd>
</dl>
</dd>
</dl>


</dd>
</dl>
</details>

<details><summary><code>$client-&gt;repayments-&gt;createBulkRepayments($request) -> ?BulkRepaymentTaskResponse</code></summary>
<dl>
<dd>

#### 📝 Description

<dl>
<dd>

<dl>
<dd>

Initiate processing of up to 10000 repayment logs. Returns task_id for tracking progress.
</dd>
</dl>
</dd>
</dl>

#### 🔌 Usage

<dl>
<dd>

<dl>
<dd>

```php
$client->repayments->createBulkRepayments(
    new BulkRepaymentCreatePayload([
        'repayments' => [
            new BulkRepaymentItemPayload([
                'amount' => '1000.00',
                'repaymentDate' => new DateTime('2023-10-01T12:00:00Z'),
                'data' => [
                    'reference' => "TXN-001",
                    'type' => "transfer",
                ],
                'installmentId' => 'installment_123',
            ]),
            new BulkRepaymentItemPayload([
                'amount' => '500.50',
                'data' => [
                    'notes' => "Payment received in office",
                    'type' => "cash",
                ],
                'loanId' => 'loan_456',
            ]),
            new BulkRepaymentItemPayload([
                'amount' => '750.00',
                'repaymentDate' => new DateTime('2023-09-30T15:30:00Z'),
                'correlationId' => 'LOAN-789',
            ]),
        ],
    ]),
);
```
</dd>
</dl>
</dd>
</dl>

#### ⚙️ Parameters

<dl>
<dd>

<dl>
<dd>

**$repayments:** `array` — List of repayments to create (max 10000)
    
</dd>
</dl>
</dd>
</dl>


</dd>
</dl>
</details>

<details><summary><code>$client-&gt;repayments-&gt;getBulkRepaymentStatus($taskId) -> ?BulkRepaymentTaskStatus</code></summary>
<dl>
<dd>

#### 📝 Description

<dl>
<dd>

<dl>
<dd>

Check the progress and results of a bulk repayment processing task.
</dd>
</dl>
</dd>
</dl>

#### 🔌 Usage

<dl>
<dd>

<dl>
<dd>

```php
$client->repayments->getBulkRepaymentStatus(
    'task_id',
);
```
</dd>
</dl>
</dd>
</dl>

#### ⚙️ Parameters

<dl>
<dd>

<dl>
<dd>

**$taskId:** `string` 
    
</dd>
</dl>
</dd>
</dl>


</dd>
</dl>
</details>

## Drawdowns
<details><summary><code>$client-&gt;drawdowns-&gt;listDrawdowns($request) -> ?PaginatedResponseDrawdownResponse</code></summary>
<dl>
<dd>

#### 📝 Description

<dl>
<dd>

<dl>
<dd>

Retrieve a list of drawdowns.
</dd>
</dl>
</dd>
</dl>

#### 🔌 Usage

<dl>
<dd>

<dl>
<dd>

```php
$client->drawdowns->listDrawdowns(
    new ListDrawdownsRequest([]),
);
```
</dd>
</dl>
</dd>
</dl>

#### ⚙️ Parameters

<dl>
<dd>

<dl>
<dd>

**$page:** `?int` 
    
</dd>
</dl>

<dl>
<dd>

**$pageSize:** `?int` 
    
</dd>
</dl>

<dl>
<dd>

**$orderBy:** `?string` — Field to order the results by, e.g., 'created_at:desc,updated_at:asc'
    
</dd>
</dl>

<dl>
<dd>

**$q:** `?string` — Query string for filtering. Format: "field:operator:value;...". Supported fields: . Supported operators: is, in, not_in, contains, not_contains, like, not_like, ilike, not_ilike, gt, gte, lt, lte, starts_with, ends_with, is_null, is_not_null.
    
</dd>
</dl>
</dd>
</dl>


</dd>
</dl>
</details>

<details><summary><code>$client-&gt;drawdowns-&gt;createDrawdownRequest($request) -> ?DrawdownResponse</code></summary>
<dl>
<dd>

#### 📝 Description

<dl>
<dd>

<dl>
<dd>

Create a new drawdown request.
</dd>
</dl>
</dd>
</dl>

#### 🔌 Usage

<dl>
<dd>

<dl>
<dd>

```php
$client->drawdowns->createDrawdownRequest(
    new DrawdownCreatePayload([
        'amount' => 1.1,
    ]),
);
```
</dd>
</dl>
</dd>
</dl>

#### ⚙️ Parameters

<dl>
<dd>

<dl>
<dd>

**$amount:** `float|string` — The amount for the drawdown.
    
</dd>
</dl>

<dl>
<dd>

**$drawdownDate:** `?DateTime` — The date for the drawdown. If not provided, defaults to the current date and time.
    
</dd>
</dl>
</dd>
</dl>


</dd>
</dl>
</details>

<details><summary><code>$client-&gt;drawdowns-&gt;listDrawdownChecklists($drawdownId, $request) -> ?PaginatedResponseDrawdownChecklistResponse</code></summary>
<dl>
<dd>

#### 📝 Description

<dl>
<dd>

<dl>
<dd>

Retrieve all checklist items for a specific drawdown
</dd>
</dl>
</dd>
</dl>

#### 🔌 Usage

<dl>
<dd>

<dl>
<dd>

```php
$client->drawdowns->listDrawdownChecklists(
    'drawdown_id',
    new ListDrawdownChecklistsRequest([]),
);
```
</dd>
</dl>
</dd>
</dl>

#### ⚙️ Parameters

<dl>
<dd>

<dl>
<dd>

**$drawdownId:** `string` 
    
</dd>
</dl>

<dl>
<dd>

**$page:** `?int` 
    
</dd>
</dl>

<dl>
<dd>

**$pageSize:** `?int` 
    
</dd>
</dl>

<dl>
<dd>

**$orderBy:** `?string` — Field to order the results by, e.g., 'created_at:desc,updated_at:asc'
    
</dd>
</dl>

<dl>
<dd>

**$q:** `?string` — Query string for filtering. Format: "field:operator:value;...". Supported fields: . Supported operators: is, in, not_in, contains, not_contains, like, not_like, ilike, not_ilike, gt, gte, lt, lte, starts_with, ends_with, is_null, is_not_null.
    
</dd>
</dl>
</dd>
</dl>


</dd>
</dl>
</details>

