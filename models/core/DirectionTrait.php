<?php

namespace app\models\core;

trait DirectionTrait
{
    /**
     * @var DirectionType
     */
    private $directionType;

    public function isIncoming(): bool
    {
        return $this->directionType->isIncoming();
    }

    public function isOutgoing(): bool
    {
        return $this->directionType->isOutgoing();
    }

    public function getFullDirectionText(): ?string
    {
        return $this->directionType->getStateText();
    }
}
