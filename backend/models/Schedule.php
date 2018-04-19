<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "schedule".
 *
 * @property int $id
 * @property int $edu_center_id
 * @property int $group_id
 * @property int $day_id
 * @property string $begin_time
 * @property string $end_time
 * @property int $room_id
 */
class Schedule extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'schedule';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['edu_center_id', 'group_id', 'day_id', 'begin_time', 'end_time', 'room_id'], 'required'],
            [['edu_center_id', 'group_id', 'day_id', 'room_id'], 'integer'],
            [['begin_time', 'end_time'], 'safe'],
            [['group_id'], 'exist', 'skipOnError' => true, 'targetClass' => Group::className(), 'targetAttribute' => ['group_id' => 'id']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('main', 'ID'),
            'edu_center_id' => Yii::t('main', 'Edu Center ID'),
            'group_id' => Yii::t('main', 'Group ID'),
            'day_id' => Yii::t('main', 'Day ID'),
            'begin_time' => Yii::t('main', 'Begin Time'),
            'end_time' => Yii::t('main', 'End Time'),
            'room_id' => Yii::t('main', 'Room ID'),
        ];
    }
    public function getEduCenter(){
        return $this->hasOne(EduCenter::className(),['id'=>'edu_center_id']);
    }
    public function getGroup(){
        return $this->hasOne(Group::className(),['id'=>'group_id']);
    }
    public function getDay(){
        return  Yii::$app->params['comfortable_time'][$this->day_id];
    }

    public function validatePara($attribute){
        if(self::find()
            ->where(['edu_center_id'=>$this->edu_center_id,
                    'day_id' => $this->day_id,
                    'room'=>$this->room,
                    'begin_time'=>$this->begin_time,
                    'end_time'=>$this->end_time
                ])
            ->exists()){
            $this->addError($attribute,'Ushbu para uchun avval dars belgilangan.');
        }
    }
}
