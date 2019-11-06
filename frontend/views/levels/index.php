<?php

/* @var $this yii\web\View */

/* @var $atom \common\models\Atom */
/* @var $model \common\models\Level */

use yii\helpers\Html;
use yii\grid\GridView;

$this->title = Yii::t('app', 'Atomic levels - {Z}', ['Z' => $atom->periodicTable->ABBR]);
?>


    <div class="pos-f-t">
        <div class="collapse" id="navbarToggleExternalContent">
            <div class="bg-dark p-4">
                <?= $this->render('../element_picker/_element_picker', ['periodic_table' => $periodic_table,'atoms' => $atoms]) ?>
            </div>
        </div>
        <nav >
            <button class="button white" type="button" data-toggle="collapse" data-target="#navbarToggleExternalContent" aria-controls="navbarToggleExternalContent" aria-expanded="false" aria-label="Toggle navigation">
                <span><?=$atom->periodicTable->ABBR?></span>
            </button>
            <?php foreach ($ions as $ion):?>
                <?php if($ion != -1): ?>
                    <button class="button white" type="button" aria-controls="navbarToggleExternalContent" aria-expanded="false" aria-label="Toggle navigation">
                        <span><?=$ion?></span>
                    </button>
                <?php endif; ?>
            <?php endforeach;?>
            <?php foreach ($ions as $ion):?>
                <?php if($ion == -1): ?>
                    <button class="button white" type="button" aria-controls="navbarToggleExternalContent" aria-expanded="false" aria-label="Toggle navigation">
                        <span><?=$atom->periodicTable->ABBR?></span><sup>–</sup>
                    </button>
                <?php endif; ?>
            <?php endforeach;?>
        </nav>
    </div>

<?= GridView::widget([
    'dataProvider' => $dataProvider,
    'formatter' => ['class' => 'yii\i18n\Formatter','nullDisplay' => ''],
    'columns' => [
        ['class' => 'yii\grid\SerialColumn'],
        [
            'label' => Yii::t('level', 'Configuration type'),
            'attribute' => 'typeConfigurationFormatHtml',
            'format' => 'html',
        ],
        [
            'label' => Yii::t('level', 'Configuration'),
            'attribute' => 'configurationFormatHtml',
            'format' => 'html',
        ],
        'J',
        [
            'label' => Yii::t('level', 'Term'),
            'attribute' => 'term',
            'format' => 'html',
        ],
        [
            'header' => Yii::t('level', 'Energy (cm<sup>-1</sup>)'),
            'attribute' => 'ENERGY',
            'format' => 'ntext',
        ],
        [
            'label' => Yii::t('level', 'Lifetime'),
            'attribute' => 'LIFETIME',
            'format' => 'ntext',
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