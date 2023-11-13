<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%category}}`.
 */
class m231113_025034_create_category_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('CATEGORY', [
            'ID' => $this->primaryKey(),
            'NAME' => $this->string(100)->notNull(),
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('CATEGORY');
    }
}
