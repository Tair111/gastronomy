<?php

/* @var $this yii\web\View */

use app\assets\AppAsset;
use yii\helpers\Html;

$this->title = 'Adminpanel';


?>
<h2 align="center">Admin panel</h2>

<p><?= Html::a('Go to ingredients list &raquo;', array('/ingredient/index'), ['class' => 'btn btn-default']) ?></p>
<p><?= Html::a('Go to dishes list &raquo;', array('/dish/index'), ['class' => 'btn btn-default']) ?></p>

<!--<p><?= Html::a('Generate random dishes &raquo;', array('/site/dishgenerator'), ['class' => 'btn btn-default']) ?></p>-->

