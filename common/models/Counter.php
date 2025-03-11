<?php

namespace common\models;

use omgdef\multilingual\MultilingualBehavior;
use Yii;
use yii\behaviors\TimestampBehavior;
use yii\db\ActiveRecord;

/**
 * This is the model class for table "counter".
 *
 * @property int $id
 * @property string|null $users
 * @property string|null $period
 * @property int|null $count
 * @property int|null $status
 * @property int|null $order
 * @property int $created_at
 * @property int $updated_at
 *
 * @property CounterText[] $counterTexts
 */
class Counter extends \yii\db\ActiveRecord
{
    const STATUS_ACTIVE = 0;
    const STATUS_INACTIVE = 1;

    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'counter';
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
            'ml' => [
                'class' => MultilingualBehavior::class,
                'languages' => $languages,
                'defaultLanguage' => 'ru',
                'langForeignKey' => 'counter_id',
                'tableName' => '{{%counter_text}}',
                'attributes' => ['users','period'],
            ],
        ];
    }
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['count', 'status', 'order', 'created_at', 'updated_at'], 'integer'],
            [['users', 'period'], 'string', 'max' => 255],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'users' => 'Users',
            'period' => 'Period',
            'count' => 'Count',
            'status' => 'Status',
            'order' => 'Order',
            'created_at' => 'Created At',
            'updated_at' => 'Updated At',
        ];
    }

    /**
     * Gets query for [[CounterTexts]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getCounterTexts()
    {
        return $this->hasMany(CounterText::class, ['counter_id' => 'id']);
    }

    public static function statuses()
    {
        return [
            self::STATUS_ACTIVE => 'Активный',
            self::STATUS_INACTIVE =>'Неактивный',
        ];
    }
}
