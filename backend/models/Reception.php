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
    public $commentId;
    public $s_name;
    public $s_tel;

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
            [['name', 'tel', 'coming_id', 'type_edu_id', 'call_side', 'creator', 'type_of_reg', 'call_name'], 'required'],
            [['edu_center_id', 'call_side', 'coming_id', 'type_edu_id', 'creator', 'type_of_reg', 'instance_id', 'comment_id', 'language', 'study_type', 'cancel', 'call_name'], 'integer'],
            [['date_coming', 'create_date', 'update_date'], 'safe'],
            [['name', 'time', 'comfortable_time', 'comment', 'commentId', 's_name'], 'string', 'max' => 255],
            [['tel', 's_tel'], 'string', 'max' => 35],
            [['comment_id', 'commentId'], 'my_required', 'skipOnEmpty' => false]

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
            'tel' => Yii::t('main', 'Phone'),
            's_name' => Yii::t('main', 'Name'),
            's_tel' => Yii::t('main', 'Phone'),
            'coming_id' => Yii::t('main', 'Coming ID'),
            'type_edu_id' => Yii::t('main', 'Type Edu ID'),
            'date_coming' => Yii::t('main', 'Date Coming'),
            'creator' => Yii::t('main', 'Creator'),
            'create_date' => Yii::t('main', 'Create Date'),
            'update_date' => Yii::t('main', 'Update Date'),
            'instance_id' => Yii::t('main', 'Instance ID'),
            'comment_id' => Yii::t('main', 'Comment ID'),
            'cancel' => Yii::t('main', 'Cancel'),
            'comfortable_time' => Yii::t('main', 'Comfortable time'),
            'comment' => Yii::t('main', 'Comment'),
            'language' => Yii::t('main', 'Language'),
            'time' => Yii::t('main', 'Time'),
            'study_type' => Yii::t('main', 'Study Type'),
            'commentId' => Yii::t('main', 'commentId'),
            'type_of_reg' => Yii::t('main', 'Type Of Reg'),
            'call_name' => Yii::t('main', 'Call Name'),
            'call_side' => Yii::t('main', 'Call Side')
        ];
    }

    //validation

    public function my_required($attribute_name)
    {
        if (empty($this->commentId) && empty($this->comment_id)) {
            $this->addError($attribute_name, Yii::t('main', 'At least 1 of the field must be filled up properly'));
            return false;
        }

        return true;
    }

    public function getCreateDate()
    {
        return date("d/M/Y H:i:s", $this->create_date);
    }

    public function getInstance()
    {
        return $this->hasOne(Instance::className(), ['id' => 'instance_id']);
    }

    public function getComing()
    {
        return $this->hasOne(Coming::className(), ['id' => 'coming_id']);
    }

    public function getTypeEdu()
    {
        return $this->hasOne(TypeEdu::className(), ['id' => 'type_edu_id']);
    }

    public function getUser()
    {
        return $this->hasOne(User::className(), ['id' => 'creator']);
    }

    public function getEduCenter()
    {
        return $this->hasOne(EduCenter::className(), ['id' => 'edu_center_id']);
    }

    public function getCommentIDT()
    {
        return $this->hasOne(Comment::className(), ['id' => 'comment_id']);
    }
}


