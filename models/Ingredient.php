<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "{{%ingredient}}".
 *
 * @property integer $id
 * @property string $name
 * @property integer $is_hidden
 *
 * @property Dishingredientlink[] $dishingredientlinks
 */
class Ingredient extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%ingredient}}';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['name', 'is_hidden'], 'required'],
            [['name'], 'string'],
            [['is_hidden'], 'boolean'],
            //['is_hidden', 'default', 'value' => 0],
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
            'is_hidden' => 'Is Hidden',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getDishingredientlinks()
    {
        return $this->hasMany(Dishingredientlink::className(), ['ingredient_id' => 'id']);
    }
}
