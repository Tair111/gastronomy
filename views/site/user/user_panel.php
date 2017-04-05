<?php

/* @var $this yii\web\View */
/* @var $ingredientsDataProvider yii\data\ActiveDataProvider */

use yii\grid\GridView;
use yii\helpers\Html;
use yii\web\View;

$this->title = 'Select ingredients';

$this->registerJs(
    "
    const MAX_CHECK = 5;
    const NEED_CHECK = 2;
    leftcheck = MAX_CHECK;
    ",
    View::POS_END
);

$this->registerJs(
    "
    function onClick_GetDishes() {
        if (MAX_CHECK - leftcheck < NEED_CHECK) {
            alert(\"Select more ingredients\");
            return false;
        }
        return true;
    }; 
    ",
    View::POS_END
);

$this->registerJs(
    "
    $(\"input:checkbox\").each(function(){
        $(this).prop('checked', false);
    });
    leftcheck = MAX_CHECK;
            
    $(':checkbox').change(function() {
        if ($(this).attr('name') == 'selection_all') {
            $(\"input:checkbox\").each(function(){
                $(this).prop('checked', false);
            });
            leftcheck = MAX_CHECK;
        }
        else {
            if ($(this).is(\":checked\")) {
                if (leftcheck > 0) {
                    leftcheck--;
                }
                else {
                    $(this).prop('checked', false);
                }
            }
            else
            {
                leftcheck++;
            }
        }
        if (leftcheck > 0 && leftcheck < MAX_CHECK - NEED_CHECK + 1)
            $('#leftcheck_label').text('Please select ' + leftcheck + ' ingredients or push button');
        else if (leftcheck > 0)
            $('#leftcheck_label').text('Please select ' + leftcheck + ' ingredients');
        else
            $('#leftcheck_label').text('Please push button!');
    }); 
    ",
    View::POS_READY
);


?>


<div class="dish-index">

    <h1 id="leftcheck_label">Please select 5 ingredients</h1>

    <?=Html::beginForm(['dishoffer'],'post');?>
    <?=Html::submitButton('Get dishes', ['class' => 'btn btn-info', 'onClick'=>'return onClick_GetDishes();']);?>
    <?=GridView::widget([
        'dataProvider' => $ingredientsDataProvider,

//        'rowOptions' => function ($model, $key, $index, $grid) {
//            return ['display'=>'none'];
//        },

        'columns' => [
            ['class' => 'yii\grid\CheckboxColumn'],
            'id',
            'name:ntext',
        ],
    ]); ?>
    <?= Html::endForm();?>

</div>
