<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%post}}`.
 * Has foreign keys to the tables:
 *
 * - `{{%CATEGORY}}`
 */
class m231113_025306_create_post_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('POST', [
            'ID' => $this->primaryKey(),
            'TITLE' => $this->string(),
            'BODY' => $this->text(),
            'CATEGORY_ID' => $this->integer()->notNull(),
        ]);

        // creates index for column `CATEGORY_ID`
        $this->createIndex(
            'IDX-POST-CATEGORY_ID',
            'POST',
            'CATEGORY_ID'
        );

        // add foreign key for table `{{%CATEGORY}}`
        $this->addForeignKey(
            'FK-POST-CATEGORY_ID',
            'POST',
            'CATEGORY_ID',
            'CATEGORY',
            'ID',
            'CASCADE'
        );
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        // drops foreign key for table `{{%CATEGORY}}`
        $this->dropForeignKey(
            'FK-POST-CATEGORY_ID',
            'POST'
        );

        // drops index for column `CATEGORY_ID`
        $this->dropIndex(
            'IDX-POST-CATEGORY_ID',
            'POST'
        );

        $this->dropTable('POST');
    }
}
