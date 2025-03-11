<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "counter_text".
 *
 * @property int $id
 * @property int $counter_id
 * @property string $language
 * @property string|null $users
 * @property string|null $period
 *
 * @property Counter $counter
 */
class CounterText extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'counter_text';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['counter_id', 'language'], 'required'],
            [['counter_id'], 'integer'],
            [['language'], 'string', 'max' => 10],
            [['users', 'period'], 'string', 'max' => 255],
            [['counter_id'], 'exist', 'skipOnError' => true, 'targetClass' => Counter::class, 'targetAttribute' => ['counter_id' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'counter_id' => 'Counter ID',
            'language' => 'Language',
            'users' => 'Users',
            'period' => 'Period',
        ];
    }

    /**
     * Gets query for [[Counter]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getCounter()
    {
        return $this->hasOne(Counter::class, ['id' => 'counter_id']);
    }
}
