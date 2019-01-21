<?php

namespace common\models;

use yii\db\ActiveRecord;

class PeriodicTable extends ActiveRecord
{
    public static function tableName()
    {
        return '{{PERIODICTABLE}}';
    }
}