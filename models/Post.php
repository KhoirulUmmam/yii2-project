<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "POST".
 *
 * @property int $ID
 * @property string|null $TITLE
 * @property string|null $BODY
 * @property int $CATEGORY_ID
 */
class Post extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'POST';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['BODY'], 'string'],
            [['CATEGORY_ID'], 'required'],
            [['CATEGORY_ID'], 'integer'],
            [['TITLE'], 'string', 'max' => 255],
            [['CATEGORY_ID'], 'exist', 'skipOnError' => true, 'targetClass' => Category::class, 'targetAttribute' => ['CATEGORY_ID' => 'ID']],
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
            'BODY' => 'Body',
            'CATEGORY_ID' => 'Category ID',
        ];
    }

    public function getCategory()
    {
        return $this->hasOne(Category::className(), ['ID' => 'CATEGORY_ID']);
    }
}
