<?php

namespace common\models;

use yii\db\ActiveRecord;

class InterfaceContent extends ActiveRecord
{
    public static function tableName()
    {
        return '{{INTERFACE_CONTENT}}';
    }
}