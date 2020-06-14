<?php

use yii\db\Migration;
use yii\db\pgsql\Schema;

/**
 * Handles the creation of table `{{%items}}`.
 */
class m200613_212930_create_items_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable(
            '{{%items}}',
            [
                'id' => $this->string(36)->notNull()->append('PRIMARY KEY'),
                'data' => Schema::TYPE_JSONB . ' NOT NULL',
            ]
        );
        $queries = [
            'CREATE INDEX items_data_name_idx ON items USING GIN ((data->>\'name\') gin_trgm_ops)',
            'CREATE INDEX items_data_color_idx ON items USING GIN ((data->>\'color\') gin_trgm_ops)',
        ];
        foreach ($queries as $query) {
            $this->getDb()->createCommand($query)->execute();
        }
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%items}}');
    }
}
