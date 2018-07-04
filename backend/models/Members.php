<?php

namespace backend\models;

use Yii;
use common\models\User;

/**
 * This is the model class for table "members".
 *
 * @property int $id
 * @property string $fio
 * @property string $tel
 * @property string $address
 * @property string $about
 * @property int $gendar
 * @property int $edu_center_id
 * @property int $active
 * @property string $img
 * @property string $file
 */
class Members extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public $filecv;
    public $fileimg;

    public static function tableName()
    {
        return 'members';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['fio', 'tel', 'address', 'gendar', 'edu_center_id', 'img', 'file','members_status'], 'required'],
            [['about'], 'string'],
            [['gendar', 'edu_center_id', 'active','user_id','members_status'], 'integer'],
            [['fio', 'address', 'img', 'file'], 'string', 'max' => 255],
            [['tel'], 'string', 'max' => 35],
            [['tel'], 'unique','targetClass' => '\backend\models\Members', 'message'=>Yii::t('main','Mobile No Already Exist'),'when' => function ($model, $attribute) {
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
            'fio' => Yii::t('main', 'Fio'),
            'tel' => Yii::t('main', 'Tel'),
            'address' => Yii::t('main', 'Address'),
            'about' => Yii::t('main', 'About'),
            'gendar' => Yii::t('main', 'Gendar'),
            'edu_center_id' => Yii::t('main', 'Edu Center ID'),
            'active' => Yii::t('main', 'Active'),
            'img' => Yii::t('main', 'Img'),
            'file' => Yii::t('main', 'File'),
            'filecv' => Yii::t('main', 'File'),
            'fileru' => Yii::t('main', 'Img'),
            'user_id'=>Yii::t('main','User ID'),
            'members_status'=>Yii::t('main','Members Status')
        ];
    }

    public function getUser(){
        return $this->hasOne(User::className(),['id'=>'user_id']);
    }

    public function getEduCenter(){
        return $this->hasOne(EduCenter::className(),['id'=>'edu_center_id']);
    }
}
