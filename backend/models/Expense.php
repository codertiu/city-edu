<?php

namespace backend\models;

use Yii;
use yii\db\Expression;
use yii\db\ActiveRecord;
use yii\behaviors\TimestampBehavior;
/**
 * This is the model class for table "expense".
 *
 * @property int $id
 * @property string $speciality
 * @property string $sum
 * @property string $date
 * @property string $comment
 * @property int $currency_id
 * @property int $type_pay_id
 * @property int $expense_category_id
 * @property string $create_date
 * @property string $update_date
 */
class Expense extends ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'expense';
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
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['speciality', 'sum', 'date', 'type_pay_id', 'expense_category_id'], 'required'],
            [['sum'], 'number'],
            [['date', 'create_date', 'update_date'], 'safe'],
            [['type_pay_id', 'expense_category_id'], 'integer'],
            [['comment'],'string'],
            [['speciality'], 'string', 'max' => 255],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('main', 'ID'),
            'speciality' => Yii::t('main', 'Speciality'),
            'sum' => Yii::t('main', 'Sum'),
            'date' => Yii::t('main', 'Date'),
            'comment' => Yii::t('main', 'Comment'),
            'type_pay_id' => Yii::t('main', 'Type Pay ID'),
            'expense_category_id' => Yii::t('main', 'Expense Category ID'),
            'create_date' => Yii::t('main', 'Create Date'),
            'update_date' => Yii::t('main', 'Update Date'),
        ];
    }
    public function getExCategory(){
        return $this->hasOne(ExpenseCategory::className(),['id'=>'expense_category_id']);
    }
}
