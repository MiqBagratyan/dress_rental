<?php

use yii\helpers\Html;
use yii\grid\GridView;
use common\models\Community;

/* @var $this yii\web\View */
/* @var $searchModel backend\modules\community\models\search\CommunitySearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Сообщества';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="community-index">
    <div class="card">

        <?php // echo $this->render('_search', ['model' => $searchModel]); ?>
        <div class="card-header">
            <?php echo Html::a('Создать сообщество', ['create'], ['class' => 'btn btn-success']) ?>
        </div>
        <div class="card-body">
            <?php echo GridView::widget([
                'dataProvider' => $dataProvider,
                'filterModel' => $searchModel,
                'columns' => [
                    ['class' => 'yii\grid\SerialColumn'],

                    'id',
                    'description:ntext',
                    [
                        'value' => function ($data) {
                            $s = Community::statuses();
                            return $s[$data->status] ?? null;
                        },
                        'attribute' => 'status',
                        'filter' => Community::statuses(),
                    ],
                    'created_at:datetime',
                    'updated_at:datetime',

                    ['class' => 'common\components\gridView\ActionColumn'],
                ],
            ]); ?>

        </div>
    </div>
</div>
