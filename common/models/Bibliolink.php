<?php

namespace common\models;

use yii\db\ActiveRecord;

class Bibliolink extends ActiveRecord
{
    // types RECORDTYPE
    const TYPE_LEVEL = 'L';
    const TYPE_TRANSITION = 'T';

    public static function tableName()
    {
        return '{{BIBLIOLINKS}}';
    }
}