<?php

namespace common\models;

use yii\db\ActiveRecord;

class Bibliolink extends ActiveRecord
{
    public static function tableName()
    {
        return '{{BIBLIOLINKS}}';
    }
}