<?php

namespace backend\models;

use Yii;
use yii\behaviors\TimestampBehavior;
use yii\db\Expression;
use yii\db\ActiveRecord;
/**
 * This is the model class for table "group_tech".
 *
 * @property int $id
 * @property int $teacher_id
 * @property int $type_of_studay
 * @property int $status
 * @property string $create_date
 * @property string $update_date
 */
class GroupTech extends ActiveRecord
{
    /**
     * {@inheritdoc}
     */

    public static function tableName()
    {
        return 'group_tech';
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
            [['teacher_id', 'type_of_studay', 'status'], 'required'],
            [['teacher_id', 'type_of_studay', 'status','group_id'], 'integer'],
            [['create_date', 'update_date'], 'safe'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('main', 'ID'),
            'teacher_id' => Yii::t('main', 'Teacher ID'),
            'type_of_studay' => Yii::t('main', 'Type Of Studay'),
            'status' => Yii::t('main', 'Status'),
            'group_id'=>Yii::t('main','Group ID'),
            'create_date' => Yii::t('main', 'Create Date'),
            'update_date' => Yii::t('main', 'Update Date'),
        ];
    }

    public function getMembers(){
        return $this->hasOne(Members::className(),['id'=>'teacher_id']);
    }
}
