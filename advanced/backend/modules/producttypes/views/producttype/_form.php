<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\modules\producttypes\models\Producttype */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="producttype-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'product_type_name')->textarea(['rows' => 6]) ?>

    <?php echo $form->field($model, 'parents')->dropDownList($items, ['prompt' => 'Chọn hạng mục cha....']); ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
