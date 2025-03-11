<?php

use yii\helpers\Html;
use yii\grid\GridView;
use common\models\Slider;

/* @var $this yii\web\View */
/* @var $searchModel backend\modules\slider\models\search\SliderSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Слайдеры';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="slider-index">
    <div class="card">

        <?php // echo $this->render('_search', ['model' => $searchModel]); ?>
        <div class="card-header">
            <?php echo Html::a('Создать слайдеры', ['create'], ['class' => 'btn btn-success']) ?>
        </div>
        <div class="card-body">
            <?php echo GridView::widget([
                'dataProvider' => $dataProvider,
                'filterModel' => $searchModel,
                'columns' => [
                    ['class' => 'yii\grid\SerialColumn'],

                    'id',
                    'name',
                    'description',
                    'sale_price',
                    [
                        'value' => function ($data) {
                            $s = Slider::statuses();
                            return $s[$data->status] ?? null;
                        },
                        'attribute' => 'status',
                        'filter' => Slider::statuses(),
                    ],
                    // 'created_at',
                    // 'updated_at',

                    ['class' => 'common\components\gridView\ActionColumn'],
                ],
            ]); ?>

        </div>
    </div>
</div>
