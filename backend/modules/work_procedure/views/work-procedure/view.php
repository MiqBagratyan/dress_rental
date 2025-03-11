<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use common\models\WorkProcedure;

/* @var $this yii\web\View */
/* @var $model common\models\WorkProcedure */

$this->title = $model->title;
$this->params['breadcrumbs'][] = ['label' => 'Рабочие процедуры', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="work-procedure-view">

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
            'title',
            'name',
            'description',
            '_image',
            [
                'attribute' => 'status',
                'value' => function ($model) {
                    $statuses = WorkProcedure::statuses();
                    return $statuses[$model->status] ?? null;
                },
            ],
            'order',
            'created_at:datetime',
            'updated_at:datetime',
        ],
    ]) ?>

</div>
