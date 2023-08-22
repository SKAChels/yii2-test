<?php

namespace app\models\task;

use app\models\core\AbstractState;
use Yii;

class TaskState extends AbstractState
{
    public const STATE_INBOX = 'inbox';
    public const STATE_DONE = 'done';
    public const STATE_FUTURE = 'future';

    public function getStateTexts(): array
    {
        return [
            self::STATE_INBOX => Yii::t('app', 'Inbox'),
            self::STATE_DONE => Yii::t('app', 'Done'),
            self::STATE_FUTURE => Yii::t('app', 'Future')
        ];
    }
}
