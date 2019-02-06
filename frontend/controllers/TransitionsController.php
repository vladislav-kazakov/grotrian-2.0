<?php

namespace frontend\controllers;

use common\models\Atom;
use common\models\Level;
use common\models\Transition;
use yii\data\ActiveDataProvider;
use yii\web\Controller;
use yii\web\HttpException;
use yii\helpers\ArrayHelper;

/**
 * Class TransitionsController
 * @package frontend\controllers
 */
class TransitionsController extends Controller
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

        $atom_name = $atom->periodicTable->ABBR;

        $dataProvider = new ActiveDataProvider([
            'query' => Transition::find()
                ->where(['ID_ATOM' => $id]),
//                ->orderBy(['ENERGY' => SORT_ASC]),
            'pagination' => [
                'pageSize' => 25,
            ],
        ]);

        return $this->render('index', [
            'atom' => $atom,
            'atom_name' => $atom_name,
            'dataProvider' => $dataProvider,
        ]);
    }

}
