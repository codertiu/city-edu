<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "students_leave".
 *
 * @property int $id
 * @property int $students_is
 * @property int $comment_id
 */
class StudentsLeave extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'students_leave';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['students_is', 'comment_id'], 'required'],
            [['students_is', 'comment_id'], 'integer'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('main', 'ID'),
            'students_is' => Yii::t('main', 'Students Is'),
            'comment_id' => Yii::t('main', 'Comment ID'),
        ];
    }
}
