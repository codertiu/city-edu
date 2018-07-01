<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "mark".
 *
 * @property int $id
 * @property string $date
 * @property int $mark_status
 * @property string $mark
 * @property int $member_id
 * @property int $students_id
 * @property string $comment
 */
class Mark extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'mark';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['date', 'mark_status', 'mark', 'member_id', 'students_id','mark_type','group_id'], 'required'],
            [['date'], 'safe'],
            [['mark_status', 'member_id', 'students_id','absent','mark_type'], 'integer'],
            [['mark'], 'number'],
            [['comment'], 'string', 'max' => 150],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('main', 'ID'),
            'date' => Yii::t('main', 'Date'),
            'mark_status' => Yii::t('main', 'Mark Status'),
            'mark' => Yii::t('main', 'Mark'),
            'member_id' => Yii::t('main', 'Member ID'),
            'students_id' => Yii::t('main', 'Students ID'),
            'comment' => Yii::t('main', 'Comment'),
            'absent'=>Yii::t('main', 'Absent'),
            'group_id'=>Yii::t('main','Group ID'),
            'mark_type'=>Yii::t('main', 'Mark Type'),
        ];
    }
}
