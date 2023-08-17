<?php

namespace app\models\sms;

use app\models\core\AbstractState;
use Yii;

class SmsIncomingStatus extends AbstractState
{
    public const STATUS_NEW = 0;
    public const STATUS_READ = 1;
    public const STATUS_ANSWERED = 2;

    public function getStateTexts(): array
    {
        return [
            self::STATUS_NEW => Yii::t('app', 'New'),
            self::STATUS_READ => Yii::t('app', 'Read'),
            self::STATUS_ANSWERED => Yii::t('app', 'Answered'),
        ];
    }
}
