<?php

namespace common\models;

use common\components\filekit\src\behaviors\UploadBehavior;
use omgdef\multilingual\MultilingualBehavior;
use Yii;
use yii\behaviors\TimestampBehavior;
use yii\db\ActiveRecord;

/**
 * This is the model class for table "favourites".
 *
 * @property int $id
 * @property string $name
 * @property string|null $style
 * @property int|null $price
 * @property string|null $image
 * @property int|null $status
 * @property int|null $order
 * @property int $created_at
 * @property int $updated_at
 *
 * @property FavouritesText[] $favouritesTexts
 */
class Favourites extends \yii\db\ActiveRecord
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
        return 'favourites';
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
                'defaultLanguage' => 'ru',
                'langForeignKey' => 'favourite_id',
                'tableName' => '{{%favourites_text}}',
                'attributes' => ['name','style'],
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
            [['price', 'status', 'order', 'created_at', 'updated_at'], 'integer'],
            [['name', 'style', 'image'], 'string', 'max' => 255],
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
            'style' => 'Style',
            'price' => 'Price',
            'image' => 'Image',
            'status' => 'Status',
            'order' => 'Order',
            'created_at' => 'Created At',
            'updated_at' => 'Updated At',
        ];
    }

    /**
     * Gets query for [[FavouritesTexts]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getFavouritesTexts()
    {
        return $this->hasMany(FavouritesText::class, ['favourite_id' => 'id']);
    }

    public static function statuses()
    {
        return [
            self::STATUS_ACTIVE => 'Активный',
            self::STATUS_INACTIVE =>'Неактивный',
        ];
    }
}
