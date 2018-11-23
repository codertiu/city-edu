<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "h_sub_student".
 *
 * @property int $id
 * @property int $student_id student
 * @property string $date jarayon qachon bo'lgan
 * @property int $group_id guruh id qaysi guruhdan 
 * @property string $comment nima uchun o'tkazilyapti
 *
 * @property Group $group
 * @property Students $student
 */
class HSubStudent extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'h_sub_student';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['student_id', 'date', 'group_id', 'comment'], 'required'],
            [['student_id', 'group_id'], 'integer'],
            [['date'], 'safe'],
            [['comment'], 'string'],
            [['group_id'], 'exist', 'skipOnError' => true, 'targetClass' => Group::className(), 'targetAttribute' => ['group_id' => 'id']],
            [['student_id'], 'exist', 'skipOnError' => true, 'targetClass' => Students::className(), 'targetAttribute' => ['student_id' => 'id']],
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
            'date' => Yii::t('main', 'Date'),
            'group_id' => Yii::t('main', 'Group ID'),
            'comment' => Yii::t('main', 'Comment'),
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getGroup()
    {
        return $this->hasOne(Group::className(), ['id' => 'group_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getStudent()
    {
        return $this->hasOne(Students::className(), ['id' => 'student_id']);
    }
}
