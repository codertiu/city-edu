<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "h_group_tech".
 *
 * @property int $id
 * @property int $teacher_id
 * @property int $type_of_study
 * @property string $begin_date
 * @property string $end_date
 * @property int $group_id
 * @property int $user_id
 * @property string $comment
 */
class HGroupTech extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'h_group_tech';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['teacher_id', 'type_of_study', 'begin_date', 'end_date', 'group_id','comment'], 'required'],
            [['teacher_id', 'type_of_study', 'group_id', 'user_id'], 'integer'],
            [['begin_date', 'end_date'], 'safe'],
            [['comment'], 'string', 'max' => 256],
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
            'type_of_study' => Yii::t('main', 'Type Of Study'),
            'begin_date' => Yii::t('main', 'Begin Date'),
            'end_date' => Yii::t('main', 'End Date'),
            'group_id' => Yii::t('main', 'Group ID'),
            'user_id' => Yii::t('main', 'User ID'),
            'comment' => Yii::t('main', 'Comment'),
        ];
    }

    public function beforeSave($insert)
    {
        if (parent::beforeSave($insert)) {
            $this->user_id = Yii::$app->user->identity->id;
            return true;
        } else {
            return false;
        };
    }


    public function getMembers()
    {
        return $this->hasOne(Members::className(), ['id' => 'teacher_id']);
    }
}
