<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\modules\settings\models\ProductType */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="product-type-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'product_type_name')->textInput() ?>

    <?= $form->field($model, 'parents')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
