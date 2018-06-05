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
            [['students_id', 'contract', 'sum', 'date','type_contract_id', 'type_edu_id','phone1'], 'required'],
            [['students_id', 'type_edu_id','type_contract_id'], 'integer'],
            [['sum'], 'number'],
            [['date'], 'safe'],
            [['contract','fio','from','address','work','bill','b','license','director'], 'string', 'max' => 150],
            [['pass_seria'],'string', 'max'=>2],
            [['pass_number'],'string','max'=>10],
            [['phone1','phone2','phone2'],'string','max'=>20],
            [['email','title','mfo'],'string', 'max'=>50],
            [['email'],'email'],
            [['inn'],'string','max'=>20],
            [['okohx'],'string','max'=>25],
            [['contract','inn','okohx'], 'unique'],
            [['contract'], 'unique','targetClass' => '\backend\models\Contract', 'message'=>Yii::t('main','Contract Already Exist'),'when' => function ($model, $attribute) {
                return $model->{$attribute} !== $model->getOldAttribute($attribute);
            },],
            [['inn'], 'unique','targetClass' => '\backend\models\Contract', 'message'=>Yii::t('main','INN Already Exist'),'when' => function ($model, $attribute) {
                return $model->{$attribute} !== $model->getOldAttribute($attribute);
            },],
            [['okohx'], 'unique','targetClass' => '\backend\models\Contract', 'message'=>Yii::t('main','Okohx Already Exist'),'when' => function ($model, $attribute) {
                return $model->{$attribute} !== $model->getOldAttribute($attribute);
            },],
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
            'type_contract_id'=>Yii::t('main','Type Contract Id'),
            'fio'=>Yii::t('main','FIO'),
            'pass_seria'=>Yii::t('main','pass_seria'),
            'pass_number'=>Yii::t('main','pass_number'),
            'from'=>Yii::t('main','from'),
            'address'=>Yii::t('main','address'),
            'work'=>Yii::t('main','work'),
            'phone1'=>Yii::t('main','phone1'),
            'phone2'=>Yii::t('main','phone2'),
            'phone3'=>Yii::t('main','phone3'),
            'email'=>Yii::t('main','email'),
            'title'=>Yii::t('main','title'),
            'bill'=>Yii::t('main','bill'),
            'b'=>Yii::t('main','b'),
            'inn'=>Yii::t('main','inn'),
            'okohx'=>Yii::t('main','okohx'),
            'mfo'=>Yii::t('main','mfo'),
            'license'=>Yii::t('main','license'),
            'director'=>Yii::t('main','director')
        ];
    }
}
