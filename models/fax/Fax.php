<?php

namespace app\models\fax;

use app\models\core\DirectionTrait;
use app\models\core\DirectionType;

class Fax extends FaxSchema
{
    use DirectionTrait;

    /**
     * @var FaxType
     */
    private $faxType;

    public function afterFind(): void
    {
        $this->directionType = new DirectionType($this->direction);
        $this->faxType = new FaxType($this->type);
        parent::afterFind();
    }

    public function getTypeText(): ?string
    {
        return $this->faxType->getStateText();
    }
}
