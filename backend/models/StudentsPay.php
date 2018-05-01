<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "students_pay".
 *
 * @property int $id
 * @property string $pay_date
 * @property int $contract_id
 * @property int $students_id
 * @property string $sum
 * @property int $for_month
 */
class StudentsPay extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'students_pay';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['pay_date', 'contract_id', 'students_id', 'sum', 'for_month'], 'required'],
            [['pay_date'], 'safe'],
            [['contract_id', 'students_id', 'for_month'], 'integer'],
            [['sum'], 'number'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('main', 'ID'),
            'pay_date' => Yii::t('main', 'Pay Date'),
            'contract_id' => Yii::t('main', 'Contract ID'),
            'students_id' => Yii::t('main', 'Students ID'),
            'sum' => Yii::t('main', 'Sum'),
            'for_month' => Yii::t('main', 'For Month'),
        ];
    }
}
