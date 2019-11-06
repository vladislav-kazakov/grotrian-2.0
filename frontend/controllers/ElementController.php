<?php
namespace frontend\controllers;

use common\models\Atom;
use common\models\Level;
use common\models\PeriodicTable;
use common\models\Transition;
use yii\web\Controller;
use yii\web\HttpException;

/**
 * Class ElementController
 * @package frontend\controllers
 */
class ElementController extends Controller
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

        $atoms = Atom::find()->select(['ID', 'ID_ELEMENT'])->where(['IONIZATION' => '0','MASS_NUMBER' => null])->distinct()->orderBy('ID_ELEMENT')->all();

        $atom_name = $atom->periodicTable->ABBR;

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

        if ($atom_name !='H' && $atom_name !='D' && $atom_name !='T' ) {
            $atom_name .= ' ' . Atom::numberToRoman(intval($atom->IONIZATION) + 1);
        }

        $ichi = '1S/' . $atom->periodicTable->ABBR;
        $ichi .= !empty($atom->ID_ELEMENT) ? '/q+' . $atom->IONIZATION : null;

        $level_count = Level::find()->where(['ID_ATOM' => $id])->count();
        $transition_count = Transition::find()->where(['ID_ATOM' => $id])->count();

        return $this->render('index', [
            'atom' => $atom,
            'atom_name' => $atom_name,
            'ions' => $ions_array,
            'ichi' => $ichi,
            'level_count' => $level_count,
            'transition_count' => $transition_count,
            'periodic_table' => $periodic_table,
            'atoms' => $atoms,
        ]);
    }
}