<?php

namespace backend\modules\products\models;

use Yii;

/**
 * This is the model class for table "product".
 *
 * @property integer $id
 * @property string $product_name
 * @property integer $product_type_id
 * @property integer $price
 * @property string $descritption
 * @property string $video_url
 * @property string $created_at
 */
class Product extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'product';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['product_name', 'product_type_id'], 'required'],
            [['product_name', 'descritption', 'video_url', 'image_urls'], 'string'],
            [['product_type_id', 'price'], 'integer'],
            [['created_at'], 'safe'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'product_name' => 'Tên sản phẩm',
            'product_type_id' => 'Phân loại sản phẩm',
            'price' => 'Giá',
            'descritption' => 'Mô tả sản phẩm',
            'image_urls' => 'Anh',
            'video_url' => 'Link quảng cáo sản phẩm',
            'created_at' => 'Created At',
        ];
    }
}
