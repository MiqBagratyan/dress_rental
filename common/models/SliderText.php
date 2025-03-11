<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "slider_text".
 *
 * @property int $id
 * @property int $slider_id
 * @property string $language
 * @property string $name
 * @property string|null $description
 *
 * @property Slider $slider
 */
class SliderText extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'slider_text';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['slider_id', 'language', 'name'], 'required'],
            [['slider_id'], 'integer'],
            [['language'], 'string', 'max' => 10],
            [['name', 'description'], 'string', 'max' => 255],
            [['slider_id'], 'exist', 'skipOnError' => true, 'targetClass' => Slider::class, 'targetAttribute' => ['slider_id' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'slider_id' => 'Slider ID',
            'language' => 'Language',
            'name' => 'Name',
            'description' => 'Description',
        ];
    }

    /**
     * Gets query for [[Slider]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getSlider()
    {
        return $this->hasOne(Slider::class, ['id' => 'slider_id']);
    }
}
