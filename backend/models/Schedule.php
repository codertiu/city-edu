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
 * @property string $time
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
            [['edu_center_id', 'group_id', 'day_id', 'time', 'room_id'], 'required'],
            [['edu_center_id', 'group_id', 'day_id', 'room_id'], 'integer'],
            [['time'], 'string', 'max' => 255],
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
            'time' => Yii::t('main', 'Time'),
            'room_id' => Yii::t('main', 'Room ID'),
        ];
    }
}
