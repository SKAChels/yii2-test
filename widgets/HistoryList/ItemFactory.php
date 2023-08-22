<?php

namespace app\widgets\HistoryList;

use app\models\history\History;
use app\models\history\HistoryEvent;
use app\widgets\HistoryList\interfaces\RenderItemInterface;
use app\widgets\HistoryList\models\Call;
use app\widgets\HistoryList\models\Common;
use app\widgets\HistoryList\models\CustomerChangeQuality;
use app\widgets\HistoryList\models\CustomerChangeType;
use app\widgets\HistoryList\models\Fax;
use app\widgets\HistoryList\models\Sms;
use Task;

class ItemFactory
{
    private const CLASSES = [
        HistoryEvent::EVENT_CREATED_TASK => Task::class,
        HistoryEvent::EVENT_UPDATED_TASK => Task::class,
        HistoryEvent::EVENT_COMPLETED_TASK => Task::class,

        HistoryEvent::EVENT_INCOMING_CALL => Call::class,
        HistoryEvent::EVENT_OUTGOING_CALL => Call::class,

        HistoryEvent::EVENT_INCOMING_SMS => Sms::class,
        HistoryEvent::EVENT_OUTGOING_SMS => Sms::class,

        HistoryEvent::EVENT_INCOMING_FAX => Fax::class,
        HistoryEvent::EVENT_OUTGOING_FAX => Fax::class,

        HistoryEvent::EVENT_CUSTOMER_CHANGE_QUALITY => CustomerChangeQuality::class,
        HistoryEvent::EVENT_CUSTOMER_CHANGE_TYPE => CustomerChangeType::class,
    ];

    public static function create(History $historyItem): RenderItemInterface
    {
        $class = self::CLASSES[$historyItem->event] ?? null;
        if ($class === null || !class_exists($class)) {
            return new Common($historyItem);
        }
        return new $class($historyItem);
    }
}