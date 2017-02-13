<?php

namespace backend\modules\settings\models;

use Yii;

/**
 * This is the model class for table "producttype".
 *
 * @property integer $id
 * @property integer $product_type_name
 * @property integer $parents
 */
class ProductType extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'producttype';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['product_type_name'], 'required'],
            [['product_type_name', 'parents'], 'integer'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'product_type_name' => 'Product Type Name',
            'parents' => 'Parents',
        ];
    }
}
