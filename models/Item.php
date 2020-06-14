<?php declare(strict_types=1);

namespace app\models;

use app\behaviors\JsonBehavior;
use app\behaviors\Uuid4Behavior;
use Yii;
use yii\db\ActiveRecord;

/**
 * This is the model class for table "items".
 *
 * @property string $id
 * @property array|string $data
 */
class Item extends ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'items';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id'], 'string', 'min' => 36, 'max' => 36],
            [['data'], 'required'],
            [['data'], 'each', 'rule' => ['safe']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'data' => Yii::t('app', 'Data'),
        ];
    }

    /**
     * {@inheritdoc}
     * @return ItemQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new ItemQuery(get_called_class());
    }

    public function behaviors()
    {
        return [
            Uuid4Behavior::class,
            JsonBehavior::class
        ];
    }
}
