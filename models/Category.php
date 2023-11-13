<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "CATEGORY".
 *
 * @property int $ID
 * @property string $NAME
 */
class Category extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'CATEGORY';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['NAME'], 'required'],
            [['NAME'], 'string', 'max' => 100],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'ID' => 'ID',
            'NAME' => 'Name',
        ];
    }

    public function getPosts()
    {
        return $this->hasMany(Post::className(), ['CATEGORY_ID' => 'ID']);
    }
}
