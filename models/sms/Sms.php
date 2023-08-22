<?php

namespace app\models\sms;

use app\models\core\DirectionTrait;
use app\models\core\DirectionType;
use app\models\core\AbstractState;

class Sms extends SmsSchema
{
    use DirectionTrait;

    /**
     * @var AbstractState
     */
    private $smsStatus;

    public function afterFind(): void
    {
        $this->directionType = new DirectionType($this->direction);
        $this->smsStatus = $this->isIncoming() ? new SmsIncomingStatus($this->status) : new SmsOutgoingStatus($this->status);
        parent::afterFind();
    }

    public function getStatusText(): string
    {
        return $this->smsStatus->getStateText();
    }
}
