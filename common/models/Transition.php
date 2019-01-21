<?php

namespace common\models;

use yii\db\ActiveRecord;

class Transition extends ActiveRecord
{
    public static function tableName()
    {
        return '{{TRANSITIONS}}';
    }
}