<?php
namespace frontend\controllers;

use common\models\Atom;
use common\models\Level;
use common\models\Transition;
use yii\web\HttpException;

/**
 * Class ElementController
 * @package frontend\controllers
 */
class ElementController extends MainController
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

        if ($atom_name !='H' && $atom_name !='D' && $atom_name !='T' ) {
            $atom_name .= ' ' . Atom::numberToRoman(intval($atom->IONIZATION) + 1);
        }

        $ichi = '1S/' . $atom->periodicTable->ABBR;
        $ichi .= !empty($atom->ID_ELEMENT) ? '/q+' . $atom->IONIZATION : null;

        $level_count = Level::find()->where(['ID_ATOM' => $id])->count();
        $transition_count = Transition::find()->where(['ID_ATOM' => $id])->count();
        MainController::initTable($atom);

        return $this->render('index', [
            'atom' => $atom,
            'atom_name' => $atom_name,
            'ichi' => $ichi,
            'level_count' => $level_count,
            'transition_count' => $transition_count,
        ]);
    }
}