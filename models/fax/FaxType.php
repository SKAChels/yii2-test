<?php

namespace app\models\fax;

use app\models\core\AbstractState;
use Yii;

class FaxType extends AbstractState
{
    public const TYPE_POA_ATC = 'poa_atc';
    public const TYPE_REVOCATION_NOTICE = 'revocation_notice';

    public function getStateTexts(): array
    {
        return [
            self::TYPE_POA_ATC => Yii::t('app', 'POA/ATC'),
            self::TYPE_REVOCATION_NOTICE => Yii::t('app', 'Revocation'),
        ];
    }
}
