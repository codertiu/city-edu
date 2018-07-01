<?php

namespace backend\models;

use Yii;
use yii\db\Expression;
use yii\db\ActiveRecord;
use yii\behaviors\TimestampBehavior;

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
            [['name', 'phone', 'coming_id', 'creator_id'], 'required'],
            [['coming_id', 'creator_id'], 'integer'],
            [['create_date', 'update_date'], 'safe'],
            [['name','comment'], 'string', 'max' => 255],
            [['phone'], 'string', 'max' => 100],
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
            'coming_id' => Yii::t('main', 'Coming ID'),
            'creator_id' => Yii::t('main', 'Creator ID'),
            'comment'=>Yii::t('main','Comment'),
            'create_date' => Yii::t('main', 'Create Date'),
            'update_date' => Yii::t('main', 'Update Date'),
        ];
    }

    public function getComing(){
        return $this->hasOne(Coming::className(),['id'=>'coming_id']);
    }
}
