<?php declare(strict_types=1);

namespace app\behaviors;

use Ramsey\Uuid\Uuid;
use yii\base\Behavior;
use yii\db\ActiveRecord;

/**
 * The "Uuid4Behavior" class
 */
class Uuid4Behavior extends Behavior
{
    public $attribute = 'id';

    public function events()
    {
        return [
            ActiveRecord::EVENT_BEFORE_INSERT => 'setAttribute',
        ];
    }

    public function setAttribute()
    {
        $this->owner->{$this->attribute} = Uuid::uuid4();
    }
}