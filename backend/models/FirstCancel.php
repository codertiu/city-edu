<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "first_cancel".
 *
 * @property int $id
 * @property string $name
 * @property string $phone
 * @property int $instance_id
 * @property int $creator_id
 * @property string $create_date
 * @property string $update_date
 */
class FirstCancel extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'first_cancel';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['name', 'phone', 'instance_id', 'creator_id'], 'required'],
            [['instance_id', 'creator_id'], 'integer'],
            [['create_date', 'update_date'], 'safe'],
            [['name'], 'string', 'max' => 255],
            [['phone'], 'string', 'max' => 15],
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
            'phone' => Yii::t('main', 'Phone'),
            'instance_id' => Yii::t('main', 'Instance ID'),
            'creator_id' => Yii::t('main', 'Creator ID'),
            'create_date' => Yii::t('main', 'Create Date'),
            'update_date' => Yii::t('main', 'Update Date'),
        ];
    }
}
