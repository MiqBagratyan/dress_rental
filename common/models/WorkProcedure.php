<?php

namespace common\models;

use common\components\filekit\src\behaviors\UploadBehavior;
use omgdef\multilingual\MultilingualBehavior;
use Yii;
use yii\behaviors\TimestampBehavior;
use yii\db\ActiveRecord;

/**
 * This is the model class for table "work_procedure".
 *
 * @property int $id
 * @property string|null $title
 * @property string|null $name
 * @property string|null $description
 * @property string|null $image
 * @property int|null $status
 * @property int|null $order
 * @property int|null $created_at
 * @property int|null $updated_at
 *
 * @property WorkProcedureText[] $workProcedureTexts
 */
class WorkProcedure extends \yii\db\ActiveRecord
{
    const STATUS_ACTIVE = 0;
    const STATUS_INACTIVE = 1;
    const IMAGE_TYPE = 'png|jpg|jpeg|webm|webp';

    public $_image;
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'work_procedure';
    }

    public function behaviors()
    {
        $languages = Yii::$app->params['languagesLabel'] ?? [];
        if (!is_array($languages) || empty($languages)) {
            throw new \yii\base\InvalidConfigException('Не указан массив языков в Yii::$app->params[\'languagesLabel\']');
        }

        return [
            'timestamp' => [
                'class' => TimestampBehavior::className(),
                'attributes' => [
                    ActiveRecord::EVENT_BEFORE_INSERT => ['created_at', 'updated_at'],
                    ActiveRecord::EVENT_BEFORE_UPDATE => ['updated_at'],
                ],
            ],
            [
                'class' => UploadBehavior::class,
                'attribute' => '_image',
                'pathAttribute' => 'image'
            ],
            'ml' => [
                'class' => MultilingualBehavior::class,
                'languages' => $languages,
                'defaultLanguage' => Yii::$app->params['defaultLanguage'] ?? 'ru',
                'langForeignKey' => 'work_procedure_id',
                'tableName' => '{{%work_procedure_text}}',
                'attributes' => ['name','title', 'description'],
            ],
        ];
    }
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['status', 'order', 'created_at', 'updated_at'], 'integer'],
            [['title', 'name', 'description', 'image'], 'string', 'max' => 255],
            [['_image'], 'safe'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'title' => 'Title',
            'name' => 'Name',
            'description' => 'Description',
            'image' => 'Image',
            'status' => 'Status',
            'order' => 'Order',
            'created_at' => 'Created At',
            'updated_at' => 'Updated At',
        ];
    }

    /**
     * Gets query for [[WorkProcedureTexts]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getWorkProcedureTexts()
    {
        return $this->hasMany(WorkProcedureText::class, ['work_procedure_id' => 'id']);
    }

    public static function statuses()
    {
        return [
            self::STATUS_ACTIVE => 'Активный',
            self::STATUS_INACTIVE =>'Неактивный',
        ];
    }
}
