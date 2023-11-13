<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%book}}`.
 */
class m231113_022939_create_book_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        // $this->createTable('{{%book}}', [
        //     'id' => $this->primaryKey(),
        // ]);
        $tableOptions = null;
        if ($this->db->driverName === 'mysql') {
            $tableOptions = 'CHARACTER SET utf8 COLLATE utf8_unicode_ci
            ENGINE=InnoDB';
        }
        $this->createTable('BOOK', [
            'ID' => $this->primaryKey(),
            'TITLE' => $this->string(150)->notNull(),
            'AUTHOR' => $this->string(50)->notNull(),
            'PUBLISHER' => $this->string(50)->notNull(),
            'PRICE' => $this->decimal(10, 2)->notNull(),
            'STOCK' => $this->integer(5)->notNull(),
        ], $tableOptions);

        $this->batchInsert(
            'BOOK',
            ['TITLE', 'AUTHOR', 'PUBLISHER', 'PRICE', 'STOCK'],
            [
                ['Pemrograman PHP', 'Ummam', 'Elexmedia', 65000, 5],
                ['Belajar Next.js', 'Budi', 'Digipub', 40000, 3],
                ['Membuat Website Menggunakan Yii', 'Dira', 'Andi Offset', 50000, 4],
            ]
        );
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('BOOK');
    }
}
