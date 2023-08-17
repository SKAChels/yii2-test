<?php

namespace app\models\core;

use Yii;

class DirectionType extends AbstractState
{
    public const DIRECTION_INCOMING = 0;
    public const DIRECTION_OUTGOING = 1;

    private $entityTitle;

    public function __construct(int $direction, string $entityTitle = '')
    {
        $this->entityTitle = $entityTitle;
        parent::__construct($direction);
    }

    public function isIncoming(): bool
    {
        return $this->state === self::DIRECTION_INCOMING;
    }

    public function isOutgoing(): bool
    {
        return $this->state === self::DIRECTION_OUTGOING;
    }

    public function getStateText(): ?string
    {
        return $this->getStateTexts()[$this->state] ?? $this->state;
    }

    public function getStateTexts(): array
    {
        $ending = '';
        if ($this->entityTitle) {
            $ending .= ' ' . $this->entityTitle;
        }
        return [
            self::DIRECTION_INCOMING => Yii::t('app', 'Incoming' . $ending),
            self::DIRECTION_OUTGOING => Yii::t('app', 'Outgoing' . $ending),
        ];
    }
}
