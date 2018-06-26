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

    public $file2;
    public $pass_file2;
    public $image2;
    public function behaviors()
    {
        return [
            [
                'class' => TimestampBehavior::className(),
                'attributes' => [
                    ActiveRecord::EVENT_BEFORE_INSERT => ['reg_date'],
                ],
                'value' => date('Y-m-d H:i:s'),
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
            [['name', 'surname', 'tel', 'gendar', 'address', 'edu_center_id',  'dob', 'active','reception_id','pass_file','image'], 'required'],
            [['gendar', 'member_id', 'edu_center_id', 'active','reception_id'], 'integer'],
            [['dob'], 'safe'],
            [['name', 'surname', 'address', 'reg_date','image', 'file', 'pass_file', 'email'], 'string', 'max' => 255],
            [['tel'], 'string', 'max' => 35],
            [['phone2', 'phone3', 'phone4'], 'string', 'max' => 25],
            [['tel'], 'unique','targetClass' => '\backend\models\Reception', 'message'=>Yii::t('main','Mobile No Already Exist'),'when' => function ($model, $attribute) {
                return $model->{$attribute} !== $model->getOldAttribute($attribute);
            },],
            [['email'],'email'],
            [['file','pass_file','image'],'file'],
            [['file2','pass_file2','image2'],'file']
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
            'image2' => Yii::t('main', 'Image2'),
            'file2' => Yii::t('main', 'File2'),
            'pass_file2' => Yii::t('main', 'Pass File2'),
            'email' => Yii::t('main', 'Email'),
            'dob' => Yii::t('main', 'Dob'),
            'active' => Yii::t('main', 'Active'),
            'reception_id' =>Yii::t('main','Reception Id')
        ];
    }

    public function getRegDate(){
        return date("Y-m-d H:i:s", strtotime($this->reg_date));
    }
    public function getFullName(){
        return $this->surname.' '.$this->name;
    }

    public function getFullNameId(){
        return $this->surname.' '.$this->name.' '.$this->id;
    }
    public function getEduCenterID(){
        return $this->hasOne(EduCenter::className(),['id'=>'edu_center_id']);
    }

    public function getWithUs(){
        $date1=date_create(date('Y-m-d'));
        $date2=date_create(date('Y-m-d', strtotime($this->reg_date)));
        $diff=date_diff($date2,$date1);
        return $diff->format("%R%a days");
    }

    // Tugilgan kunlar uchun $type today yoki month
    public function getBirthday($type){
        $model = self::find();
        if($type == 'today'){
            $model->where(['active' => 1])
                ->where('MONTH('.$this->dob.')= MONTH(now())')
                ->where('DAY('.$this->dob.')=DAY(NOW())')
                ->all();
            return $model;
        }else if($type == 'month'){
            $model->where(['active' => 1])
                ->where('concat( year(now()), mid('.$this->dob.',5,6) ) 
                                BETWEEN now() AND date_add(now(), interval 7 day)')
                ->all();
            return $model;
        }
    }
    public function beforeDelete()
    {
        $model = Students::find()->where(['students_id'=>$this->id])->all();
        foreach($model as $one){
            $one->delete();
        }

        if(is_file($this->image)){
            @unlink($this->image);
        }
        if(is_file($this->file)){
            @unlink($this->file);
        }
        if(is_file($this->pass_file)){
            @unlink($this->pass_file);
        }
        return parent::beforeDelete(); // TODO: Change the autogenerated stub
    }
}
