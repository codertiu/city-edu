<?php

namespace backend\models;

use Yii;
use yii\db\Expression;
use yii\db\ActiveRecord;
use yii\behaviors\TimestampBehavior;
use yii\web\User;

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
class StudentsPay extends ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'students_pay';
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
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['pay_date', 'contract_id', 'students_id', 'sum', 'for_month','type_pay_id','currency_id'], 'required'],
            [['pay_date','create_date','update_date'], 'safe'],
            [['contract_id', 'students_id', 'for_month','type_pay_id','currency_id','user_id'], 'integer'],
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
            'user_id'=>Yii::t('main','User ID'),
            'type_pay_id'=>Yii::t('main','Type Pay Id'),
            'currency_id'=>Yii::t('main','Currency Id'),
            'create_date'=>Yii::t('main','create_date'),
            'update_date'=>Yii::t('main','update_date')
        ];
    }

    public function getStudents(){
        return $this->hasOne(Students::className(),['id'=>'students_id']);
    }
    public function getContract(){
        return $this->hasOne(Contract::className(),['id'=>'contract_id']);
    }

    public function getUser(){
        return $this->hasOne(User::className(),['id'=>'user_id']);
    }
}
