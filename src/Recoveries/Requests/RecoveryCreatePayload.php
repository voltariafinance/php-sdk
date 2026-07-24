<?php

namespace Voltaria\Recoveries\Requests;

use Voltaria\Core\Json\JsonSerializableType;
use Voltaria\Core\Json\JsonProperty;
use Voltaria\Core\Types\Union;
use Voltaria\Types\CurrencyEnum;
use DateTime;
use Voltaria\Core\Types\Date;

class RecoveryCreatePayload extends JsonSerializableType
{
    /**
     * @var string $loanId The ID of the loan this recovery is associated with.
     */
    #[JsonProperty('loan_id')]
    public string $loanId;

    /**
     * @var (
     *    float
     *   |string
     * ) $amount The amount recovered (must be > 0).
     */
    #[JsonProperty('amount'), Union('float', 'string')]
    public float|string $amount;

    /**
     * @var value-of<CurrencyEnum> $currency The currency of the recovered amount, must be one of the supported currencies: eur, gbp, usd, czk, pln, isk
     */
    #[JsonProperty('currency')]
    public string $currency;

    /**
     * @var DateTime $recoveryDate The date the recovery was made.
     */
    #[JsonProperty('recovery_date'), Date(Date::TYPE_DATE)]
    public DateTime $recoveryDate;

    /**
     * @var ?string $notes Optional notes about the recovery.
     */
    #[JsonProperty('notes')]
    public ?string $notes;

    /**
     * @param array{
     *   loanId: string,
     *   amount: (
     *    float
     *   |string
     * ),
     *   currency: value-of<CurrencyEnum>,
     *   recoveryDate: DateTime,
     *   notes?: ?string,
     * } $values
     */
    public function __construct(
        array $values,
    ) {
        $this->loanId = $values['loanId'];
        $this->amount = $values['amount'];
        $this->currency = $values['currency'];
        $this->recoveryDate = $values['recoveryDate'];
        $this->notes = $values['notes'] ?? null;
    }
}
