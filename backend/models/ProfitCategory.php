<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "profit_category".
 *
 * @property int $id
 * @property string $name
 * @property int $status
 */
class ProfitCategory extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'profit_category';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['name'], 'required'],
            [['status'], 'integer'],
            [['name'], 'string', 'max' => 150],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('main', 'ID'),
            'name' => Yii::t('main', 'Name'),
            'status' => Yii::t('main', 'Status'),
        ];
    }
}
