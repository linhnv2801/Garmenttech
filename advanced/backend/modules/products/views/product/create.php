<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model backend\modules\products\models\Product */

$this->title = 'Tạo mới sản phẩm';
$this->params['breadcrumbs'][] = ['label' => 'Products', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="product-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
        'imageModel' => $imageModel,
        'producttypeModel' => $producttypeModel,
        'items' => $items,
    ]) ?>

</div>
