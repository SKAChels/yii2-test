<?php

namespace app\models\task;

use app\models\core\AbstractState;
use Yii;

class TaskStatus extends AbstractState
{
    public const STATUS_NEW = 0;
    public const STATUS_DONE = 1;
    public const STATUS_CANCEL = 3;

    private $dueDate;

    public function __construct($state, string $dueDate)
    {
        $this->dueDate = $dueDate;
        parent::__construct($state);
    }

    public function getStateTexts(): array
    {
        return [
            self::STATUS_NEW => Yii::t('app', 'New'),
            self::STATUS_DONE => Yii::t('app', 'Complete'),
            self::STATUS_CANCEL => Yii::t('app', 'Cancel'),
        ];
    }

    public function isOverdue(): bool
    {
        return $this->state !== self::STATUS_DONE && strtotime($this->dueDate) < time();
    }

    public function isDone(): bool
    {
        return $this->state === self::STATUS_DONE;
    }
}
