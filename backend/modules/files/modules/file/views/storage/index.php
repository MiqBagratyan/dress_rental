<?php

use trntv\yii\datetime\DateTimeWidget;
use yii\grid\GridView;
use yii\web\JsExpression;
use yii\widgets\Pjax;

/**
 * @var $this         yii\web\View
 * @var $searchModel  \backend\modules\files\modules\file\models\search\FileStorageItemSearch
 * @var $dataProvider yii\data\ActiveDataProvider
 * @var $components   array
 * @var $totalSize    integer
 */

$this->title = Yii::t('backend', 'File Storage Items');

$this->params['breadcrumbs'][] = $this->title;

?>

<?php  echo $this->render('_search', ['model' => $searchModel]); ?>


<div>
    <div class="card">
        <div class="card-header">
            <div class="row text-right">
                <div class="pull-right">
                    <div class="col-xs-12">
                        <dl>
                            <dt>
                                <?php echo Yii::t('backend', 'Used size') ?>:
                            </dt>
                            <dd>
                                <?php echo Yii::$app->formatter->asSize($totalSize); ?>
                            </dd>
                        </dl>
                    </div>
                </div>
                <div class="pull-right">
                    <div class="row">
                        <div class="col-xs-12">
                            <dl>
                                <dt>
                                    <?php echo Yii::t('backend', 'Count') ?>:
                                </dt>
                                <dd>
                                    <?php echo $dataProvider->totalCount ?>
                                </dd>
                            </dl>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    <div class="card-body">

        <?php Pjax::begin(['id' => 'storage-grid']); ?>
        <?php echo GridView::widget([
            'dataProvider' => $dataProvider,
            'filterModel' => $searchModel,
            'options' => [
                'class' => 'grid-view table-responsive',
            ],
            'columns' => [
                ['class' => 'yii\grid\SerialColumn'],

                [
                    'attribute' => 'component',
                    'filter' => $components,
                ],
                'path',
                'type',
                'size:size',
                'name',
                'upload_ip',
                [
                    'attribute' => 'created_at',
                    'format' => 'datetime',
                    'filter' => \kartik\date\DatePicker::widget([
                        'model' => $searchModel,
                        'attribute' => 'created_at',
                        'language' => 'en',
                        'pluginOptions' => [
                            'format' => 'dd.mm.yyyy',
                            'autoclose' => true,
                            'todayHighlight' => true,
                        ],
                        'pluginEvents' => [
                            'changeDate' => new \yii\web\JsExpression('function(e) { $(e.target).find("input").trigger("change.yiiGridView"); }')
                        ],
                    ])
                ],
                [
                    'class' => 'common\components\gridView\ActionColumn',
                    'template' => '{view} {delete}',
                ],
            ],
        ]); ?>
        <?php Pjax::end(); ?>

    </div>
</div>
