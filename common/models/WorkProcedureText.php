<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "work_procedure_text".
 *
 * @property int $id
 * @property int $work_procedure_id
 * @property string $language
 * @property string|null $title
 * @property string|null $name
 * @property string|null $description
 *
 * @property WorkProcedure $workProcedure
 */
class WorkProcedureText extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'work_procedure_text';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['work_procedure_id', 'language'], 'required'],
            [['work_procedure_id'], 'integer'],
            [['language'], 'string', 'max' => 10],
            [['title', 'name', 'description'], 'string', 'max' => 255],
            [['work_procedure_id'], 'exist', 'skipOnError' => true, 'targetClass' => WorkProcedure::class, 'targetAttribute' => ['work_procedure_id' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'work_procedure_id' => 'Work Procedure ID',
            'language' => 'Language',
            'title' => 'Title',
            'name' => 'Name',
            'description' => 'Description',
        ];
    }

    /**
     * Gets query for [[WorkProcedure]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getWorkProcedure()
    {
        return $this->hasOne(WorkProcedure::class, ['id' => 'work_procedure_id']);
    }
}
