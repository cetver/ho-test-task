<?php

use app\models\Item;
use yii\db\Migration;
use function iter\chunk;

/**
 * Class m200613_213102_insert_into_items
 */
class m200613_213102_insert_into_items extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        if (YII_ENV_PROD) {
            return true;
        }
        $rows = [];
        $faker = Faker\Factory::create();
        $keys = ['name', 'color', 'country', 'warranty', 'price', 'height', 'weight', 'volume', 'features'];
        $countKeys = count($keys);
        for ($i = 0; $i < 1000; $i++) {
            $data = [];
            $limit = random_int(0, $countKeys - 1);
            for ($j = 0; $j <= $limit; $j++) {
                $key = $keys[$j];
                $string = $key . ' ###';
                $data[$key] = $faker->numerify($string);
            }
            $rows[] = [
                'data' => $data,
            ];
        }

        foreach (chunk($rows, 300) as $data) {
            $transaction = $this->getDb()->beginTransaction();
            foreach ($data as $attributes) {
                $item = new Item($attributes);
                if (!$item->save()) {
                    $transaction->rollBack();
                    throw new \RuntimeException(print_r($item->getErrors(), true));
                }
            }
            $transaction->commit();
        }
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        echo "m200613_213102_insert_into_items cannot be reverted.\n";

        return false;
    }
    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m200613_213102_insert_into_items cannot be reverted.\n";

        return false;
    }
    */
}
