<?php

/* @var $this yii\web\View */

use yii\helpers\Html;

$this->title = Yii::t('about','About project');
$this->params['breadcrumbs'][] = $this->title;
?>
<h1><?= Html::encode($this->title) ?></h1>

<?= Yii::t('about','Information system "Electronic structure of atoms" is one of the most complete world databases of spectral data.'); ?>
<br><br>
<?= Yii::t('about','At the core of the information system lies a database with spectral data, collected from various literary sources and electronic resources. Unlike similar resources, this information system provides both tabular and graphical representation of an atomic structure for all chemical elements of the periodic table.')?>
<br><br>
<?= Yii::t('about','The database contains information for neutral atoms, single and multiple ions. Experimental data presented for most of atoms in the database and theoretical data presented mainly for artificial and transuranium elements. The system provides a user with wide capabilities, including filtering and sorting of levels and transitions, selective representation of Rydberg and autoionization states.')?>
<br><br>
<?= Yii::t('about','The information system contains data on energy levels and radiative transitions, the values of the intensity and the probability of transitions, oscillator strengths, lifetimes of levels, excitation cross section.')?>
<br><br>
<p>
    <b> <?= Yii::t('about','"Electronic structure of atoms" allows next main types of usage')?>:</b>
</p>
<ul class="list-group">
    <li class="list-group-item active"><?= Yii::t('about','"Electronic structure of atoms" allows next main types of usage')?></li>
    <li class="list-group-item"><?= Yii::t('about','obtaining general background information about the atom or ion')?></li>
    <li class="list-group-item"><?= Yii::t('about','obtaining obtaining information about levels of elements in a tabular form. Currently, the system contains information on {0} levels',[$count_level])?><span class="badge"><?= $count_level ?></span></li>
    <li class="list-group-item"><?= Yii::t('about','obtaining information about transitions of elements in a tabular form. Currently, the system contains information on {0} transitions',[$count_transition])?><span class="badge"><?= $count_transition ?></span></li>
    <li class="list-group-item"><?= Yii::t('about','obtaining graphical representation in form of parametrized color spectrograms and Grotrian diagrams')?></li>
</ul>
<br>
<?= Yii::t('about','Grotrian diagrams is a well-known cognitive graphical representation of the structure of an atom or ion. In common view, the Grotrian diagram is a chart with sorted energy levels on the vertical scale and transitions in a form of lines, connecting energy levels. Transitions are selected from total number of transitions in accordance with priority rules and user options. A number of original algorithms implemented in the "Electronic structure of atoms" provide efficient selection of the lines. Thus Grotrian diagram remains legible for atomic systems with any number of transitions.')?>
<br><br>
<?= Yii::t('about','The information system is designed for scientists, engineers and students, dealing with atomic spectroscopy, plasma physics, quantum electronics, astrophysics and related disciplines, as well as in education.')?>
<br><br>
<?= Yii::t('about','The project is supported by Russian foundation for basic research. The copyright to the database and software are protected by RF Federal service for intellectual property. (Certificates №2009620361, №2011610094, №2011616297, patent №117178).')?>

<? var_dump(Yii::$app->language) ?>