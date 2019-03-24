<?php

namespace app\modules\api\v1\models;

use yii\db\ActiveRecord;

class PeriodicTable extends ActiveRecord
{
    public static function tableName()
    {
        return '{{PERIODICTABLE}}';
    }
}