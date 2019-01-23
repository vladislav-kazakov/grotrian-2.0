<?php
namespace frontend\controllers;

use Yii;
use common\models\Atom;
use common\models\Level;
use common\models\Transition;
use yii\helpers\Html;
use yii\web\Controller;
use yii\web\HttpException;

/**
 * Class SpectrumpngController
 * @package frontend\controllers
 */
class SpectrumpngController extends Controller
{

    /**
     * @param $id
     * @throws HttpException
     */
    public function actionIndex($id)
    {
        $atom = Atom::findOne($id);

        if (empty($atom)) {
            throw new HttpException(404);
        }

        header("Content-type: image/png;");
        echo $atom->SPECTRUM_IMG;
        exit;
    }
}
