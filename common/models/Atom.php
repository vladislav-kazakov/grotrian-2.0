<?php

namespace common\models;

use yii\db\ActiveRecord;

/**
 * Class Atom
 * @property int ID
 * @property int ID_ELEMENT
 * @property int IONIZATION
 * @property float IONIZATION_POTENCIAL
 * @property int DESCRIPTION
 * @property string XML
 * @property string LIMITS
 * @property string BREAKS
 * @property int CHANGED
 * @property string SPECTRUM
 * @property string SPECTRUM_IMG
 * @property object periodicTable
 * @property object interfaceContent
 * @property object levels
 * @property object transitions
 * @package common\models
 */
class Atom extends ActiveRecord
{
    /**
     * @return string
     */
    public static function tableName()
    {
        return '{{ATOMS}}';
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPeriodicTable()
    {
        return $this->hasOne(PeriodicTable::className(), ['ID' => 'ID_ELEMENT']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getInterfaceContent()
    {
        return $this->hasOne(InterfaceContent::className(), ['ID' => 'DESCRIPTION']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getLevels()
    {
        return $this->hasMany(Level::className(), ['ID_ATOM' => 'ID']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getTransitions()
    {
        return $this->hasMany(Transition::className(), ['ID_ATOM' => 'ID']);
    }

    static function numberToRoman($value){
        if($value < 0) return "";
        if(!$value) return "0";
        $thousands = (int)($value / 1000);
        $value -= $thousands * 1000;
        $result = str_repeat("M", $thousands);
        $table = array(
            900 => "CM", 500 => "D", 400 => "CD", 100 => "C",
            90 => "XC", 50 => "L", 40 => "XL", 10 => "X",
            9 => "IX", 5 => "V", 4 => "IV", 1 => "I");
        while($value) {
            foreach($table as $part => $fragment) if($part <= $value) break;
            $amount = (int)($value/$part);
            $value -= $part*$amount;
            $result .= str_repeat($fragment,$amount);
        }
        return $result;
    }
}