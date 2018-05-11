<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "students_info".
 *
 * @property int $id
 * @property int $students_id
 * @property int $language
 * @property int $lavel
 * @property string $time
 * @property int $study_type
 * @property int $comfortable_time
 * @property int $type_edu_id
 */
class StudentsInfo extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'students_info';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['students_id', 'language', 'lavel', 'time', 'study_type', 'comfortable_time', 'type_edu_id'], 'required'],
            [['students_id', 'language', 'lavel', 'study_type', 'comfortable_time', 'type_edu_id'], 'integer'],
            [['time'], 'string', 'max' => 100],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('main', 'ID'),
            'students_id' => Yii::t('main', 'Students ID'),
            'language' => Yii::t('main', 'Language'),
            'lavel' => Yii::t('main', 'Lavel'),
            'time' => Yii::t('main', 'Time'),
            'study_type' => Yii::t('main', 'Study Type'),
            'comfortable_time' => Yii::t('main', 'Comfortable Time'),
            'type_edu_id' => Yii::t('main', 'Type Edu ID'),
        ];
    }
    public function getTypeEduId(){
        return $this->hasOne(TypeEdu::className(),['id'=>'type_edu_id']);
    }

    public function getStudents(){
        return $this->hasOne(Students::className(),['id'=>'students_id']);
    }
}
