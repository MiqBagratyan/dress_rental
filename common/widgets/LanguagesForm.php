<?php

namespace common\widgets;

use Yii;

class LanguagesForm extends \yii\bootstrap5\Widget
{
    public $model;
    public $form;


    /**
     * {@inheritdoc}
     */
    public function run()
    {
        $behaviors = $this->model->getBehavior('ml');
        return $this->render('languages_form/_form', [
            'model' => $this->model,
            'form' => $this->form,
            'languages' => Yii::$app->params['languagesLabel'],
            'attributes' => $behaviors->attributes,
            'defaultLanguage' => $behaviors->defaultLanguage,
        ]);
    }
}
