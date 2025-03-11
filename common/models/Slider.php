<?php

namespace common\models;

use common\components\filekit\src\behaviors\UploadBehavior;
use omgdef\multilingual\MultilingualBehavior;
use Yii;
use yii\behaviors\TimestampBehavior;
use yii\db\ActiveRecord;

/**
 * This is the model class for table "slider".
 *
 * @property int $id
 * @property string $name
 * @property string|null $description
 * @property string|null $image
 * @property int|null $sale_price
 * @property int|null $status
 * @property int|null $order
 * @property int $created_at
 * @property int $updated_at
 *
 * @property SliderText[] $sliderTexts
 */
class Slider extends \yii\db\ActiveRecord
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
        return 'slider';
    }

    public function behaviors()
    {
        $languages = Yii::$app->params['languagesLabel'] ?? [];
        if (!is_array($languages) || empty($languages)) {
            throw new \yii\base\InvalidConfigException('Не указан массив языков в Yii::$app->params[\'languagesLabel\']');
        }

        return [
            'timestamp' => [
                'class' => TimestampBehavior::class,
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
                'langForeignKey' => 'slider_id',
                'tableName' => '{{%slider_text}}',
                'attributes' => ['name', 'description'],
            ],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['name'], 'required'],
            [['sale_price','order', 'status', 'created_at', 'updated_at'], 'integer'],
            [['name', 'description', 'image'], 'string', 'max' => 255],
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
            'name' => 'Name',
            'description' => 'Description',
            'image' => 'Image',
            'sale_price' => 'Sale Price',
            'status' => 'Status',
            'order' => 'Order',
            'created_at' => 'Created At',
            'updated_at' => 'Updated At',
        ];
    }

    /**
     * Gets query for [[SliderTexts]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getSliderTexts()
    {
        return $this->hasMany(SliderText::class, ['slider_id' => 'id']);
    }

    public static function statuses()
    {
        return [
            self::STATUS_ACTIVE => 'Активный',
            self::STATUS_INACTIVE =>'Неактивный',
        ];
    }
}
