<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "sub_students".
 *
 * @property int $id
 * @property int $students_id
 * @property string $begin_date
 * @property string $end_date
 * @property int $group_id
 * @property int $sub_std_status_id
 */

//student_id contract dagi id ga o'zgartiridim
class SubStudents extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'sub_students';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['students_id', 'begin_date', 'group_id'], 'required'],
            [['students_id', 'group_id'], 'integer'],
            [['begin_date', 'end_date'], 'safe'],
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
            'begin_date' => Yii::t('main', 'Begin Date'),
            'end_date' => Yii::t('main', 'End Date'),
            'group_id' => Yii::t('main', 'Group ID'),
        ];
    }
    // student_id contract id ga o'zgartiridim
    // shunda bitta contract orqali boshqarish imkonini beradi
    // student istalganicha guruhga kira oladi
    public function getContract(){
        return $this->hasOne(Contract::className(),['id'=>'students_id']);

    }
    public function getGroup(){
        return $this->hasOne(Group::className(),['id'=>'group_id']);
    }
}
