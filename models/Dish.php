<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "{{%dish}}".
 *
 * @property integer $id
 * @property string $name
 *
 * @property Dishingredientlink[] $dishingredientlinks
 */
class Dish extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%dish}}';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['name'], 'required'],
            [['name'], 'string'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'name' => 'Name',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getDishingredientlinks()
    {
        return $this->hasMany(Dishingredientlink::className(), ['dish_id' => 'id']);
    }

    /**
     * @return int[]
     */
    public function getIngredientsId()
    {
        $ingredients_id_for_dish = [];
        $links = Dishingredientlink::find()->where(['dish_id' => $this->id])->all();
        foreach ($links as $i => $lnk) {
            $ingredients_id_for_dish[] = $lnk->ingredient_id;
        }
        return $ingredients_id_for_dish;
    }

    /**
     * @return Ingredient[]|static[]
     */
    public function getIngredients()
    {
        $ingredients_for_dish = Ingredient::findAll($this->getIngredientsId());
        return $ingredients_for_dish;
    }


    public static function get_ingredients_string_for_dishes($dishes)
    {
        $ingredients_for_dishes = [];
        foreach ($dishes as $i => $dish) {
            $ingredients = $dish->getIngredients();

            $ingredients_for_dishes[$dish->id] = '';
            foreach ($ingredients as $j => $ingredient) {
                $ingredients_for_dishes[$dish->id] .= $ingredient->name . ', ';
            }
            $ingredients_for_dishes[$dish->id] = trim($ingredients_for_dishes[$dish->id], ', ');
        }

        return $ingredients_for_dishes;
    }

}
