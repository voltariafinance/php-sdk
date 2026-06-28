<?php

namespace Voltaria\Drawdowns\Requests;

use Voltaria\Core\Json\JsonSerializableType;
use Voltaria\Core\Json\JsonProperty;
use Voltaria\Core\Types\Union;
use DateTime;
use Voltaria\Core\Types\Date;

class DrawdownCreatePayload extends JsonSerializableType
{
    /**
     * @var (
     *    float
     *   |string
     * ) $amount The amount for the drawdown.
     */
    #[JsonProperty('amount'), Union('float', 'string')]
    public float|string $amount;

    /**
     * @var ?DateTime $drawdownDate The date for the drawdown. If not provided, defaults to the current date and time.
     */
    #[JsonProperty('drawdown_date'), Date(Date::TYPE_DATETIME)]
    public ?DateTime $drawdownDate;

    /**
     * @param array{
     *   amount: (
     *    float
     *   |string
     * ),
     *   drawdownDate?: ?DateTime,
     * } $values
     */
    public function __construct(
        array $values,
    ) {
        $this->amount = $values['amount'];
        $this->drawdownDate = $values['drawdownDate'] ?? null;
    }
}
