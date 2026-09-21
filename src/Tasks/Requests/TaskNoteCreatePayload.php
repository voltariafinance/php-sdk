<?php

namespace Voltaria\Tasks\Requests;

use Voltaria\Core\Json\JsonSerializableType;
use Voltaria\Core\Json\JsonProperty;

class TaskNoteCreatePayload extends JsonSerializableType
{
    /**
     * @var string $content The note content.
     */
    #[JsonProperty('content')]
    public string $content;

    /**
     * @param array{
     *   content: string,
     * } $values
     */
    public function __construct(
        array $values,
    ) {
        $this->content = $values['content'];
    }
}
