<?php

namespace backend\models;

use common\models\User;
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
                'value' => date('Y-m-d H:i:s'),
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
            [['edu_center_id', 'coming_id', 'type_edu_id', 'creater',  'instance_id', 'comment_id','language'], 'integer'],
            [['date_coming','dob','create_date', 'update_date'], 'safe'],
            [['name','surname','lavel','time','comfortable_time','comment'], 'string', 'max' => 255],
            [['tel','phone2','phone3','phone4'], 'string', 'max' => 35],
            [['tel'], 'unique','targetClass' => '\backend\models\Reception', 'message'=>Yii::t('main','Mobile No Already Exist'),'when' => function ($model, $attribute) {
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
            'phone2'=>Yii::t('main','Phone2'),
            'phone3'=>Yii::t('main','Phone3'),
            'phone4'=>Yii::t('main','Phone4'),
            'dob'=>Yii::t('main','DOB'),
            'lavel'=>Yii::t('main','Lavel'),
            'comfortable_time'=>Yii::t('main','Comfortable time'),
            'comment'=>Yii::t('main','Comment'),
            'language'=>Yii::t('main','Language'),
            'time'=>Yii::t('main','Time')
        ];
    }

    public function getCreateDate(){
        return date("d/M/Y H:i:s", $this->create_date);
    }

    public function getInstance(){
        return $this->hasOne(Instance::className(),['id'=>'instance_id']);
    }

    public function getComing(){
        return $this->hasOne(Coming::className(),['id'=>'coming_id']);
    }

    public function getTypeEdu(){
        return $this->hasOne(TypeEdu::className(),['id'=>'type_edu_id']);
    }
    public function getUser(){
        return $this->hasOne(User::className(),['id'=>'creater']);
    }
}


