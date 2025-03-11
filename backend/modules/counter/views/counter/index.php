<?php

use yii\helpers\Html;
use yii\grid\GridView;
use common\models\Counter;

/* @var $this yii\web\View */
/* @var $searchModel backend\modules\counter\models\search\CounterSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Посещения';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="counter-index">
    <div class="card">

        <?php // echo $this->render('_search', ['model' => $searchModel]); ?>
        <div class="card-header">
            <?php echo Html::a('Создание посещений', ['create'], ['class' => 'btn btn-success']) ?>
        </div>
        <div class="card-body">
            <?php echo GridView::widget([
                'dataProvider' => $dataProvider,
                'filterModel' => $searchModel,
                'columns' => [
                    ['class' => 'yii\grid\SerialColumn'],

                    'id',
                    'users',
                    'period',
                    'count',
                    [
                        'value' => function ($data) {
                            $s = Counter::statuses();
                            return $s[$data->status] ?? null;
                        },
                        'attribute' => 'status',
                        'filter' => Counter::statuses(),
                    ],
//                    'created_at',
                    // 'updated_at',

                    ['class' => 'common\components\gridView\ActionColumn'],
                ],
            ]); ?>

        </div>
    </div>
</div>
