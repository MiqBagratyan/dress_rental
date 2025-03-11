<?php

namespace backend\modules\files\modules\file\controllers;

use backend\controllers\BaseController;
use backend\modules\files\modules\file\models\search\FileStorageItemSearch;
use common\actions\ConvertUploadAction;
use common\actions\ConvertUploadActionSubject;
use common\actions\ConvertUploadActionTemplate;
use common\actions\ConvertUploadBookPngAction;
use common\actions\ConvertUploadPngAction;
use common\components\filekit\src\actions\DeleteAction;
use common\components\filekit\src\actions\UploadAction;
use common\models\FileStorageItem;
use Yii;
use yii\filters\VerbFilter;
use yii\helpers\ArrayHelper;
use yii\web\NotFoundHttpException;

class StorageController extends BaseController
{

    /** @inheritdoc */
    public function behaviors()
    {
        return [
            'verbs' => [
                'class' => VerbFilter::class,
                'actions' => [
                    'delete' => ['post'],
                    'upload-delete' => ['delete'],
                ],
            ],
        ];
    }

    /** @inheritdoc */
    public function actions()
    {
        return [
            'upload' => [
                'class' => ConvertUploadAction::class,
                'deleteRoute' => 'upload-delete',
            ],
            'upload-template' => [
                'class' => ConvertUploadActionTemplate::class,
                'deleteRoute' => 'upload-delete',
            ],
            'upload-png' => [
                'class' => ConvertUploadPngAction::class,
                'deleteRoute' => 'upload-delete',
            ],
            'upload-book-png' => [
                'class' => ConvertUploadBookPngAction::class,
                'deleteRoute' => 'upload-delete',
            ],
            'upload-delete' => [
                'class' => DeleteAction::class,
            ],
            'upload-imperavi' => [
                'class' => UploadAction::class,
                'fileparam' => 'file',
                'responseUrlParam' => 'filelink',
                'multiple' => false,
                'disableCsrf' => true,
            ],
        ];
    }

    /**
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new FileStorageItemSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);
        $dataProvider->sort = [
            'defaultOrder' => ['created_at' => SORT_DESC],
        ];
        $components = ArrayHelper::map(
            FileStorageItem::find()->select('component')->distinct()->all(),
            'component',
            'component'
        );
        $totalSize = FileStorageItem::find()->sum('size') ?: 0;

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
            'components' => $components,
            'totalSize' => $totalSize,
        ]);
    }

    /**
     * @param integer $id
     *
     * @return mixed
     */
    public function actionView($id)
    {
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }

    /**
     * @param integer $id
     *
     * @return mixed
     */
    public function actionDelete($id)
    {
        $model = $this->findModel($id);
        if ($model !== null) {
            $model->softDelete();
        }
        return $this->redirect(['index']);
    }

    /**
     * @param integer $id
     *
     * @return FileStorageItem the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = FileStorageItem::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
