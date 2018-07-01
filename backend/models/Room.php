<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "room".
 *
 * @property int $id
 * @property int $edu_center_id
 * @property string $room
 */
class Room extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'room';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['edu_center_id', 'room'], 'required'],
            [['edu_center_id'], 'integer'],
            [['room'], 'string', 'max' => 255],
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
            'room' => Yii::t('main', 'Room'),
        ];
    }

    public function getEduCenter(){
        return $this->hasOne(EduCenter::className(),['id'=>'edu_center_id']);
    }
}
