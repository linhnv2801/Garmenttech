<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel backend\modules\producttypes\models\ProducttypeSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Producttypes';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="producttype-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Producttype', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'product_type_name:ntext',
            'parents',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
