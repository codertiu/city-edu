<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "member_salary".
 *
 * @property int $id
 * @property int $member_id
 * @property string $aum
 * @property string $date
 * @property string $comment
 * @property string $create_date
 * @property string $update_date
 */
class MemberSalary extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'member_salary';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['member_id', 'aum', 'date', 'create_date', 'update_date'], 'required'],
            [['member_id'], 'integer'],
            [['aum'], 'number'],
            [['date', 'create_date', 'update_date'], 'safe'],
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
            'member_id' => Yii::t('main', 'Member ID'),
            'aum' => Yii::t('main', 'Aum'),
            'date' => Yii::t('main', 'Date'),
            'comment' => Yii::t('main', 'Comment'),
            'create_date' => Yii::t('main', 'Create Date'),
            'update_date' => Yii::t('main', 'Update Date'),
        ];
    }
}
