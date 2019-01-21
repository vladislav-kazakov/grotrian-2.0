<?php

namespace common\models;

use yii\db\ActiveRecord;

class Source extends ActiveRecord
{
    public static function tableName()
    {
        return '{{SOURCES}}';
    }
}