<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace common\models;
use yii\base\Model;
use yii\web\UploadedFile;

/**
 * This is image upload form
 *
 * @author Onion
 */
class UploadForm extends Model{
    public $base_url;
    public $name;
    
    public function rules() {
         return [
            [['base_url'], 'file', 'skipOnEmpty' => false, 'extensions' => 'png, jpg'],
        ];
    }
    
    public function upload(){
        if($this->validate()){
            $this->base_url->saveAs('backend/uploads/' . $this->base_url->baseName . '.' . $this->base_url->extension);
            $this->save();
            return true;
        }
        return false;
    }
}
