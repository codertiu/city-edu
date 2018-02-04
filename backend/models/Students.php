<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "students".
 *
 * @property integer $id
 * @property string $fio
 * @property string $tel
 * @property integer $gendar
 * @property string $address
 * @property integer $member_id
 * @property integer $reg_date
 * @property integer $edu_center_id
 * @property integer $active
 * @property string $image
 * @property string $file
 */
class Students extends \yii\db\ActiveRecord
{
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
            [['fio', 'tel', 'gendar', 'address', 'reg_date', 'edu_center_id', 'active'], 'required'],
            [['gendar', 'member_id', 'reg_date', 'edu_center_id', 'active'], 'integer'],
            [['fio', 'address', 'image', 'file'], 'string', 'max' => 255],
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
            'fio' => Yii::t('main', 'Fio'),
            'tel' => Yii::t('main', 'Tel'),
            'gendar' => Yii::t('main', 'Gendar'),
            'address' => Yii::t('main', 'Address'),
            'member_id' => Yii::t('main', 'Member ID'),
            'reg_date' => Yii::t('main', 'Reg Date'),
            'edu_center_id' => Yii::t('main', 'Edu Center ID'),
            'active' => Yii::t('main', 'Active'),
            'image' => Yii::t('main', 'Image'),
            'file' => Yii::t('main', 'File'),
        ];
    }
}
