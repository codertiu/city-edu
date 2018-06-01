<?php

namespace backend\models;

use Yii;
use yii\db\Expression;
use yii\db\ActiveRecord;
use yii\behaviors\TimestampBehavior;
/**
 * This is the model class for table "schedule".
 *
 * @property int $id
 * @property int $group_id
 * @property int $day_id
 * @property int $teacher_id
 * @property string $begin_time
 * @property string $end_time
 * @property int $room_id
 * @property int $active
 * @property string $create_date
 * @property string $update_date
 * @property int $since_id
 * @property int $type_of_study
 */
class Schedule extends ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'schedule';
    }

    public function behaviors()
    {
        return [
            'timestamp' => [
                'class' => TimestampBehavior::className(),
                'attributes' => [
                    ActiveRecord::EVENT_BEFORE_INSERT => ['create_date', 'update_date'],
                    ActiveRecord::EVENT_BEFORE_UPDATE => ['update_date'],
                ],
                'value' => date('Y-m-d H:i:s'),
            ],
        ];
    }
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['group_id', 'day_id', 'teacher_id', 'begin_time', 'end_time', 'room_id',  'since_id', 'type_of_study'], 'required'],
            [['group_id', 'day_id', 'teacher_id', 'room_id', 'active', 'since_id', 'type_of_study'], 'integer'],
            [['begin_time', 'end_time', 'create_date', 'update_date'], 'safe'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('main', 'ID'),
            'group_id' => Yii::t('main', 'Group ID'),
            'day_id' => Yii::t('main', 'Day ID'),
            'teacher_id' => Yii::t('main', 'Teacher ID'),
            'begin_time' => Yii::t('main', 'Begin Time'),
            'end_time' => Yii::t('main', 'End Time'),
            'room_id' => Yii::t('main', 'Room ID'),
            'active' => Yii::t('main', 'Active'),
            'create_date' => Yii::t('main', 'Create Date'),
            'update_date' => Yii::t('main', 'Update Date'),
            'since_id' => Yii::t('main', 'Since ID'),
            'type_of_study' => Yii::t('main', 'Type Of Study'),
        ];
    }
}
