<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "student_message".
 *
 * @property int $id
 * @property int $student_id
 * @property string $content
 * @property int $type_message
 * @property string $create_date
 * @property int $status
 * @property string $answer
 */
class StudentMessage extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'student_message';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['student_id', 'content', 'type_message', 'status'], 'required'],
            [['student_id', 'type_message', 'status'], 'integer'],
            [['content', 'answer'], 'string'],
            [['create_date'], 'safe'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('main', 'ID'),
            'student_id' => Yii::t('main', 'Student ID'),
            'content' => Yii::t('main', 'Content'),
            'type_message' => Yii::t('main', 'Type Message'),
            'create_date' => Yii::t('main', 'Create Date'),
            'status' => Yii::t('main', 'Status'),
            'answer' => Yii::t('main', 'Answer'),
        ];
    }

    public function getStudent(){
        return $this->hasOne(Students::className(),['id'=>'student_id']);
    }
}
