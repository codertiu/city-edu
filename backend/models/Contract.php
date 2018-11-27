<?php

namespace backend\models;

use Yii;
use yii\behaviors\TimestampBehavior;
use yii\db\Expression;
use yii\db\ActiveRecord;

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
class Contract extends ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'contract';
    }

    public function behaviors()
    {
        return [
            [
                'class' => TimestampBehavior::className(),
                'attributes' => [
                    ActiveRecord::EVENT_BEFORE_INSERT => ['date'],
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
            [['students_id', 'contract', 'sum', 'type_contract_id', 'type_edu_id', 'phone1'], 'required'],
            [['students_id', 'type_edu_id', 'type_contract_id'], 'integer'],
            [['sum'], 'number'],
            [['date'], 'safe'],
            [['contract', 'fio', 'from', 'address', 'work', 'bill', 'b', 'license', 'director', 'phone1', 'phone2', 'phone2'], 'string', 'max' => 150],
            [['pass_seria'], 'string', 'max' => 2],
            [['pass_number'], 'string', 'max' => 10],
            [['email', 'title', 'mfo', 'bux', 'bring_date'], 'string', 'max' => 50],
            [['email'], 'email'],
            [['inn'], 'string', 'max' => 20],
            //[['inn'], 'default', 'value' => null],
            [['okohx'], 'string', 'max' => 25],
            //[['okohx'], 'default', 'value' => null],
            [['contract', 'inn', 'okohx'], 'unique'],
            [['contract'], 'unique', 'targetClass' => '\backend\models\Contract', 'message' => Yii::t('main', 'Contract Already Exist'), 'when' => function ($model, $attribute) {
                return $model->{$attribute} !== $model->getOldAttribute($attribute);
            },],
            [['inn'], 'unique', 'targetClass' => '\backend\models\Contract', 'message' => Yii::t('main', 'INN Already Exist'), 'when' => function ($model, $attribute) {
                return $model->{$attribute} !== $model->getOldAttribute($attribute);
            },],
            [['okohx'], 'unique', 'targetClass' => '\backend\models\Contract', 'message' => Yii::t('main', 'Okohx Already Exist'), 'when' => function ($model, $attribute) {
                return $model->{$attribute} !== $model->getOldAttribute($attribute);
            },],
            [['fio', 'pass_seria', 'pass_number', 'from', 'address', 'work', 'phone2', 'phone2', 'phone3', 'email', 'title', 'bill', 'b', 'inn', 'okohx', 'mfo', 'license', 'director', 'bux', 'bring_date'], 'default', 'value' => null],
            //[['fio', 'pass_seria', 'pass_number', 'from', 'address', 'work', 'phone2', 'phone2', 'phone3', 'email', 'title', 'bill', 'b', 'inn', 'okohx', 'mfo', 'license', 'director', 'bux', 'bring_date'], 'filter', 'filter' => 'trim', 'skipOnEmpty' => true],
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
            'type_contract_id' => Yii::t('main', 'Type Contract Id'),
            'fio' => Yii::t('main', 'FIO'),
            'pass_seria' => Yii::t('main', 'pass_seria'),
            'pass_number' => Yii::t('main', 'pass_number'),
            'from' => Yii::t('main', 'from'),
            'address' => Yii::t('main', 'address'),
            'work' => Yii::t('main', 'work'),
            'phone1' => Yii::t('main', 'phone1'),
            'phone2' => Yii::t('main', 'phone2'),
            'phone3' => Yii::t('main', 'phone3'),
            'email' => Yii::t('main', 'email'),
            'title' => Yii::t('main', 'title'),
            'bill' => Yii::t('main', 'bill'),
            'b' => Yii::t('main', 'b'),
            'inn' => Yii::t('main', 'inn'),
            'okohx' => Yii::t('main', 'okohx'),
            'mfo' => Yii::t('main', 'mfo'),
            'license' => Yii::t('main', 'license'),
            'director' => Yii::t('main', 'director'),
            'bring_date' => Yii::t('main', 'Bring Date'),
            'bux' => Yii::t('main', 'Bux')
        ];
    }

    public function getStudent(){
        return $this->hasOne(Students::className(),['id'=>'students_id']);
    }
}
