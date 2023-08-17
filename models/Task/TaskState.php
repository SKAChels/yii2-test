<?php

namespace app\models\Task;

use app\models\core\AbstractState;
use Yii;

class TaskStatus extends AbstractState
{
    public const STATUS_NEW = 0;
    public const STATUS_DONE = 1;
    public const STATUS_CANCEL = 3;

    public function getStateTexts(): array
    {
        return [
            self::STATUS_NEW => Yii::t('app', 'New'),
            self::STATUS_DONE => Yii::t('app', 'Complete'),
            self::STATUS_CANCEL => Yii::t('app', 'Cancel'),
        ];
    }
}
