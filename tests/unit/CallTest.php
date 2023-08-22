<?php

namespace app\tests\unit;

use app\models\call\Call;
use app\models\call\CallStatus;
use app\models\core\DirectionType;
use Codeception\Test\Unit;

class CallTest extends Unit
{
    public function testIsAnswered()
    {
        $call = new Call();
        $call->status = CallStatus::STATUS_ANSWERED;
        $call->direction = DirectionType::DIRECTION_INCOMING;
        $call->duration = 60;
        $call->afterFind();

        $this->assertTrue($call->isAnswered());

        $call = new Call();
        $call->status = CallStatus::STATUS_NOT_ANSWERED;
        $call->direction = DirectionType::DIRECTION_INCOMING;
        $call->duration = 60;
        $call->afterFind();

        $this->assertFalse($call->isAnswered());
    }

    public function testIsNotAnswered()
    {
        $call = new Call();
        $call->status = CallStatus::STATUS_NOT_ANSWERED;
        $call->direction = DirectionType::DIRECTION_OUTGOING;
        $call->duration = 60;
        $call->afterFind();

        $this->assertTrue($call->isNotAnswered());

        $call = new Call();
        $call->status = CallStatus::STATUS_ANSWERED;
        $call->direction = DirectionType::DIRECTION_OUTGOING;
        $call->duration = 60;
        $call->afterFind();

        $this->assertFalse($call->isNotAnswered());
    }
}
