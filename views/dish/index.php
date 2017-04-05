<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\helpers\VarDumper;

/* @var $this yii\web\View */
/* @var $dataProvider yii\data\ActiveDataProvider */
/* @var $ingredients_for_dishes */
/* @var $ingredients_string */

if (!Yii::$app->user->isGuest)
    if (Yii::$app->user->identity->isAdmin)
        $this->title = 'Dishes';
    else
        $this->title = 'Dishes for you';
else
    $this->title = 'Dishes';

$this->params['breadcrumbs'][] = $this->title;

//print '<pre>'; VarDumper::dump($dataProvider); print '</pre>';

$columns = [];
$columns[] = ['class' => 'yii\grid\SerialColumn'];
$columns[] = 'id';
$columns[] = 'name:ntext';


if (!Yii::$app->user->isGuest) {
    if (Yii::$app->user->identity->isAdmin)
    {
        $columns[] = [
            'label' => 'Ingredients',
            'format' => 'raw',
            'value' => function($model) use ($ingredients_for_dishes){
                return $ingredients_for_dishes[$model->id] . Html::a(
                        'Setup ingredients',
                        ['site/dish_ingredients', 'dish_id' => $model->id],
                        [
                            'style'=>'float: right; text-align: right'
                            //'title' => 'descr',
                            //'target' => '_blank'
                        ]);
            }
        ];
        $columns[] = ['class' => 'yii\grid\ActionColumn'];
    }
    else
    {
        $columns[] = [
            'label' => 'Ingredients',
            'format' => 'raw',
            'value' => function($model) use ($ingredients_for_dishes){
                return $ingredients_for_dishes[$model->id];
            }
        ];
    }
}

?>

<div class="dish-index">

    <h1><?= Html::encode($this->title) ?></h1>
<?php
    if (isset($ingredients_string))
        echo '<h4>'.Html::encode('Selected ingredients: '.$ingredients_string).'</h4>'
?>
<?php if (!Yii::$app->user->isGuest && Yii::$app->user->identity->isAdmin) { ?>
    <p>
        <?= Html::a('Create Dish', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
<?php } ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'columns' => $columns,
    ]); ?>
</div>