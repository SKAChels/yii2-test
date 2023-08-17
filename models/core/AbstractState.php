<?php

namespace app\models\core;

abstract class AbstractState
{
    protected $state;

    public function __construct($state)
    {
        $this->state = $state;
    }

    public function getStateText(): ?string
    {
        return $this->getStateTextByValue($this->state);
    }

    public function getStateTexts(): array
    {
        return [];
    }

    public function getStateTextByValue($value)
    {
        return $this->getStateTexts()[$value] ?? $value;
    }
}
