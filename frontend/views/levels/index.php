<?php

/* @var $this yii\web\View */

/* @var $atom \common\models\Atom */
/* @var $model \common\models\Level */

use yii\helpers\Html;
use yii\grid\GridView;

$this->title = Yii::t('app', 'Atomic levels - {Z}', ['Z' => $atom->periodicTable->ABBR]);
?>

<?= GridView::widget([
    'dataProvider' => $dataProvider,
    'columns' => [
        ['class' => 'yii\grid\SerialColumn'],
        [
            'label' => Yii::t('level', 'Configuration type'),
            'attribute' => 'configType',
            'format' => 'html',
            'value' => function($model) {
                return $model->typeConfigurationFormatHtml;
            },
        ],
        [
            'label' => Yii::t('level', 'Configuration'),
            'attribute' => 'config',
            'format' => 'html',
            'value' => function($model) {
                return $model->configurationFormatHtml;
            },
        ],
        'J',
        [
            'label' => Yii::t('level', 'Term'),
            'attribute' => 'term',
            'format' => 'html',
            'value' => function($model) {
                return $model->term;
            },
        ],
        [
            'header' => Yii::t('level', 'Energy (cm<sup>-1</sup>)'),
            'attribute' => 'ENERGY',
            'format' => 'ntext',
            'value' => function($model) {
                return $model->ENERGY === null ? '' : $model->ENERGY;
            },
        ],
        [
            'label' => Yii::t('level', 'Lifetime'),
            'attribute' => 'LIFETIME',
            'format' => 'ntext',
            'value' => function($model) {
                return $model->LIFETIME === null ? '' : $model->LIFETIME;
            },
        ],
        [
            'label' => Yii::t('level', 'Source'),
            'attribute' => 'source',
            'format' => 'html',
            'value' => function($model) {
                $result = '';
                if (!empty($model->source)) {
                    foreach ($model->source as $item) {
                        $result .= Html::a($item->ID, ['#']) . ' ';
                    }
                }
                return $result;
            },
        ],
    ],
]) ?>