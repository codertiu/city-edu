<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "edu_center".
 *
 * @property int $id
 * @property string $name
 * @property string $address
 * @property string $tel
 * @property string $director
 * @property string $inn
 * @property string $checking_account
 * @property string $mfo
 * @property string $oked
 */
class EduCenter extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'edu_center';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['name', 'address', 'tel', 'director', 'inn', 'checking_account', 'mfo', 'oked'], 'required'],
            [['name', 'address', 'director', 'checking_account'], 'string', 'max' => 255],
            [['tel', 'inn', 'mfo', 'oked'], 'string', 'max' => 35],
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
            'address' => Yii::t('main', 'Address'),
            'tel' => Yii::t('main', 'Tel'),
            'director' => Yii::t('main', 'Director'),
            'inn' => Yii::t('main', 'Inn'),
            'checking_account' => Yii::t('main', 'Checking Account'),
            'mfo' => Yii::t('main', 'Mfo'),
            'oked' => Yii::t('main', 'Oked'),
        ];
    }
}
