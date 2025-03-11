<?php

namespace common\models;

use common\components\filekit\src\behaviors\UploadBehavior;
use omgdef\multilingual\MultilingualBehavior;
use Yii;
use yii\behaviors\TimestampBehavior;
use yii\db\ActiveRecord;

/**
 * This is the model class for table "languages".
 *
 * @property int $id
 * @property string $code
 * @property string $name
 * @property string|null $flag
 * @property int $status
 * @property int|null $order
 * @property int $created_at
 * @property int $updated_at
 */
class Languages extends \yii\db\ActiveRecord
{
    const STATUS_ACTIVE = 0;
    const STATUS_INACTIVE = 1;
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'languages';
    }

    public function behaviors()
    {
        return [
            'timestamp' => [
                'class' => TimestampBehavior::className(),
                'attributes' => [
                    ActiveRecord::EVENT_BEFORE_INSERT => ['created_at', 'updated_at'],
                    ActiveRecord::EVENT_BEFORE_UPDATE => ['updated_at'],
                ],
            ],
        ];
    }
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['code', 'name'], 'required'],
            [['order', 'status', 'created_at', 'updated_at'], 'integer'],
            [['code'], 'string', 'max' => 10],
            [['name', 'flag'], 'string', 'max' => 255],
            [['code'], 'unique'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'code' => 'Code',
            'name' => Yii::t('backend','Name'),
            'flag' => 'Flag',
            'status' => 'Status',
            'order' => 'Order',
            'created_at' => 'Created At',
            'updated_at' => 'Updated At',
        ];
    }

    public function getPathInfo()
    {
        $pathInfo = parent::getPathInfo();
        $languages = ['ru', 'en', 'hy'];

        foreach ($languages as $lang) {
            if (strpos($pathInfo, $lang . '/') === 0) {
                Yii::$app->language = $lang;
                return substr($pathInfo, strlen($lang) + 1);
            }
        }

        return $pathInfo;
    }
    public static function statuses()
    {
        return [
            self::STATUS_ACTIVE => 'Активный',
            self::STATUS_INACTIVE =>'Неактивный',
        ];
    }
}
