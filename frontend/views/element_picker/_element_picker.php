<?php

/* @var $this yii\web\View */

/* @var $periodic_table \common\models\PeriodicTable array of periodic table items */

use yii\helpers\Html;
use yii\helpers\Url;
?>
<div class="element_picker">
    <div class="newperiodic">
        <div class="empty" style="left:0px; margin-top:0px;">&nbsp;</div>
        <?php for($i = 1; $i < 19; $i++):?>
            <div class="empty" style="left:<?= $i*26 ?>px; margin-top:0px;"><div class="head"><?= $i ?></div></div>
            <?php if($i < 9):?>
                <div class="empty" style="left:0px; margin-top:<?= $i*26 ?>px;">
                    <div class="head"><?= $i ?></div>
                </div>
            <?php endif ?>
        <?php endfor;?>
        <div class="empty" style="width:81px; left:0; margin-top:240px;"><div class="head"></div><?= Yii::t('periodic_table', 'Lanthanide') ?></div>
        <div class="empty" style="width:81px; left:0; margin-top:266px;"><div class="head"><?= Yii::t('periodic_table', 'Actinide') ?></div></div>
        <div class="empty" style="width:81px; left:0; margin-top:292px;"><div class="head"><?= Yii::t('periodic_table', 'Superactinide') ?></div></div>
        <?php $i=-2 ?>
        <?php $n=0 ?>
        <?php foreach ($periodic_table as $element):?>
            <?php
            if (Yii::$app->language == 'ru')
                $name = $element->NAME_RU;
            else
                $name = $element->NAME_EN;
            ?>
            <?php if(($element->Z > 57) && ($element->Z < 72)):?>
                <!-- Draw Lanthanide -->
                <?php $i++ ?>
                <div class="<?=$element->TYPE ?>" style="left:<?= $i*25+$i+105 ?>px; margin-top:240px; width: 27px; height: 27px;"><a title="<?= $name ?>" class="plink" ><input type="hidden" name="elemid" value="<?= $atoms[$n]->ID ?>" /><span class="pnum"><?= $element->Z ?></span><span class="pname"><?= $element->ABBR ?></span></a></div>
            <?php elseif(($element->Z > 89) && ($element->Z < 104)): ?>
                <!-- Draw Actinide -->
                <?php $i++ ?>
                <div class="<?=$element->TYPE ?>" style="left:<?= $i*25+$i-364+105 ?>px; margin-top:266px; width: 27px; height: 27px;"><a title="<?= $name ?>" class="plink" ><input type="hidden" name="elemid" value="<?= $atoms[$n]->ID  ?>" /><span class="pnum"><?= $element->Z ?></span><span class="pname"><?= $element->ABBR ?></span></a></div>
            <?php elseif(($element->Z > 120) && ($element->Z < 123)): ?>
                <!-- Draw Superactinide -->
                <?php $i++ ?>
                <div class="<?=$element->TYPE ?>" style="left:<?= $i*25+$i-623 ?>px; margin-top:292px; width: 27px; height: 27px;"><a title="<?= $name ?>" class="plink" ><input type="hidden" name="elemid" value="<?= $atoms[$n]->ID  ?>" /><span class="pnum"><?= $element->Z ?></span><span class="pname"><?= $element->ABBR ?></span></a></div>
            <?php elseif($element->ABBR == 'T'): ?>
                <!-- Draw Tritium and Deiterium -->
                <?php $n-- ?>
                <div class="<?=$element->TYPE ?>" style="left:468px; margin-top:240px; width: 27px; height: 27px;"><a title="<?= $name ?>" class="plink" ><input type="hidden" name="elemid" value="<?= $element->getAtom($element->ID)->ID  ?>" /><span class="pname_head"><?= $element->ABBR ?></span></a></div>
            <?php elseif($element->ABBR == 'D'): ?>
                <?php $n-- ?>
                <div class="<?=$element->TYPE ?>" style="left:468px; margin-top:266px; width: 27px; height: 27px;"><a title="<?= $name ?>" class="plink" ><input type="hidden" name="elemid" value="<?= $element->getAtom($element->ID)->ID  ?>" /><span class="pname_head"><?= $element->ABBR ?></span></a></div>
            <?php elseif($element->Z < 121): ?>
                <!-- Draw All Other Elements the Table -->
                <div class="<?=$element->TYPE ?>" style="left:<?=$element->TABLEGROUP*25+$element->TABLEGROUP?>px; margin-top:<?=$element->TABLEPERIOD*26?>px; width: 27px; height: 27px;"><a title="<?= $name ?>" class="plink" ><input type="hidden" name="elemid" value="<?= $atoms[$n]->ID ?>" /><span class="pnum"><?= $element->Z ?></span><span class="pname"><?= $element->ABBR ?></span></a></div>
            <?php endif;?>
            <?php $n++ ?>
        <?php endforeach; ?>
    </div>
</div>

<?php
$script = <<< JS
    $(document).ready(function() {
    $(".plink").hover(function () {
        var link = $(':first-child', this).val();
        $(this).attr('href', link);
        return false;
    });
});
JS;
$this->registerJs($script);
?>
<!--End of Periodic Table-->