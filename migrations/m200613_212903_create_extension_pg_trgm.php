<?php

use yii\db\Migration;

/**
 * Class m200613_212903_create_extension_pg_trgm
 */
class m200613_212903_create_extension_pg_trgm extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->getDb()->createCommand('CREATE EXTENSION IF NOT EXISTS pg_trgm')->execute();
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->getDb()->createCommand('DROP EXTENSION IF EXISTS pg_trgm;')->execute();
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m200613_212903_create_extension_pg_trgm cannot be reverted.\n";

        return false;
    }
    */
}
