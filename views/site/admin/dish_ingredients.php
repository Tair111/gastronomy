<?php

/* @var $this yii\web\View */
/* @var $ingredientsDataProvider yii\data\ActiveDataProvider */
/* @var $ingredients_for_dish app\models\Ingredient[]*/
/* @var $dish app\models\Dish*/

use app\assets\AppAsset;
use yii\grid\GridView;
use yii\helpers\Html;

$this->title = $dish->name.' ingredients';
$this->params['breadcrumbs'][] = ['label' => 'Dishes', 'url' => ['dish/index']];
$this->params['breadcrumbs'][] = $this->title;

?>

<div class="dish-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <?=Html::beginForm(['dish_submit_ingredients'],'post');?>
    <?=Html::hiddenInput('dish_id', $dish->id);?>
    <?=Html::submitButton('Save changes', ['class' => 'btn btn-info',]);?>
    <?=GridView::widget([
        'dataProvider' => $ingredientsDataProvider,
        'columns' => [
            [
                'class' => 'yii\grid\CheckboxColumn',
                'checkboxOptions' => function ($model, $key, $index, $column) use ($ingredients_for_dish){
                    return ['checked' => in_array($model->id, $ingredients_for_dish)];
                }
            ],
            'id',
            'name:ntext',
        ],
    ]); ?>
    <?= Html::endForm();?>

</div>
