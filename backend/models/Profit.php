<?php

namespace backend\models;


use Yii;
use yii\db\Expression;
use yii\db\ActiveRecord;
use yii\behaviors\TimestampBehavior;
/**
 * This is the model class for table "profit".
 *
 * @property int $id
 * @property string $date
 * @property int $students_id
 * @property int $profit_category_id
 * @property string $sum
 * @property int $type_pay_id
 * @property string $comment
 * @property string $create_date
 * @property string $update_date
 */
class Profit extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'profit';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['date', 'students_id', 'profit_category_id', 'sum', 'type_pay_id', 'comment'], 'required'],
            [['date', 'create_date', 'update_date'], 'safe'],
            [['students_id', 'profit_category_id', 'type_pay_id'], 'integer'],
            [['sum'], 'number'],
            [['comment'], 'string', 'max' => 255],
        ];
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
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('main', 'ID'),
            'date' => Yii::t('main', 'Date'),
            'students_id' => Yii::t('main', 'Students ID'),
            'profit_category_id' => Yii::t('main', 'Profit Category ID'),
            'sum' => Yii::t('main', 'Sum'),
            'type_pay_id' => Yii::t('main', 'Type Pay ID'),
            'comment' => Yii::t('main', 'Comment'),
            'create_date' => Yii::t('main', 'Create Date'),
            'update_date' => Yii::t('main', 'Update Date'),
        ];
    }
}
