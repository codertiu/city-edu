<?php

namespace backend\models;

use Yii;
use yii\db\Expression;
use yii\db\ActiveRecord;
use yii\behaviors\TimestampBehavior;

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
class Reception extends ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'reception';
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
                'value' => date('U'),
            ],
        ];
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['edu_center_id', 'name', 'tel', 'coming_id', 'type_edu_id', 'date_coming', 'creater'], 'required'],
            [['edu_center_id', 'coming_id', 'type_edu_id', 'creater', 'create_date', 'update_date', 'instance_id', 'comment_id'], 'integer'],
            [['date_coming'], 'safe'],
            [['name','surname'], 'string', 'max' => 255],
            [['tel'], 'string', 'max' => 35],
            [['tel'], 'unique','message'=>Yii::t('main','Mobile No Already Exist')],
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
            'name' => Yii::t('main', 'Name'),
            'surname'=>Yii::t('main', 'Surname'),
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

    public function getCreateDate(){
        return date("d/M/Y H:i:s", $this->create_date);
    }

    public function getInstance(){
        return $this->hasOne(Instance::className(),['id'=>'instance_id']);
    }
}


