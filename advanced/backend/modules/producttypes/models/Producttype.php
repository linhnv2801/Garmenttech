<?php

namespace backend\modules\producttypes\models;

use Yii;
use yii\helpers;

/**
 * This is the model class for table "producttype".
 *
 * @property integer $id
 * @property string $product_type_name
 * @property integer $parents
 */
class Producttype extends \yii\db\ActiveRecord {

    /**
     * @inheritdoc
     */
    public static function tableName() {
        return 'producttype';
    }

    /**
     * @inheritdoc
     */
    public function rules() {
        return [
            [['product_type_name'], 'required'],
            [['product_type_name'], 'string'],
            [['parents'], 'integer'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels() {
        return [
            'id' => 'ID',
            'product_type_name' => 'Phân loại sản phẩm',
            'parents' => 'Danh mục chứa sản phẩm hiện tại',
        ];
    }

    public function getAllProducttypeName() {
//        $criteria = new ActiveQuery(Producttype);
//        $criteria->select = 'producttype.product_type_name';
//        $data = Producttype::model()->findAll($criteria);
//        var_dump($data);
//        $producttypeNames = Producttype::find()->select(['product_type_name']);
//        var_dump($producttypeNames);
    }

}
