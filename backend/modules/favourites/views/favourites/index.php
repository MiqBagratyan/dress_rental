<?php

use yii\helpers\Html;
use yii\grid\GridView;
use common\models\Favourites;

/* @var $this yii\web\View */
/* @var $searchModel backend\modules\favourites\models\search\FavouritesSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Избранное';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="favourites-index">
    <div class="card">

        <?php // echo $this->render('_search', ['model' => $searchModel]); ?>
        <div class="card-header">
            <?php echo Html::a('Создать Избранное', ['create'], ['class' => 'btn btn-success']) ?>
        </div>
        <div class="card-body">
            <?php echo GridView::widget([
                'dataProvider' => $dataProvider,
                'filterModel' => $searchModel,
                'columns' => [
                    ['class' => 'yii\grid\SerialColumn'],

                    'id',
                    'name',
                    'style',
                    'price',
                    [
                        'value' => function ($data) {
                            $s = Favourites::statuses();
                            return $s[$data->status] ?? null;
                        },
                        'attribute' => 'status',
                        'filter' => Favourites::statuses(),
                    ],
                    // 'created_at',
                    // 'updated_at',

                    ['class' => 'common\components\gridView\ActionColumn'],
                ],
            ]); ?>

        </div>
    </div>
</div>
