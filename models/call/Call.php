<?php

namespace app\models\call;

use app\models\core\DirectionTrait;
use app\models\core\DirectionType;

class Call extends CallSchema
{
    use DirectionTrait;

    /**
     * @var CallStatus
     */
    private $callStatus;

    public function afterFind(): void
    {
        $this->directionType = new DirectionType($this->direction, 'Call');
        $this->callStatus = new CallStatus($this->status, $this->directionType, $this->duration);
        parent::afterFind();
    }

    public function getTotalStatusText(): string
    {
        return $this->callStatus->getStateText();
    }

    public function getClient_phone(): string
    {
        return $this->isIncoming() ? $this->phone_from : $this->phone_to;
    }

    public function isAnswered(): bool
    {
        return $this->callStatus->isAnswered();
    }

    public function isNotAnswered(): bool
    {
        return $this->callStatus->isNotAnswered();
    }
}
