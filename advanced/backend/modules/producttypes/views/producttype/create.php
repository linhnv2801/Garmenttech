<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\modules\producttypes\models\Producttype */

$this->title = 'Thêm loại';
$this->params['breadcrumbs'][] = ['label' => 'Phân loại sản phẩm', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="producttype-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?=
    $this->render('_form', [
        'model' => $model,
//        'subModel' => $subModel,
        'items' => $items,
    ])
    ?>

</div>
