<?php

namespace backend\models;

use Yii;
use yii\behaviors\TimestampBehavior;
use yii\db\Expression;
use yii\db\ActiveRecord;
/**
 * This is the model class for table "students".
 *
 * @property int $id
 * @property string $name
 * @property string $surname
 * @property string $tel
 * @property string $phone2
 * @property string $phone3
 * @property string $phone4
 * @property int $gendar
 * @property string $address
 * @property int $member_id
 * @property int $reg_date
 * @property int $edu_center_id
 * @property string $image
 * @property string $file
 * @property string $pass_file
 * @property string $email
 * @property string $dob
 * @property int $active
 */
class Students extends ActiveRecord
{

    public function behaviors()
    {
        return [
            [
                'class' => TimestampBehavior::className(),
                'attributes' => [
                    ActiveRecord::EVENT_BEFORE_INSERT => ['reg_date'],
                ],
                'value' => date('U'),
            ],
        ];
    }

    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'students';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['name', 'surname', 'tel', 'gendar', 'address', 'edu_center_id',  'dob', 'active'], 'required'],
            [['gendar', 'member_id', 'reg_date', 'edu_center_id', 'active'], 'integer'],
            [['dob'], 'safe'],
            [['name', 'surname', 'address', 'image', 'file', 'pass_file', 'email'], 'string', 'max' => 255],
            [['tel'], 'string', 'max' => 35],
            [['phone2', 'phone3', 'phone4'], 'string', 'max' => 25],
            [['tel'], 'unique','targetClass' => '\backend\models\Reception', 'message'=>Yii::t('main','Mobile No Already Exist'),'when' => function ($model, $attribute) {
                return $model->{$attribute} !== $model->getOldAttribute($attribute);
            },],
            [['email'],'email'],
            [['file','pass_file','image'],'file']

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
            'surname' => Yii::t('main', 'Surname'),
            'tel' => Yii::t('main', 'Tel'),
            'phone2' => Yii::t('main', 'Phone2'),
            'phone3' => Yii::t('main', 'Phone3'),
            'phone4' => Yii::t('main', 'Phone4'),
            'gendar' => Yii::t('main', 'Gendar'),
            'address' => Yii::t('main', 'Address'),
            'member_id' => Yii::t('main', 'Member ID'),
            'reg_date' => Yii::t('main', 'Reg Date'),
            'edu_center_id' => Yii::t('main', 'Edu Center ID'),
            'image' => Yii::t('main', 'Image'),
            'file' => Yii::t('main', 'File'),
            'pass_file' => Yii::t('main', 'Pass File'),
            'email' => Yii::t('main', 'Email'),
            'dob' => Yii::t('main', 'Dob'),
            'active' => Yii::t('main', 'Active'),
        ];
    }

    public function getRegDate(){
        return date("Y-m-d H:i:s", strtotime($this->reg_date));
    }
    public function getFullName(){
        return $this->surname.' '.$this->name;
    }
    public function getEduCenterID(){
        return $this->hasOne(EduCenter::className(),['id'=>'edu_center_id']);
    }
}
