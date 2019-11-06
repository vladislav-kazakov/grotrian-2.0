<?php

namespace common\models;

use yii\db\ActiveRecord;

/**
 * Class PeriodicTable
 * @property object atom
 */
class PeriodicTable extends ActiveRecord
{
    public static function tableName()
    {
        return '{{PERIODICTABLE}}';
    }


    /**
     * @return \yii\db\ActiveQuery
     */
    public function getAtom($id)
    {
        $atom=Atom::findOne([
            'ID_ELEMENT' => $id,
            'IONIZATION' => 0,
        ]);
        return $atom;
    }

}