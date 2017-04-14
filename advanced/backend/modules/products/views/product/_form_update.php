<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\modules\products\models\Product */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="product-update_form">

    <?php $form = ActiveForm::begin(['options' => ['enctype' => 'multipart/form-data']]); ?>

    <?= $form->field($model, 'product_name')->textarea(['rows' => 6]) ?>

    <?php // Html::activeDropDownList($producttypeModel, 'product_type_name', $items)?>
    <?php echo $form->field($model, 'product_type_id')->dropDownList($items, ['prompt' => 'Chọn hạng mục....']); ?>

    <?= $form->field($model, 'price')->textInput() ?>

    <?= $form->field($model, 'descritption')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'video_url')->textarea(['rows' => 6]) ?>

    <?= $form->field($imageModel, 'base_url[]')->fileInput(['multiple' => true, 'accept' => 'image/*']) ?>

    <div class="form-group">
        <?= Html::submitButton('Update', ['class' => 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
