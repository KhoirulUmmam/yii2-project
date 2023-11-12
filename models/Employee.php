<?php

namespace app\models;

use yii\db\ActiveRecord;

class Employee extends ActiveRecord
{
    public static function tableName()
    {
        return 'EMPLOYEE';
    }

    public function rules()
    {
        return [
            [['NAME', 'AGE'], 'required'],
            [['NAME', 'ADDRESS'], 'string'],
            [['AGE'], 'integer'],
        ];
    }
}
