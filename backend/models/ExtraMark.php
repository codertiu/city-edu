<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "extra_mark".
 *
 * @property int $id
 * @property int $member_id
 * @property int $student_id
 * @property string $date
 * @property int $mark
 */
class ExtraMark extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'extra_mark';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['member_id', 'student_id', 'date', 'mark'], 'required'],
            [['member_id', 'student_id', 'mark'], 'integer'],
            [['date'], 'safe'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('main', 'ID'),
            'member_id' => Yii::t('main', 'Member ID'),
            'student_id' => Yii::t('main', 'Student ID'),
            'date' => Yii::t('main', 'Date'),
            'mark' => Yii::t('main', 'Mark'),
        ];
    }

    public function getMember(){
        return $this->hasOne(Members::className(),['id'=>'member_id']);
    }
    public function getStudent(){
        return $this->hasOne(Students::className(),['id'=>'student_id']);
    }
}
