<?php declare(strict_types=1);

namespace app\behaviors;

use yii\base\Behavior;
use yii\db\ActiveRecord;
use yii\db\JsonExpression;
use yii\helpers\Json;

/**
 * The "Uuid4Behavior" class
 */
class JsonBehavior extends Behavior
{
    public $attribute = 'data';

    public function events()
    {
        return [
            ActiveRecord::EVENT_BEFORE_INSERT => 'encodeAttribute',
            ActiveRecord::EVENT_BEFORE_UPDATE => 'encodeAttribute',
            ActiveRecord::EVENT_AFTER_FIND => 'decodeAttribute',
            ActiveRecord::EVENT_AFTER_REFRESH => 'decodeAttribute',
        ];
    }

    public function encodeAttribute()
    {
        $this->owner->{$this->attribute} = new JsonExpression($this->owner->{$this->attribute});
    }

    public function decodeAttribute()
    {
        $this->owner->{$this->attribute} = (array)Json::decode($this->owner->{$this->attribute}, true);
    }
}