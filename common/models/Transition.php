<?php

namespace common\models;

use yii\db\ActiveRecord;

/**
 * @property integer ID
 * @property integer $ID_ATOM
 * @property integer $ID_LOWER_LEVEL
 * @property integer $ID_UPPER_LEVEL
 * @property float $WAVELENGTH
 * @property float $PROBABILITY
 * @property float $OSCILLATOR_F
 * @property float $CROSSECTION
 * @property integer $INTENSITY
 * @property integer $ID_REF_AGGREGATOR
 * @property integer $ID_REF_ORIGINAL
 * @property integer $ID_REF_PROBABILITY
 * @property string $BIBLIOLINK
 *
 * @property object $lowerLevel
 * @property object $upperLevel
 * @property string $serie
 * @property string $serieFormatHtml
 *
 * Class Transition
 * @package common\models
 */
class Transition extends ActiveRecord
{
    public static function tableName()
    {
        return '{{TRANSITIONS}}';
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getLowerLevel()
    {
        return $this->hasOne(Level::className(), ['ID' => 'ID_LOWER_LEVEL']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getUpperLevel()
    {
        return $this->hasOne(Level::className(), ['ID' => 'ID_UPPER_LEVEL']);
    }

    /**
     * @return string
     */
    public function getSerie()
    {
        return ($this->ID_LOWER_LEVEL or $this->ID_UPPER_LEVEL) ? '(?)' :
            $this->lowerLevel->typeConfiguration . ' - ' . $this->upperLevel->typeConfiguration;

    }

    /**
     * @return string
     */
    public function getSerieFormatHtml()
    {
        return (!$this->ID_LOWER_LEVEL or !$this->ID_UPPER_LEVEL) ? '(?)' :
            $this->lowerLevel->configurationFormatHtml . '-' . $this->upperLevel->typeConfigurationFormatHtml;

    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getSource()
    {
        return $this->hasMany(Source::className(), ['ID' => 'ID_SOURCE'])
            ->viaTable(Bibliolink::tableName(), ['ID_RECORD' => 'ID'], function ($query) {
                /* @var $query \yii\db\ActiveQuery */
                $query->andWhere(['RECORDTYPE' => Bibliolink::TYPE_TRANSITION]);
            });

    }
}














