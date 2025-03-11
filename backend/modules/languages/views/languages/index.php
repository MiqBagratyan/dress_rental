<?php

use yii\helpers\Html;
use yii\grid\GridView;
use common\models\Languages;

/* @var $this yii\web\View */
/* @var $searchModel backend\modules\languages\models\search\LanguagesSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Языки';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="languages-index">
    <div class="card">

        <?php // echo $this->render('_search', ['model' => $searchModel]); ?>
        <div class="card-header">
            <?php echo Html::a('Создать языки', ['create'], ['class' => 'btn btn-success']) ?>
        </div>
        <div class="card-body">
            <?php echo GridView::widget([
                'dataProvider' => $dataProvider,
                'filterModel' => $searchModel,
                'columns' => [
                    ['class' => 'yii\grid\SerialColumn'],

                    'id',
                    'code',
                    'name',
                    'flag',
                    [
                        'value' => function ($data) {
                            $s = Languages::statuses();
                            return $s[$data->status];
                        },
                        'attribute' => 'status',
                        'filter' => Languages::statuses(),
                    ],
                    'order',
                    ['class' => 'common\components\gridView\ActionColumn'],
                ],
            ]); ?>
        </div>
    </div>
</div>
