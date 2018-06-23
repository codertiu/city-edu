<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "languages".
 *
 * @property integer $id
 * @property string $name
 * @property string $abb
 * @property integer $status
 */
class Languages extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'languages';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['name', 'abb'], 'required'],
            [['status'], 'integer'],
            [['name'], 'string', 'max' => 30],
            [['abb'], 'string', 'max' => 5],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('main', 'ID'),
            'name' => Yii::t('main', 'Name'),
            'abb' => Yii::t('main', 'Abb'),
            'status' => Yii::t('main', 'Status'),
        ];
    }
}
