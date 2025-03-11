<?php

use yii\helpers\Html;
use yii\grid\GridView;
use common\models\WorkProcedure;

/* @var $this yii\web\View */
/* @var $searchModel backend\modules\work_procedure\models\search\WorkProcedureSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Рабочие процедуры';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="work-procedure-index">
    <div class="card">

        <?php // echo $this->render('_search', ['model' => $searchModel]); ?>
        <div class="card-header">
            <?php echo Html::a('Создать рабочую процедуру', ['create'], ['class' => 'btn btn-success']) ?>
        </div>
        <div class="card-body">
            <?php echo GridView::widget([
                'dataProvider' => $dataProvider,
                'filterModel' => $searchModel,
                'columns' => [
                    ['class' => 'yii\grid\SerialColumn'],

                    'id',
                    'title',
                    'name',
                    'description',
                    [
                        'value' => function ($data) {
                            $s = WorkProcedure::statuses();
                            return $s[$data->status] ?? null;
                        },
                        'attribute' => 'status',
                        'filter' => WorkProcedure::statuses(),
                    ],
                    // 'created_at',
                    // 'updated_at',

                    ['class' => 'common\components\gridView\ActionColumn'],
                ],
            ]); ?>

        </div>
    </div>
</div>
