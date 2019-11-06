<?php

namespace frontend\controllers;

use common\models\Atom;
use common\models\Level;
use common\models\Transition;
use yii\data\ActiveDataProvider;
use yii\web\Controller;
use yii\web\HttpException;
use yii\helpers\ArrayHelper;
use common\models\PeriodicTable;

/**
 * Class LevelsController
 * @package frontend\controllers
 */
class LevelsController extends Controller
{

    /**
     * @param int $id
     * @return string
     * @throws HttpException
     */
    public function actionIndex($id = 2511)
    {
        $atom = Atom::findOne($id);


        if (empty($atom)) {
            throw new HttpException(404);
        }

        $periodic_table = PeriodicTable::find()
            ->orderBy('ID')
            ->all();

        $atom_name = $atom->periodicTable->ABBR;
        $atoms = Atom::find()->select(['ID', 'ID_ELEMENT'])->where(['IONIZATION' => '0','MASS_NUMBER' => null])->distinct()->orderBy('ID_ELEMENT')->all();
        $ions = Atom::find()->select(['IONIZATION'])->where(['ID_ELEMENT' => $atom->ID_ELEMENT])->distinct()->orderBy('IONIZATION')->all();
        $ions_array = array();
        foreach($ions as $ion){
            if($ion->IONIZATION == -1){
                $ions_array[] = -1;
            }
            else{
                $ions_array[] = Atom::numberToRoman(intval($ion->IONIZATION) + 1);
            }
        }

        $dataProvider = new ActiveDataProvider([
            'query' => Level::find()
                ->where(['ID_ATOM' => $id])
                ->orderBy(['ENERGY' => SORT_ASC]),
            'pagination' => [
                'pageSize' => 25,
            ],
        ]);

        return $this->render('index', [
            'atom' => $atom,
            'ions' => $ions_array,
            'atom_name' => $atom_name,
            'dataProvider' => $dataProvider,
            'periodic_table' => $periodic_table,
            'atoms' => $atoms,
        ]);
    }

}