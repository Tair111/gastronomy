<?php

/* @var $this \yii\web\View */
/* @var $content string */

use yii\helpers\Html;
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;
use yii\widgets\Breadcrumbs;
use app\assets\AppAsset;
use app\models\User;

AppAsset::register($this);
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">
<head>
    <meta charset="<?= Yii::$app->charset ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?= Html::csrfMetaTags() ?>
    <title><?= Html::encode($this->title) ?></title>
    <?php $this->head() ?>
</head>
<body>
<?php $this->beginBody() ?>

<div class="wrap">
    <?php
    $menuItems = [];


    if (Yii::$app->user->isGuest) {
        $menuItems[] = ['label' => 'Login', 'url' => ['/site/login']];
    }
    else {
        if (Yii::$app->user->identity->isAdmin) {
            $menuItems[] = ['label' => 'Adminpanel', 'url' => ['/site/adminpanel']];
            $menuItems[] = ['label' => 'Userpanel', 'url' => ['/site/userpanel']];
            $menuItems[] = ['label' => 'Ingredients list', 'url' => ['/ingredient/index']];
            $menuItems[] = ['label' => 'Dishes list', 'url' => ['/dish/index']];
        }
        else {
            $menuItems[] = ['label' => 'Home', 'url' => ['/site/index']];
        }
        $menuItems[] = [
            'label' => 'Logout (' . Yii::$app->user->identity->username . ')',
            'url' => ['/site/logout'],
            'linkOptions' => ['data-method' => 'post']
        ];
    }

    $homelink = [
        //'label'     =>  Yii::t('yii', 'Home'),
        'url'       =>  ['/site/index'],
        'class'     =>  'home',
        //'template'  =>  '<span class="glyphicon glyphicon-home"></span>{link}'.PHP_EOL,
    ];
    if (!Yii::$app->user->isGuest) {
        if (Yii::$app->user->identity->isAdmin)
            $homelink['label'] = Yii::t('yii', 'Adminpanel');
        else
            $homelink['label'] = Yii::t('yii', 'Home');
    }
    else
        $homelink['label'] = Yii::t('yii', 'Home');

    NavBar::begin([
        'brandLabel' => 'Cool gastronomY',
        'brandUrl' => Yii::$app->homeUrl,
        'options' => [
            'class' => 'navbar-inverse navbar-fixed-top',
        ],
    ]);
    echo Nav::widget([
        'options' => ['class' => 'navbar-nav navbar-right'],
        'items' => $menuItems,
    ]);
    NavBar::end();
    ?>

    <div class="container">
        <?= Breadcrumbs::widget([
            'homeLink'      =>  $homelink,
            'links' => isset($this->params['breadcrumbs']) ? $this->params['breadcrumbs'] : [],
        ]) ?>
        <?= $content ?>
    </div>
</div>

<footer class="footer">
    <div class="container">
        <p class="pull-left">&copy; Cool gastronomY <?= date('Y') ?></p>

        <p class="pull-right"><?= Yii::powered() ?></p>
    </div>
</footer>

<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>
