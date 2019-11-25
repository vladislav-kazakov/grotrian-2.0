<?php

/* @var $this yii\web\View */
/* @var $atoms \common\models\Atom */
/* @var $atom \common\models\Atom */
/* @var $periodic_table \common\models\PeriodicTable array of periodic table items */

use yii\helpers\Html;
use yii\helpers\Url;
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;

$this->title = Yii::t('app', 'Element description - {Z}', ['Z' => $atom->periodicTable->ABBR]);
?>

<div class="container_12">
    <div class="grid_12" id="main">
        <div class="brake"></div>
        <?php if (Yii::$app->language == 'ru'): ?>
            <h3>Атом <?= $atom->periodicTable->NAME_RU_ALT ?>, Z=<?= $atom->periodicTable->Z ?>,
                I.P.=<?= $atom->IONIZATION_POTENCIAL ?> см<sup>-1</sup>, InChI: <?= $ichi ?>
                <!--, ichi_key: {#$ichi_key#}--></h3>
        <?php else: ?>
            <h3>Atom of <?= $atom->periodicTable->NAME_EN ?>, Z=<?= $atom->periodicTable->Z ?>,
                I.P.=<?= $atom->IONIZATION_POTENCIAL ?> cm<sup>-1</sup></h3>
        <?php endif; ?>

        <?php if (!empty($atom->SPECTRUM_IMG)): ?>
            <?php if (Yii::$app->language == 'ru'): ?>
                <?= Html::a(Html::img(['/spectrumpng/index', 'id' => $atom->ID], [
                    'title' => "Спектр " . ($atom->IONIZATION == 0 ? "атома" : "иона") . ' ' . $atom->periodicTable->NAME_RU_ALT . ' (' . $atom_name . ')',
                    'alt' => "Спектр " . ($atom->IONIZATION == 0 ? "атома" : "иона") . ' ' . $atom->periodicTable->NAME_RU_ALT . ' (' . $atom_name . ')'
                ]), ['/spectrum/index', 'id' => $atom->ID]) ?>
            <?php else: ?>
                <?= Html::a(Html::img(['/spectrumpng/index', 'id' => $atom->ID], [
                    'title' => "Spectrum of " . $atom->periodicTable->NAME_EN . ' ' . ($atom->IONIZATION == 0 ? "atom" : "ion") . ' (' . $atom_name . ')',
                    'alt' => "Spectrum of " . $atom->periodicTable->NAME_EN . ' ' . ($atom->IONIZATION == 0 ? "atom" : "ion") . ' (' . $atom_name . ')',
                ])) ?>
            <?php endif; ?>
            <br>
        <?php endif; ?>

        <br>

        <?php if (Yii::$app->language == 'ru'): ?>
            <?php if (!empty($atom->interfaceContent->CONTAINMENT_RUS)): ?>
                <h4><?= Yii::t('element', 'Overview') ?></h4>
                <?= $atom->interfaceContent->CONTAINMENT_RUS ?>
            <?php endif; ?>

        <?php else: ?>


            <?php if (!empty($atom->interfaceContent->CONTAINMENT_ENG)): ?>
                <h4><?= Yii::t('element', 'Overview') ?></h4>
                <?= $atom->interfaceContent->CONTAINMENT_ENG ?>
            <?php endif; ?>

        <?php endif; ?>

        <?php if (!empty($atom->interfaceContent->USED_BOOKS)): ?>
            <h4><?= Yii::t('element', 'References') ?></h4>
            <?= $atom->interfaceContent->USED_BOOKS ?>
        <?php endif; ?>

        <form method='POST'>
            <input type='submit' id='export' value='<?= Yii::t('element', 'Export to XSAMS') ?>' name='export'
                   class="button" download>
        </form>


        <p>&nbsp;</p>
        <h4><?= Yii::t('element', 'Electronic structure') ?></h4>
        <?php if ($level_count != 0): ?>
            <?= Yii::t('element', 'Found') ?> <?= $level_count ?> <?= Yii::t('element', 'levels') ?>.
            <?= Html::a(Yii::t('element', '[view]'), ['/levels/index', 'id' => $atom->ID], ['class' => 'nav']) ?>

        <?php endif; ?>


        <?php if ($transition_count != 0): ?>
            <?= Yii::t('element', 'Found') ?> <?= $transition_count ?> <?= Yii::t('element', 'transitions') ?>.
            <?= Html::a(Yii::t('element', '[view]'), ['/transitions/index', 'id' => $atom->ID], ['class' => 'nav']) ?>

        <?php endif; ?>

        <?php /*
        <?php if (!empty($atom->LIMITS)): ?>
        <p>&nbsp;</p>
            <h4><?= Yii::t('element', 'Electronic structure') ?></h4>
            <h4>{#$l10n.Grotrian_Charts#}</h4>
        <a class="nav" target="_blank"
           href="/{#$locale#}/newdiagram/{#$layout_element_id#}">[{#$l10n.view#}]</a><br/><b>{#$l10n.To_view_a_chart#}
            <a href="http://www.adobe.com/svg/viewer/install/main.html" target="_blank">{#$l10n.To_view_a_chart_you_need#}
                Adobe SVG Viewer</a></b>
        <?php endif; ?>


        <?php if ($book_count != 0): ?>
        <p>
        <h4>{#$l10n.Bibliographic_references#}</h4>
        <ul>
            <?php foreach ($book_list as $book) {
                echo $book->NAME;
            }?>
        </ul>
        </p>
        <?php endif; ?>
        */ ?>

        <br/><br/>

    </div>
</div>
<!--End of Main -->
