<?php

namespace app\models;

class Komentar extends \yii\base\Model
{
    public $NAMA;
    public $PESAN;

    public function rules()
    {
        return [
            [['NAMA'], 'required'],
            [['PESAN'], 'safe'],
        ];
    }
}
