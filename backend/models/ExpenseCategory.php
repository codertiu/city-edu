<?php

namespace backend\models;

use Yii;
use yii\db\Expression;
use yii\db\ActiveRecord;
use yii\behaviors\TimestampBehavior;

/**
 * This is the model class for table "expense_category".
 *
 * @property int $id
 * @property string $title
 * @property int $status
 * @property string $create_date
 * @property string $update_date
 */
class ExpenseCategory extends ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'expense_category';
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
            [['title', 'status'], 'required'],
            [['status'], 'integer'],
            [['create_date', 'update_date'], 'safe'],
            [['title'], 'string', 'max' => 255],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('main', 'ID'),
            'title' => Yii::t('main', 'Title'),
            'status' => Yii::t('main', 'Status'),
            'create_date' => Yii::t('main', 'Create Date'),
            'update_date' => Yii::t('main', 'Update Date'),
        ];
    }
}
