<?php

namespace Voltaria\Types;

enum WebhookEventTypeEnum: string
{
    case LoanUpdated = "loan.updated";
    case InstallmentUpdated = "installment.updated";
    case ClientUpdated = "client.updated";
    case ClientLimitUpdated = "client.limit.updated";
    case PartnerLimitUpdated = "partner.limit.updated";
}
