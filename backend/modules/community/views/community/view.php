<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use common\models\Community;

/* @var $this yii\web\View */
/* @var $model common\models\Community */

$this->title = $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Сообщества', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="community-view">

    <p>
        <?php echo Html::a('Обновить', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?php echo Html::a('Удалить', ['delete', 'id' => $model->id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?php echo DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
            'description:ntext',
            '_image',
            [
                'attribute' => 'status',
                'value' => function ($model) {
                    $statuses = Community::statuses();
                    return $statuses[$model->status] ?? null;
                },
            ],
            'order',
            'created_at:datetime',
            'updated_at:datetime',
        ],
    ]) ?>

</div>
