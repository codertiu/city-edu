<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "contract".
 *
 * @property int $id
 * @property int $students_id
 * @property string $contract
 * @property string $sum
 * @property string $date
 * @property int $type_edu_id
 */
class Contract extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'contract';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['students_id', 'contract', 'sum', 'date', 'type_edu_id'], 'required'],
            [['students_id', 'type_edu_id'], 'integer'],
            [['sum'], 'number'],
            [['date'], 'safe'],
            [['contract'], 'string', 'max' => 150],
            [['contract'], 'unique'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('main', 'ID'),
            'students_id' => Yii::t('main', 'Students ID'),
            'contract' => Yii::t('main', 'Contract'),
            'sum' => Yii::t('main', 'Sum'),
            'date' => Yii::t('main', 'Date'),
            'type_edu_id' => Yii::t('main', 'Type Edu ID'),
        ];
    }
}
