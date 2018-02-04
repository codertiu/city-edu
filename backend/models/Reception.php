<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "reception".
 *
 * @property int $id
 * @property int $edu_center_id
 * @property string $fio
 * @property string $tel
 * @property int $coming_id
 * @property int $type_edu_id
 * @property string $date_coming
 * @property int $creater
 * @property int $create_date
 * @property int $update_date
 * @property int $instance_id
 * @property int $comment_id
 */
class Reception extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'reception';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['edu_center_id', 'fio', 'tel', 'coming_id', 'type_edu_id', 'date_coming', 'creater', 'create_date', 'update_date', 'instance_id'], 'required'],
            [['edu_center_id', 'coming_id', 'type_edu_id', 'creater', 'create_date', 'update_date', 'instance_id', 'comment_id'], 'integer'],
            [['date_coming'], 'safe'],
            [['fio'], 'string', 'max' => 255],
            [['tel'], 'string', 'max' => 35],
            [['tel'], 'unique'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('main', 'ID'),
            'edu_center_id' => Yii::t('main', 'Edu Center ID'),
            'fio' => Yii::t('main', 'Fio'),
            'tel' => Yii::t('main', 'Tel'),
            'coming_id' => Yii::t('main', 'Coming ID'),
            'type_edu_id' => Yii::t('main', 'Type Edu ID'),
            'date_coming' => Yii::t('main', 'Date Coming'),
            'creater' => Yii::t('main', 'Creater'),
            'create_date' => Yii::t('main', 'Create Date'),
            'update_date' => Yii::t('main', 'Update Date'),
            'instance_id' => Yii::t('main', 'Instance ID'),
            'comment_id' => Yii::t('main', 'Comment ID'),
        ];
    }
}
