<?php

use yii\helpers\Html;
use yii\grid\GridView;

yii\web\JqueryAsset::register($this);

/* @var $this yii\web\View */
/* @var $searchModel backend\modules\images\models\ImageSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Images';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="image-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?php
//    Html::a('Xoá ảnh', ['deleterows'], ['class' => 'btn btn-danger', 
//            'data' => [
//                'confirm' => 'Are you sure you want to delete this item?',
//                'method' => 'post',
//                ]
//            ]);
        ?>
        <button class="btn btn-danger" onclick="deleteRows()">Xoá ảnh </button>
    </p>
    <?=
    GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],
            'id',
            'name:ntext',
            'productId',
            [
                'attribute' => 'base_url',
                'format' => 'raw',
                'label' => 'Image',
                'value' => function ($dataProvider) {
                    return Html::img('uploads/' . $dataProvider['base_url'], ['width' => '100px', 'height' => '100px']);
                }],
                    [
                        'class' => 'yii\grid\CheckboxColumn',
//                'checkboxOptions' => ['onclick' => 'js:addItems(this.value, this.checked)']
                    ],
                ],
            ]);
            ?>
    <script>
        function deleteRows() {
            var keys = $('#w0').yiiGridView('getSelectedRows');
            console.log(keys);
            $.ajax({
                url: '?r=images/image/deleterows', // your controller action
                type: 'post',
                data: {keylist: keys},
                success: function (data) {
                    location.reload();
                    if(data === 'error') alert('Cannot delete image');
                    else alert("Deleted");
                }
            });
        }
        ;
// keys is an array consisting of the keys associated with the selected rows

    </script>
</div>
