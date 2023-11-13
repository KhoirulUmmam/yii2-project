<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "BOOK".
 *
 * @property int $ID
 * @property string $TITLE
 * @property string $AUTHOR
 * @property string $PUBLISHER
 * @property float $PRICE
 * @property int $STOCK
 */
class Book extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'BOOK';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['TITLE', 'AUTHOR', 'PUBLISHER', 'PRICE', 'STOCK'], 'required'],
            [['PRICE'], 'number'],
            [['STOCK'], 'integer'],
            [['TITLE'], 'string', 'max' => 150],
            [['AUTHOR', 'PUBLISHER'], 'string', 'max' => 50],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'ID' => 'ID',
            'TITLE' => 'Title',
            'AUTHOR' => 'Author',
            'PUBLISHER' => 'Publisher',
            'PRICE' => 'Price',
            'STOCK' => 'Stock',
        ];
    }
}
