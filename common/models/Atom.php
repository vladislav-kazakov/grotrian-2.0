<?php

namespace common\models;

use yii\db\ActiveRecord;

class Atom extends ActiveRecord
{
    public static function tableName()
    {
        return '{{ATOMS}}';
    }
}