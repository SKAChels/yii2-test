<?php

namespace app\models\Customer;

use Yii;

class CustomerQuality
{
    const QUALITY_ACTIVE = 'active';
    const QUALITY_REJECTED = 'rejected';
    const QUALITY_COMMUNITY = 'community';
    const QUALITY_UNASSIGNED = 'unassigned';
    const QUALITY_TRICKLE = 'trickle';

    public static function getQualityTexts(): array
    {
        return [
            self::QUALITY_ACTIVE => Yii::t('app', 'Active'),
            self::QUALITY_REJECTED => Yii::t('app', 'Rejected'),
            self::QUALITY_COMMUNITY => Yii::t('app', 'Community'),
            self::QUALITY_UNASSIGNED => Yii::t('app', 'Unassigned'),
            self::QUALITY_TRICKLE => Yii::t('app', 'Trickle'),
        ];
    }

    /**
     * @param $quality
     * @return mixed|null
     */
    public static function getQualityTextByQuality($quality)
    {
        return self::getQualityTexts()[$quality] ?? $quality;
    }
}
