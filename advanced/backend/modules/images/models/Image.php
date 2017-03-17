<?php

namespace backend\modules\images\models;

use Yii;

/**
 * This is the model class for table "image".
 *
 * @property integer $id
 * @property string $name
 * @property string $base_url
 */
class Image extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'image';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['base_url','productId'], 'required'],
            [['name', 'base_url'], 'string'],
            [['base_url'], 'file', 'skipOnEmpty' => false, 'extensions' => 'png, jpg, jpeg', 'maxFiles' => 10],
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
            'base_url' => 'Base Url',
            'productId' => 'Mã sản phẩm',
        ];
    }
    
    public function upload(){
        if($this->validate() && $this->save(false)){
            $this->base_url->saveAs('uploads/' . $this->base_url->baseName . '.' . $this->base_url->extension);
            return true;
        }
        return false;
    }
    
    public function getId()
    {
        return $this->getPrimaryKey();
    }
}
