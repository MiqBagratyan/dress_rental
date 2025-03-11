<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "community_text".
 *
 * @property int $id
 * @property int $community_id
 * @property string $language
 * @property string|null $description
 *
 * @property Community $community
 */
class CommunityText extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'community_text';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['community_id', 'language'], 'required'],
            [['community_id'], 'integer'],
            [['description'], 'string'],
            [['language'], 'string', 'max' => 10],
            [['community_id'], 'exist', 'skipOnError' => true, 'targetClass' => Community::class, 'targetAttribute' => ['community_id' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'community_id' => 'Community ID',
            'language' => 'Language',
            'description' => 'Description',
        ];
    }

    /**
     * Gets query for [[Community]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getCommunity()
    {
        return $this->hasOne(Community::class, ['id' => 'community_id']);
    }
}
