<?php

namespace app\models\call;

use app\models\core\AbstractState;
use app\models\core\DirectionType;
use Yii;

class CallStatus extends AbstractState
{
    public const STATUS_NOT_ANSWERED = 0;
    public const STATUS_ANSWERED = 1;

    private $directionType;
    private $duration;

    public function __construct(
        int $status,
        DirectionType $directionType,
        int $duration
    ) {
        $this->directionType = $directionType;
        $this->duration = $duration;
        parent::__construct($status);
    }

    public function getStateText(): ?string
    {
        if ($this->isNotAnswered() && $this->directionType->isIncoming()) {
            return Yii::t('app', 'Missed Call');
        }

        if ($this->isNotAnswered() && $this->directionType->isOutgoing()) {
            return Yii::t('app', 'Client No Answer');
        }

        $msg = $this->directionType->getStateText();

        if ($this->duration) {
            $msg .= ' (' . $this->getDurationText() . ')';
        }

        return $msg;
    }

    public function isAnswered(): bool
    {
        return $this->state === self::STATUS_ANSWERED;
    }

    public function isNotAnswered(): bool
    {
        return $this->state === self::STATUS_NOT_ANSWERED;
    }

    private function getDurationText()
    {
        if (!is_null($this->duration)) {
            return $this->duration >= 3600 ? gmdate("H:i:s", $this->duration) : gmdate("i:s", $this->duration);
        }
        return '00:00';
    }
}
