<?php

namespace common\models;

use yii\db\ActiveRecord;

class Counter extends ActiveRecord
{
    public static function tableName()
    {
        return '{{COUNTER}}';
    }
}