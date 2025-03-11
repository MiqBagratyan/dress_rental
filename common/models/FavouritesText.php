<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "favourites_text".
 *
 * @property int $id
 * @property int $favourite_id
 * @property string $language
 * @property string|null $name
 * @property string|null $style
 *
 * @property Favourites $favourite
 */
class FavouritesText extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'favourites_text';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['favourite_id', 'language'], 'required'],
            [['favourite_id'], 'integer'],
            [['language'], 'string', 'max' => 10],
            [['name', 'style'], 'string', 'max' => 255],
            [['favourite_id'], 'exist', 'skipOnError' => true, 'targetClass' => Favourites::class, 'targetAttribute' => ['favourite_id' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'favourite_id' => 'Favourite ID',
            'language' => 'Language',
            'name' => 'Name',
            'style' => 'Style',
        ];
    }

    /**
     * Gets query for [[Favourite]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getFavourite()
    {
        return $this->hasOne(Favourites::class, ['id' => 'favourite_id']);
    }
}
