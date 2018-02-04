<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "group".
 *
 * @property int $id
 * @property int $edu_center_id
 * @property string $name
 * @property int $member_id
 * @property string $begin_date
 * @property string $end_date
 * @property int $group_status_id
 * @property string $comment
 * @property int $since_id
 */
class Group extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'group';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['edu_center_id', 'name', 'member_id', 'begin_date', 'end_date', 'group_status_id', 'since_id'], 'required'],
            [['edu_center_id', 'member_id', 'group_status_id', 'since_id'], 'integer'],
            [['begin_date', 'end_date'], 'safe'],
            [['comment'], 'string'],
            [['name'], 'string', 'max' => 255],
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
            'name' => Yii::t('main', 'Name'),
            'member_id' => Yii::t('main', 'Member ID'),
            'begin_date' => Yii::t('main', 'Begin Date'),
            'end_date' => Yii::t('main', 'End Date'),
            'group_status_id' => Yii::t('main', 'Group Status ID'),
            'comment' => Yii::t('main', 'Comment'),
            'since_id' => Yii::t('main', 'Since ID'),
        ];
    }
}
